
<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO test.requesttable (requestnum, requestdate, requestor, mediatype, title, tvseason, tvepisode, year, genre, comments, status)
VALUES (4,
'2015-12-10 10:34:09',
'Scott',
'Movie',
'Jaws',
'',
'',
{$_POST['year']},
'',
'Comments',
0)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
//header('Location: home.html');
//exit;
//{$_POST['comments']}
?>
