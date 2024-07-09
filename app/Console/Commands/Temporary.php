<?php

namespace App\Console\Commands;

use App\Models\Type;
use Illuminate\Console\Command;

class Temporary extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:temporary';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Temporary command for testing';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // CLEAN THIS PART BEFORE COMMIT
        $types = Type::get();

        foreach ($types as $type) {
            $this->error($type->name);

            foreach ($type->breeds as $breed) {
                $this->info($breed->name);
            }
        }
    }
}
