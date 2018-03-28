<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Event;
use App\Models\Jurusan;
use App\Models\Berita;
use App\Services\InstagramImage;

class EventFrontController extends Controller
{
  public function thelist()
  {
    $getinstagram = InstagramImage::getImage();
    $getjurusan = Jurusan::where('status', 1)->get();
    $getfooter = Berita::orderby('berita.created_at', 'desc')->limit(6)->get();

    $getevent = Event::orderby('tanggal_event', 'desc')->paginate(10);
    return view('frontend.pages.event.event')
      ->with('jurusan', $getjurusan)
      ->with('berita', $getfooter)
      ->with('getinstagram', $getinstagram)
      ->with('event', $getevent);
  }

  public function detail($id)
  {
    $getinstagram = InstagramImage::getImage();
    $getjurusan = Jurusan::where('status', 1)->get();
    $getfooter = Berita::orderby('berita.created_at', 'desc')->limit(6)->get();

    $getevent = Event::find($id);
    return view('frontend.pages.event.detail')
      ->with('jurusan', $getjurusan)
      ->with('berita', $getfooter)
      ->with('getinstagram', $getinstagram)
      ->with('event', $getevent);
  }
}
