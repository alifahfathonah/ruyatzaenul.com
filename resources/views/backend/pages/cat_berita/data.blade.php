<table class="table table-striped table-bordered" id="data-kategori" width="100%">
  <thead>
    <tr>
      <th>No</th>
      <th>Kategori</th>
      <th>Keterangan</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($cat as $k => $v)
    <tr>
      <td class="text-center">{{($k+1)}}</td>
      <td>{{$v->nama_kategori}}</td>
      <td>{{$v->desc}}</td>

      <td class="text-center">
        <a href="javascript:edit({{$v->id}})"><i class="icon-pencil5"></i></a>
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
