@if (count($testi)==0)
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
            <p class="top">Data Testimoni Belum Tersedia</p>
        </div>

    </div>
    
@else
    @php
        $x=1;
        foreach($testi as $item):
    @endphp
    @if ($x==1)
        <div class="row">
    @endif
        <div class="col-md-6 col-sm-6">
            <!--item news-->
            <div class="item_news option_blog">        
                <ul class="rslides news_slider">
                <li class="border_img">
                    @if ($item->photo=='')
                        <img src="{{asset('asset/bogor-kahiji-kecil.png')}}" alt="{{$item->nama}}">
                    @else
                        <img src="{{asset($item->photo)}}" alt="{{$item->nama}}">
                    @endif
                </li>
                </ul> 
                <span class=""><i class="fa fa-user"></i>&nbsp;{{($item->jabatan.' '.$item->perusahaan)}}</span>
                
                <p>
                    {{(strip_tags($item->desc))}}
                </p>
                
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
    </div>


    <div class="row">
        <div class="col-md-12">
            {{$testi->links()}}
        </div>
    </div>
@endif