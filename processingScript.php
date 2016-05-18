<!--Proc Script v.1.3 5-18-2016-->
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


$sql = "INSERT INTO test.requesttable (requestnum, requestdate, requestor, mediatype, title, artist, author, tvseason, tvepisode, year, genre, comments, status)
SELECT numkeyval,
\"{$_POST['dateReq']}\",
\"{$_POST['requestor']}\",
\"{$_POST['mediaType']}\",
\"{$_POST['title']}\",
\"{$_POST['artist']}\",
\"{$_POST['author']}\",
\"{$_POST['season']}\",
\"{$_POST['episode']}\",
\"{$_POST['year']}\",
\"{$_POST['genre']}\",
\"{$_POST['comments']}\",
0
from
test.numkey
where
numkeynum = 1";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$update = "update test.numkey set numkeyval = numkeyval + 1";

if ($conn->query($update) === TRUE) {
    echo "Update Successful";
} else {
    echo "Error: " . $update . "<br>" . $conn->error;
}

$conn->close();

// the message
$msg = "This is a test";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("serverform@gamer3.us.to","Test Subject",$msg);


header('Location: home.php');
exit;
?>
