<?php
require '../config/Database.php';
$id = 0;

if ( !empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if ( !empty($_POST)) {
    // keep track post values
    $id = $_POST['id'];

    // delete data
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM event  WHERE id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    Database::disconnect();
    header("Location: ../manage");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">

    <div class="col-4 offset-4" style="margin-top: 200px;">
        <div class="card">
            <div class="card-body">
                <div align="center">
                    <h3>Delete Event</h3>
                </div>

                <form class="form-horizontal" action="delete.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id;?>"/>
                    <p class="alert alert-error" align="center">Are you sure to delete ?</p>
                    <div class="form-actions" align="center">
                        <button type="submit" class="btn btn-danger">Yes</button>
                        <a class="btn" href="../manage">No</a>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div> <!-- /container -->
</body>
</html>