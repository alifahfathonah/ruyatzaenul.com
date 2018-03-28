<div class="panel-body">
    <div class="row">
      {{-- <div class="col-md-3">
        <div class="content-group" id="external-events">
          <h6>Info Kegiatan</h6>
          <div class="fc-events-container content-group">
            <div class="fc-event" data-color="#546E7A">Sauna and stuff</div>
            <div class="fc-event" data-color="#26A69A">Lunch time</div>
            <div class="fc-event" data-color="#546E7A">Meeting with Fred</div>
            <div class="fc-event" data-color="#FF7043">Shopping</div>
            <div class="fc-event" data-color="#5C6BC0">Restaurant</div>
            <div class="fc-event">Basketball</div>
            <div class="fc-event">Daily routine</div>
          </div>

          <
        </div>
      </div> --}}

      <div class="col-md-12">
        <div class="fullcalendar-external"></div>
      </div>
    </div>
  </div>
</div>
<script>
var cal = '{{$cal}}';
var eventColors = cal.replace(/&quot;/g,'"');
 eventColors = eventColors.replace(/&amp;/g,'&');
$(document).ready(function(){
  // var datajson={{$cal}};
  $('.fullcalendar-external').fullCalendar({
      header: {
          left: 'prev,next today',
          center: 'title',
          right: ''
          // right: 'month,agendaWeek,agendaDay'
      },
      editable: true,
      defaultDate: '{{date('Y-m-d')}}',
      events: JSON.parse(eventColors),
      locale: 'en',
      droppable: true, // this allows things to be dropped onto the calendar
      eventDrop:function(event){
        // alert(event.id);
        var d = new Date(event.end.format());
        d.setDate(d.getDate()-1);
        var enddate=d.getFullYear()+'-'+(d.getMonth() + 1)+'-'+d.getDate();
        // alert(enddate);
        $.ajax({
            dataType: 'json',
            type:'PUT',
            url: APP_URL+'/kalender/'+event.id,
            data:{'start_date':event.start.format(),'end_date':enddate}
        }).done(function(data){
            var txt = "Data Kalender Berhasil Di Edit";
            $('#modal-confirm').modal('hide');
                new PNotify({
                    title: 'Berhasil',
                    text: txt,
                    addclass: 'alert bg-success alert-styled-right',
                    type: 'success'
                });
            // alert('Data User Berhasil Di Tabah');
            // toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});
        }).fail(function(){
          $('#modal-confirm').modal('hide');
          new PNotify({
              title: 'Informasi',
              text: 'Simpan Data User Gagal',
              addclass: 'alert alert-warning alert-styled-right',
              type: 'error'
          });
        });
      },
      eventClick: function(event) {
        $('button#hapusbutton').remove();
        $("<button type='button' class='btn btn-danger' id='hapusbutton'>Hapus</button>").insertAfter('button#closebutton');
        // $('div.modal-footer').on('click','button#closebutton',function(){
        //   alert('aa');
        // });

        form(event.id);
        $('button#hapusbutton').click(function(){
          $.ajax({
              url: APP_URL+'/kalender/'+event.id,
      				type : 'delete'
          }).done(function(data){
              // getPageData();
              $('#modal-confirm').modal('hide');
      				    new PNotify({
      		            title: 'Berhasil',
      		            text: 'Data Kalender Berhasil Di Hapus',
      		            addclass: 'alert bg-success alert-styled-right',
      		            type: 'success'
      		        });
      						loadData(-1);
      		    // alert('Category Berhasil Di Tabah');
              // toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});
          }).fail(function(){
      			$('#modal-confirm').modal('hide');
      			new PNotify({
      					title: 'Informasi',
      					text: 'Hapus Data Kalender Gagal',
      					addclass: 'alert alert-warning alert-styled-right',
      					type: 'error'
      			});
      		});
        });
    }
  });


  // Initialize the external events
  $('#external-events .fc-event').each(function() {

      // Different colors for events
      $(this).css({'backgroundColor': $(this).data('color'), 'borderColor': $(this).data('color')});

      // Store data so the calendar knows to render an event upon drop
      $(this).data('event', {
          title: $.trim($(this).html()), // use the element's text as the event title
          color: $(this).data('color'),
          stick: true // maintain when user navigates (see docs on the renderEvent method)
      });

      // Make the event draggable using jQuery UI
      $(this).draggable({
          zIndex: 999,
          revert: true, // will cause the event to go back to its
          revertDuration: 0 // original position after the drag
      });
  });
});
</script>
