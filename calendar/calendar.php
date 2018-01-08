
<!doctype html>
<html lang="en">
<head>
    <title>Event Calendar</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fullcalendar.min.css">

    <script src="js/jquery-3.2.1.min.js"></script>

    <style>
        .fc-title{
            color: white;
            font-weight: 600;
        }
    </style>

</head>

<body>
<div class="container">
    <div class="card-header" align="center"><h2>Event Calendar</h2></div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="eventName" style="text-transform: uppercase" align="center"></h4>
            </div>
            <div class="container">
                <p><span style="font-weight: 600">Start   :   </span> <span id="startTime"></span></p>
                <p><span style="font-weight: 600">End   :   </span> <span id="endTime"></span></p>
                <p><span style="font-weight: 600">Description  :   </span> <span id="eventInfo"></span></p>
            </div>
        </div>
    </div>
</div>

<script src="js/popper.min.js"></script>

<script src="js/bootstrap.min.js"></script>
<script src="js/moment.min.js"></script>
<script src="js/fullcalendar.min.js"></script>

<script>
    $(document).ready(function() {
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,listWeek'
            },
            navLinks: true, // can click day/week names to navigate views
            eventLimit: true, // allow "more" link when too many events

            events: "pro/events.php",

        eventRender: function (event, element) {
            element.attr('href', 'javascript:void(0);');
            element.click(function() {
                $("#startTime").html(moment(event.start).format('MMM Do h:mm A'));
                $("#endTime").html(moment(event.end).format('MMM Do h:mm A'));
                $("#eventInfo").html(event.description);
                $("#eventName").html(event.title);
                $("#eventLoc").html(event.location);
                $('#modal1').modal('show');
            });
        }

    });
    });
</script>

</body>

</html>