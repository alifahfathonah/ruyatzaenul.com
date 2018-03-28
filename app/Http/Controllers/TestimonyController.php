<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Testimony;
class TestimonyController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    return view('backend.pages.testimoni.index');
  }
  public function data($id=-1)
  {
    $data['id']=$id;
    $data['data']=Testimony::orderBy('created_at','desc')->get();
    return view('backend.pages.testimoni.data',$data);
  }

  public function form($id=-1)
  {
    $data['id']=$id;
    if($id!=-1)
    {
      $data['det']=Testimony::find($id);
    }
    return view('backend.pages.testimoni.form',$data);
  }

  public function store(Request $request) {
    $create = Testimony::create($request->all());
    // return response()->json($create);
    return redirect('testimoni')->with('pesan', 'Data Testimony Berhasil Di Simpan');
  }

  public function update(Request $request, $id)
  {
      $edit = Testimony::find($id)->update($request->all());
      // return response()->json($edit);
      return redirect('testimoni')->with('pesan', 'Data Testimony Berhasil Di Edit');
  }

  public function destroy($id) {
    Testimony::find($id)->delete();
    return response()->json(['done']);
  }
}
