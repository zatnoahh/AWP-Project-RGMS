<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grant extends Model
{
    protected $fillable = ['grant_title','grant_provider','grant_amount','description','grant_start_date','duration'];

    public function academicians(){
        return $this->belongsToMany(Academician::class)
            ->withPivot('role')
            ->withTimestamps();
    }

    public function leader(){
        return $this0>academicians()->wherePivot('role','leader')->first();
    }

    public function milestones(){
        return $this->hasMany(Milestone::class);
    }

}
