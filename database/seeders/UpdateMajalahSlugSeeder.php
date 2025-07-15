<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Majalah;

class UpdateMajalahSlugSeeder extends Seeder
{
    public function run()
    {
        Majalah::whereNull('slug')->orWhere('slug', '')->get()->each(function($m) {
            $m->slug = bin2hex(random_bytes(8));
            $m->save();
        });
    }
}
