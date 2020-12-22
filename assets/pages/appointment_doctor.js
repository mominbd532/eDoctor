$(document).ready(function() {
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();
    $('#external-events div.external-event').each(function() {
        var eventObject = {
            title: $.trim($(this).text())
        };
        $(this).data('eventObject', eventObject);

        $(this).draggable({
            zIndex: 999,
            revert: true,
            revertDuration: 0
        });

    });

    var calendar =  $('#calendar').fullCalendar({
        header: {
            left: 'title',
            right: 'prev,next today'
        },
        editable: true,
        firstDay: 1,
        selectable: true,
        defaultView: 'month',

        axisFormat: 'h:mm',
        columnFormat: {
            month: 'ddd',    // Mon
            week: 'ddd d', // Mon 7
            day: 'dddd M/d',  // Monday 9/7
            agendaDay: 'dddd d'
        },
        titleFormat: {
            month: 'MMMM YYYY', // September 2009
            week: "MMMM YYYY", // September 2009
            day: 'MMMM YYYY'  // Tuesday, Sep 8, 2009
        },
        allDaySlot: false,
        selectHelper: true,
        select: function(start, end, allDay) {
            var dt = start.format('YYYY-MM-DD');
           $('#selected_date').html(start.format('DD MMM, YYYY'));
           $('#appointment_list').hide();
           $('#new_list').show();
            $.ajax({
                type:'POST',
                url:'../doctorpost/appointment_list?date=' + dt,
                dataType:'json',
                success: function(data){
                    if(data.status == 1)
                    {
                        $('#new_list').html('<h6>No Appointments Found On '+start.format('DD MMM, YYYY')+'</h6>');  
                    }
                    else
                    {
                        var t = 1;
                        var list = '<table class="table table-bordered"><tr><th>Sr.No</th><th>Patient</th><th>Schedule</th></tr>';
                        $.each(data,function(i,p_name,time){
                            list += "<tr><td>"+t+"</td><td>"+data[i].p_name+"</td><td>"+data[i].time+"</td></tr>";
                            t++;
                        });
                        $('#new_list').html(list); 
                    }
                },
                error:function(data)
                {
                 
                }
            });
            
            calendar.fullCalendar('unselect');
        },
        droppable: true,
        drop: function(date, allDay) {
            var originalEventObject = $(this).data('eventObject');
            var copiedEventObject = $.extend({}, originalEventObject);
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;
            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
            if ($('#drop-remove').is(':checked')) {
                $(this).remove();
            }
        },        
    });
});