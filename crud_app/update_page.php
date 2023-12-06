<?php include("header.php") ?>
<?php include("dbcon.php") ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM `students` where `id` = '$id'";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("query failed");
    } else {
        $row = mysqli_fetch_assoc($result);

    }
}
?>

<?php

if (isset($_POST['update_students'])) {

    if (isset($_POST['update_students'])) {
        if (isset($_GET['id_new'])) {
            $idnew = $_GET['id_new'];
        }


        $fname = $_POST["f_name"];
        $lname = $_POST["l_name"];
        $age = $_POST["age"];

        $query = "UPDATE `students` set `first_name` = '$fname', `last_name` = '$lname', `age` = '$age' where `id` = $idnew";

        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("query failed");
        } else {
            header('location:index.php?update_msg=Etudiant modifié avec succès');
        }
    }
}
?>

<form action="update_page.php?id_new=<?php echo $id; ?>" method="post" style="margin-left: 18em;">
    <div class="form-group">
        <label for="f_name">Prénom</label>
        <input type="text" name="f_name" style="width: 35em;" class="form-control"
            value="<?php echo $row['first_name'] ?>">
    </div>
    <br>
    <div class="form-group">
        <label for="l_name">Nom</label>
        <input type="text" name="l_name" style="width: 35em;" class="form-control"
            value="<?php echo $row['last_name'] ?>">
    </div>
    <br>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="number" name="age" style="width: 35em;" class="form-control" value="<?php echo $row['age'] ?>">
    </div><br>
    <input type="submit" class="btn btn-success" name="update_students" value="Modifier"
        style="float: right; margin-right: 33%;">
</form>
<?php include("footer.php"); ?>