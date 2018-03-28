@if (count($vid)==0)
    <div class="row error">
        <div class="col-md-4 col-sm-4">&nbsp;</div>
        <div class="col-md-4 col-sm-4 text-center">
            <center>
                <img src="{{asset('asset/bogor-kahiji-kecil.png')}}" style="" >
            </center>
        </div>
        <div class="col-md-4 col-sm-4">&nbsp;</div>

        <div class="col-md-12 col-sm-12 text-center">
            <h1>Mohon Maaf</h1>  
            <p class="top">Data Video Belum Tersedia</p>
        </div>

    </div>
    
@else
    @php
        $x=1;
        foreach($vid as $item):
    @endphp
               <!--Events-->
                <div class="row">    

                    <div class="col-md-6 col-sm-6">  
                        <h3><a href="#">{{$item->title}}</a></h3>
                        <ul class="date">
                                <li><a href="#"><i class="fa fa-calendar"></i> {{date('d-m-Y H:i:s', strtotime($item->created_at))}}</a></li>
                        </ul>
                                                                                  
                    @php
                        // $vid=App\Models\Video::where('flag','=',1)->orderByRaw('RAND()')->limit(1)->get()->first();
                        if(strpos($item->url,'youtube')!==false)
                        {
                            $url = $item->url;
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
                        
                        echo $video;
                    @endphp
                    </div>
                </div>
                <!--Events-->

                <div class="divisor_line"></div>
    @php
        endforeach
    @endphp



    <div class="row">
        <div class="col-md-12">
            {{$vid->links()}}
        </div>
    </div>
@endif