<!doctype html>
<html lang="en">
<head>
    <title>Event Calendar</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fullcalendar.min.css">

    <style>
        .fc-title{
            color: white;
            font-weight: 600;
        }
    </style>

</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h3>Events</h3>
                        </div>
                        <div align="right" class="col-4">
                            <a href="/calendar/new-event" class="btn btn-primary">New Event</a>
                        </div>
                    </div>


                    <table class="table table-ststriped">
                        <thead>
                        <tr>
                            <th>Event Name</th>
                            <th>Start</th>
                            <th>End</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        include '../config/Database.php';
                        $pdo = Database::connect();
                        $sql = 'SELECT * FROM event ORDER BY id DESC';
                        foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['title'] . '</td>';
                            echo '<td>'. $row['start'] . '</td>';
                            echo '<td>'. $row['end'] . '</td>';
                            echo '<td><a class="btn btn-info" href="../edit-event?id='.$row['id'].'">Edit</a> <a class="btn btn-danger" href="../delete-event?id='.$row['id'].'">Delete</a></td>';
                            echo '</tr>';
                        }
                        Database::disconnect();
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/moment.min.js"></script>
<script src="../js/fullcalendar.min.js"></script>

</body>

</html>