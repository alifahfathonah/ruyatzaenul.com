<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Program;
use Auth;
class ProgramController extends Controller
{
    public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    return view('backend.pages.program.index');
  }
  public function programstatus(Request $request,$id)
  {
    $dt=$request->all();
    $edit = Program::find($id)->update($dt);
    return response()->json($edit);
    // dd($dt);
  }
  public function data($id=-1)
  {
    if($id!=-2)
    {
      $data['id']=$id;
      $idlevel=Auth::user()->level;
      $data['data']=Program::orderBy('created_at','desc')->get();
      return view('backend.pages.program.data',$data);
    }
    else
    {
      $array['cols'][] = array('type' => 'string');
      $array['cols'][] = array('type' => 'string');
      $array['cols'][] = array('type' => 'string');
      $all=Program::all();
      $a=$b=array();
      foreach($all as $k => $v)
      {
        $a[$v->id_kategori][]=$v;
      }

      foreach($a as $k => $v)
      {
        $array['rows'][] = array('c' => array( array('v'=>count($a[$k]))));
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
    if($id!=-1)
    {
      $data['det']=Program::find($id);
    }
    return view('backend.pages.program.form',$data);
  }

  public function store(Request $request) {
    $data=$request->all();
    $data['slug']=str_slug($request->input('title'));

    $create = Program::create($data);
    // return response()->json($create);
    return redirect('program')->with('pesan', 'Data program Berhasil Di Simpan');
  }

  public function update(Request $request, $id)
  {
    $data=$request->all();
    $data['slug']=str_slug($request->input('title'));
    
      $edit = Program::find($id)->update($data);
      // return response()->json($edit);
      return redirect('program')->with('pesan', 'Data program Berhasil Di Edit');
  }

  public function destroy($id) {
    Program::find($id)->delete();
    return response()->json(['done']);
  }
}
