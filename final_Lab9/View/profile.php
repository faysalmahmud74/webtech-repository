
<?php  
include '../Controller/header.php';
echo "<b>Profile Information:</b> " . '<br><br>';


require_once '../MOdel/db.php';
session_start();
$username = $_SESSION["username"];
//$username = $_POST['username'];
/*
// Execute a query to retrieve data from a table
$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $query);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Display the data in an HTML table

echo "<table border='3'>";
echo "<tr><th>Name</th><th>Phone</th><th>Email</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $row["name"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["email"] . "</td></tr>";
}
echo "</table>";

// Close the connection to the database
mysqli_close($conn);*/

//__________________________AJAX Post method__________________________

$sql = "SELECT name, phone, email FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

//echo json_encode($data);
mysqli_close($conn);
?>

<html><table>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
<?php
echo '<table>';
echo '<thead><tr><th> Name </th><th> Contact Number </th><th> Email </th></tr></thead>';
echo '<tbody>';
foreach ($data as $item) {
    echo '<tr>';
    echo '<td>' . $item['name'] . '</td>';
    echo '<td>' . $item['phone'] . '</td>';
    echo '<td>' . $item['email'] . '</td>';
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';
?>
</table>
<br><br></html>

<p style="color:red;"><b>The view of the information in the table are implemented using Ajax...</b></p>


<?php include '../Controller/footer.php'; ?>