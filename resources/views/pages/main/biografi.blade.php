@extends('layouts.front')
@section('title')
    <title>Biografi Achmad Ru'yat : Bogor Kahiji</title>
@endsection
@section('main')
    <section class="main">
            <div class="main_title simple_sections">
                <div class="main_name fadeInDown animated delay1">
                    <div class="container">
                        <div class="row">
                            @include('include.menu')
                        </div>
                    </div>
                </div>
            
                <div class="done_info sections fadeInUp animated delay2">
                    <div class="container">
                        <div class="row">
                            @include('include.head')
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
@section('content')
    <div class="container">

            <!--cbp tmtimeline-->
            <ul class="cbp_tmtimeline">
              <!--Education-->
              <li>
            @if (count($bio)!=0)
                
                <div class="cbp_tmtime">
                    <h2 style="font-family:aristaRegular">{{$bio->title}}</h2>
                    <span>Biografi</span>
                  
                </div>

                <div class="cbp_tmicon fa fa-star"></div>

                <!--cbp tmlabel-->
                <div class="cbp_tmlabel">

                  <!--Item-->
                  <div class="row">
                    <div class="col-md-3 col-sm-3">
                    <img src="{{asset($bio->pic)}}" alt="">
                    </div>
                    <div class="col-md-9 col-sm-9">
                        {!!$bio->desc!!}
                    </div>
                  </div>
                  <!--Item-->

                  <div class="divisor_line"></div>

                 

                </div>
                <!--cbp tmlabel-->
            @else
                <div class="cbp_tmtime">
                    <h2>Nama Calon</h2>
                    <span>Biografi</span>
                  
                </div>

                <div class="cbp_tmicon fa fa-star"></div>

                <!--cbp tmlabel-->
                <div class="cbp_tmlabel">

                    <h2><i>Data Belum Tersedia</i></h2>    
                </div>
            @endif

              </li>
              <!--Education-->
             
              
            </ul>        
            <!--cbp tmtimeline-->

           </div>
        
@endsection
<style>
    .central_content iframe
    {
        height:350px !important;
    }
</style>