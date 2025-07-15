<?php

return [
    // Path asset utama (untuk asset/majalah, asset/carousel, dll)
    'asset' => env('ASSET_PATH', '/asset'),
    // Path cover majalah
    'majalah_cover' => env('MAJALAH_COVER_PATH', '/asset/majalah/cover'),
    // Path pdf majalah
    'majalah_pdf' => env('MAJALAH_PDF_PATH', '/asset/majalah/pdf'),
    // Path banner carousel
    'carousel_banner' => env('CAROUSEL_BANNER_PATH', '/asset/carousel'),
    // Path logo
    'logo' => env('LOGO_PATH', '/asset/logo'),
];