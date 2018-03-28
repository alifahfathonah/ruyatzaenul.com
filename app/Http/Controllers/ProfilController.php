<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Profile;
class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function ruyat()
    {
        $category='achmad-ruyat';
        return view('backend.pages.profil.ruyat')->with('category',$category);
    }
    
    public function zaenul()
    {
        $category='zaenul-mutaqin';
        return view('backend.pages.profil.zaenul')->with('category',$category);
    }
    public function data($cat)
    {
        // $category='zaenul-mutaqin';
        $profil=Profile::where('category','=',$cat)->get();
        return view('backend.pages.profil.data')
            ->with('profil',$profil)
            ->with('category',$cat);
    }
    public function form($id=-1,$cat='')
    {
      $data['id']=$id;
      $data['cat']=$cat;
      $profil=Profile::where('category','=',$cat)->get();
      if($id!=-1)
        $data['det']=$profil[0];
      return view('backend.pages.profil.form',$data);
    }
    public function store(Request $request) {
      $create = Profile::create($request->all());
      $cat = $request->input('category');
      // return response()->json($create);
      return redirect(''.$cat.'')->with('pesan', 'Data '.ucwords($cat).' Berhasil Di Tambah');
    }
    public function update(Request $request, $id)
    {
        $edit = Profile::find($id)->update($request->all());
        $cat = $request->input('category');
        // return response()->json($edit);
        return redirect(''.$cat.'')->with('pesan', 'Data '.ucwords($cat).' Berhasil Di Edit');
    }

    public function destroy($id) {
      Profile::find($id)->delete();
      return response()->json(['done']);
    }
}
