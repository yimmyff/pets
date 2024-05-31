<?php include('../config/database.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>pets | list users </title>
</head>
<body>
    <center> <h1> list users </h1></center>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Fullname</th>
                <th>Email</th>
                <th>Status</th>
                <th>Foto</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query_users = "SELECT * FROM users";
                $result = pg_query($conn, $query_users);
                while ($row = pg_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['fullname'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td><img src='images/programmer_560277.png' width='30'></td>";
                    echo "<td>";
                    echo "<a href='#'><img src='images/pencil_2280532.png' width='20'></a>";
                    echo "<a href='#' onclick='confirmDelete(\"{$row['fullname']}\", {$row['id']});'><img src='images/bin_2211411.png' width='20'></a>";
                    echo "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

    <script>
        
        function confirmDelete(fullname, id) {
            if (confirm("¿Seguro que quieres eliminar al usuario '" + fullname + "'?")) {
               
                window.location.href = "delete_user.php?id=" + id;
            }
        }
    </script>
</body>
</html>

