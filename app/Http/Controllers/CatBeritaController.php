<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\CatBerita;
use Auth;
class CatBeritaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      return view('backend.pages.cat_berita.index');
    }

    public function data($id=-1)
    {
      $data['id']=$id;

        $data['cat']=CatBerita::all();
      return view('backend.pages.cat_berita.data',$data);
    }

    public function form($id=-1)
    {
      $data['id']=$id;
      $idlevel=Auth::user()->level;
     
      if($id!=-1)
      {
        $d=CatBerita::find($id);
        $data['det']=$d;
      }
      return view('backend.pages.cat_berita.form',$data);
    }
    public function store(Request $request) {
      $create = CatBerita::create($request->all());
      return response()->json($create);
    }

    public function update(Request $request, $id)
    {
        $edit = CatBerita::find($id)->update($request->all());
        return response()->json($edit);
    }

    public function destroy($id) {
      CatBerita::find($id)->delete();
      return response()->json(['done']);
    }
}
