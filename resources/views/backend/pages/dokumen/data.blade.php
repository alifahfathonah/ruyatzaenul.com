<table class="table table-striped table-bordered" id="data-dokumen" width="100%">
  <thead>
    <tr>
      <th style="width:20px !important;">No</th>
      <th>Title</th>
      <th>Tgl Upload</th>
      <th>View</th>
      <th>Keterangan</th>
      <th class="text-center" style="width:100px !important;">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($data as $k => $v)
    @php
    $originalDate = $v->created_at;
    $tgl = date("d-m-Y", strtotime($originalDate));
    @endphp
    <tr>
      <td class="text-center" style="width:20px !important;">{{($k+1)}}</td>
      <td class="" style="">{{$v->title}}</td>
      <td style="vertical-align:top;" class="text-center">{{$tgl}}</td>
      <td style="vertical-align:top;" class="text-center"><span class="label label-primary label-rounded">{{($v->view)}}</span></td>
      <td style="vertical-align:top;">{!!$v->desc!!}</td>

      <td class="text-center" style="width:100px !important;">
        <a href="javascript:edit({{$v->id}})"><i class="icon-pencil5"></i></a>
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
