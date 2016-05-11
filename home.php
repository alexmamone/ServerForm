<!--Server Home v.1.2 5-11-2016-->

<!DOCTYPE html>
<html>
    <head>
    <title>
			Server Requests
		</title>
		<style>
			table {
			width: 100%;
			border: 1px solid black;
			border-collapse: collapse;
			}

			th, td {
			border: 1px solid black;
			}
		</style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script type="text/javascript">
      function getFileText(){
        $.get("output.txt", function(data){
          var reqArr = data.split(/\n/);
          var HTMLText = '<tr><th style="width: 10%;">Requestor</th><th style="width: 35%">Title</th><th style="width: 10%;">Media Type</th><th style="width: 10%;">Date Requested</th><th style="width: 35%">Comments</th><th>Button</th></tr>';

          for (i = 0; i < reqArr.length; i++) {
            var reqSubArr = reqArr[i].split("_");
                if(reqSubArr != ''){
                HTMLText += '<tr><td>'+reqSubArr[1]+'</td><td>'+reqSubArr[3]+'</td><td>'+reqSubArr[2]+'</td><td>'+reqSubArr[0]+'</td><td>'+reqSubArr[7]+'</td><td><input type="button" id="deleteButton'+[i]+'" name="deleteButton" value="?" onclick="q()"/></td></tr>';
              }
          }

          $('#pendingReq').html(HTMLText);

      });
      }

      function q(){
        alert('???');
      }

      //getFileText();


		</script>
	</head>
	<body>



		<fieldset>
			<legend>Pending Requests</legend>
			<div>Below are the pending requests for the server.</div>
			<table id="pendingReq" name="pendingReq">
        <tr>
          <th style="width: 10%;">Requestor</th>
          <th style="width: 35%">Title</th>
          <th style="width: 10%;">Media Type</th>
          <th style="width: 10%;">Date Requested</th>
          <th style="width: 35%">Comments</th>
          <th>Button</th>
        </tr>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "password";
        $dbname = "test";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * from requesttable";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
              //echo "results";
             // output data of each row
             while($row = $result->fetch_assoc()) {
                 //echo "<br> id: ". $row["requestnum"]. " - Name: ". $row["requestor"]. " " . $row["status"] . "<br>";
                 echo '<tr><td>'. $row["requestor"].'</td><td>'. $row["title"].'</td><td>'. $row["mediatype"].'</td><td>'. $row["requestdate"].'</td><td>'. $row["comments"].'</td><td><input type="button" id="deleteButton'. $row["requestnum"].'" name="deleteButton" value="?" onclick="q()"/></td></tr>';
             }
        } else {
             echo "0 results";
        }

        $conn->close();
        ?>
			</table>
		</fieldset>
		<br>
		<input id="submitNew" name="submitNew" type="button" value="New Request" onclick="location.href='serverForm.html'" />
	</body>
</html>
