 <div class="container">
            <div class="row">
                <div class="col-md-12">
                        <!-- carrousel-->
                        <ul class="slides-carousel border_img">
                            @php
                                $galeri=App\Models\Gallery::where('flag','=',1)->orderByRaw('RAND()')->get();
                            @endphp
                             @if (count($galeri)==0)
                                <center>Data Galeri Masih Belum Tersedia

                                    <div class="divisor_line"></div>
                                </center>
                            @else
                                @foreach ($galeri as $item)
                                    <li>
                                        <img src="{{asset($item->picture)}}"  alt=""/>
                                        <a class="fancybox" title="" href="{{asset($item->picture)}}"></a>
                                    </li>                                
                                                                
                                @endforeach
                            @endif

                        </ul>
                        <!-- end carrousel-->
                    </div>
            </div>
            <!-- star divisor -->
                <div class="sep">       
                  <span class="star"><img src="{{asset('asset/logo-bulat.png')}}" alt="star" style="margin-left:13px;margin-top:-10px;"></span>
                  <span class="rule-l">&nbsp;</span>
                  <span class="rule-r">&nbsp;</span>        
                </div>
                <!--end star divisor -->
                <ul id="carrousel_topic"> 
                @php
                    $candidat=App\Models\Profile::all();
                @endphp
                @foreach ($candidat as $item)
                    
                    <li class="item_topics">   

                        <div class="row">      
                            <div class="col-md-4">
                                <img src="{{asset($item->pic)}}" alt="">      
                            </div>

                            <div class="col-md-8">
                                <div class="candidate_about">

                                    <h1 style="font-family:aristaRegular">{{$item->title}} <span>{{strpos($item->category,'ruyat')!==false ? 'Calon Walikota Bogor' : 'Calon Wakil Walikota Bogor'}}</span></h1>

                                    {!! substr($item->desc,0,1500) !!}
                                    <br>
                                    <br>
                                    <a class="button_url" href="{{url('biografi',(strpos($item->category,'ruyat')!==false ? 'achmad-ruyat' : 'zaenul-mutaqin'))}}"> Selengkapnya</a>
                                </div>
                            </div>
                        </div>  
                    </li>  
                 @endforeach
                </ul>
                <!-- topics Focus -->

                <!-- star divisor -->
                <div class="">     
                    <h2 class="text-center">VISI & MISI 2019-2024</h2>
                    <div class="row">
                        <div class="col-md-1">&nbsp;</div>
                        <div class="col-md-10 col-sm-10  text-left" style="opacity:1.0;position:relative;z-index:100000">
                            <h2 class="text-center">VISI :</h2>
                            <h4 style="font-family:aristaLight;font-size:19px;letter-spacing:1px;font-weight:normal" class="text-center">Bogor kota terbaik se-Indonesia dengan pemerintahan amanah dan masyarakat yang sejahtera</h4>
                            <br>
                            <br>
                            <h2 class="text-center">MISI :</h2>
                            <h4>
                                <ul style="font-family:aristaLight;">
                                    <li style="font-size:19px;letter-spacing:1px;color:#000;font-weight:normal">Mewujudkan kota TERBAIK se-Indonesia yang beriman, prestatif dan membanggakan</li>
                                    <li style="font-size:19px;letter-spacing:1px;color:#000;font-weight:normal">Mewujudkan pemerintahan yang AMANAH yang memberikan layanan prima serta akses komunikasi yang mudah, kapan saja dan dimana saja</li>
                                    <li style="font-size:19px;letter-spacing:1px;color:#000;font-weight:normal">Mewujudkan kota yang NYAMAN melalui pengelolaan wilayah berbasis lingkungan yang berkelanjutan</li>
                                    <li style="font-size:19px;letter-spacing:1px;color:#000;font-weight:normal">Mewujudkan masyarakat SEJAHTERA melalui pembangunan sumber daya manusia dan ekonomi kreatif yang berkeadilan</li>
                                </ul>
                            </h4>
                        </div>
                        <div class="col-md-1">&nbsp;</div>
                        {{--    --}}
                    </div>
                        <div class="row text-center" style="margin-top:30px;">
                            
                            <img class="logo-misi" src="{{asset('images/bogor-berbudaya.png')}}">
                            <img class="logo-misi" src="{{asset('images/bogor-berkah.png')}}">
                            <img class="logo-misi" src="{{asset('images/bogor-cerdas.png')}}">
                            <img class="logo-misi" src="{{asset('images/bogor-digital.png')}}">
                            <img class="logo-misi" src="{{asset('images/bogor-juara.png')}}">
                            <img class="logo-misi" src="{{asset('images/bogor-kreatif.png')}}">
                            <img class="logo-misi" src="{{asset('images/bogor-nyaman.png')}}">
                            <img class="logo-misi" src="{{asset('images/bogor-peduli.png')}}">
                            <img class="logo-misi" src="{{asset('images/bogor-sehat.png')}}">
                            <img class="logo-misi" src="{{asset('images/bogor-tourism.png')}}">
                            <img class="logo-misi" src="{{asset('images/bogor-traffic.png')}}">
                            
                        </div> 
                    
                    <img src="{{asset('images/bottom-image.png')}}" style="width:100%;height:auto;opacity:0.2;position:absolute;left:0;margin-top:-200px;">
                        
                    
                </div>  
                <div class="row">
                    <div class="col-lg-12"></div>
                </div>
                <div class="sep">       
                  <span class="star"><img src="{{asset('asset/logo-bulat.png')}}" alt="star" style="margin-left:13px;margin-top:-10px;"></span>
                  <span class="rule-l">&nbsp;</span>
                  <span class="rule-r">&nbsp;</span>        
                </div>
                <!-- end star divisor -->

               

                <div class="row top">

                    <!-- Services for our contry - Accordion -->
                    <div class="col-md-6 col-sm-6">
                        <h3>Program Unggulan</h3>

                        <div class="accordion-content">
                        @php
                            $program=App\Models\Program::where('flag','=',1)->orderByRaw('RAND()')->limit(3)->get(); 
                        @endphp 
                         @if (count($program)==0)
                            Data Program Masih Belum Tersedia
                            <div class="divisor_line"></div>
                        @else
                        
                            @foreach ($program as $key => $value)
                        
                            <div class="accordion-trigger" style="width:100%;float:left;"><span>{{$value->title}}</span></div>   
                                <div class="accordion-container border_img" style="width:100%;float:left;">
                                    <img src="{{asset($value->pic)}}" alt="image" style="width:150px;height:150px;float:left">
                                <p style="float:left;margin-left:20px;width:350px;">
                                    {{substr(strip_tags($value->desc),0,500)}}
                                </p>
                                <a href="{{url('program-unggulan',$value->slug)}}" class="pull-right" style="float:left;width:100%;text-align:right"> Selengkapnya</a>
                            </div>
                            @endforeach
                        @endif    
                        </div>
                    </div>
                    <!-- end Services for our contry - Accordion -->

                    <!-- Testimonials -->
                    <div class="col-md-6 col-sm-6">

                        <h3>Testimonial</h3>

                        <ul class="testimonials border_img top">
                            
                        @php
                            $testi=App\Models\Testimony::orderByRaw('RAND()')->limit(4)->get();
                            $x=1;
                        @endphp

                         @if (count($testi)==0)
                            Data Testimoni Masih Belum Tersedia
                            <div class="divisor_line"></div>
                        @else
                            @php
                                foreach ($testi as $key => $value)
                                {
                                if($x==1)
                                {
                                    echo '<li>';
                                } 
                            @endphp 
                                    <div class="row"> 
                                        @if ($value->photo=='')
                                            <img src="{{asset('asset/logo-bulat.png')}}" alt="image">
                                        @else
                                            <img src="{{asset($value->photo)}}" alt="image">
                                        @endif                                 
                                        <div class="testimonials_content">
                                        <h4>{{$value->nama}}  <span>{{$value->jabatan}} {{$value->perusahaan}}</span></h4>                  
                                            <p class="text-overflow">{{strip_tags($value->desc)}}</p>
                                        </div>
                                    </div> 
                                    @if ($x==1)
                                        <div class="divisor_line"></div>
                                    @endif

                            @php
                                if($x==2)
                                {
                                    echo '</li>';
                                    $x=0;
                                }
                                $x++;
                            }
                            @endphp
                        @endif
                        </ul>  
                    </div>
                    <!-- end Testimonials -->
                </div>

                <div class="row top">
                    
                    
                    <div class="col-md-12">
                        <!-- carrousel-->
                        <ul class="slides-carousel border_img">
                            @php
                                $video=App\Models\Video::where('flag','=',1)->orderByRaw('RAND()')->limit(4)->get();
                            @endphp
                             @if (count($video)==0)
                                <center>Data Video Masih Belum Tersedia

                                    <div class="divisor_line"></div>
                                </center>
                            @else
                                @foreach ($video as $vid)
                                    <li>
                                    @php
                                        if(strpos($vid->url,'youtube')!==false)
                                        {
                                            $url = $vid->url;
                                            preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
                                            $id = $matches[1];
                                            $width = '100%';
                                            $height = '100';
                                            $v='<iframe id="ytplayer" type="text/html" width="'.$width.'" height="'.$height.'"
                                                src="https://www.youtube.com/embed/'.$id.'?rel=0&showinfo=0&color=white&iv_load_policy=3"
                                                frameborder="0" allowfullscreen></iframe> ';
                                            
                                            echo $v;
                                        }
                                  
                                    @endphp     
                                    </li>                                
                                                                
                                @endforeach
                            @endif

                        </ul>
                        <!-- end carrousel-->
                    </div>
                </div>

                <!-- star divisor -->
                <div class="sep">       
                  <span class="star"><img src="{{asset('asset/logo-bulat.png')}}" alt="star" style="margin-left:13px;margin-top:-10px;"></span>
                  <span class="rule-l">&nbsp;</span>
                  <span class="rule-r">&nbsp;</span>        
                </div>
                <!--end star divisor -->

                <div class="row">
                    <div class="col-md-12">
                        <!-- Tabs -->
                        <ul class="tabs"> 
                            <li><a href="#tab2">BERITA, ARTIKEL, & INFORMASI</a></li> 
                            <li><a href="#tab1">EVENT TERDEKAT</a></li> 
                        </ul>

                        <!-- Tabs Container -->
                        <div class="tab_container">  
                             <!-- Tab 2 -->  
                            <div id="tab2" class="tab_content  topics top">

                                
                                <ul id="news_carrousel"> 
                                    <!--item news-->
                                    @php
                                        $berita=App\Models\Berita::where('flag','=',1)->orderBy('created_at','desc')->limit(6)->get();
                                        $cat=App\Models\CatBerita::all();
                                        $kat=array();
                                        
                                        foreach($cat as $k => $v)
                                        {
                                            $kat[$v->id]=strtolower($v->nama_kategori);
                                        }
                                        // echo '<pre>';
                                        // print_r($kat);
                                        // echo '</pre>';
                                    @endphp
                                     @if (count($berita)==0)
                                        Data Publikasi Masih Belum Tersedia
                                        <div class="divisor_line"></div>
                                    @else
                                        @foreach ($berita as $item)
                                        @php
                                            $kategori='';
                                            if(isset($kat[$item->id_kategori]))
                                            {
                                                $kt=$kat[$item->id_kategori];
                                                $kategori=$kt;
                                            }
                                        @endphp
                                        <li class="item_news">                        
                                            <ul class="rslides news_slider">
                                                <li class="border_img">
                                                @if ($item->file=='')
                                                    <img src="{{asset('asset/img/slide_01.jpg')}}" alt="image-candidate"></li>
                                                @else
                                                    <img src="{{asset($item->file)}}" alt="image-candidate"></li>   
                                                @endif
                                            </ul> 
                                            <h3>{{$item->title}}</h3>
                                        <p>{{substr(strip_tags($item->desc),0,300)}}[..]</p>
                                            <a class="button_url" href="{{url('publikasi/'.$kategori,$item->slug)}}"> Selengkapnya</a>
                                        </li>
                                        @endforeach
                                    <!--item news-->
                                    @endif
                                                                                
                                </ul>

                            </div>   
                            <!-- Tab 2 --> 
                            <!-- Tab 1 -->     
                            <div id="tab1" class="tab_content">    
                                <!--Events-->
                                <!--Event Item-->
                                @php
                                    $event=App\Models\Event::where('flag','=',1)->orderBy('tanggal_event','desc')->get();
                                    $x=1;
                                @endphp
                                 @if (count($testi)==0)
                                    Data Event Masih Belum Tersedia
                                    <div class="divisor_line"></div>
                                @else    
                                    @php
                                        foreach($event as $item){
                                        list($thn,$bln,$tgl)=explode('-',$item->tanggal_event);
                                        $waktu=date('H:i',strtotime($item->waktu));
                                    @endphp
                                    @if ($x==1)
                                        <div class="row">
                                    @endif
                                        <div class="col-md-6 col-sm-6">

                                            <div class="events">
                                                                                            
                                                <div class="date_info">
                                                    <span>{{$tgl}}</span>
                                                    <p>{{bulanIndo($bln)}} {{$thn}}</p>
                                                    <p>{{$waktu}}</p>
                                                </div>
                                                        
                                                <div class="content_event">
                                                    <h3>{{$item->nama_event}}</h3>
                                                    <p>{{strip_tags($item->desc)}}</p>
                                                    <ul class="date">
                                                        
                                                        <li><i class="fa fa-home"></i><span>Lokasi : </span>{{$item->lokasi}}</li>
                                                    </ul>
                                                </div>
                                                
                                            </div>
                                        
                                        </div>
                                        <!--Event Item-->

                                    
                                @if ($x==2)
                                    </div>
                                    <!--Events-->
                                    
                                    <div class="divisor_line"></div>
                                @endif
                                @php
                                    if($x==2)
                                        $x=0;

                                    $x++;
                                }
                                @endphp
                                
                            @endif
                            </div>
                            <!--Tab 1-->

                           
                            
                        </div>
                        <!-- Tabs Container -->
                    </div> 
                </div>

            </div>
<style>
    .central_content iframe
    {
        height:350px !important;
    }
    iframe#ytplayer
    {
        height:160px !important;
    }
    .logo-misi
    {
        width:90px;
        margin:2px;
        height:auto;
        opacity:1.0;
        position:relative;
        z-index:100000;
    }
</style>