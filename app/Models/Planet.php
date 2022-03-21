<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    use HasFactory;

    // Camps que es permet passar al mètode create o update en format array .
    
    protected $fillable = [
        'name'
    ];
    public function superheroes()
    {
        return $this->hasMany(Superhero::class);
    }
}