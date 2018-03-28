<?php 
require('conn.php');

// number of results to show per page

$per_page = 3;
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
<?
// figure  out the total pages in the database
$result = mysqli_query($conn, "SELECT * FROM customers");

$total_results = mysqli_num_rows($result);

$total_pages = ceil($total_results / $per_page);

if(isset($_GET['page']) && is_numeric($_GET['page']))
{
    $show_page = $_GET['page'];

    //make sure the $show_page value is value
    if ($show_page > 0 && $show_page <= $total_pages)
    {
        $start = ($show_page -1) * $per_page;

        $end = $start + $per_page;
    }
    else{
        $start = 0;

        $end = $per_page;
    }
}
else 
{
    // if page isn't set, show first set of results

    $start = 0;

    $end = $per_page;
}

//display pagination

echo "<p><a href='view.php'>View All</a> | <b>View Page:</b>";
for ($i = 1; $i <=$total_pages; $i++) 
{

    echo "<a href='view-paginated.php?page=$i'>$i</a> ";

}
echo "</p>";

echo "<table border='1' cellpadding='10'>";

echo "<tr> <th>Id</th> <th>Name</th> <th>email</th> <th>contact</th> <th>createdate</th> <td></td> <th></th> </tr>";

//loop through results of database query, displaying them in the table

for ($i = $start; $i < $end; $i++)
{
// make sure that PHP doesn't try to sho results that dont exits

if ($i == $total_results){break;}
// echo out the contents of each ro into a table

echo "<tr>";
echo '<td>' . mysqli_result($result, $i, 'id') . '</td>';
echo '<td>' . mysqli_result($result, $i, 'name') . '</td>';
echo '<td>' . mysqli_result($result, $i, 'email') . '</td>';
echo '<td>' . mysqli_result($result, $i, 'contact_number') . '</td>';
echo '<td>' . mysqli_result($result, $i, 'createdate') . '</td>';
echo '<td><a href="edit.php?id= ' . mysqli_result($result, $i, 'id') . ' ">Edit</a></td>';
echo '<td><a href="edit.php?id= ' . mysqli_result($result, $i, 'id') . ' ">Delete</a></td>';

echo "<tr>";
}

echo "</table>";
?>
<p><a href="new.php">Add a new record</a></p>
</body>
</html>