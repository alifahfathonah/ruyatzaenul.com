<div class="row">
                      
    <div class="col-md-4 col-sm-4">
        <a href="{{url('/')}}">
            <img src="{{asset('asset/bogor-kahiji-kecil.png')}}" class="logo" style="">
            <h1 style="font-family:aristaRegular">Ru'yat - Zaenul</h1>
        </a>
    </div>

    <div class="col-md-8 col-sm-8">
        <ul id="menu" class="sf-menu">
            <li><a href="{{url('/')}}">Beranda</a>
            </li>
            
            <li><a href="#">Biografi <i class="fa fa-angle-double-down"></i></a>
                <ul>
                    <li><a href="{{url('biografi/achmad-ruyat')}}"><i class="fa fa-angle-right"></i>Achmad Ru'yat</a></li>
                    <li><a href="{{url('biografi/zaenul-mutaqin')}}"><i class="fa fa-angle-right"></i>Zaenul mutaqin</a></li> 
                </ul>
            </li>
            <li><a href="{{url('program-unggulan')}}">Program Unggulan</a>
            </li>

            <li><a href="#">Publikasi <i class="fa fa-angle-double-down"></i></a>
              <ul>   
            @php
                $cat=App\Models\CatBerita::all();
            @endphp       
                @foreach ($cat as $item)
                    <li><a href="{{url('publikasi',strtolower($item->nama_kategori))}}"><i class="fa fa-angle-right"></i> {{$item->nama_kategori}}</a></li>
                @endforeach
                <li><a href="{{route('testimoni')}}"><i class="fa fa-angle-right"></i> Testimoni</a></li>
              </ul>
            </li> 

            <li><a href="{{url('dokumentasi/video')}}"> Video</a></li> 

            <li><a href="{{url('event-terdekat')}}">Event</a></li> 
            
        </ul>
    </div>

</div>