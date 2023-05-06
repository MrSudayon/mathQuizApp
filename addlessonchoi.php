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
        background-color: #148110;
        border: none; color: white;
        display: flex;
        justify-content: center;
        text-decoration: none;
        width: 80%;
        font-size: 16px;
        border-radius: 10px;
        padding: 20px;
    }
    .button1 {
        background-color: #148110;
        border: none; color: white;
        display: flex;
        justify-content: center;
        text-decoration: none;
        width: 80%;
        font-size: 16px;
        border-radius: 10px;
        padding: 20px;
        cursor: pointer;
    }
</style>
</head>
<body>
<center>
<form method="get" action="dash.php?q=5">
<br><br>
<button type="submit" class="button1" style="background:var(--cancel-c);">Back</button>
</form>
<main>


<br><br>
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
style="cursor: pointer;">Lessons Archives</button>
</form>


</center>
</body>
</html>