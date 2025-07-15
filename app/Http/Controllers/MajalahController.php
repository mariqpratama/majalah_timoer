<?php

namespace App\Http\Controllers;

use App\Models\Majalah;
use App\Models\MajalahVisit;
use Illuminate\Support\Facades\Auth;

class MajalahController extends Controller
{
    public function show($id)
    {
        $majalah = Majalah::findOrFail($id);
        // Catat kunjungan ke detail majalah hanya jika belum ada di hari yang sama untuk ip dan id_majalah
        $ip = request()->ip();
        $today = now()->toDateString();
        $exists = MajalahVisit::where('ip_address', $ip)
            ->where('id_majalah', $majalah->id)
            ->whereDate('visited_at', $today)
            ->exists();
        if (!$exists) {
            MajalahVisit::create([
                'ip_address' => $ip,
                'user' => Auth::check() ? Auth::user()->name : null,
                'id_majalah' => $majalah->id,
                'visited_at' => now(),
            ]);
        }
        return view('detail', compact('majalah'));
    }
}