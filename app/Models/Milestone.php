<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    protected $fillable = [
        'milestone_title',
        'milestone_description',
        'milestone_date',
        'grant_id'
    ];
}
