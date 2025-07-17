<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use App\Models\Majalah;
use App\Models\Carousel;
use App\Models\MajalahVisit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {
        $visits = Visit::count();
        $majalahs = Majalah::orderBy('id', 'asc')->get();
        $carousels = Carousel::orderBy('id', 'asc')->get();
        $totalMajalahVisits = MajalahVisit::count();
        return view('admin', compact('visits', 'majalahs', 'carousels', 'totalMajalahVisits'));
    }

    public function storeMajalah(Request $request)
    {
    $data = $request->validate([
        'judul' => 'required',
        'deskripsi' => 'required',
        'cover' => 'required|image',
        'file_pdf' => 'required|mimes:pdf|max:49152', // 48MB
    ]);

    // Simpan langsung ke public/asset
    $coverName = $request->file('cover')->getClientOriginalName();
    $pdfName = $request->file('file_pdf')->getClientOriginalName();

    $request->file('cover')->move(public_path('asset/majalah/cover'), $coverName);
    $request->file('file_pdf')->move(public_path('asset/majalah/pdf'), $pdfName);

    $data['cover'] = $coverName;
    $data['file_pdf'] = $pdfName;

    Majalah::create($data);

    return redirect('/admin')->with('success', 'Majalah berhasil ditambahkan!');
    }


    public function editMajalah($id)
    {
        $majalah = Majalah::findOrFail($id);
        return response()->json($majalah);
    }

    public function updateMajalah(Request $request, $id)
{
    $majalah = Majalah::findOrFail($id);

    $data = $request->validate([
        'judul' => 'required',
        'deskripsi' => 'required',
        'cover' => 'nullable|image',
        'file_pdf' => 'nullable|mimes:pdf',
    ]);

    // Hapus file cover lama jika ada dan upload file cover baru
    if ($request->hasFile('cover')) {
        if ($majalah->cover && Storage::disk('public')->exists("asset/majalah/cover/{$majalah->cover}")) {
            Storage::disk('public')->delete("asset/majalah/cover/{$majalah->cover}");
        }

        $data['cover'] = $request->file('cover')->storeAs(
            'asset/majalah/cover',
            $request->file('cover')->getClientOriginalName(),
            'public'
        );
        $data['cover'] = basename($data['cover']);
    }

    // Hapus file PDF lama jika ada dan upload file PDF baru
    if ($request->hasFile('file_pdf')) {
        if ($majalah->file_pdf && Storage::disk('public')->exists("asset/majalah/pdf/{$majalah->file_pdf}")) {
            Storage::disk('public')->delete("asset/majalah/pdf/{$majalah->file_pdf}");
        }

        $data['file_pdf'] = $request->file('file_pdf')->storeAs(
            'asset/majalah/pdf',
            $request->file('file_pdf')->getClientOriginalName(),
            'public'
        );
        $data['file_pdf'] = basename($data['file_pdf']);
    }

    $majalah->update($data);

    return redirect('/admin')->with('success', 'Majalah berhasil diupdate!');
}

public function destroyMajalah($id)
{
    $majalah = Majalah::findOrFail($id);

    // Hapus cover dari direktori public jika ada
    $coverPath = public_path("asset/majalah/cover/{$majalah->cover}");
    if (file_exists($coverPath)) {
        unlink($coverPath);
    }

    // Hapus file PDF dari direktori public jika ada
    $pdfPath = public_path("asset/majalah/pdf/{$majalah->file_pdf}");
    if (file_exists($pdfPath)) {
        unlink($pdfPath);
    }

    // Hapus data dari database
    $majalah->delete();

    return redirect('/admin')->with('success', 'Majalah berhasil dihapus!');
}


    public function storeCarousel(Request $request)
    {
        $data = $request->validate([
            'banner_path' => 'required|image',
        ]);
        $data['banner_path'] = $request->file('banner_path')->storeAs('asset/carousel', $request->file('banner_path')->getClientOriginalName(), 'public');
        $data['banner_path'] = basename($data['banner_path']);
        Carousel::create($data);
        return redirect('/admin')->with('success', 'Banner berhasil ditambahkan!');
    }

    public function destroyCarousel($id)
    {
        Carousel::destroy($id);
        return redirect('/admin')->with('success', 'Banner berhasil dihapus!');
    }
}