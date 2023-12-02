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
            header('location:index.php?update_msg=You have successfully updated the data.');
        }
    }
}
?>

<form action="update_page.php?id_new=<?php echo $id; ?>" method="post">
    <div class="form-group">
        <label for="f_name">First Name</label>
        <input type="text" name="f_name" class="form-control" placeholder="Enter First Name"
            value="<?php echo $row['first_name'] ?>">
    </div>
    <br>
    <div class="form-group">
        <label for="l_name">Last Name</label>
        <input type="text" name="l_name" class="form-control" placeholder="Enter Last Name"
            value="<?php echo $row['last_name'] ?>">
    </div>
    <br>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="number" name="age" class="form-control" placeholder="Enter Age" value="<?php echo $row['age'] ?>">
    </div>
    <input type="submit" class="btn btn-success" name="update_students" value="UPDATE">
</form>
<?php include("footer.php"); ?>