<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Aliansi;
class AliansiController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    return view('backend.pages.aliansi.index');
  }
  public function data($id=-1)
  {
    $data['id']=$id;
    $data['data']=Aliansi::orderBy('nama_aliansi')->get();
    return view('backend.pages.aliansi.data',$data);
  }

  public function form($id=-1)
  {
    $data['id']=$id;
    if($id!=-1)
    {
      $d=Aliansi::find($id);
      $data['det']=$d;
    }
    return view('backend.pages.aliansi.form',$data);
  }
  public function store(Request $request) {
    $create = Aliansi::create($request->all());
    // return response()->json($create);
    return redirect('aliansi')->with('pesan','Data Aliansi Berhasil Di Tambah');
  }

  public function update(Request $request, $id)
  {
      $edit = Aliansi::find($id)->update($request->all());
      // return response()->json($edit);
      return redirect('aliansi')->with('pesan','Data Aliansi Berhasil Di Edit');
  }

  public function destroy($id) {
    Aliansi::find($id)->delete();
    return response()->json(['done']);
  }
}
