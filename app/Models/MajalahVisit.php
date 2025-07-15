<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MajalahVisit extends Model
{
    public $timestamps = false;
    protected $fillable = ['ip_address', 'user', 'id_majalah', 'visited_at'];
}
