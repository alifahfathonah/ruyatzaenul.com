<table class="table table-striped table-bordered" id="data-testimoni" width="100%">
  <thead>
    <tr>
      <th style="width:20px !important;">No</th>
      <th>Photo</th>
      <th>Nama</th>
      <th>Jabatan</th>
      <th>Perusahaan</th>
      <th class="text-center" style="width:100px !important;">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($data as $k => $v)
    <tr>
      <td class="text-center" style="width:20px !important;">{{($k+1)}}</td>
      <td class="text-center" style="width:200px;">
        @if ($v->photo=='')
          <img style="max-height:100px;" src="{{(asset('asset/logo-bulat.png'))}}">
        @else
          <img style="max-height:100px;" src="{{(asset($v->photo))}}">
        @endif
      </td>
      <td class="" >{{$v->nama}}</td>
      <td style="">{{ $v->jabatan }}</td>
      <td class="">{{$v->perusahaan}}</td>
      <td class="text-center" style="width:100px !important;">
      <a href="{{URL::to('/testimoni-form')}}/{{$v->id}}"><i class="icon-pencil5"></i></a>
        <a href="javascript:hapus({{$v->id}})"><i class="icon-trash"></i></a>
      </td>
    </tr>
  @endforeach

  </tbody>
</table>
<style>
th { font-size: 12px !important; padding:6px 10px !important; text-align: center;}
td { font-size: 11px !important; padding:6px 10px !important}
</style>
