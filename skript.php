<?
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webbserverprogrammering";
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

$login_success = false;
$full_name = "";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
if($row["userId"] == $_POST["username"] &&
$row["passwd"] == $_POST["password"]) {
$login_success = true;
$full_name = $row["firstname"] . " " .
$row["lastname"];
                  echo "Välkommen $full_name!";
}
}
} else {
    echo "0 results";
}

if($login_success) {
session_start();
$_SESSION["username"] = $_POST["username"];
}

echo "<form action='/skript.php' method='post'><input type='submit' value='Logga ut' name='logga_ut'><br></form>";

if ($_POST['logga_ut']) {
  session_start();
  session_destroy();
}
echo "<a href='http://localhost/inlamning7/form.html'>Ladda upp fil</a>";

$conn->close();

?>