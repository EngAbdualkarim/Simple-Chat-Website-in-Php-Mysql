

<?php

include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Website</title>
    <link rel="stylesheet" href="style.css">

    <script>
        function aj(){
        var request=new XMLHttpRequest();
        request.onreadystatechange=function(){
if(request.readyState==4 && request.status==200){
    document.getElementById("chat").innerHTML=request.responseText;
}
        }
        request.open("GET","chat.php",true);
        request.send();
        }

        setInterval(function(){aj()},1000);
    </script>
</head>
<body onload="aj();">

<div  id="container">
<div id="chatbox">

<div id="chat">

</div>

</div>
<form action="index.php" method="post">
<input type="text"  name="name" placeholder="Enter your name">
<textarea name="msg"  placeholder="Enter your message"></textarea>
<input type="submit" value="Send" name="submit">

</form>
<?php
if(isset($_POST['submit'])){
$names=$_POST['name'];
$message=$_POST['msg'];

$insert="insert into chat (name,msg) values('$names','$message')";
$run_insert=mysqli_query($con,$insert);

header('location:index.php');
}

?>

</div>

</body>
</html>