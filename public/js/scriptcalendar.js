// Code goes here
jQuery(document).ready(function($) {

  // page is now ready, initialize the calendar...

  var calendar = $('#calendar').fullCalendar({
    // put your options and callbacks here
    timezone: 'local',
    height: "auto",
    selectable: true,
    editable: true,
    dragabble: true,
    defaultView: 'month',
    yearColumns: 3,
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'year,month,basicWeek,basicDay'
    },
    dayclick:function(date,event,view){
      $('#dialog').dialog({
        title: 'Add Event',
        width:600,
        height:700,
        modal:true,
        show:{effect:'clip', duration:350},
        hide:{effect:'clip', duration:350}
      })
    },

    // durationEditable: true,
    // bootstrap: false,

    // events: [{
    //   title: "Some event",
    //   start: new Date('2017-1-10'),
    //   end: new Date('2017-1-20'),
    //   id: 1,
    //   allDay: true,
    //   editable: true,
    //   eventDurationEditable: true,
    // }, ],
    // select: function(start, end, allDay) {
    //   var title = prompt('Event Title:');
    //   if (title) {
    //     var event = {
    //       title: title,
    //       start: start.clone(),
    //       end: end.clone(),
    //       allDay: true,
    //       editable: true,
    //       eventDurationEditable: true,
    //       eventStartEditable: true,
    //       color: 'red',
    //     };


    //     calendar.fullCalendar('renderEvent', event, true);
      
    //   }}
  });
});