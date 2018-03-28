<div class="sidebar sidebar-main sidebar-fixed">
  <div class="sidebar-content">

    <!-- User menu -->
    <div class="sidebar-user">
      <div class="category-content">
        <div class="media">
          <a href="#" class="media-left"><img src="{{ asset('/backend/assets/images/placeholder.jpg') }}" class="img-circle img-sm" alt=""></a>
          <div class="media-body">
            <span class="media-heading text-semibold">{{ Auth::user()->name }}</span>
            <div class="text-size-mini text-muted">
              <i class="icon-pin text-size-small"></i> &nbsp;
                @if (Auth::user()->level==0)
                  Administrator
                @else
                  Kontributor
                @endif
            </div>
          </div>

          <div class="media-right media-middle">
            <ul class="icons-list">
              <li>
                <a href="#"><i class="icon-cog3"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- /user menu -->
    @php
      $request_path=Request::path();
      $level=Auth::user()->level;
    @endphp

    <!-- Main navigation -->
    <div class="sidebar-category sidebar-category-visible">
      <div class="category-content no-padding">
        <ul class="navigation navigation-main navigation-accordion">

          <li class="navigation-header"><span>Main Menu</span> <i class="icon-menu" title="Main pages"></i></li>
          <li>
            <a href="{{URL::to('/dashboard')}}"><i class="icon-home4"></i> <span>Dashboard</span></a>
          </li>
        @php
            if($level==0)
            {
        @endphp
          <li>
  					<a href="#" class="has-ul legitRipple"><i class="icon-users"></i> <span>Profil Pasangan Calon</span></a>
  					<ul>
  						<li class="{{strpos($request_path,'achmad-ruyat')!==false ? 'active':''}}"><a href="{{URL::to('/achmad-ruyat')}}">Achmad Ruyat</a></li>
  						<li class="{{strpos($request_path,'zaenul-mutaqin' )!==false? 'active':''}}"><a href="{{URL::to('/zaenul-mutaqin')}}">Zaenul Mutaqin</a></li>
  					</ul>
  				</li>
         @php
            }

          @endphp
          <li>
  					<a href="#" class="has-ul legitRipple"><i class="icon-newspaper2"></i> <span>Publikasi</span></a>
  					<ul>
  						<li class="{{$request_path =='cat-berita' ? 'active':''}}"><a href="{{URL::to('cat-berita')}}">Kelola Kategori</a></li>
  						<li class="{{($request_path=='berita'|| strpos($request_path,'berita-form')!==false) ? 'active':''}}"><a href="{{URL::to('berita')}}">Kelola Publikasi</a></li>
  					</ul>
  				</li>
         
          <li>
            <a href="#" class="has-ul legitRipple"><i class="icon-cogs"></i> <span>Pengaturan</span></a>
            <ul>
              <li class="{{$request_path =='galeri' ? 'active':''}}"><a href="{{URL::to('/galeri')}}">Galeri</a></li>
              {{--  <li class="{{$request_path =='slider' ? 'active':''}}"><a href="{{URL::to('/slider')}}">Slider</a></li>  --}}
              <li class="{{$request_path =='video' ? 'active':''}}"><a href="{{URL::to('/video')}}">Video</a></li>
              {{--  <li class="{{$request_path =='social-media' ? 'active':''}}"><a href="{{URL::to('/social-media')}}">Social Media</a></li>  --}}
             
            </ul>
          </li>
          <li class="{{(strtok($request_path, '-') =='program' ? 'active': '')}}">
  					<a href="{{URL::to('/program')}}" class="legitRipple"><i class="icon-calendar2"></i> <span>Program</span></a>
  				</li>
          <li class="{{(strtok($request_path, '-') =='event' ? 'active': '')}}">
  					<a href="{{URL::to('/event')}}" class="legitRipple"><i class="icon-calendar2"></i> <span>Event</span></a>
  				</li>
          <li class="{{(strtok($request_path, '-') =='testimoni' ? 'active': '')}}">
  					<a href="{{URL::to('/testimoni')}}" class="legitRipple"><i class="icon-comment-discussion"></i> <span>Testimoni</span></a>
  				</li>
          

        </ul>
      </div>
    </div>
    <!-- /main navigation -->

  </div>
</div>
