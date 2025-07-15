<?php

namespace App\Http\Controllers;

use App\Models\Majalah;
use App\Models\Carousel;
use App\Models\Visit;

class HomeController extends Controller
{
    public function index()
    {
        $ip = request()->ip();
        $today = now()->toDateString();
        $exists = Visit::where('ip_address', $ip)
            ->whereDate('visited_at', $today)
            ->exists();
        if (!$exists) {
            Visit::create([
                'ip_address' => $ip,
                'user_agent' => request()->userAgent(),
                'visited_at' => now(),
            ]);
        }

        $userAgent = strtolower(request()->header('User-Agent'));
        $isMobile = preg_match('/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i', $userAgent);
        $query = Majalah::query();
        if ($search = request('q')) {
            $query->where('judul', 'like', '%' . $search . '%');
        }
        if ($isMobile) {
            $perPage = 4;
        } else {
            $perPage = request()->input('perPage', 8);
            if ($perPage === 'all') {
                $perPage = $query->count() ?: 1;
            }
            $perPage = intval($perPage);
            if ($perPage < 1) $perPage = 4;
        }
        $majalahs = $query->orderBy('id', 'desc')->paginate($perPage);
        $carousels = Carousel::orderBy('id', 'desc')->get();
        $majalah_terkini = Majalah::orderBy('id', 'desc')->first();
        return view('home', [
            'majalahs' => $majalahs,
            'carousels' => $carousels,
            'majalah_terkini' => $majalah_terkini,
        ]);
    }
}