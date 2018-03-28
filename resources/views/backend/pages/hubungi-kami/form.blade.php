<form class="form-horizontal" action="{{$id==-1 ? URL::to('hubungi-kami') : URL::to('hubungi-kami/'.$id) }}" method="{{($id==-1 ? "POST" : "PUT")}}" id="form-contact">
  <fieldset class="content-group">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
      <label class="control-label col-lg-4">Nama Contact</label>
      <div class="col-lg-8">
        <input type="text" class="form-control" placeholder="Nama Contact" name="title" id="title" autocomplete="off" value="{{($id!=-1 ? $det->title : '')}}">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-lg-4">Telepon</label>
      <div class="col-lg-8">
        <input type="text" class="form-control" placeholder="Telepon" name="telepon" id="telepon" autocomplete="off" value="{{($id!=-1 ? $det->telepon : '')}}">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-lg-4">Email</label>
      <div class="col-lg-8">
        <input type="text" class="form-control" placeholder="Email" name="email" id="email" autocomplete="off" value="{{($id!=-1 ? $det->email : '')}}">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-lg-4">Koordinat Peta</label>
      <div class="col-lg-4">
        <input type="text" class="form-control" placeholder="latitude;longitude" name="maps" id="maps" autocomplete="off" value="{{($id!=-1 ? $det->maps : '')}}">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-lg-4">Alamat</label>
      <div class="col-lg-8">
        <textarea rows="5" cols="5" class="form-control" placeholder="alamat" name="alamat" id="alamat">{{($id!=-1 ? $det->alamat : '')}}</textarea>
      </div>
    </div>
  </fieldset>
</form>
