<?php include("header.php") ?>
<?php include("dbcon.php") ?>
<div class="box1">
    <h2>Tout les étudiants</h2>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter un étudiant</button>
</div>
<table class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Age</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM students";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['age'] . "</td>";
            echo "<td><a href='update_page.php?id=$row[id]' class='btn btn-success'>Modifier</a></td>";
            echo "<td><a href='delete_page.php?id=$row[id]' class='btn btn-danger'>Supprimer</a></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<?php
if (isset($_GET['message'])) {
    echo "<h6>" . $_GET['message'] . "</h6>";
}
?>

<?php
if (isset($_GET['insert_msg'])) {
    echo "<h6 style='color:green;'>" . $_GET['insert_msg'] . "</h6>";
}
?>

<?php
if (isset($_GET['update_msg'])) {
    echo "<h6 style='color:blue;'>" . $_GET['update_msg'] . "</h6>";
}
?>

<?php
if (isset($_GET['delete_msg'])) {
    echo "<h6 style='color:red;'>" . $_GET['delete_msg'] . "</h6>";
}
?>

<!-- Modal -->
<form action="insert_data.php" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter des étudiants</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="f_name">Prénom</label>
                        <input type="text" name="f_name" class="form-control">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="l_name">Nom</label>
                        <input type="text" name="l_name" class="form-control">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" name="age" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <input type="submit" class="btn btn-success" name="add_students" value="Ajouter">
                </div>
            </div>
        </div>
    </div>
</form>
<?php include("footer.php"); ?>