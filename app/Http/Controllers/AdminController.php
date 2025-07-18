<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use App\Models\Majalah;
use App\Models\Carousel;
use App\Models\MajalahVisit;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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

    public function createMajalah()
{
    return view('admin.create');
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
    return view('/admin.edit', compact('majalah'));
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

    // Ganti Cover jika ada
    if ($request->hasFile('cover')) {
        // Hapus cover lama
        $oldCoverPath = public_path("asset/majalah/cover/{$majalah->cover}");
        if ($majalah->cover && file_exists($oldCoverPath)) {
            unlink($oldCoverPath);
        }

        $newCover = $request->file('cover');
        $newCoverName = time() . '_' . Str::slug(pathinfo($newCover->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $newCover->getClientOriginalExtension();
        $newCover->move(public_path('asset/majalah/cover'), $newCoverName);
        $data['cover'] = $newCoverName;
    }

    // Ganti PDF jika ada
    if ($request->hasFile('file_pdf')) {
        $oldPdfPath = public_path("asset/majalah/pdf/{$majalah->file_pdf}");
        if ($majalah->file_pdf && file_exists($oldPdfPath)) {
            unlink($oldPdfPath);
        }

        $newPdf = $request->file('file_pdf');
        $newPdfName = time() . '_' . Str::slug(pathinfo($newPdf->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $newPdf->getClientOriginalExtension();
        $newPdf->move(public_path('asset/majalah/pdf'), $newPdfName);
        $data['file_pdf'] = $newPdfName;
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