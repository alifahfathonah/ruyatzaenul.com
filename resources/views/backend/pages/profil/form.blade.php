@extends('backend.layouts.master')

@section('title')
	<title>Form Profil | Official Website Ru'yat-Zaenul</title>
@stop


@section('page-header')
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h2><span class="text-semibold">Ru'yat - Zaenul</span>  ::   
					Bogor Kahiji
				</h2>
			</div>
		</div>

		<div class="breadcrumb-line breadcrumb-line-component">
			<ul class="breadcrumb">
				<li class=""><a href="{{URL::to('/dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
				<li class=""><a href="{{URL::to('/berita')}}">Berita</a></li>
				<li class="active">Form Profil {{ucwords($cat)}}</li>
			</ul>
		</div>
	</div>
@stop


@section('content-area')
	<div class="content">

		<!-- STATISTICS -->
    <div class="row">
        <div class="col-sm-12 col-md-12">
					<div class="panel panel-flat">
            {{-- <div id="data-loader">
              <center>
                <img src="{{asset('images/logo/loading-bl-blue.gif')}}">
              </center>
            </div> --}}
            <div id="data" style="padding:15px">
              <form class="form-horizontal" action="{{$id==-1 ? URL::to(''.$cat.'') : URL::to($cat.'/'.$id) }}" method="POST" id="form-berita">
                <fieldset class="content-group">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
					
                  <div class="form-group">
                    <label class="control-label col-lg-2">Judul Profil</label>
                    <div class="col-lg-6">
                      <input type="text" class="form-control" placeholder="Judul" name="title" id="title" autocomplete="off" value="{{($id!=-1 ? ucwords($det->title) : ucwords($cat))}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Foto</label>
                    <div class="col-lg-6">
						<div class="input-group">
						    <span class="input-group-btn">
								<a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
									<i class="fa fa-picture-o"></i> Choose
								</a>
							</span>
							<input id="thumbnail" readonly class="form-control" type="text" name="pic" value="{{($id!=-1 ? $det->pic : '')}}">
							</div>
						<img id="holder" style="margin-top:15px;max-height:100px;" src="{{($id!=-1 ? asset($det->pic): '')}}">
                    </div>
                  </div>
                  <input type="hidden" name="category" value="{{$cat}}">
                  <div class="form-group">
                    <label class="control-label col-lg-2">Isi Profil {{ucwords($cat)}}</label>
                    <div class="col-lg-12">
                      <textarea rows="5" cols="5" class="form-control" placeholder="Isi Berita" name="desc" id="desc">{{($id!=-1 ? $det->desc : '')}}</textarea>
                    </div>
                  </div>
                  <div class="text-right">
  					<button type="submit" class="btn btn-primary">Simpan <i class="icon-arrow-right14 position-right"></i></button>
  				 </div>
                </fieldset>
              </form>
            </div>
          </div>
        </div>
    </div>
    <!-- END STATISTICS -->


		@include('backend.includes.footer')
	</div>
@endsection
@section('footscripts')
	<script src="{{asset('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
	<script>
  $(document).ready(function(){

	$('#lfm').filemanager('image', {prefix: APP_URL+'/laravel-filemanager'});
      $('.select2').select2();
			var options = {
				filebrowserImageBrowseUrl: APP_URL+'/laravel-filemanager?type=Images',
				filebrowserImageUploadUrl: APP_URL+'/laravel-filemanager/upload?type=Images&_token=',
				filebrowserBrowseUrl: APP_URL+'/laravel-filemanager?type=Files',
        filebrowserUploadUrl: APP_URL+	'/laravel-filemanager/upload?type=Files&_token=',
        toolbarGroups: [
          {"name":"basicstyles","groups":["basicstyles"]},
          {"name":"links","groups":["links"]},
          {"name":"paragraph","groups":["list","blocks"]},
          {"name":"document","groups":["mode"]},
          {"name":"insert","groups":["insert"]},
          {"name":"styles","groups":["styles"]},
          {"name":"about","groups":["about"]}
        ],
			};
			CKEDITOR.replace('desc', options);
  });

	</script>
@endsection
<ul class="fab-menu fab-menu-fixed fab-menu-bottom-right">
    <li>
      <div data-fab-label="Kembali Ke Berita">
        <a class="fab-menu-btn btn bg-teal-400 btn-float btn-rounded btn-icon" href="{{URL::to('/'.$cat)}}">
          <i class="fab-icon-open icon-backspace2"></i>
        </a>
      </div>
    </li>
  </ul>
