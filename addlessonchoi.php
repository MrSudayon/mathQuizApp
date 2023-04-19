<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="font.css">
    <title>Add Lesson Unit</title>

<style> 
    .button {
        background: #148110;
        width: 100%;
        height: 50px;
        padding: 10px 80px;
        margin: 10px 0;
        text-decoration: none;
        cursor: pointer;
        border-radius: 10px;
        color: white;
        -webkit-appearance: none;
    }
</style>
</head>
<body>
<center>
<form method="get" action="dash.php?q=5">
    <button type="submit" class="button" 
                style="
                background:var(--cancel-c);
                width: 20%;
                height: 50px;
                border-bottom-left-radius: 10px;
                cursor: pointer;
                border-bottom-right-radius: 10px;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
                color: white;border: 0;
                -webkit-appearance: none;">Back</button>
</form>
<main><center><br><br>
<form method="get" action="lessons.php">
    <a href="lessons.php?unit=1" class="button">Add Lesson for Unit 1</a>
</form><br><br>

<form method="get" action="lessons.php">
    <a href="lessons.php?unit=2" class="button">Add Lesson for Unit 2</a>
</form><br><br>

<form method="get" action="lessons.php">
    <a href="lessons.php?unit=3" class="button">Add Lesson for Unit 3</a>
</form><br><br>

<form method="get" action="lessons.php">
    <a href="lessons.php?unit=4" class="button">Add Lesson for Unit 4</a>
</form><br><br>

<form method="get"action="archives.php">
    <button type="submit" class="button" 
                style="
                background: #148110;
                width: 20%;
                height: 50px;
                cursor: pointer;
                border-bottom-left-radius: 10px;
                border-bottom-right-radius: 10px;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
                color: white;border: 0;
                -webkit-appearance: none;">Lessons Archives</button>
</form>


</center>
</body>
</html>