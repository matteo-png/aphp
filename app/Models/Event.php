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






    public function users(){
        return $this->belongsToMany(User::class);
    }
}
