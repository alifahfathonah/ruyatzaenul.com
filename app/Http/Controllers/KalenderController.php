<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Kalender;
class KalenderController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
      return view('backend.pages.kalender.index');
    }
    public function data($id=-1)
    {
      $kal=Kalender::all();
      $cal=array();

      $idx=0;
      foreach ($kal as $k => $v)
      {
        $cal[$idx]['id']="__".$v->id."__";
        $cal[$idx]['title']="__".$v->title."__";
        $cal[$idx]['start']="__".$v->start_date."__";
        $date=date_create($v->end_date);
        date_add($date,date_interval_create_from_date_string("1 day"));
        $cal[$idx]['end']="__".date_format($date,"Y-m-d")."__";
        if($v->flag==1)
          $cal[$idx]['color']='__#26A69A__';
        else
          $cal[$idx]['color']='__#EF5350__';

        $idx++;
      }
      // $cl=str_replace(array('[',']','"'),'',json_encode($cal));
      // $cl=str_replace('"','',json_encode($cal));
      $cl=json_encode($cal);
      $data['cal']=str_replace('__','',$cl);
      // dd($data);
      // echo $cl;
      return view('backend.pages.kalender.data',$data);
    }
    public function form($id=-1)
    {
      // $level=[1=>'Administrator',2=>'Akademik',3=>'Marketing',4=>'Teknisi IT',5=>'Keuangan',6=>'Sekretariat'];
      if($id!=-1)
      {
        $d=Kalender::find($id);
        $data['det']=$d;
      }
      $data['id']=$id;
      return view('backend.pages.kalender.form',$data);
    }
    public function store(Request $request) {
      $data=array();
      foreach ($request->all() as $key => $value) {
        $data[$key]=$value;
        if($key=='start_date_submit')
        {
          $data['start_date']=$value;
          unset($data['start_date_submit']);
        }
        else if($key=='end_date_submit')
        {
          $data['end_date']=$value;
          unset($data['end_date_submit']);
        }
      }
      $create = Kalender::create($data);
      return response()->json($create);
      // return redirect('kalender')->with('pesan', 'Data Jurusan Berhasil Di Simpan');
    }

    public function update(Request $request, $id)
    {
      $data=array();
      foreach ($request->all() as $key => $value) {
        $data[$key]=$value;
        if($key=='start_date_submit')
        {
          $data['start_date']=$value;
          unset($data['start_date_submit']);
        }
        else if($key=='end_date_submit')
        {
          $data['end_date']=$value;
          unset($data['end_date_submit']);
        }
      }
        $edit = Kalender::find($id)->update($data);
        // return redirect('kalender')->with('pesan', 'Data Jurusan Berhasil Di Edit');
        // echo '<pre>';
        // print_r($request->all());
        // echo '</pre>';
        return response()->json($edit);
    }

    public function destroy($id) {
      Kalender::find($id)->delete();
      return response()->json(['done']);
    }
}
