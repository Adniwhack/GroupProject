<?php



?>


<!DOCTYPE html>
<html lang="en">
    <!--  Adding bootstrap !-->
  <head>
   
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
      
      <style>
      .captcha, #recaptcha_image, #recaptcha_image img {
    width:100% !important;
}
      
      </style>
    </head>
    

    <body>
    
    <!-- Navigation bar which is in the top of the page -->
                <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
            
			<nav class="navbar navbar-default" role="navigation" >
                

				<div class="navbar-header">
					 <button type="button" class="btn btn-primary btn-md">
                        
                          
          <span class="glyphicon glyphicon-home"></span> Home
        </button>
                    
                    <button type="button" class="btn btn-primary btn-md">
                         
          <span class="glyphicon glyphicon-chevron-left"></span> Back
        </button>
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
<span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button>                 
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    
					
                    
                        				
                    <ul class="nav navbar-nav navbar-right">
						<button type="submit" class="btn btn-primary btn-md">
							<span class=" glyphicon glyphicon-log-in"></span> Login
						</button>
                        <button type="submit" class="btn btn-primary btn-md">
                            <span class=" glyphicon glyphicon-thumbs-up"></span> About us
							
						</button>
						
					</ul>
				</div>
				
			</nav>
    
    <div class="container-fluid">
            
	
                <!--Create account for hotel -->
				<div class="col-md-6">
                    <!--  Create the form horizontally !-->
                    <br></br>
                    <form class="form-horizontal col-md-10 col-md-offset-1" role="form" align = "left" >
					   <legend>Enter your registration details here</legend>
                        
                        <div class="form-group" align = "center">
							<label for="inputName" class="col-md-4 control-label">
								First name 
							</label>
                            <div class="col-md-8">
								<input type="inputName" class="form-control" id="inputName" />
							</div>
						</div>
                        
                        <div class="form-group" align = "center">
							<label for="inputName" class="col-md-4 control-label">
								Last name 
							</label>
                            <div class="col-md-8">
								<input type="inputName" class="form-control" id="inputName" />
							</div>
						</div>
                        
                        <div class="form-group" align = "center">
							<label for="inputName" class="col-md-4 control-label" >
								Gender 
							</label>
                            <div class="dropdown">
                                  <button class="btn btn-default  dropdown-toggle" type="button" data-toggle="dropdown">   Gender  
                                  <span class="caret"></span></button>
                                  <ul class="dropdown-menu dropdown-menu-right" >
                                    <li><a href="#">Male</a></li>
                                    <li><a href="#">Female</a></li>
                                    
                                  </ul>
                                </div>
						</div>
                        
                        <div class="form-group" align = "center">
							<label for="inputName" class="col-md-4 control-label">
								Date of birth 
							</label>
                            <div class="col-md-8">
								
                        <input type="date" id="for" class="form-control">
							</div>
						</div>
                      
                        <div class="form-group">
							<label for="inputEmail3" class="col-md-4 control-label" align = "right">
								Email ID
							</label>
							
                            <div class="col-md-8">
								<input type="email" class="form-control" id="inputEmail3" placeholder="abc@xyz.com" />
							</div>
						</div>
                        
                        <div class="form-group">
							<label for="inputAddress" class="col-md-4 control-label">
								Address
							</label>
							
                            <div class="col-md-8">
								<input type="inputAddress" class="form-control" id="inputAddress" placeholder="No 10, Down Street, Colombo 10" />
							</div>
						</div>
                        
                        <div class="form-group" align = "center">
							<label for="inputName" class="col-md-4 control-label">
								Gender 
							</label>
                    
                            <div class="dropdown">
                                  <button class="btn btn-default  dropdown-toggle btn-md"  type="button" data-toggle="dropdown">   City  
                                  <span class="caret"></span></button>
                                  <ul class="dropdown-menu dropdown-menu-right" >
                                    <li><a href="#">HTML</a></li>
                                    <li><a href="#">CSS</a></li>
                                    <li><a href="#">JavaScript</a></li>
                                  </ul>
                                </div>
						</div>
                        
                        <div class="form-group">
							<label for="inputNumber" class="col-md-4 control-label">
								Contact No
							</label>
							
                            <div class="col-md-8">
								<input type="inputNumber" class="form-control" id="inputNumber" placeholder="00947777123456" />
							</div>
						</div>
                        <div class="form-group" align = "center">
							<label for="inputName" class="col-md-4 control-label">
								User name 
							</label>
                            <div class="col-md-8">
								<input type="inputName" class="form-control" id="inputName" />
							</div>
						</div>
                        <div class="form-group" >
							<label for="inputPassword" class="col-md-4 control-label">
								Password 
							</label>
                            <div class="col-md-8">
								<input type="inputPassword" class="form-control" id="inputName" />
							</div>
						</div>
                        
                        <div class="form-group" >
                            
							<label for="inputPassword" class="col-md-4 control-label">
								Confirm password 
							</label>
                            <div class="col-md-8">
								<input type="inputPassword" class="form-control" id="inputName" />
							</div>
                            
						</div>
                        
                        <p>    I have read and accept the terms of the<a href="#" role="button" class="btn popovers" data-toggle="popover" title="" data-content="test content <a href='' title='test add link'>link on content</a>"data-original-title="test title">User Agreement</a></p>
                        
                                        <div class="form-group">
                    <div class="captcha">
                        <div id="recaptcha_image"></div>
                    </div>
                </div>
                                    <div class="form-group">
                <div class="recaptcha_only_if_image">Enter the words above</div>
                <div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
                <div class="input-group">
                    <input type="text" id="recaptcha_response_field" name="recaptcha_response_field" class="form-control input-lg" /> <a class="btn btn-default input-group-addon" href="javascript:Recaptcha.reload()"><span class="icon-refresh"></span></a>
             <a class="btn btn-default input-group-addon recaptcha_only_if_image" href="javascript:Recaptcha.switch_type('audio')"><span class="icon-volume-up"></span></a>
             <a class="btn btn-default input-group-addon recaptcha_only_if_audio" href="javascript:Recaptcha.switch_type('image')"><span class="icon-picture"></span></a>

                </div>
                <script>
                    var RecaptchaOptions = {
                        theme: 'custom',
                        custom_theme_widget: 'recaptcha_widget'
                    };
                </script>
                <script type="text/javascript" src="http://www.google.com/recaptcha/api/challenge?k=6LcrK9cSAAAAALEcjG9gTRPbeA0yAVsKd8sBpFpR"></script>
                <noscript>
                    <iframe src="http://www.google.com/recaptcha/api/noscript?k=6LcrK9cSAAAAALEcjG9gTRPbeA0yAVsKd8sBpFpR" height="300" width="500" frameborder="0"></iframe>
                    <br/>
                    <textarea name="recaptcha_challenge_field" rows="3" cols="40"></textarea>
                    <input type="hidden" name="recaptcha_response_field" value="manual_challenge" />
                </noscript>
            </div>
                        
                        
                        <div class="form-group" align = "right">
							<div class="col-sm-offset-2 col-sm-10">
                                
								<button type="Next" class="btn btn-default">
                                    
									Next
								</button>
                                
                                
							</div>
						</div>
                        

                        
                        
                        </div>
            </div>
        </div>
                    </div></div>
                    </form>
    
    </body>

</html>