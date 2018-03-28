<form class="form-horizontal" action="{{$id==-1 ? URL::to('kalender') : URL::to('kalender/'.$id) }}" method="{{($id==-1 ? "POST" : "PUT")}}" id="form-kalender">
  <fieldset class="content-group">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
      <label class="control-label col-lg-4">Judul Kalender</label>
      <div class="col-lg-8">
        <input type="text" class="form-control" placeholder="Judul Kalender" name="title" id="title" autocomplete="off" value="{{($id!=-1 ? $det->title : '')}}">
        <div id="titlex" style="font-style:italic;color:red;font-size:11px;"></div>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-lg-4">Start Date</label>
      <div class="col-lg-8">
        <div class="input-group">
          @php
            if($id!=-1)
            {
              $startdate = $det->start_date;
              $tgl = date("d-m-Y", strtotime($startdate));
            }
            else {
              $tgl='';
            }
          @endphp
          <input type="text" class="form-control" placeholder="dd-mm-yyyy" name="start_date" id="start_date" autocomplete="off" value="{{($id!=-1 ? $tgl : '')}}">
          <span class="input-group-addon" style="cursor:pointer"><i class="icon-calendar22"></i></span>
          <div id="start_datex" style="font-style:italic;color:red;font-size:11px;"></div>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-lg-4">End Date</label>
      <div class="col-lg-8">
        <div class="input-group">
          @php
            if($id!=-1)
            {
              $enddate = $det->end_date;
              $tgl = date("d-m-Y", strtotime($enddate));
            }
            else {
              $tgl='';
            }
          @endphp
          <input type="text" class="form-control" placeholder="dd-mm-yyyy" name="end_date" id="end_date" autocomplete="off" value="{{($id!=-1 ? $tgl : '')}}">
          <span class="input-group-addon" style="cursor:pointer"><i class="icon-calendar22"></i></span>
          <div id="end_datex" style="font-style:italic;color:red;font-size:11px;"></div>
          
        </div>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-lg-4">Keterangan</label>
      <div class="col-lg-8">
        <textarea rows="3" cols="5" class="form-control" placeholder="Keterangan" name="desc" id="desc">{{($id!=-1 ? $det->desc : '')}}</textarea>
      </div>
    </div>

  </fieldset>
</form>
