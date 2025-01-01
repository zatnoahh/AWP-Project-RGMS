<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grant extends Model
{
    protected $fillable = ['grant_title','grant_provider','grant_amount','description','grant_start_date','duration'];

    public function academicians(){
        return $this->belongsToMany(Academician::class, 'academician_grant', 'grant_id', 'academician_id')
                ->withPivot('role')
                ->withTimestamps();
    }

    public function leader(){
        return $this->academicians()->wherePivot('role','leader')->first();
    }

    public function milestones(){
        return $this->hasMany(Milestone::class);
    }

    public function academicianGrants()
    {
        return $this->hasMany(AcademicianGrant::class);
    }

}
