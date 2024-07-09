<?php

namespace App\Services;

use App\Models\Type;

class TypeService
{
    public function getAllTypes()
    {
        return Type::all();
    }
}
