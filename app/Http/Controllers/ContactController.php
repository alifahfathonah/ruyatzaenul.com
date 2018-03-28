<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Contact;
class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
      return view('backend.pages.hubungi-kami.index');
    }
    public function data($id=-1)
    {

      $contact=Contact::all();
      $data['data']=$contact;
      return view('backend.pages.hubungi-kami.data',$data);
    }

    public function form($id=-1)
    {
      $data['id']=$id;
      if($id!=-1)
      {
        $contact=Contact::find($id);
        $data['det']=$contact;
      }
      return view('backend.pages.hubungi-kami.form',$data);
    }
    public function store(Request $request) {
      $create = Contact::create($request->all());
      return response()->json($create);
      // return redirect('hubungi-kami')->with('pesan', 'Data Contact Berhasil Di Tambah');
    }
    public function update(Request $request, $id)
    {
        $edit = Contact::find($id)->update($request->all());
        return response()->json($edit);
        // return redirect('hubungi-kami')->with('pesan', 'Data Contact Berhasil Di Edit');
    }

    public function destroy($id) {
      Contact::find($id)->delete();
      return response()->json(['done']);
    }
}
