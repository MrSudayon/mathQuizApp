<?php
include_once 'dbConnection.php';
ob_start();

$username = $_POST['username'];
$password = $_POST['password'];

$q3 = mysqli_query($con, "INSERT INTO admin VALUES  ('$username', '$password')");
if ($q3) {

    echo 'success';
} else {
    
}
ob_end_flush();
?>

<form class="form-horizontal" action="login.php?q=index.php" method="POST">
          <fieldset>
          <div class="form-group">
            <label for="username"></label>  
            <input id="username" name="username" placeholder="Username" type="TEXT" required="yes">
            </div>
          </div>
          <div class="form-group">
            <label for="password"></label>
              <input id="password" name="password" placeholder="Enter your Password" type="password" required="yes">
              <!-- <a >Register Account</a> --> </div>

          <div class="form-group">
      
          <button type="submit" style="
                text-align:center;  
                background-color: #4CAF50; /* Green */ 
                border: none; color: white;float: right;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                width: 100%;
                font-size: 16px;
                border-bottom-left-radius: 30px;
                border-bottom-right-radius: 30px;
                border-top-left-radius: 30px;
                border-top-right-radius: 30px;"
                >Log in</button>
    

        </div><br><br><br> 
        <h5 style="color: #2c3e50">Don't have an account?</h5>
        <br>
        <a href="register.php" style="
                border:6px solid #18ab29;
                border: dotted;
                text-align:center;  
                background-color: #2c3e50; /* Green */ 
                border: none; color: white;float: right;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                width: 100%;
                font-size: 16px;
                border-bottom-left-radius: 30px;
                border-bottom-right-radius: 30px;
                border-top-left-radius: 30px;
                border-top-right-radius: 30px;"
                >Register</a>
        </div>

              </fieldset>
          </form>