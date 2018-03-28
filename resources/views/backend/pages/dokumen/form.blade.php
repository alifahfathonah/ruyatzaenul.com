<form class="form-horizontal" action="{{$id==-1 ? URL::to('dokumen') : URL::to('dokumen/'.$id) }}" method="{{($id==-1 ? "POST" : "PUT")}}" id="form-dokumen">
  <fieldset class="content-group">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
      <label class="control-label col-lg-4">Nama Dokumen</label>
      <div class="col-lg-8">
        <input type="text" class="form-control" placeholder="Nama Dokumen" name="title" id="title" autocomplete="off" value="{{($id!=-1 ? $det->title : '')}}">
        <div id="titlex" style="font-style:italic;color:red;font-size:11px;"></div>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-lg-4">File</label>
      <div class="col-lg-8">
        <div class="input-group">
         <span class="input-group-btn">
           <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
             <i class="fa fa-picture-o"></i> Choose
           </a>
         </span>
         <input id="thumbnail" readonly class="form-control" type="text" name="file" value="{{($id!=-1 ? $det->file : '')}}">
         <div id="filex" style="font-style:italic;color:red;font-size:11px;"></div>
       </div>
       <img id="holder" style="margin-top:15px;max-height:100px;" src="{{($id!=-1 ? asset($det->file): '')}}">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-lg-4">Keterangan</label>
      <div class="col-lg-8">
        <textarea rows="5" cols="5" class="form-control" placeholder="Keterangan" name="desc" id="desc">{{($id!=-1 ? $det->desc : '')}}</textarea>
      </div>
    </div>
  </fieldset>
</form>
