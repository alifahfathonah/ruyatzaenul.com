<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Profile;
use App\Models\Berita;
use App\Models\CatBerita;
use App\Models\Video;
use App\Models\Program;
use App\Models\Testimony;
use App\Models\Event;

class BerandaFrontController extends Controller
{
    public function index()
    {
        return view('index-front');
    }

    public function biografi($name)
    {
        $bio=Profile::where('category','=',$name)->get()->first();
        return view('pages.main.biografi')
                ->with('bio',$bio);
    }


    public function detail($jenis,$slug)
    {
        $pub=Berita::where('slug','=', $slug)->get()->first();
        $video=Video::where('flag','=',1)->orderByRaw('RAND()')->limit(1)->get()->first();
        $program=Program::where('flag','=',1)->get();
        $testi=Testimony::orderByRaw('RAND()')->limit(2)->get();
        return view('pages.publikasi.detail')
            ->with('pub',$pub)
            ->with('jenis',$jenis)
            ->with('vid',$video)
            ->with('program',$program)
            ->with('testi',$testi);
    }
    public function program(Request $request)
    {
        $urll = $request->fullUrl();
        $ur=explode('?',$urll);
        $hal=0;
        $pagehal=5;
        if(isset($ur[1]))
        {
            $pg=explode('=',$ur[1]);
            
            if($pg[0]=='page')
            {
                if(isset($pg[1]))
                    $hal=($pg[1]*$pagehal)-$pagehal;
                else
                    $hal=(0*10);
            }
        }

        $program=Program::where('flag','=',1)->orderBy('created_at','desc')->paginate($pagehal);
        $video=Video::where('flag','=',1)->orderByRaw('RAND()')->limit(1)->get()->first();
        $testi=Testimony::orderByRaw('RAND()')->limit(2)->get();
        
        if ($request->ajax()) {
             return view('pages.program.data')
                ->with('berita',$berita)
                ->with('hal',$hal)
                ->render();
        }

        return view('pages.program.index')
            ->with('hal',$hal)
            ->with('vid',$video)
            ->with('program',$program)
            ->with('testi',$testi);
    }
    public function programdetail($slug)
    {
        $pub=Program::where('slug','=', $slug)->get()->first();
        $video=Video::where('flag','=',1)->orderByRaw('RAND()')->limit(1)->get()->first();
        $testi=Testimony::orderByRaw('RAND()')->limit(2)->get();
        return view('pages.program.detail')
            ->with('pub',$pub)
            ->with('vid',$video)
            ->with('testi',$testi);
    }
    public function publikasi(Request $request,$jenis)
    {
        $urll = $request->fullUrl();
        $ur=explode('?',$urll);
        $hal=0;
        $pagehal=5;
        if(isset($ur[1]))
        {
            $pg=explode('=',$ur[1]);
            
            if($pg[0]=='page')
            {
                if(isset($pg[1]))
                    $hal=($pg[1]*$pagehal)-$pagehal;
                else
                    $hal=(0*10);
            }
        }


        $berita=Berita::select('*','berita.desc as isi')->where('flag','=',1)
            ->join('cat_berita','cat_berita.id','=','berita.id_kategori')
            ->whereRaw('lower(cat_berita.nama_kategori) = "'.$jenis.'"')
            ->orderBy('berita.created_at','desc')->paginate($pagehal);

        $video=Video::where('flag','=',1)->orderByRaw('RAND()')->limit(1)->get()->first();
        $program=Program::where('flag','=',1)->get();
        $testi=Testimony::orderByRaw('RAND()')->limit(2)->get();
        $cat=CatBerita::all();
        $category=array();
        foreach($cat as $c => $v)
        {
            $category[$v->id]=$v;
        }

        if ($request->ajax()) {
             return view('pages.publikasi.data')
                ->with('berita',$berita)
                ->with('cat',$category)
                ->with('hal',$hal)
                ->render();
        }

        return view('pages.publikasi.index')
            ->with('hal',$hal)
            ->with('berita',$berita)
            ->with('jenis',$jenis)
            ->with('vid',$video)
            ->with('program',$program)
            ->with('testi',$testi)
            ->with('cat',$category);
    }
    
    public function testimoni(Request $request)
    {
        $urll = $request->fullUrl();
        $ur=explode('?',$urll);
        $hal=0;
        $pagehal=5;
        if(isset($ur[1]))
        {
            $pg=explode('=',$ur[1]);
            
            if($pg[0]=='page')
            {
                if(isset($pg[1]))
                    $hal=($pg[1]*$pagehal)-$pagehal;
                else
                    $hal=(0*10);
            }
        }

        $testi=Testimony::orderBy('created_at','desc')->paginate($pagehal);

        $video=Video::where('flag','=',1)->orderByRaw('RAND()')->limit(1)->get()->first();
        $program=Program::where('flag','=',1)->get();
  
        if ($request->ajax()) {
             return view('pages.testimoni.data')
                ->with('testi',$testi)
                ->with('hal',$hal)
                ->render();
        }

        return view('pages.testimoni.index')
            ->with('hal',$hal)
            ->with('vid',$video)
            ->with('program',$program)
            ->with('testi',$testi);
    }

    public function dokumentasi(Request $request,$jenis)
    {
        $urll = $request->fullUrl();
        $ur=explode('?',$urll);
        $hal=0;
        $pagehal=5;
        if(isset($ur[1]))
        {
            $pg=explode('=',$ur[1]);
            
            if($pg[0]=='page')
            {
                if(isset($pg[1]))
                    $hal=($pg[1]*$pagehal)-$pagehal;
                else
                    $hal=(0*10);
            }
        }
        $program=Program::where('flag','=',1)->get();
        $testi=Testimony::orderByRaw('RAND()')->limit(2)->get();
        $video=Video::where('flag','=',1)->orderBy('created_at','desc')->paginate($pagehal);
        if ($request->ajax()) {
             return view('pages.video.data')
                ->with('program',$program)
                ->with('testi',$testi)
                ->with('vid',$video)
                ->with('hal',$hal)
                ->render();
        }

        return view('pages.video.index')
            ->with('program',$program)
            ->with('testi',$testi)
            ->with('hal',$hal)
            ->with('vid',$video);
    }
    public function event(Request $request)
    {
        $urll = $request->fullUrl();
        $ur=explode('?',$urll);
        $hal=0;
        $pagehal=5;
        if(isset($ur[1]))
        {
            $pg=explode('=',$ur[1]);
            
            if($pg[0]=='page')
            {
                if(isset($pg[1]))
                    $hal=($pg[1]*$pagehal)-$pagehal;
                else
                    $hal=(0*10);
            }
        }

        $program=Program::where('flag','=',1)->get();
        $testi=Testimony::orderByRaw('RAND()')->limit(2)->get();
        $video=Video::where('flag','=',1)->orderByRaw('RAND()')->limit(1)->get()->first();
        $event=Event::where('flag','=',1)->orderBy('tanggal_event','desc')->paginate($pagehal);
       
        if ($request->ajax()) {
             return view('pages.event.data')
                ->with('program',$program)
                ->with('testi',$testi)
                ->with('event',$event)
                ->with('vid',$video)
                ->with('hal',$hal)
                ->render();
        }

        return view('pages.event.index')
            ->with('program',$program)
            ->with('testi',$testi)
            ->with('event',$event)
            ->with('hal',$hal)
            ->with('vid',$video);

    }
}
