<form class="form-horizontal" name="form" action="sign2.php?q=account.php" onSubmit="return validateForm()" method="POST">
                <div class="form-group">
                <input id="username" name="username" placeholder="First name and Last name"a type="text" value="<?php
                if (isset($_GET['username'])){echo $_GET['username'];};?>" style="<?php
                if (isset($_GET['q7'])) echo "border-color:red";?>">
                </div>
                <div class="form-group">
                <label class="col-md-12 control-label" for="password"></label>
                <div class="col-md-12">
                    <input id="password" name="password" placeholder="Enter your password"  type="password">
                    
                </div>
                </div>


                 <div class="form-group">
                <label class="col-md-12 control-label" for=""></label>
                <div class="col-md-12" style="text-align: center"> 
                    <input  type="submit" value="Add Teacher" style="
                            text-align:center;  
                            background-color: #4CAF50; /* Green */
                            border: none;
                            color: white;
                            padding: 15px 32px;
                            text-align: center;
                            text-decoration: none;
                            display: inline-block;
                            font-size: 16px;
                            border-bottom-left-radius: 30px;
                            border-bottom-right-radius: 30px;
                            border-top-left-radius: 30px;
                            border-top-right-radius: 30px;"/>
                </div></form>