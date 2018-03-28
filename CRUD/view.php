<?php 
require('conn.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Records</title>
</head>
<body>
<?php
$result = mysqli_query($conn, "SELECT * FROM customers")
or die(mysqli_error());

//display data in table

echo "<p><b>View All</b> | <a href='view-paginated.php?page=1'>View Paginated</a></p>";

echo "<table border='1' cellpadding='10'>";

echo "<tr> <th>Id</th> <th>Name</th> <th>email</th> <th>contact</th> <th>createdate</th> <td></td> <th></th> </tr>";

while($row = mysqli_fetch_array($result)) {
    echo "<tr>";

    echo '<td' . $row['id'] . '</td>';
    echo '<td' . $row['name'] . '</td>';
    echo '<td' . $row['email'] . '</td>';
    echo '<td' . $row['contact_number'] . '</td>';
    echo '<td' . $row['createdate'] . '</td>';

    echo '<td><a href="edit.php?id='. $row['id'] . ' ">Edit</a></td>';
    echo '<td><a href="edit.php?id='. $row['id'] . ' ">Delete</a></td>';

    echo "</tr>";
}

echo "</table>";

?>
<p><a href="new.php">Add a new record</a></p>

</body>
</html>