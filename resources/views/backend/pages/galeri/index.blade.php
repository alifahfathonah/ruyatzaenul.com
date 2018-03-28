@extends('backend.layouts.master')

@section('title')
	<title>Gallery | Official Website Ru'yat-Zaenul</title>
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
				<li class="active">Data Gallery</li>
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
            <div id="data-loader">
              <center>
                <img src="{{asset('images/logo/loading-bl-blue.gif')}}">
              </center>
            </div>
            <div id="data" style="padding:0 15px"></div>
          </div>
        </div>
    </div>
    <!-- END STATISTICS -->

		<div class="row">
			{{-- YOUR CONTENT HERE --}}
    </div>

		@include('backend.includes.footer')
	</div>
@endsection
@section('footscripts')
<script src="{{asset('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
<script>
$(document).ready(function(){
  // alert(APP_URL);

  loadData(-1);

	$('button#confirmbutton').click(function(){

		var form_action = $("#modal-confirm").find("form").attr("action");
		var form_method = $("#modal-confirm").find("form").attr("method");
		
		var title=$('#title').val();
		var thumbnail=$('#thumbnail').val();
		var flag=$('#flag').val();
		var category=$('#category').val();
	
		if(title=='')
		{
			$('#titlex').text('Nama Galeri Harus Diisi');
			setTimeout(function(){
				$('#titlex').text('');	
			},3000);
		}
		else if(thumbnail=='')
		{
			$('#thumbnailx').text('Gambar Galeri Belum Dipilih');
			setTimeout(function(){
				$('#thumbnailx').text('');	
			},3000);
		}
		else if(flag=='')
		{
			$('#flagx').text('Status Galeri Belum Dipilih');
			setTimeout(function(){
				$('#flagx').text('');	
			},3000);
		}
		else if(category=='')
		{
			$('#categoryx').text('Kategori Galeri Belum Diisi');
			setTimeout(function(){
				$('#categoryx').text('');	
			},3000);
		}
		
		else
		{
				$.ajax({
						dataType: 'json',
						type:form_method,
						url: form_action,
						data:$('form#form-galeri').serialize()
				}).done(function(data){
						// getPageData();
						if(form_method=="PUT")
							var txt = "Data Dokumen Berhasil Di Edit";
						else
							var txt = "Data Dokumen Berhasil Di Tambah";


						$('#modal-confirm').modal('hide');
								new PNotify({
										title: 'Berhasil',
										text: txt,
										addclass: 'alert bg-success alert-styled-right',
										type: 'success'
								});
								loadData(-1);
						// alert('Category Berhasil Di Tabah');
						// toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});
				}).fail(function(){
					$('#modal-confirm').modal('hide');
					new PNotify({
							title: 'Informasi',
							text: 'Simpan Data Dokumen  Gagal',
							addclass: 'alert alert-warning alert-styled-right',
							type: 'error'
					});
				});
		}
	});
});
function loadData(id)
{
	$('div#data-loader').show();
  $('div#data').load(APP_URL+'/galeri-data/'+id,function(){
    $('div#data-loader').hide();
    $('table#data-galeri').DataTable({
			autoWidth: false,
			dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
			language: {
					search: '<span>Cari Kategori:</span> _INPUT_',
					searchPlaceholder: 'Ketik Keyword...',
					lengthMenu: '<span>Tampilkan:</span> _MENU_',
					paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
			},
		});
		$(".switch").bootstrapSwitch();
		$('.switch').on('switchChange.bootstrapSwitch', function (event, state) {
			// alert($(this).val());
			if(state)
				var st=1;
			else {
				var st=0;
			}
			var iduser=$(this).val();
			$.ajax({
					dataType: 'json',
					type:'PUT',
					url: APP_URL+'/galeri/'+iduser,
					data:{flag : st}
			}).done(function(data){
					// getPageData();
						var txt = "Status Galeri Berhasil Di Edit";

					$('#modal-confirm').modal('hide');
							new PNotify({
									title: 'Berhasil',
									text: txt,
									addclass: 'alert bg-success alert-styled-right',
									type: 'success'
							});
							//loadData(-1);
					// alert('Data User Berhasil Di Tabah');
					// toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});
			}).fail(function(){
				$('#modal-confirm').modal('hide');
				new PNotify({
						title: 'Informasi',
						text: 'Edit Status Galeri Gagal',
						addclass: 'alert alert-warning alert-styled-right',
						type: 'error'
				});
			});
		});
  });
}
function edit(id)
{
	form(id);
}
function hapus(id)
{
	$('div#modal-hapus').modal('show');
	$('#hapusbutton').click(function(){
		// alert(id);
		$.ajax({
        url: APP_URL+'/galeri/'+id,
				type : 'delete'
    }).done(function(data){
        // getPageData();
        $('#modal-hapus').modal('hide');
				    new PNotify({
		            title: 'Berhasil',
		            text: 'Data Galerry Berhasil Di Hapus',
		            addclass: 'alert bg-success alert-styled-right',
		            type: 'success'
		        });
						loadData(-1);
		    // alert('Category Berhasil Di Tabah');
        // toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});
    }).fail(function(){
			$('#modal-hapus').modal('hide');
			new PNotify({
					title: 'Informasi',
					text: 'Hapus Data Galerry Gagal',
					addclass: 'alert alert-warning alert-styled-right',
					type: 'error'
			});
		});
	});
}
function form(id)
{
	$('#modal-confirm').modal('show');
	$('div#modal-loader-confirm').css({'display':'inline'});
	$('div#dynamic-content-confirm').load(APP_URL+'/galeri-form/'+id,function(){
		$('div#modal-loader-confirm').css({'display':'none'});
		  $('.select2').select2({
				minimumResultsForSearch: Infinity
			});
    $('#lfm').filemanager('image', {prefix: APP_URL+'/laravel-filemanager'});
	});
}
function tambah()
{
	form(-1);
}
</script>
@endsection
<ul class="fab-menu fab-menu-fixed fab-menu-bottom-right" data-fab-toggle="hover">
    <li>
      <a class="fab-menu-btn btn bg-teal-400 btn-float btn-rounded btn-icon">
        <i class="fab-icon-open icon-paragraph-justify3"></i>
        <i class="fab-icon-close icon-cross2"></i>
      </a>
      <ul class="fab-menu-inner">
				<li>
					<div data-fab-label="Tambah Data Galerry">
						<a href="javascript:tambah()" class="btn btn-default btn-rounded btn-icon btn-float">
							<i class=" icon-diff-added"></i>
						</a>
					</div>
				</li>
			</ul>
    </li>
  </ul>
