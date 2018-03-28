<form class="form-horizontal" action="{{$id==-1 ? URL::to('video') : URL::to('video/'.$id) }}" method="{{($id==-1 ? "POST" : "PUT")}}" id="form-video">
  <fieldset class="content-group">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
      <label class="control-label col-lg-4">Nama Video</label>
      <div class="col-lg-8">
        <input type="text" class="form-control" placeholder="Nama Video" name="title" id="title" autocomplete="off" value="{{($id!=-1 ? $det->title : '')}}">
        <div id="titlex" style="font-style:italic;color:red;font-size:11px;"></div>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-lg-4">URL</label>
      <div class="col-lg-8">
        <input type="text" class="form-control" placeholder="URL" name="url" id="url" autocomplete="off" value="{{($id!=-1 ? $det->url : '')}}">
        <div id="urlx" style="font-style:italic;color:red;font-size:11px;"></div>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-lg-4">Flag</label>
      <div class="col-lg-4">
        <select class="select2" name="flag" id="flag">
            <option value="-1">-Pilih-</option>
            <option value="1" {{$id!=-1 ? ($det->flag=='1' ? 'selected="selected"' : '') : ''}}>Active</option>
            <option value="0" {{$id!=-1 ? ($det->flag=='0' ? 'selected="selected"' : '') : ''}}>DeActive</option>
        </select>
        <div id="flagx" style="font-style:italic;color:red;font-size:11px;"></div>
      </div>
    </div>
  </fieldset>
</form>
