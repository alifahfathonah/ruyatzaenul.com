<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Gallery;

class GalleryController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    return view('backend.pages.galeri.index');
  }
  public function data($id=-1)
  {
    $data['id']=$id;
    $data['data']=Gallery::orderBy('title')->get();
    return view('backend.pages.galeri.data',$data);
  }

  public function form($id=-1)
  {
    $data['id']=$id;
    if($id!=-1)
    {
      $data['det']=Gallery::find($id);
    }
    return view('backend.pages.galeri.form',$data);
  }
  public function galeristatus(Request $request,$id)
  {
    $dt=$request->all();
    $edit = Gallery::find($id)->update($dt);
    return response()->json($edit);
    // dd($dt);
  }
  public function store(Request $request) {
    $create = Gallery::create($request->all());
    return response()->json($create);
    // return redirect('jurusan')->with('pesan', 'Data Gallery Berhasil Di Simpan');
  }

  public function update(Request $request, $id)
  {
      $edit = Gallery::find($id)->update($request->all());
      // return redirect('jurusan')->with('pesan', 'Data Gallery Berhasil Di Edit');
      // echo '<pre>';
      // print_r($request->all());
      // echo '</pre>';
      return response()->json($edit);
  }

  public function destroy($id) {
    Gallery::find($id)->delete();
    return response()->json(['done']);
  }
}
