<?php
if(isset($_POST['title'])) {
    $data = $_POST["requestor"] . "_" . $_POST["mediaType"] . "_" . $_POST["title"] . "_" . $_POST["season"] . "_" . $_POST["year"] . "_" . $_POST["genre"] . "_" . $_POST["comments"] . "\n";
    $ret = file_put_contents('output.txt', $data, FILE_APPEND | LOCK_EX);
    if($ret === false) {
        die('There was an error writing this file');
    }
    else {
        echo "$ret bytes written to file";
    }
}
else {
   die('no post data to process');
}
?>
