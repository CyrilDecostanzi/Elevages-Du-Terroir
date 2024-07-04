<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function breeds()
    {
        return $this->hasMany(Breed::class);
    }

    public function animals()
    {
        return $this->hasMany(Animal::class);
    }
}
