<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Faq;
use Auth;
class FaqController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    return view('backend.pages.faq.index');
  }
  public function faqstatus(Request $request,$id)
  {
    $dt=$request->all();
    $edit = Faq::find($id)->update($dt);
    return response()->json($edit);
    // dd($dt);
  }
  public function data($id=-1)
  {
    $data['id']=$id;
    $idlevel=Auth::user()->level;
    $faq=Faq::all();
    $data['data']=$faq;
    return view('backend.pages.faq.data',$data);
  }

  public function form($id=-1)
  {
    $data['id']=$id;
    $idlevel=Auth::user()->level;

    if($id!=-1)
    {
      $data['det']=Faq::find($id);
    }
    return view('backend.pages.faq.form',$data);
  }

  public function store(Request $request) {
    $create = Faq::create($request->all());
    // return response()->json($create);
    return redirect('faq')->with('pesan', 'Data FAQ Berhasil Di Simpan');
  }

  public function update(Request $request, $id)
  {
      $edit = Faq::find($id)->update($request->all());
      // return response()->json($edit);
      return redirect('faq')->with('pesan', 'Data FAQ Berhasil Di Edit');
  }

  public function destroy($id) {
    Faq::find($id)->delete();
    return response()->json(['done']);
  }
}
