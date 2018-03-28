@extends('backend.layouts.master')

@section('title')
	<title>Dashboard | Official Website Ru'yat-Zaenul</title>
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
				<li class="active"><a href="index.html"><i class="icon-home2 position-left"></i> Dashboard</a></li>
			</ul>
		</div>
	</div>
@stop

	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript" src="{{ asset('/backend/assets/js/charts/google/pies/pie.js')}}"></script>
	<script type="text/javascript" src="{{ asset('/backend/assets/js/charts/google/pies/pie_exploded.js')}}"></script>
	<script type="text/javascript" src="{{ asset('/backend/assets/js/charts/google/pies/pie_rotate.js')}}"></script>
	<script type="text/javascript" src="{{ asset('/backend/assets/js/charts/google/pies/donut.js')}}"></script>
	<script type="text/javascript" src="{{ asset('/backend/assets/js/charts/google/pies/donut_rotate.js')}}"></script>
	<script type="text/javascript" src="{{ asset('/backend/assets/js/charts/google/pies/donut_exploded.js')}}"></script>
	<script type="text/javascript" src="{{ asset('/backend/assets/js/charts/google/pies/pie_3d.js')}}"></script>
	<script type="text/javascript" src="{{ asset('/backend/assets/js/charts/google/pies/3d_exploded.js')}}"></script>
	<script type="text/javascript" src="{{ asset('/backend/assets/js/charts/google/pies/pie_diff_radius.js')}}"></script>
	<script type="text/javascript" src="{{ asset('/backend/assets/js/charts/google/pies/pie_diff_border.js')}}"></script>
	<script type="text/javascript" src="{{ asset('/backend/assets/js/charts/google/pies/pie_diff_opacity.js')}}"></script>
	<script type="text/javascript" src="{{ asset('/backend/assets/js/charts/google/pies/pie_diff_invert.js')}}"></script>
@section('content-area')
	<div class="content">

		<!-- STATISTICS -->
				<div class="row">
						
					<div class="col-lg-6 col-md-6">
						<div class="panel panel-flat">
						
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12">
										<h3>Grafik Jumlah Berita & Artikel</h3>
										<div class="chart-container text-center content-group">
											<div class="display-inline-block" id="google-pie-3d"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<div class="row">
							<div class="col-lg-12">
								<div class="panel panel-flat">
									<div class="panel-heading">
										<h6 class="panel-title">Informasi & Berita Terakhir</h6>
										<div class="heading-elements">
											<ul class="icons-list">
												<li><a data-action="collapse"></a></li>
												<li><a data-action="reload"></a></li>
												<li><a data-action="close"></a></li>
											</ul>
										</div>
									</div>

									<div class="panel-body">
										<div class="row">
											<div class="col-lg-6">
												<ul class="media-list content-group">
													@php
														$i=0;
														foreach($berita as $k => $v)
														{
															$tgl=$v->created_at;
															$tg=date("d-m-Y", strtotime($tgl));
															if($i==3)
																break;

															if(isset($cat[$v->id_kategori]))
																$kat=$cat[$v->id_kategori]->nama_kategori;
															else
																$kat='';
													@endphp
													<li class="media stack-media-on-mobile">
														<div class="media-left">
															<div class="thumb">
																<a href="#">
																	<img src="{{(is_null($v->file) || $v->file=='') ? asset('images/placeholder.jpg') : asset($v->file) }}" class="img-responsive img-rounded media-preview" alt="{{$v->title}}">
																	<span class="zoom-image"><i class="icon-play3"></i></span>
																</a>
															</div>
														</div>

														<div class="media-body">
															<h6 class="media-heading"><a href="#">{{$v->title}}</a></h6>
															<ul class="list-inline list-inline-separate text-muted mb-5">
																<li>{{$kat}}</li>
																<li>{{$tg}}</li>
															</ul>
															
														</div>
													</li>
													@php
														unset($berita[$i]);
														$i++;
														}
													@endphp
												</ul>
											</div>

											<div class="col-lg-6">
												<ul class="media-list content-group">
													@php
														
														$i=3;
														foreach($berita as $k => $v)
														{
															$tgl=$v->created_at;
															$tg=date("d-m-Y", strtotime($tgl));
															if($i==6)
																break;
															
															if(isset($cat[$v->id_kategori]))
																$kat=$cat[$v->id_kategori]->nama_kategori;
															else
																$kat='';
													@endphp
													<li class="media stack-media-on-mobile">
														<div class="media-left">
															<div class="thumb">
																<a href="#">
																	<img src="{{(is_null($v->file) || $v->file=='') ? asset('images/placeholder.jpg') : asset($v->file) }}" class="img-responsive img-rounded media-preview" alt="{{$v->title}}">
																	<span class="zoom-image"><i class="icon-play3"></i></span>
																</a>
															</div>
														</div>

														<div class="media-body">
															<h6 class="media-heading"><a href="#">{{$v->title}}</a></h6>
															<ul class="list-inline list-inline-separate text-muted mb-5">
																<li>{{$kat}}</li>
																<li>{{$tg}}</li>
															</ul>
															
														</div>
													</li>
													@php
														$i++;
														}
													@endphp
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
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
		
<script>
	google.load("visualization", "1", {packages:["corechart"]});
	google.setOnLoadCallback(drawPie3d);
	function drawPie3d() {
		var jsonData = $.ajax({
          url: APP_URL+"/berita-data/-2",
          dataType:"json",
          async: false
          }).responseText;
		//var data = google.visualization.arrayToDataTable($jsonData);
		var data = new google.visualization.DataTable(jsonData);
		var options = {
			fontName: 'Roboto',
			height: 300,
			width: 450,
			chartArea: {
				left: 50,
				width: '95%',
				height: '95%'
			},
			is3D: true,
			pieSliceText: 'label',
			slices: {  
				2: {offset: 0.15},
				8: {offset: 0.1},
				10: {offset: 0.15},
				11: {offset: 0.1}
			}
		};


		// Instantiate and draw our chart, passing in some options.
		var pie_3d = new google.visualization.PieChart($('#google-pie-3d')[0]);
		pie_3d.draw(data, options);
	}
</script>