<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Gallery;
use App\Models\Jurusan;
use App\Models\Berita;
use App\Services\InstagramImage;

class GalleryFrontController extends Controller
{
  public function index()
  {
    $getinstagram = InstagramImage::getImage();
    $getjurusan = Jurusan::where('status', 1)->get();
    $getfooter = Berita::orderby('berita.created_at', 'desc')->limit(6)->get();

    $getgallery = Gallery::paginate(12);
    return view('frontend.pages.gallery.index')
      ->with('data', $getgallery)
      ->with('jurusan', $getjurusan)
      ->with('getinstagram', $getinstagram)
      ->with('berita', $getfooter);
  }
}
