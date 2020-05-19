<!DOCTYPE html>
<html>
<head>
  <title>Chat</title>
  <meta charset="utf-8">
  <meta http-equiv="refresh" content="600" > 

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<style>

body{
    margin:20px;
  
}
.containerx {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;

}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
</style>

<body class="container-fluid">
    <div class="row">
         <h2>ABC Insurance -Bot</h2>
    </div>
  
<br>
<div class="row" >
<?php
$servername = "localhost";
$username = "#####";
$password = "#####";
$dbname = "#####";




// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['submit'])) { 
 $sql = "INSERT INTO chats (chat_msg)
VALUES ('".$_POST['msg']."')";

if ($conn->query($sql) === TRUE) {
    echo "Sended successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
} 

$sql = "SELECT * from chats order by chat_id asc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        ?>
        <div class="col-md-12">
            
            <div class="alert alert-success">
  <p><?=$row["chat_msg"]?></p>
  <span class="time-right"><?=$row["sent_time"]?></span><br/>
</div>
            
            
  
        </div>
        <?php
if($row["cstatus"]=="C"){
    
    ?>
         <div class="col-md-12">
             <div class="alert alert-warning">
  <p><strong>Bot :</strong> <?=$row["chat_reply"]?></p>
 
</div>
             
        </div>
        <?php
    }
    }
}
?>
<div class="container-fluid row">
    <div class="col-md-12 fixed-top position-fixed">
       
            <form class="form-inline"  method="post">
            <div class="form-group">
            <label for="msg">Message:</label>
            <input type="text" class="form-control input-lg" required id="msg" name="msg">
            </div>
            <input type="submit" class="btn btn-success btn-lg" value="Send" name="submit">
            &nbsp;&nbsp;<a href=""><button type="button" class="btn btn-primary btn-lg">Refresh</button></a>
            </form>
    </div>
</div>  
   </div>
   </div>
<br><br><br>
</body>
<script type="text/javascript">
$('html,body').animate({scrollTop: document.body.scrollHeight},"fast");

</script>
</html>