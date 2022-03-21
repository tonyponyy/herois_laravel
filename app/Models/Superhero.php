<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Superhero extends Model

    {
        use HasFactory;
        protected $fillable = ['heroname','realname','gender','planet_id','user_id'];
        protected $with = ['planet'];

        public function planet() {
    
            return $this->belongsTo(Planet::class);}
        
            public function superpowers()
    {  		 

	 // La taula per seguir regles Laravel s'hauria d'haver anomenat superhero_superpower!!! 
      
   	return $this->belongsToMany(
           Superpower::class,
          'superheroes_superpowers'      
          )->withPivot('amount')->withTimestamps();
    }    
          
    }

