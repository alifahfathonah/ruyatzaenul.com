<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Berita;
use App\Models\Jurusan;
use App\Models\DivisiCCIT;
use App\Models\CatBerita;
use App\Services\InstagramImage;

class BeritaFrontController extends Controller
{
    public function thelist()
    {
      $getinstagram = InstagramImage::getImage();
      $getjurusan = Jurusan::where('status', 1)->get();
      $getdivisi = DivisiCCIT::all();
      
      $getberita = Berita::where('flag', 1)
        ->orderby('berita.created_at', 'desc')
        ->paginate(9);

      return view('frontend.pages.berita.list')
        ->with('divisi', $getdivisi)
        ->with('berita', $getberita)
        ->with('getinstagram', $getinstagram)
        ->with('jurusan', $getjurusan);
    }

    public function detail($id)
    {
      $getjurusan = Jurusan::where('status', 1)->get();
      $getberita = Berita::orderby('berita.created_at', 'desc')->paginate(9);

      $detailberita = Berita::find($id);
      $detailberita->view = $detailberita->view + 1;
      $detailberita->save();

      $getinstagram = InstagramImage::getImage();

      return view('frontend.pages.berita.detail')
        ->with('data', $detailberita)
        ->with('berita', $getberita)
        ->with('getinstagram', $getinstagram)
        ->with('jurusan', $getjurusan);
    }

    public function kategoridivisi($id)
    {
      $get = CatBerita::where('id_divisi', $id)->get();
      return $get;
    }

    public function find(Request $request)
    {
      $getjurusan = Jurusan::where('status', 1)->get();
      $getdivisi = DivisiCCIT::all();

      $getinstagram = InstagramImage::getImage();

      $getberita = Berita::where('id_kategori', $request->kategori)
        ->where('flag', 1)
        ->orderby('berita.created_at', ($request->urutan != "" ? $request->urutan : 'desc'))
        ->paginate(9);

      return view('frontend.pages.berita.list')
        ->with('divisi', $getdivisi)
        ->with('berita', $getberita)
        ->with('getinstagram', $getinstagram)
        ->with('jurusan', $getjurusan);
    }
}
