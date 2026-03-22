<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job_t extends Model
{
    //allow savinh data
    protected $fillable = ['user_id','company','position','status','notes'];
}
