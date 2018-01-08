<?php
require '../config/Database.php';
$id = null;
if ( !empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if ( null==$id ) {
    header("Location: index.php");
} else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM event where id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-datepicker.standalone.min.css">

    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/bootstrap-datepicker.min.js"></script>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            <div class="card">
                <div class="card-body">

                    <form action="../pro/update.php?id=<?php echo $id?>" method="post">
                        <div class="form-group row">
                            <label for="eve" class="col-sm-2 col-form-label">Event Name</label>
                            <div class="col-sm-10">
                                <input name="title" type="text" class="form-control" id="eve" value="<?php echo $data['title'];?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="desc" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea name="desc" type="text" class="form-control" id="desc" rows="5" ><?php echo $data['description'];?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="s" class="col-sm-2 col-form-label">Start Date</label>
                            <div class="col-sm-10">
                                <input name="start" class="datepicker1 form-control" id="s" value="<?php echo $data['start'];?>">

                                <script>
                                    $('.datepicker1').datepicker({
                                        format: 'yyyy-mm-dd',
                                        uiLibrary: 'bootstrap4'
                                    });
                                </script>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="e" class="col-sm-2 col-form-label">End Date</label>
                            <div class="col-sm-10">
                                <input name="end" type="text" class="datepicker2 form-control" id="e" value="<?php echo $data['end'];?>">

                                <script>
                                    $('.datepicker2').datepicker({
                                        format: 'yyyy-mm-dd',
                                        uiLibrary: 'bootstrap4'
                                    });
                                </script>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-2 offset-5">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div> <!-- /container -->
</body>
</html>