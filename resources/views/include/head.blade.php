<div class="row">

    @php
        $program=App\Models\Program::orderByRaw('RAND()')->limit(3)->get();
        foreach ($program as $key => $value):
    @endphp
        <div class="col-md-4 col-sm-4">
            <a href="{{url('program-unggulan',$value->slug)}}">
                <div class="box">
                    <div class="icon">
                        {{--  <i class="fa fa-group"></i>  --}}
                        <img src="{{asset('asset/logo-bulat.png')}}">
                    </div>
                    <h2>{{$value->title}}</h2>
                    <p class="text-overflow">{{substr(strip_tags($value->desc),0,50)}}...</p>
                </div>
            </a>
        </div>
    @php
        endforeach
    @endphp
    
</div>