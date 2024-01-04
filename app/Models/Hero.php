<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function skill(){
        return $this->belongsTo(Skill::class);
    }

    public function gender(){
        return $this->belongsTo(Gender::class);
    }

}
