<form class="form-horizontal" action="{{$id==-1 ? URL::to('cat-berita') : URL::to('cat-berita/'.$id) }}" method="{{($id==-1 ? "POST" : "PUT")}}" id="form-cat-berita">
  <fieldset class="content-group">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
      <label class="control-label col-lg-4">Nama Kategori</label>
      <div class="col-lg-8">
        <input type="text" class="form-control" placeholder="Nama Kategori" name="nama_kategori" id="nama_kategori" autocomplete="off" value="{{($id!=-1 ? $det->nama_kategori : '')}}">
      <div id="nama_kategorix" style="font-style:italic;color:red;font-size:11px;"></div>
      </div>
    </div>
    
    <div class="form-group">
      <label class="control-label col-lg-4">Deskripsi</label>
      <div class="col-lg-8">
        <textarea rows="5" cols="5" class="form-control" placeholder="Deskripsi Kategori" name="desc" id="desc">{{($id!=-1 ? $det->desc : '')}}</textarea>
      </div>
    </div>
  </fieldset>
</form>
