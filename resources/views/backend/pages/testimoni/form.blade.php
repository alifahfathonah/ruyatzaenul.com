@extends('backend.layouts.master')

@section('title')
	<title>Form Testimoni | Official Website Ru'yat-Zaenul</title>
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
				<li class=""><a href="{{URL::to('/alumni')}}">Alumni</a></li>
				<li class="active">From Testimoni</li>
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
              <form class="form-horizontal" action="{{$id==-1 ? URL::to('testimoni') : URL::to('testimoni/'.$id) }}" method="POST" id="form-testimoni">
                <fieldset class="content-group">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
									@if ($id!=-1)
										{{ method_field('PATCH') }}
									@endif
                  <div class="form-group">
                    <label class="control-label col-lg-2">Nama</label>
                    <div class="col-lg-6">
                      <input type="text" class="form-control" placeholder="Nama" name="nama" id="nama" autocomplete="off" value="{{($id!=-1 ? $det->nama : '')}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Lembaga</label>
                    <div class="col-lg-6">
                      <input type="text" class="form-control" placeholder="Perusahaan" name="perusahaan" id="perusahaan" autocomplete="off" value="{{($id!=-1 ? $det->perusahaan : '')}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Jabatan</label>
                    <div class="col-lg-6">
                      <input type="text" class="form-control" placeholder="Jabatan" name="jabatan" id="jabatan" autocomplete="off" value="{{($id!=-1 ? $det->jabatan : '')}}">
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
										   <input id="thumbnail" readonly class="form-control" type="text" name="photo" value="{{($id!=-1 ? $det->photo : '')}}">
										 </div>
										 <img id="holder" style="margin-top:15px;max-height:100px;" src="{{($id!=-1 ? asset($det->photo): '')}}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-lg-2">Testimoni</label>
                    <div class="col-lg-10">
                      <textarea rows="5" cols="5" class="form-control" placeholder="Testimoni" name="desc" id="desc">{{($id!=-1 ? $det->desc : '')}}</textarea>
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
				filebrowserUploadUrl: APP_URL+	'/laravel-filemanager/upload?type=Files&_token='
			};
			CKEDITOR.replace('desc', options);

      var validator = $("#form-testimoni").validate({
          ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
          errorClass: 'validation-error-label',
          successClass: 'validation-valid-label',
          highlight: function(element, errorClass) {
              $(element).removeClass(errorClass);
          },
          unhighlight: function(element, errorClass) {
              $(element).removeClass(errorClass);
          },
          errorPlacement: function(error, element) {

              // Styled checkboxes, radios, bootstrap switch
              if (element.parents('div').hasClass("checker") || element.parents('div').hasClass("choice") || element.parent().hasClass('bootstrap-switch-container') ) {
                  if(element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                      error.appendTo( element.parent().parent().parent().parent() );
                  }
                  else {
                      error.appendTo( element.parent().parent().parent().parent().parent() );
                  }
              }

              // Unstyled checkboxes, radios
              else if (element.parents('div').hasClass('checkbox') || element.parents('div').hasClass('radio')) {
                  error.appendTo( element.parent().parent().parent() );
              }

              // Input with icons and Select2
              else if (element.parents('div').hasClass('has-feedback') || element.hasClass('select2-hidden-accessible')) {
                  error.appendTo( element.parent() );
              }

              // Inline checkboxes, radios
              else if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                  error.appendTo( element.parent().parent() );
              }

              // Input group, styled file input
              else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
                  error.appendTo( element.parent().parent() );
              }

              else {
                  error.insertAfter(element);
              }
          },
          onkeyup: true,
          validClass: "validation-valid-label",
          success: function(label) {
              label.addClass("validation-valid-label").text("Success.")
          },
          rules: {

              nama: { required: true},
              perusahaan: { required: true},
              jabatan: { required: true},
              
          },
          messages: {
              nama: {
                    required: "Nama Alumni Harus Diisi"
                },
                perusahaan: {
                    required: "Data Perusahaan Alumni Harus Diisi"
                },
                jabatan: {
                    required: "Data Jabatan Alumni Harus Diisi"
                },
          },
          submitHandler: function(form) {
                $("#form-testimoni").submit();
            }
      });
  });

	</script>
@endsection
<ul class="fab-menu fab-menu-fixed fab-menu-bottom-right">
    <li>
      <div data-fab-label="Kembali Ke Berita">
        <a class="fab-menu-btn btn bg-teal-400 btn-float btn-rounded btn-icon" href="{{URL::to('/testimoni')}}">
          <i class="fab-icon-open icon-backspace2"></i>
        </a>
      </div>
    </li>
  </ul>
