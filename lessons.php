<?php
include 'dbConnection.php';
// $con= new mysqli('localhost','root','','quiz')or die("Could not connect to mysql".mysqli_error($con));



$headline = $context = $content = $ending = "";
$headlineErr = $contextErr = $contentErr = $endingErr = "";


#Validating Data
if($_SERVER["REQUEST_METHOD"] == "POST" ){

    if(empty($_POST["headline"])){
        $headlineErr = "headline is required!";
    }else{
        $headline= $_POST["headline"];
    }

    if(empty($_POST["context"])){
        $contextErr = "context is required!";
    }else{
        $context= $_POST["context"];
    }

    if(empty($_POST["content"])){
        $contentErr = "content is required!";
    }else{
        $content= $_POST["content"];
    }

    if(empty($_POST["ending"])){
        $endingErr = "ending is required!";
    }else{
        $ending= $_POST["ending"];
    }

    $query = mysqli_query($con, "INSERT INTO lesson (headline,context,content,ending,isArchive) VALUES ('$headline', '$context', '$content', '$ending',0)");
    echo "<script>window.location.href='lessons.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    
    <title>Document</title>
</head>
<body style="background-color:lightgreen;"><br>

    <CENTER>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <p> Title of lessons</p>
            <textarea type="text" name="headline" value="<?php echo $headline; ?>" class="texta"  required="yes" style="background-color: white; border: none; outline: 2px solid gray; border-radius: 8px; font-size: 14px;"></textarea> <br>
            <span class="error"><?php echo $headlineErr; ?></span> <Br>
            <p> Title of Context</p>
            <textarea type="text" name="context" value="<?php echo $context; ?>" class="texta1"  required="yes" style="background-color: white; border: none; outline: 2px solid gray; border-radius: 8px; font-size: 14px;"></textarea> <br>
            <p> Title of Content</p>
            <span class="error"><?php echo $contextErr; ?></span> <Br><textarea type="text" name="content" value="<?php echo $content; ?>"  class="texta1"  required="yes" style="background-color: white; border: none; outline: 2px solid gray; border-radius: 8px; font-size: 14px;"></textarea> <br>
            <p> Title of End</p>
            <span class="error"><?php echo $contentErr; ?></span> <Br><textarea type="text" name="ending" value="<?php echo $ending; ?>"  class="texta1"  required="yes" style="background-color: white; border: none; outline: 2px solid gray; border-radius: 8px; font-size: 14px;"></textarea> <br>
            <span class="ending"><?php echo $endingErr; ?></span> <Br>

            <input type="submit"  value="Confirm" style="
                text-align:center;  
                background-color: #006aff; /* Green */ 
                border: none; color: white;float: center;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                width: 40%;
                cursor: pointer;
                font-size: 16px;
                border-radius: 10px;
                height: 55px;
                "> <br>
        </form>
        <br>

<center><a href='addlessonchoi.php' style="
        text-align:center;  
        background-color: #006aff; /* Green */ 
        border: none; color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        width: 40%;
        font-size: 16px;
        border-radius: 10px;
        height: 55px;

        ">Disregard</a><br>

    <div class="notif--div" style="height: auto; width: 40%; padding: 5px;
                border-bottom-left-radius: 10px;
                border-bottom-right-radius: 10px;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
                color: black;
                margin-top: 10px;
                margin-bottom: 10px;">
    <h5>Recently Added</h5>
    </div>
</center>


<?php

# View Data in Database
$view_query = mysqli_query($con, "SELECT * FROM lesson WHERE isArchive=0");
echo "<table border='1' style='width:100%;'>";
echo "<tr>  
    <td>Title</td>
    <td>Context</td>
    <td>Content</td>
    <td>Optional</td>
    <td>Closure</td>
    </tr>";

while($row = mysqli_fetch_assoc($view_query)){

    $id = $row["id"];

    $headline = $row["headline"];
    $context = $row["context"];
    $content = $row["content"];
    $id = $row["id"];
    $ending = $row["ending"];

    echo "<tr>  
    <td> ".$headline." </td>
    <td>".$context."</td>
    <td>". $content."</td>
    <td> ".$ending."</td>
    <td>
    <a href='edit.php?id=$id' style='color: green;'><b>Edit</b></a>
    &nbsp;
    <a href='delete.php?id=$id' style='color: red;'><b>Archive</b></a>
    </td>
    </tr>";


}


echo "</table>";
?>

<hr>
</body>
</html>

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