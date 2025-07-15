<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    public $timestamps = false;
    protected $fillable = ['ip_address', 'user_agent', 'visited_at'];
}
