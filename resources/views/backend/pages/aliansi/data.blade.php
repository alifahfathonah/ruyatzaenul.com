<table class="table table-striped table-bordered" id="data-aliansi" width="100%">
  <thead>
    <tr>
      <th class="text-center" style="width:20px !important;">No</th>
      <th class="text-center">Logo Aliansi</th>
      <th class="text-center">Nama Aliansi</th>
      <th class="text-center">No Kontak</th>
      <th class="text-center">Alamat</th>
      <th class="text-center">Tingkat</th>
      <th class="text-center" style="width:100px !important;">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $k => $v)
      <tr>
        <td class="text-center" style="width:20px !important;">{{($k+1)}}</td>
        <td class="text-center" style="width:200px;"><img style="max-height:100px;" src="{{(asset($v->logo))}}"></td>
        <td style="vertical-align:top;">{{$v->nama_aliansi}}</td>
        <td style="vertical-align:top;">{{$v->no_kontak}}</td>
        <td style="vertical-align:top;">{{$v->alamat}}</td>
        <td style="vertical-align:top;">{{$v->tingkat == 0 ? 'Nasional' : 'Internasional'}}</td>

        <td class="text-center" style="width:100px !important;">
          <a href="{{URL::to('/aliansi-form')}}/{{$v->id}}"><i class="icon-pencil5"></i></a>
          <a href="javascript:hapus({{$v->id}})"><i class="icon-trash"></i></a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
<style>
th { font-size: 12px !important; padding:6px 10px !important}
td { font-size: 11px !important; padding:6px 10px !important}
</style>
