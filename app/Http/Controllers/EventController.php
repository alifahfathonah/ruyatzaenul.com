<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Event;

class EventController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    return view('backend.pages.event.index');
  }
  public function data($id=-1)
  {
    $data['id']=$id;
    $data['data']=Event::orderBy('tanggal_event','desc')->get();
    return view('backend.pages.event.data',$data);
  }
  public function eventstatus(Request $request,$id)
  {
    $dt=$request->all();
    $edit = Event::find($id)->update($dt);
    return response()->json($edit);
    // dd($dt);
  }
  public function form($id=-1)
  {
    $data['id']=$id;
    if($id!=-1)
    {
      $data['det']=Event::find($id);
    }
    return view('backend.pages.event.form',$data);
  }

  public function store(Request $request) {
    $data=array();
    foreach ($request->all() as $key => $value) {
      $data[$key]=$value;
      if($key=='tanggal_event_submit')
      {
        $data['tanggal_event']=$value;
        unset($data['tanggal_event_submit']);
      }
    }
    // echo '<pre>';
    // print_r($data);
    // echo '</pre>';
    $create = Event::create($data);
    // // return response()->json($create);
    return redirect('event')->with('pesan', 'Data Event Berhasil Di Simpan');
  }

  public function update(Request $request, $id)
  {
    // echo '<pre>';
    // print_r($request->all());
    // echo '</pre>';
    $data=array();
    foreach ($request->all() as $key => $value) {
      $data[$key]=$value;
      if($key=='tanggal_event_submit')
      {
        $data['tanggal_event']=$value;
        unset($data['tanggal_event_submit']);
      }
    }
      $edit = Event::find($id)->update($data);
      // return response()->json($edit);
      return redirect('event')->with('pesan', 'Data Event Berhasil Di Edit');
  }

  public function destroy($id) {
    Event::find($id)->delete();
    return response()->json(['done']);
  }
}
