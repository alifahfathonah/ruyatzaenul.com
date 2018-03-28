<table class="table table-striped table-bordered" id="data-user" width="100%">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Username</th>
      <th>Level</th>
      <th>Status</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($data as $k => $v)
    @php
      if(isset($level[$v->level]))
        $lv=$level[$v->level];
      else
        $lv='';
    @endphp
    <tr>
      <td class="text-center">{{($k+1)}}</td>
      <td>{{$v->name}}</td>
      <td>{{$v->username}}</td>
      <td>{{$lv}}</td>
      <td class="text-center">
        @if ($v->status==0)
          <input type="checkbox" id="status" class="switch" value="{{$v->id}}" data-on-text="Active" data-off-text="DeActive" data-size="mini" onclick="ubah()">
        @else
          <input type="checkbox" id="status" class="switch" value="{{$v->id}}" data-on-text="Active" data-off-text="DeActive" checked="checked" data-size="mini" onclick="ubah()">
        @endif
      </td>
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
