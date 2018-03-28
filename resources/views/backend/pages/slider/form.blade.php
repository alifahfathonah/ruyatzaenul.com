<form class="form-horizontal" action="{{$id==-1 ? URL::to('slider') : URL::to('slider/'.$id) }}" method="{{($id==-1 ? "POST" : "PUT")}}" id="form-slider">
  <fieldset class="content-group">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
      <label class="control-label col-lg-3">Title</label>
      <div class="col-lg-9">
        <input type="text" class="form-control" placeholder="Title" name="title" id="title" autocomplete="off" value="{{($id!=-1 ? $det->title : '')}}">
      <div id="titlex" style="font-style:italic;color:red;font-size:11px;"></div>
      </div>
    </div>
		<div class="form-group">
			<label class="control-label col-lg-3">Image</label>
			<div class="col-lg-9">
				<div class="input-group">
				 <span class="input-group-btn">
					 <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
						 <i class="fa fa-picture-o"></i> Choose
					 </a>
				 </span>
				 <input id="thumbnail" readonly class="form-control" type="text" name="picture" value="{{($id!=-1 ? $det->picture : '')}}">
			 <div id="thumbnailx" style="font-style:italic;color:red;font-size:11px;"></div>
       </div>
			 <img id="holder" style="margin-top:15px;max-height:100px;" src="{{($id!=-1 ? asset($det->picture): '')}}">
			</div>
		</div>
    <div class="form-group">
      <label class="control-label col-lg-3">Flag</label>
      <div class="col-lg-4">
        <select class="select2" name="flag">
            <option value="-1">-Pilih-</option>
            <option value="1" {{$id!=-1 ? ($det->flag=='1' ? 'selected="selected"' : '') : ''}}>Active</option>
            <option value="0" {{$id!=-1 ? ($det->flag=='0' ? 'selected="selected"' : '') : ''}}>DeActive</option>
        </select>
      <div id="flagx" style="font-style:italic;color:red;font-size:11px;"></div>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-lg-3">Keterangan</label>

      <div class="col-lg-9">
        <textarea rows="3" cols="5" class="form-control" placeholder="Keterangan" name="desc" id="desc">{{($id!=-1 ? $det->desc : '')}}</textarea>
        <div id="descx" style="font-style:italic;color:red;font-size:11px;"></div>
      </div>
    </div>
  </fieldset>
</form>
