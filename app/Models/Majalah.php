<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Majalah extends Model
{
    protected $table = 'majalah'; // pastikan nama tabel sesuai
    protected $fillable = ['judul', 'cover', 'deskripsi', 'file_pdf', 'slug'];
    public $timestamps = false;

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($majalah) {
            if (empty($majalah->slug)) {
                $majalah->slug = bin2hex(random_bytes(8));
            }
        });
    }
}