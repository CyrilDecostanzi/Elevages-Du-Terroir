<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'description',
        'image',
        'price',
        'type_id',
        'breed_id',
        'is_sold',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }

    public function sell()
    {
        $this->is_sold = true;
        $this->save();
    }

    public function scopeSold($query)
    {
        return $query->where('is_sold', true);
    }

    public function scopeAvailable($query)
    {
        return $query->where('is_sold', false);
    }

    public function scopeOfType($query, $type)
    {
        return $query->where('type_id', $type);
    }

    public function scopeOfBreed($query, $breed)
    {
        return $query->where('breed_id', $breed);
    }
}
