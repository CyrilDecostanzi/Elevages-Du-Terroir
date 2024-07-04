<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\UserService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class CreateUser extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(UserService $userService)
    {
        $name = $this->askWithValidation('Enter the name', 'name', ['required', 'string', 'max:255']);
        $email = $this->askWithValidation('Enter the email', 'email', ['required', 'string', 'email', 'max:255', 'unique:users']);
        $password = $this->askWithValidation('Enter the password', 'password', ['required', 'string', 'confirmed', Password::defaults()], true);

        try {
            $user = $userService->createUser($name, $email, $password);

            $this->info('User created successfully.');

            $this->info('################################################################################');
            $this->info('User ID: ' . $user->id);
            $this->info('User name: ' . $user->name);
            $this->info('User email: ' . $user->email);
            $this->info('################################################################################');


            // Optionally, trigger any events if necessary (Email verification, etc.)
            // event(new Registered($user));

        } catch (ValidationException $e) {
            $this->error('Error: ' . $e->getMessage());
            return 1;
        }

        return 0;
    }

    /**
     * Prompts the user with a question and validates the input based on the given rules.
     *
     * @param string $question The question to ask the user.
     * @param string $field The field name for validation.
     * @param array|string $rules The validation rules.
     * @param bool $secret Whether the input is a secret (password) or not.
     * @return string The validated input value.
     */
    protected function askWithValidation($question, $field, $rules, $secret = false)
    {
        do {
            $valueData = $this->promptUser($question, $secret);
            $data = $this->prepareValidationData($field, $valueData, $secret);
            $validator = Validator::make($data, [$field => $rules]);
            $this->handleValidationErrors($validator);
        } while ($validator->fails());

        return $valueData['value'];
    }

    /**
     * Prompts the user with a question. If the input is a secret, it also prompts for confirmation.
     *
     * @param string $question The question to ask the user.
     * @param bool $secret Whether the input is a secret (password) or not.
     * @return array An array containing the value and, if secret, the confirmation.
     */
    protected function promptUser($question, $secret)
    {
        if ($secret) {
            $value = $this->secret($question);
            $confirmation = $this->secret('Confirm the password');
            return ['value' => $value, 'confirmation' => $confirmation];
        }

        return ['value' => $this->ask($question)];
    }

    /**
     * Prepares the data array for validation.
     *
     * @param string $field The field name for validation.
     * @param array $valueData The array containing the value and optional confirmation.
     * @param bool $secret Whether the input is a secret (password) or not.
     * @return array The data array prepared for validation.
     */
    protected function prepareValidationData($field, $valueData, $secret)
    {
        $data = [$field => $valueData['value']];

        if ($secret && isset($valueData['confirmation'])) {
            $data[$field . '_confirmation'] = $valueData['confirmation'];
        }

        return $data;
    }

    /**
     * Handles validation errors by displaying them to the user.
     *
     * @param \Illuminate\Contracts\Validation\Validator $validator The validator instance.
     * @return void
     */
    protected function handleValidationErrors($validator)
    {
        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
        }
    }
}
