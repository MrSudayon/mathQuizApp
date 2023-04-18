<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
    <main>
        
        <body>
            
            <form method="POST" action="<?php htmlspecialchars("PHP_SELF") ?>">

            Headline: <textarea type="text" name="headline:" value="<?php echo $headline; ?>"></textarea> <br>

            <span class="error"><?php echo $headlineErr; ?></span> <Br>
            Context: <textarea type="text" name="context" value="<?php echo $context; ?>"></textarea> <br>

            <span class="error"><?php echo $contextErr; ?></span> <Br>
            Content: <textarea type="text" name="content" value="<?php echo $content; ?>"></textarea> <br>
            <span class="error"><?php echo $contentErr; ?></span> <Br>

            End: <textarea type="text" name="ending" value="<?php echo $ending; ?>"></textarea> <br>
            <span class="ending"><?php echo $endingErr; ?></span> <Br>

            <input type="submit"  value="Submit"style="
                text-align:center;  
                background-color: #007938; /* Green */ 
                border: none; color: white;float: right;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                width: 100%;
                font-size: 16px;
                border-bottom-left-radius: 10px;
                border-bottom-right-radius: 10px;
                border-top-left-radius: 10px;
                height: 55px;
                border-top-right-radius: 10px;"> <br>

            </form>


        </body>
    
    </main>
</html>