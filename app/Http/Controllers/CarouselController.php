<?php

namespace App\Http\Controllers;

use App\Models\Carousel;

class CarouselController extends Controller
{
    public function index()
    {
        $carousels = Carousel::orderBy('id', 'desc')->get();
        return view('home', compact('carousels'));
    }
}