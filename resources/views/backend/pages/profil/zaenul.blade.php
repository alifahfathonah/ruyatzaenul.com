@extends('backend.layouts.master')

@section('title')
	<title>Profil Zaenul mutaqin | Official Website Ru'yat-Zaenul</title>
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
				<li class="active">Profil</li>
				<li class="active">Zaenul mutaqin</li>
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
	var pesan='{{(session('pesan') ? session('pesan') : '' )}}';
	if(pesan!='')
	{
		new PNotify({
				title: 'Informasi',
				text: pesan,
				addclass: 'alert bg-success alert-styled-right',
				type: 'success'
		});
	}
  loadData('{{$category}}');

});
function loadData(cat)
{
	$('div#data-loader').show();
  $('div#data').load(APP_URL+'/profil-data/'+cat,function(){
    $('div#data-loader').hide();
  });
}

function form(id,cat)
{
	location.href=APP_URL+'/profil-form/'+id+'/'+cat;
}
</script>
@endsection

