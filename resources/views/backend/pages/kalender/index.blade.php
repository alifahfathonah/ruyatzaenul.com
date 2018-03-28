@extends('backend.layouts.master')

@section('title')
	<title>Kalender | CEP-CCIT FTUI Admin Pages</title>
@stop


@section('page-header')
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4><span class="text-semibold">CEP-CCIT Fakultas Teknik Universitas Indonesia</span></h4>
				Becoming World Class IT Professional
			</div>
		</div>

		<div class="breadcrumb-line breadcrumb-line-component">
			<ul class="breadcrumb">
        <li class=""><a href="{{URL::to('/dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
        <li class="">Akademik</li>
				<li class="active">Kalender</li>
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
<script>
$(document).ready(function(){
  // alert(APP_URL);
  loadData(-1);

	$('button#confirmbutton').click(function(){

		var form_action = $("#modal-confirm").find("form").attr("action");
		var form_method = $("#modal-confirm").find("form").attr("method");
		var title=$('#title').val();
		var start_date=$('#start_date').val();
		var end_date=$('#end_date').val();
		if(title=='')
		{
			$('div#titlex').text('Judul Kalender Harus Diisi');
			setTimeout(function(){
				$('div#titlex').text('');	
			},3000);
		}
		else if(start_date=='')
		{
			$('div#start_datex').text('Start Date Belum Dipilih');
			setTimeout(function(){
				$('div#start_datex').text('');	
			},3000);
		}
		else if(end_date=='')
		{
			$('div#end_datex').text('End Date Belum Dipilih');
			setTimeout(function(){
				$('div#end_datex').text('');	
			},3000);
		}
		else
		{
			$.ajax({
					dataType: 'json',
					type:form_method,
					url: form_action,
					data:$('form#form-kalender').serialize()
			}).done(function(data){
					// getPageData();
					if(form_method=="PUT")
						var txt = "Data User Berhasil Di Edit";
					else
						var txt = "Data User Berhasil Di Tambah";

					$('#modal-confirm').modal('hide');
							new PNotify({
									title: 'Berhasil',
									text: txt,
									addclass: 'alert bg-success alert-styled-right',
									type: 'success'
							});
							loadData(-1);
					// alert('Data User Berhasil Di Tabah');
					// toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});
			}).fail(function(){
				$('#modal-confirm').modal('hide');
				new PNotify({
						title: 'Informasi',
						text: 'Simpan Data User Gagal',
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
  $('div#data').load(APP_URL+'/kalender-data/'+id,function(){
    $('div#data-loader').hide();
		$(".switch").bootstrapSwitch();
  });
}
function hapus(id)
{
	$('div#modal-hapus').modal('show');
	$('#hapusbutton').click(function(){
		// alert(id);
		$.ajax({
        url: APP_URL+'/kalender/'+id,
				type : 'delete'
    }).done(function(data){
        // getPageData();
        $('#modal-hapus').modal('hide');
				    new PNotify({
		            title: 'Berhasil',
		            text: 'Data Jurusan Berhasil Di Hapus',
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
					text: 'Hapus Data Jurusan Gagal',
					addclass: 'alert alert-warning alert-styled-right',
					type: 'error'
			});
		});
	});
}
function tambah()
{
	$('button#hapusbutton').remove();
	form(-1);
}
function edit(id)
{
	form(id);
}
function form(id)
{
	$('#modal-confirm').modal('show');
	$('div#modal-loader-confirm').css({'display':'inline'});
	$('div#dynamic-content-confirm').load(APP_URL+'/kalender-form/'+id,function(){
		$('div#modal-loader-confirm').css({'display':'none'});
		  $('.select2').select2({
				minimumResultsForSearch: Infinity
			});
			$('#start_date,#end_date').pickadate({
          selectYears: true,
          selectMonths: true,
          formatSubmit: 'yyyy-mm-dd',
          format: 'dd-mm-yyyy'
      });
	});
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
					<div data-fab-label="Tambah Data kalender">
						<a href="javascript:tambah()" class="btn btn-default btn-rounded btn-icon btn-float">
							<i class=" icon-diff-added"></i>
						</a>
					</div>
				</li>
			</ul>
    </li>
  </ul>
