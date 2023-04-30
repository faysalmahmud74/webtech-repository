<?php  
include '../Controller/header.php';
echo "<h2>Profile Information:</h2> " . '<br><br>';


require_once '../MOdel/db.php';
session_start();
$username = $_SESSION["username"];
//$username = $_POST['username'];

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
mysqli_close($conn);
?>
<br><br>
<a href="../View/home.php">Back</a>
<?php include '../Controller/footer.php'; ?>