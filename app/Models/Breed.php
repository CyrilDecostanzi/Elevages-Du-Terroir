<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'type_id',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function animals()
    {
        return $this->hasMany(Animal::class);
    }

    public function scopeOfType($query, $type)
    {
        return $query->where('type_id', $type);
    }
}
