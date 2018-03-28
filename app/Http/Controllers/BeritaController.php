<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Berita;
use App\Models\CatBerita;
use Auth;
class BeritaController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    return view('backend.pages.berita.index');
  }
  public function beritastatus(Request $request,$id)
  {
    $dt=$request->all();
    $edit = Berita::find($id)->update($dt);
    return response()->json($edit);
    // dd($dt);
  }
  public function data($id=-1)
  {
    if($id!=-2)
    {

      $data['id']=$id;
      $idlevel=Auth::user()->level;
      $c=CatBerita::all();
      $cat=array();
      
      foreach ($c as $k => $v)
      {
        $cat[$v->id]=$v;
      }
      $data['cat']=$cat;
      $data['data']=Berita::orderBy('created_at','desc')->get();
      return view('backend.pages.berita.data',$data);
    }
    else
    {
      $array['cols'][] = array('type' => 'string');
      $array['cols'][] = array('type' => 'string');
      $array['cols'][] = array('type' => 'string');
      $cat=array();
      $c=CatBerita::all();
      foreach ($c as $k => $v)
      {
        $cat[$v->id]=$v;
      }
      $all=Berita::all();
      $a=$b=array();
      foreach($all as $k => $v)
      {
        $a[$v->id_kategori][]=$v;
      }

      foreach($a as $k => $v)
      {
        $kat=$cat[$k]->nama_kategori;
        $array['rows'][] = array('c' => array( array('v'=>''.$kat.''), array('v'=>count($a[$k]))));
      }
      // $array['rows'][] = array('c' => array( array('v'=>'21-01-13'), array('v'=>26)));
      // $array['rows'][] = array('c' => array( array('v'=>'22-01-13'), array('v'=>12)));
      // $array['rows'][] = array('c' => array( array('v'=>'24-01-13'), array('v'=>15)));
      echo json_encode($array);
    }
  }

  public function form($id=-1)
  {
    $data['id']=$id;
    $idlevel=Auth::user()->level;
      $cat=CatBerita::all();

    $data['cat']=$cat;
    if($id!=-1)
    {
      $data['det']=Berita::find($id);
    }
    return view('backend.pages.berita.form',$data);
  }

  public function store(Request $request) {
    $data=$request->all();
    $data['slug']=str_slug($request->input('title'));

    $create = Berita::create($data);
    // return response()->json($create);
    return redirect('berita')->with('pesan', 'Data Berita Berhasil Di Simpan');
  }

  public function update(Request $request, $id)
  {
    $data=$request->all();
    $data['slug']=str_slug($request->input('title'));
    
      $edit = Berita::find($id)->update($data);
      // return response()->json($edit);
      return redirect('berita')->with('pesan', 'Data Berita Berhasil Di Edit');
  }

  public function destroy($id) {
    Berita::find($id)->delete();
    return response()->json(['done']);
  }
}
