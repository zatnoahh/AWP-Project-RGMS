<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grant extends Model
{
    protected $fillable = ['grant_title','grant_provider','grant_amount','description','grant_start_date','duration'];



}
