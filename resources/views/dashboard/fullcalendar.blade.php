<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.3.1/fullcalendar.min.css" type="text/css" />
<link rel="stylesheet" href="{{asset('css/fullcalendar.css')}}">
  
{{-- <div id="calendar"></div> --}}
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> --}}
  <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
  <script src="{{asset('js/fullcalendar.js')}}"></script>

  <script>




    jQuery(document).ready(function($){
      function convert(str){
        const d = new Date(str);
        let month = '' + (d.getMonth() + 1);
        let day = '' + d.getDate();
        let year = d.getFullYear();
        if (month.length < 2) month = '0' + month;
        if (day.length < 2) day = '0' + day;
        let hour = '' + d.getUTCHours();
        let minutes = '' + d.getUTCMinutes();
        let seconds = '' + d.getUTCSeconds();
        if (hour.length < 2) hour = '0' + hour;
        if (minutes.length < 2) minutes = '0' + minutes;
        if (seconds.length < 2) seconds = '0' + seconds;
        return [year,month,day].join('-') + ' ' + [hour,minutes,seconds].join(':');
      };

      var calendar = $('#calendar').fullCalendar({
        timezone: 'local',
        height: "auto",
        selectable: true,
        editable: true,
        dragabble: true,
        defaultView: 'month',
        yearColumns: 3,
        header:{
          left: 'prev,next today',
          center: 'title',
          right: 'year,month,basicWeek,basicDay'
        },
        events: "{{route('dashboard-penjadwalan')}}",

        dayClick:function(date,event,view){
          // alert('bisa lo');
          // $('#startDate').val(convert(date));
          $('#dialog').dialog({
            title: 'add Event',
            width: 600,
            height: 600,
            modal:true,
            show:{effect:'clip', duration:350},
            hide:{effect:'clip', duration:350}
          });
        },
        select:function(start,end){
          $('#startDate').val(convert(start));
          $('#endDate').val(convert(end));
          $('#dialog').dialog({
            title: 'add Event',
            width: 600,
            height: 600,
            modal:true,
            show:{effect:'clip', duration:350},
            hide:{effect:'clip', duration:350}
          });
        }

          
        })
        
    });
  </script>