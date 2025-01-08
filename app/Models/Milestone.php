<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Milestone extends Model
{
    use HasFactory;

    protected $fillable = ['milestone_id','grant_id','milestone_title','completion_date','deliverable','status','remarks','date_updated'];

    protected $casts = [
        'completion_date' => 'datetime',
    ];

    public function grant(){
        return $this->belongsTo(Grant::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'grant_user', 'grant_id', 'user_id');
    }
}
