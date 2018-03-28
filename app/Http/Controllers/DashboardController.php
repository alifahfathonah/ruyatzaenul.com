<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Berita;
use App\Models\CatBerita;
use App\Models\Karir;
use App\Models\Aliansi;
use App\Models\Komunitas;
use App\Models\Jurusan;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $aliansi=Aliansi::orderBy('created_at','desc')->get();
        $kar=array();
          
        $catberita=CatBerita::all();
        $cat=array();
        foreach($catberita as $k=>$v)
        {
            $cat[$v->id]=$v;
        }

        $berita=Berita::orderBy('created_at','desc')->limit(6)->get();
        $brt=$bycat=array();
        foreach($berita as $k => $v)
        {
            $brt[$k]=$v;
        }

       
        // echo '<pre>';
        // print_r($bycat);
        // echo '</pre>';
        $json_kat="'Berita & Pengumuman','Jumlah';";
        // $json_kat[]=array('Berita & Pengumuman'=>'Jumlah');
        // $array['cols'][] = array('type' => 'string');
        // $array['cols'][] = array('type' => 'number');
        
        return view('backend.pages.dashboard.index')
            ->with('cat',$cat)
            ->with('berita',$brt);
    }
}
