<?php include("dbcon.php") ?>
<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM `students` where `id` = '$id'";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query Failed");
    } else {
        header('Location: index.php?delete_msg=You have deleted the record.');
    }
}
?>