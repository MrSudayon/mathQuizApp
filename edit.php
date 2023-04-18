<?php
// $con= new mysqli('localhost','root','','quiz')or die("Could not connect to mysql".mysqli_error($con));

$connections = mysqli_connect("mysql.hostinger.ph", "u972052303_olasoivan82342", "Hd4e*ne@M9]u", "u972052303_quiz");
if(mysqli_connect_errno()){
    echo "Failed to connect to my MySQL: " . mysqli_connect_error();
}else{
   #echo 'connected';
}


$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$get_record = mysqli_query($connections, "SELECT * FROM lesson WHERE id='$id' ");

while($row_edit = mysqli_fetch_assoc($get_record)){

    $id = $row_edit["id"];
    $headline = $row_edit["headline"];
    $context = $row_edit["context"];
    $content = $row_edit["content"];
    $ending = $row_edit["ending"];
}

?>

<form method="POST" action="update1.php">

<input type="hidden" name="id" value="<?php echo $id; ?>">  
<textarea type="text" name="new_headline" class="texta1" rows="10" cols="90" style="width: 100%;"><?php echo $headline; ?></textarea><BR><BR>
<textarea type="text" name="new_context" class="texta1" rows="10" cols="90" style="width: 100%;"><?php echo $context; ?></textarea><BR><BR>
<textarea type="text" name="new_content" class="texta1" rows="10" cols="90" style="width: 100%;"><?php echo $content; ?></textarea><BR><BR>
<textarea type="text" name="new_ending" class="texta1" rows="10" cols="90" style="width: 100%;"><?php echo $ending; ?></textarea><BR><BR>
<input type="submit"  value="Continue" style=" border:6px solid #A2D2FF;
                text-align:center;  
                background-color: #125C13; 
                border: none; color: white;float: right;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                font-size: 16px;
                width: 100%;
                border-bottom-left-radius: 10px;
                border-bottom-right-radius: 10px;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;""> <br>
</form>

<style>

.texta{
    background-color: white;
    width: 50%;
    height: 40px;
    font-size: 20px;
}


.texta1{
    background-color: white;
    width: 90%;
    height: 90px;
    font-size: 20px;
}

</style>