<?php
if (isset($_POST['add_students'])) {
    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $age = $_POST['age'];

    if (($fname == "" || empty($fname)) || ($lname == "" || empty($lname)) || ($age == "" || empty($age))) {
        header('location:index.php?message=Remplir tout les champs svp!');
    } else {
        // Établir une connexion à la base de données
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'crud_operation';

        $conn = mysqli_connect($host, $username, $password, $database);
        if (!$conn) {
            die("Failed to connect to MySQL: " . mysqli_connect_error());
        }

        // Insertion dans la base de données
        $query = "INSERT INTO `students` (`first_name`, `last_name`, `age`) values ('$fname', '$lname', '$age')";

        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Query failed");
        } else {
            header('location:index.php?insert_msg=Etudiant ajouté avec succès');
        }
    }
}
?>