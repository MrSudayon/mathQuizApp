
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>QuizMode</title>
</head>
<body>
<?php

                ############################################################### UNIT 4 EZ ##############################################################################################################
                #CHANGE UPDATE3.PHP
                if (@$_GET['q'] == 4 && !(@$_GET['step'])) {
                  echo ' 
                  <div class="">
                  <div class="row">
                  <span class="title1" style="font-size:30px;"><b>Enter Quiz Details <p style="background-color: red; color: white; ">UNIT 4</p></b></span><br /><br />
                   <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update4.php?q=addquiz"  method="POST">
                  <fieldset>
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="name"></label>  
                    <div class="col-md-12">
                    <input id="name" name="name" placeholder="Enter Quiz title" class="form-control input-md" type="text">
                      
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="total"></label>  
                    <div class="col-md-12">
                    <input id="total" name="total" placeholder="Enter total number of questions" class="form-control input-md" type="number">
                      
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="right"></label>  
                    <div class="col-md-12">
                    <input id="right" name="right" placeholder="Enter marks on right answer" class="form-control input-md" min="0" type="number">
                      
                    </div>
                  </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="time"></label>  
                    <div class="col-md-12">
                    <input id="time" name="time" placeholder="Enter time limit for test in minute" class="form-control input-md" min="1" type="number">
                      
                    </div>
                  </div>
                  
                  <br>
                  <div class="form-group">
                    <label class="col-md-12 control-label" for=""></label>
                    <div class="col-md-12"> 
                      <input  type="submit" style="text-align:center;  background-color: #125C13; /* Green */
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
                      border-top-right-radius: 30px;" class="btn btn-primary" value="Continue" class="btn btn-primary"/>
                    </div>
                  </div>
                  <br><br>
                  </fieldset>
                  </form></div>';
              
                      
                  }  if (@$_GET['q'] == 4 && (@$_GET['step']) == 2) {
                    #CHANGE UPDATE3.PHP
                  echo ' 
                  
                  <div class="row medium-8 large-7 columns">
                  <span class="title1" style="font-size:30px;"><b>Enter Question Details <p style="background-color: red; color: white; ">UNIT 4</p> </b></span><br /><br />
                   <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update4.php?q=addqns&n=' . @$_GET['n'] . '&eid=' . @$_GET['eid'] . '&ch=4 "  method="POST">
                  <fieldset>
                  </div>
              
                  ';
                      
                      for ($i = 1; $i <= @$_GET['n']; $i++) {
                          echo '<b>Question number&nbsp;' . $i . '&nbsp;:</><br />
                          <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-12 control-label" for="qns' . $i . ' "></label>  
                          <div class="col-md-12">
                          <textarea rows="3" cols="5" name="qns' . $i . '" class="form-control" placeholder="Write question number ' . $i . ' here..."></textarea>  
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-md-12 control-label" for="' . $i . '1"></label>  
                          <div class="col-md-12">
                          <input id="' . $i . '1" name="' . $i . '1" placeholder="Enter option a" class="form-control input-md" type="text">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-12 control-label" for="' . $i . '2"></label>  
                              <div class="col-md-12">
                              <input id="' . $i . '2" name="' . $i . '2" placeholder="Enter option b" class="form-control input-md" type="text">
                                
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-12 control-label" for="' . $i . '3"></label>  
                              <div class="col-md-12">
                              <input id="' . $i . '3" name="' . $i . '3" placeholder="Enter option c" class="form-control input-md" type="text">
                                
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-12 control-label" for="' . $i . '4"></label>  
                              <div class="col-md-12">
                              <input id="' . $i . '4" name="' . $i . '4" placeholder="Enter option d" class="form-control input-md" type="text">
                                
                              </div>
                            </div>
                            <br />
                            <b>Correct answer</b>:<br />
                            <select id="ans' . $i . '" name="ans' . $i . '" placeholder="Choose correct answer " class="form-control input-md" >
                              <option value="a">Select answer for question ' . $i . '</option>
                              <option value="a">option a</option>
                              <option value="b">option b</option>
                              <option value="c">option c</option>
                              <option value="d">option d</option> </select><br /><br />';
                                }
                      
                      echo '
                      <br>
                      <input  type="submit" style="text-align:center;  background-color: #125C13; /* Green */
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
                      border-top-right-radius: 30px;"  value="Submit"/>
                    
              
                      <br><br>
                  </div>
                  </fieldset>
                  </form></div>
                    </div>
              
              
              ';
              }

?>
</body>
</html>