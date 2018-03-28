@extends('layouts.front')
@section('title')
    <title>{{ucwords($jenis)}} : Bogor Kahiji</title>
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
        <div class="row">

              <div class="col-md-8">
                <div id="data">
                    
                        @include('pages.publikasi.data')
                    
                </div>
              </div>

              <div class="col-md-4">
              <aside>
                <!--search-->
                {{--  <form role="search" method="get" id="searchform" class="searchform" action="#">
                  <div>
                    <input type="text" value="" name="search" id="search" placeholder="Cari Berita">
                    <input type="submit" class="button" id="searchsubmit" value="Search">
                  </div>
                </form>  --}}
                <!--search-->
                <center>
                    <img src="{{asset('asset/bogor-kahiji-kecil.png')}}" style="width:50%;margin:0 auto !important;" class="text-center">
                </center>

              <div class="divisor_line"></div>
                <h3>Testimoni</h3>
                <!--blockquote-->
                @if (count($testi)==0)
                    Data Testimoni Masih Belum Tersedia
                    <div class="divisor_line"></div>
                @else
                    
                    @foreach ($testi as $item)
                    
                    <blockquote>
                        <p>{{strip_tags($item->desc)}}</p>
                        <span>{{$item->nama}}, {{$item->jabatan.' '.$item->perusahaan}}</span>
                    </blockquote>
                    <div class="divisor_line"></div>
                    @endforeach
                @endif

                
                <!--Video-->
                <h3>Video</h3>
                @php
                    $vid=App\Models\Video::where('flag','=',1)->orderByRaw('RAND()')->limit(1)->get()->first();
                    if($vid)
                    {
                        if(strpos($vid->url,'youtube')!==false)
                        {
                            $url = $vid->url;
                            preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
                            $id = $matches[1];
                            $width = '100%';
                            $height = '200px';
                            $video='<iframe id="ytplayer" type="text/html" width="'.$width.'" height="'.$height.'"
                                src="https://www.youtube.com/embed/'.$id.'?rel=0&showinfo=0&color=white&iv_load_policy=3"
                                frameborder="0" allowfullscreen></iframe> ';
                        }
                        else
                            $video='Video Belum Tersedia';
                    }
                    else
                        $video='Video Belum Tersedia';
                        echo $video;
                    @endphp
                <!--Video-->

                <div class="divisor_line"></div>

                <!--Accordion-->
                <h3>Program Kerja</h3>
                @if (count($testi)==0)
                    Data Program Masih Belum Tersedia
                @else
                    @foreach ($program as $item)
                        <div class="accordion-trigger"><span>{{$item->title}}</span></div>   
                        <div class="accordion-container">
                        <p>{{substr(strip_tags($item->desc),0,50)}}</p>
                        </div>
                    @endforeach
                @endif

             
                  <!--Accordion-->

              </aside>
              </div>
            </div>           
    </div>       
@endsection

@section('footscript')
    <script>
        $('body').on('click', '.pagination a', function(e) {
                e.preventDefault();
                //$('#load a').css('color', '#dfecf6');
                //$('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');
                var url = $(this).attr('href');
                getPosts(url);
                window.history.pushState("", "", url);
        });
        function getPosts(page) {
            $.ajax({
                    url : page
                }).done(function (data) {
                    $('div#data').html(data);
                }).fail(function () {
                    alert('Halaman Data {{ucwords($jenis)}} Tidak Dapat Di Tampilkan');
            });
        }
    </script>
@endsection