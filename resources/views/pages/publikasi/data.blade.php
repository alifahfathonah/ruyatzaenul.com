@if (count($berita)==0)
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
            <p class="top">Data {{ucwords($jenis)}} Belum Tersedia</p>
        </div>

    </div>
    
@else
    @php
        $x=1;
        foreach($berita as $item):
    @endphp
    @if ($x==1)
        <div class="row">
    @endif
        <div class="col-md-6 col-sm-6">
            <!--item news-->
            <div class="item_news option_blog">        
                <ul class="rslides news_slider">
                <li class="border_img"><img src="{{asset($item->file)}}" alt="{{$item->title}}"></li>
                </ul> 
                <span class=""><i class="fa fa-clock-o"></i>&nbsp;{{(date('d-m-Y H:i:s',strtotime($item->created_at)))}}</span>
                <h3><a href="{{url('publikasi/'.$jenis,$item->slug)}}">{{$item->title}}</a></h3>
                <p>
                    {{substr(strip_tags($item->isi),0,100)}}[..]
                </p>
                <a class="button_url" href="{{url('publikasi/'.$jenis,$item->slug)}}"> Selengkapnya</a>
            </div>
            <!--item news-->
        </div>

    
        @if ($x==2)
        </div>
        <div class="divisor_line"></div>
        @endif
    @php
        if($x==2)
            $x=0;

        $x++;
        endforeach
    @endphp
    


    <div class="row">
        <div class="col-md-12">
            {{$berita->links()}}
        </div>
    </div>
@endif