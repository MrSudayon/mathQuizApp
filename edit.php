<?php
include 'dbConnection.php';


$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$get_record = mysqli_query($con, "SELECT * FROM lesson WHERE id='$id' AND isArchive=0");

while($row_edit = mysqli_fetch_assoc($get_record)){

    $id = $row_edit["id"];
    $headline = $row_edit["headline"];
    $context = $row_edit["context"];
    $content = $row_edit["content"];
    $ending = $row_edit["ending"];
}

?>

<form method="POST" action="update1.php">
<center>
<input type="hidden" name="id" value="<?php echo $id; ?>">  
<textarea type="text" name="new_headline" class="texta1" rows="10" cols="90" style="width: 70%;"><?php echo $headline; ?></textarea><BR><BR>
<textarea type="text" name="new_context" class="texta1" rows="10" cols="90" style="width: 70%;"><?php echo $context; ?></textarea><BR><BR>
<textarea type="text" name="new_content" class="texta1" rows="10" cols="90" style="width: 70%;"><?php echo $content; ?></textarea><BR><BR>
<textarea type="text" name="new_ending" class="texta1" rows="10" cols="90" style="width: 70%;"><?php echo $ending; ?></textarea><BR><BR>
<input type="submit"  value="Continue" style="border:6px solid #A2D2FF;
                text-align: center;
                background-color: #125C13; 
                border: none; color: white;
                padding: 15px 32px;
                text-decoration: none;
                font-size: 16px;
                width: 70%;
                cursor: pointer;
                border-radius: 10px;"> <br>
                </center>
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