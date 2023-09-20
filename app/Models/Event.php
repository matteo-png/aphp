<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    public function statut(){
        return $this->belongsTo(Statut::class);
    }

    public function prestation(){
        return $this->belongsTo(Prestation::class);
    }
    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();

        // Lors de la création d'un nouvel événement, définissez statut_id sur 1
        static::creating(function ($event) {
            $event->statut_id = 1; // Ou la valeur par défaut que vous souhaitez
        });
    }




    public function users(){
        return $this->belongsToMany(User::class);
    }
}
