<table class="table table-striped table-bordered" id="data-faq" width="100%">
  <thead>
    <tr>
      <th class="text-center">No</th>
      <th class="text-center">Question</th>
      <th class="text-center">Answer</th>
      <th class="text-center">Flag</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $k => $v)
      <tr>
        <td class="text-center">{{($k+1)}}</td>
        <td>{{substr(strip_tags($v->question),0,100)}}..</td>
        <td>{{substr(strip_tags($v->answer),0,100)}}..</td>
        <td class="text-center">
          @if ($v->flag==0)
            <input type="checkbox" value="{{$v->id}}" class="switch" data-on-text="On" data-off-text="Off" data-size="mini">
          @else
            <input type="checkbox" value="{{$v->id}}" class="switch" data-on-text="On" data-off-text="Off" checked="checked" data-size="mini">
          @endif
        </td>
        <td class="text-center">
          <a href="{{URL::to('/faq-form')}}/{{$v->id}}"><i class="icon-pencil5"></i></a>
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
