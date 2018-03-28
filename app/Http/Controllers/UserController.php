<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Http\Requests;
use App\Models\User;

class UserController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    return view('backend.pages.user.index');
  }
  public function data($id=-1)
  {
    $data['id']=$id;
    // $level=[1=>'Administrator',2=>'Akademik',3=>'Marketing',4=>'Teknisi IT',5=>'Keuangan',6=>'Sekretariat'];
    $level=Config::get('services.leveluser');
    $data['level']=$level;
    $data['data']=User::all();
    return view('backend.pages.user.data',$data);
  }

  public function form($id=-1)
  {
    // $level=[1=>'Administrator',2=>'Akademik',3=>'Marketing',4=>'Teknisi IT',5=>'Keuangan',6=>'Sekretariat'];
    $level=Config::get('services.leveluser');
    $data['level']=$level;
    $data['id']=$id;
    if($id!=-1)
    {
      $d=User::find($id);
      $data['det']=$d;
    }
    return view('backend.pages.user.form',$data);
  }
  public function store(Request $request) {
    $input=$request->all();
    $data=array();
    foreach ($input as $k => $v)
    {
      if($k=='password')
        $data[$k]=bcrypt($v);
      else {
        $data[$k]=$v;
      }
    }
    $create = User::create($data);
    return response()->json($create);
  }

  public function update(Request $request, $id)
  {
    $input=$request->all();
    $data=array();
    foreach ($input as $k => $v)
    {
      if($k=='password')
      {
          if($v!='' || !empty($v))
            $data[$k]=bcrypt($v);
      }
      else {
        $data[$k]=$v;
      }
    }
      $edit = User::find($id)->update($data);
      return response()->json($edit);
  }

  public function destroy($id) {
    User::find($id)->delete();
    return response()->json(['done']);
  }
}
