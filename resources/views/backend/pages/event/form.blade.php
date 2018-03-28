@extends('backend.layouts.master')

@section('title')
	<title>Dashboard | CEP-CCIT FTUI Admin Pages</title>
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
				<li class="active">Form Berita</li>
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
              <form class="form-horizontal" action="{{$id==-1 ? URL::to('event') : URL::to('event/'.$id) }}" method="POST" id="form-berita">
                <fieldset class="content-group">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
									@if ($id!=-1)
										{{ method_field('PATCH') }}
									@endif
                  <div class="form-group">
                    <label class="control-label col-lg-2">Nama Event</label>
                    <div class="col-lg-6">
                      <input type="text" class="form-control" placeholder="Nama Event" name="nama_event" id="nama_event" autocomplete="off" value="{{($id!=-1 ? $det->nama_event : '')}}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-lg-2">Tanggal Event</label>
                    <div class="col-lg-3">
                      <div class="input-group">
                        @php
                          if($id!=-1)
                          {
                            $originalDate = $det->tanggal_event;
                            $tgl = date("d-m-Y", strtotime($originalDate));
                          }
                          else {
                            $tgl='';
                          }
                        @endphp
                        <input type="text" class="form-control" placeholder="dd-mm-yyyy" name="tanggal_event" id="tanggal_event" autocomplete="off" value="{{($id!=-1 ? $tgl : '')}}">
												<span class="input-group-addon" style="cursor:pointer"><i class="icon-calendar22"></i></span>
											</div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Waktu</label>
                    <div class="col-lg-6">
                      <input type="text" class="form-control" placeholder="00:00" name="waktu" id="waktu" autocomplete="off" value="{{($id!=-1 ? $det->waktu : '')}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Lokasi</label>
                    <div class="col-lg-6">
                      <input type="text" class="form-control" placeholder="Lokasi" name="lokasi" id="lokasi" autocomplete="off" value="{{($id!=-1 ? $det->lokasi : '')}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Gambar</label>
                    <div class="col-lg-6">
											<div class="input-group">
										   <span class="input-group-btn">
										     <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
										       <i class="fa fa-picture-o"></i> Choose
										     </a>
										   </span>
										   <input id="thumbnail" readonly class="form-control" type="text" name="pic" value="{{($id!=-1 ? $det->file : '')}}">
										 </div>
										 <img id="holder" style="margin-top:15px;max-height:100px;" src="{{($id!=-1 ? asset($det->pic): '')}}">
                    </div>
                  </div>
                  <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
									<div class="form-group">
							      <label class="control-label col-lg-2">Flag</label>
							      <div class="col-lg-4">
							        <select class="select2" name="flag">
							            <option value="">-Pilih-</option>
							            <option value="1" {{$id!=-1 ? ($det->flag=='1' ? 'selected="selected"' : '') : ''}}>Active</option>
							            <option value="0" {{$id!=-1 ? ($det->flag=='0' ? 'selected="selected"' : '') : ''}}>DeActive</option>
							        </select>
							      </div>
							    </div>
                  <div class="form-group">
                    <label class="control-label col-lg-2">Keterangan</label>
                    <div class="col-lg-10">
                      <textarea rows="3" cols="5" class="form-control" placeholder="Keterangan" name="desc" id="desc">{{($id!=-1 ? $det->desc : '')}}</textarea>
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
			// CKEDITOR.replace('desc', options);
      $('#tanggal_event').pickadate({
          selectYears: true,
          selectMonths: true,
          formatSubmit: 'yyyy-mm-dd',
          format: 'dd-mm-yyyy'
      });

      var validator = $("#form-berita").validate({
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

              nama_event: { required: true},
              tanggal_event: { required: true},
              lokasi: { required: true},
              flag: { required: true},
              
          },
          messages: {
              nama_event: {
                    required: "Nama Event Harus Diisi"
                },
                tanggal_event: {
                    required: "Tanggal Event Harus Diisi"
                },
                
                lokasi: {
                    required: "Lokasi Event Harus DIisi"
                },
                
                flag: {
                    required: "Status Event Harus DIisi"
                },
          },
          submitHandler: function(form) {
                $("#form-berita").submit();
            }
      });
  });

	</script>
@endsection
<ul class="fab-menu fab-menu-fixed fab-menu-bottom-right">
    <li>
      <div data-fab-label="Kembali Ke Berita">
        <a class="fab-menu-btn btn bg-teal-400 btn-float btn-rounded btn-icon" href="{{URL::to('/event')}}">
          <i class="fab-icon-open icon-backspace2"></i>
        </a>
      </div>
    </li>
  </ul>
