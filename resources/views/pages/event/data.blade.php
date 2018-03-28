@if (count($event)==0)
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
            <p class="top">Data Event Belum Tersedia</p>
        </div>

    </div>
    
@else
    @php
        $x=1;
        foreach($event as $item):
        list($thn,$bln,$tgl)=explode('-',$item->tanggal_event);
    @endphp
            <div class="row">    

                    <div class="col-md-5 col-sm-5">                                                                                    
                        <div class="item-team border_img">
                            @if ($item->pic=='')
                            <img src="{{asset('asset/bogor-kahiji-kecil.png')}}" alt="" class="img-responsive">
                            @else
                            <img src="{{asset($item->pic)}}" alt="" class="img-responsive">
                            @endif
                                <div class="info-team">
                                    <h3><a href="#"><i class="fa fa-calendar"></i> {{$tgl.' '.bulanIndo($bln).' '.$thn}}</a></h3>
                                    <h4><span><i class="fa fa-clock-o"></i> {{date('H:i',strtotime($item->waktu))}}</span></h4>
                                </div>
                        </div>
                    </div>
                    
                    <div class="col-md-7 col-sm-7">                                  
                        <div class="content_event">
                            <h3><a href="#">{{$item->nama_event}}</a></h3>
                            <p>{{strip_tags($item->desc)}}</p>
                            <ul class="date">
                                <li><a href="#"><i class="fa fa-calendar"></i> {{date('d-m-Y', strtotime($item->tanggal_event))}}</a></li>
                                <li><a href="#"><i class="fa fa-clock-o"></i> {{date('H:i', strtotime($item->waktu))}}</a></li>
                                <li><a href="#"><i class="fa fa-map-marker"></i> {{$item->lokasi}}</a></li>
                            </ul>
                        </div>
                    </div>
                                                   
                </div>    
        <div class="divisor_line"></div>
        
    @php
        $x++;
        endforeach
    @endphp



    <div class="row">
        <div class="col-md-12">
            {{$event->links()}}
        </div>
    </div>
@endif