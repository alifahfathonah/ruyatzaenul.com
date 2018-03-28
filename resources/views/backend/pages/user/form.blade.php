<form class="form-horizontal" action="{{$id==-1 ? URL::to('user') : URL::to('user/'.$id) }}" method="{{($id==-1 ? "POST" : "PUT")}}" id="form-user">
  <fieldset class="content-group">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
      <label class="control-label col-lg-4">Nama</label>
      <div class="col-lg-8">
        <input type="text" class="form-control" placeholder="Nama" name="name" id="name" autocomplete="off" value="{{($id!=-1 ? $det->name : '')}}">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-lg-4">Username</label>
      <div class="col-lg-8">
        <input type="text" class="form-control" placeholder="Username" name="username" id="username" autocomplete="off" value="{{($id!=-1 ? $det->username : '')}}">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-lg-4">Password</label>
      <div class="col-lg-8">
        <input type="password" class="form-control" placeholder="{{($id!=-1 ? 'Biarkan Kosong Jika Tidak Ganti Password' : '')}}" name="password" id="password" autocomplete="off" value="">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-lg-4">Level</label>
      <div class="col-lg-4">
        <select class="select2" name="level">

            <option value="-1">-Pilih-</option>
            @foreach ($level as $k => $v)
              @if ($id!=-1)
                @if ($det->level==$k)
                  <option value="{{$k}}" selected="selected">{{$v}}</option>
                @else
                  <option value="{{$k}}">{{$v}}</option>
                @endif
              @else
                <option value="{{$k}}">{{$v}}</option>
              @endif

            @endforeach
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-lg-4">Status</label>
      <div class="col-lg-4">
        <select class="select2" name="status">
            <option value="-1">-Pilih-</option>
            <option value="1" {{$id!=-1 ? ($det->status=='1' ? 'selected="selected"' : '') : ''}}>Active</option>
            <option value="0" {{$id!=-1 ? ($det->status=='0' ? 'selected="selected"' : '') : ''}}>DeActive</option>
        </select>
      </div>
    </div>

  </fieldset>
</form>
