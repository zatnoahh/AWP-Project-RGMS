<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    protected $fillable = ['grant_id','milestone_id','milestone_title','completion_date','deliverable','status','remarks','date_updated'];

    public function grant(){
        return $this->belongsTo(Grant::class);
    }
}
