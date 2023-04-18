<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
<link rel="icon" href="images/school.png" type="image/icon" sizes="16x16">

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  </head>
  <body>




    <!-- We can now combine rows and columns when there's only one column in that row -->
    <div class="row medium-8 large-7 columns">
      <div class="blog-post">
        <br>
        <center> <img src="images/school.png" width="350" height="400"></center>

      <br>
      
        <form class="form-horizontal" name="form" action="sign.php?q=account.php?q=1" onSubmit="return validateForm()" method="POST">
        <fieldset>

            <div class="form-group">
            <label for="name"></label>  
            <div class="col-md-12">
            <div id="errormsg"style="text-align:center;"><br>
                </div>
                <?php

            if (@$_GET['q7']) { echo '<p style="color:red;font-size:1px;">' . @$_GET['q7']; }
            ?></div>
            <div class="form-group">
            <input id="name" name="name" placeholder="Enter your name" autocomplete="off"  type="text" value="<?php if (isset($_GET['name'])){echo $_GET['name'];}?>">
            
            </div>
            </div>

            

        

                <div class="form-group">
                <input id="username" name="username" placeholder="Choose a username" autocomplete="off" type="text" value="<?php
                if (isset($_GET['username'])){echo $_GET['username'];};?>" style="<?php
                if (isset($_GET['q7'])) echo "border-color:red";?>">
                </div>

                <div class="form-group">
                <label class="col-md-12 control-label" for="phno"></label>  
                <div class="col-md-12"><input id="phno" name="phno" placeholder="Contact Number"  type="number" value="<?php
                if (isset($_GET['phno'])) { echo $_GET['phno'];} ?>">

                <div class="form-group">
                <label class="col-md-12 control-label" for="password"></label>
                <div class="col-md-12">
                    <input id="password" name="password" placeholder="Enter your password"  type="password">
                    
                </div>
                </div>

                <div class="form-group">
                <label class="col-md-12control-label" for="cpassword"></label>
                <div class="col-md-12">
                    <input id="cpassword" name="cpassword" placeholder="Confirm Password"  type="password">
                </div>
                </div>

                <div class="form-group">

              <select id="gender" name="gender" placeholder="Select your gender">
              <option>Select Gender</option>
              <option value="M">Male</option>
              <option value="F">Female</option>
              </select>
              </div>
              </div>

              <div class="form-group">
              <label class="col-md-12 control-label" for="branch"></label>
              <div class="col-md-12">
                  <select id="branch" name="branch" placeholder="Math" >
                    

              <option value="MATH" <?php
              if (isset($_GET['branch']))
              {if ($_GET['branch'] == "MATH")
              echo "selected";
              }

              ?>>Choose your Course</option>
              <option value="MATH" <?php
              if (isset($_GET['branch']))
              {if ($_GET['branch'] == "MATH")
                  echo "selected";
              }

              ?>>Math</option>
              <option value="MATH" <?php
              if (isset($_GET['branch']))
              {if ($_GET['branch'] == "MATH")
                  echo "selected";
              }


            ?>></option></select>
            </input>
            </div>

                <div class="form-group">
                <label class="col-md-12 control-label" for=""></label>
                <div class="col-md-12" style="text-align: center"> 
                <input type="submit" name="regs" value="Register Now" 
                style="border:6px solid #18ab29;
                border:6px solid #18ab29;
                text-align:center;  
                background-color: #148110; 
                border: none; color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
             
                width: 100%;
                font-size: 16px;
                border-bottom-left-radius: 10px;
                border-bottom-right-radius: 10px;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;"/>
                </div>
                <br>

                <center>
                <p>Already have an account? 
                <a href="index.php" style="
                border:6px solid #18ab29;
                text-align:center;  
                border: none; color: blue;
                padding: 0 10px;
                text-decoration: none;
             
                width: 100%;">Sign In!</a></p></center>
                <br>

            </div>
            
                </fieldset>
                </form>

            </div>
        </div>
      </div>


    </div>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>



