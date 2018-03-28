<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\SupportingDoc;

class SupportingDocController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    return view('backend.pages.dokumen.index');
  }
  public function data($id=-1)
  {
    $data['id']=$id;
    $data['data']=SupportingDoc::orderBy('title')->get();
    return view('backend.pages.dokumen.data',$data);
  }

  public function form($id=-1)
  {
    $data['id']=$id;
    if($id!=-1)
    {
      $data['det']=SupportingDoc::find($id);
    }
    return view('backend.pages.dokumen.form',$data);
  }

  public function store(Request $request) {
    $create = SupportingDoc::create($request->all());
    return response()->json($create);
    // return redirect('jurusan')->with('pesan', 'Data Dokumen Akademik Berhasil Di Simpan');
  }

  public function update(Request $request, $id)
  {
      $edit = SupportingDoc::find($id)->update($request->all());
      // return redirect('jurusan')->with('pesan', 'Data Dokumen Akademik Berhasil Di Edit');
      // echo '<pre>';
      // print_r($request->all());
      // echo '</pre>';
      return response()->json($edit);
  }

  public function destroy($id) {
    SupportingDoc::find($id)->delete();
    return response()->json(['done']);
  }
}
