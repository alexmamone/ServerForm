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
//TODO test this string with echo
$maxnum = $conn->query("SELECT maxnumkey from maxnumtable WHERE maxnum")

$sql = "INSERT INTO test.requesttable (requestnum, requestdate, requestor, mediatype, title, tvseason, tvepisode, year, genre, comments, status)
VALUES (4,
\"{$_POST['requestdate']}\",
\"{$_POST['requestor']}\",
\"{$_POST['mediatype']}\",
\"{$_POST['title']}\",
\"{$_POST['season']}\",
\"{$_POST['tvepisode']}\",
\"{$_POST['year']}\",
\"{$_POST['genre']}\",
\"{$_POST['comments']}\",
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
//'2015-12-10 10:34:09'
?>
