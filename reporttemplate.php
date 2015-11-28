<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script language="JavaScript">
            $(document).ready(function() {
                   var title = {
                  text: 'Monthly Average Temperature'   
               };

               var xAxis = {
                  categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                     'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
               };
               var yAxis = {
                  title: {
                     text: 'Temperature (\xB0C)'
                  },
                  plotLines: [{
                     value: 0,
                     width: 1,
                     color: '#808080'
                  }]
               };   

               var tooltip = {
                  valueSuffix: '\xB0C'
               };

               var legend = {
                  layout: 'vertical',
                  align: 'right',
                  verticalAlign: 'middle',
                  borderWidth: 0
               };

               var series =  [
                  {
                     name: 'Tokyo',
                     data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2,
                        26.5, 23.3, 18.3, 13.9, 9.6]
                  }
               ];

               var json = {};

               json.title = title;

               json.xAxis = xAxis;
               json.yAxis = yAxis;
               json.tooltip = tooltip;
               json.legend = legend;
               json.series = series;

               $('#container').highcharts(json);
            });
            </script>
            <script language="JavaScript">
            $(document).ready(function() {
                   var title = {
                  text: 'Monthly Average Temperature'   
               };

               var xAxis = {
                  categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                     'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
               };
               var yAxis = {
                  title: {
                     text: 'Temperature (\xB0C)'
                  },
                  plotLines: [{
                     value: 0,
                     width: 1,
                     color: '#808080'
                  }]
               };   

               var tooltip = {
                  valueSuffix: '\xB0C'
               };

               var legend = {
                  layout: 'vertical',
                  align: 'right',
                  verticalAlign: 'middle',
                  borderWidth: 0
               };

               var series =  [
                  {
                     name: 'Tokyo',
                     data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2,
                        26.5, 23.3, 18.3, 13.9, 9.6]
                  }
               ];

               var json = {};

               json.title = title;

               json.xAxis = xAxis;
               json.yAxis = yAxis;
               json.tooltip = tooltip;
               json.legend = legend;
               json.series = series;

               $('#container2').highcharts(json);
            });
            </script>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="styles.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<style>
.navbar {
    color: #FFFFFF;
    background-color: #161640;
}

/* OR*/

.nav {
    color: #FFFFFF;
    background-color: #161640;
	
.nav-pills > li > a {
  color: #A7A79Bf;
  font-family: 'Oswald', sans-serif;
  font-size: 0.8em ;
  padding: 1px 1px 1px ;
}
</style>
	
	</head>
  
<body style="background-color:#F2F5A9"><!--changed-->

 <nav class="navbar navbar-default responsive">
		<div class="container-fluid">
    			<div class="navbar-header">
      				<ul class="nav navbar-nav navbar-left"><li><img src="hotelimages/logotra.png" height=50px width=50px align="left"></li>
					</ul>
    			</div>
		<div>

    		
      				<ul class="nav nav-pills navbar-right">
        
        				<li><a href="#"><span class="glyphicon glyphicon-modal-window"><b><font size="4" color="#A7A79B">Rooms</font></b></span></a></li>
        				
					<li><a href="#"><span class="glyphicon glyphicon-thumbs-up"><b><font size="4" color="#A7A79B">AboutUs</font></b></a></li>
      				<li><a href="#"><span class="glyphicon glyphicon-log-out"><b><font size="4" color="#A7A79B">Logout</font></b></a></li></ul>
					
    	</div>
		
		
		
  		</div>
	</nav>
    <div class="container">
        
            <table class="table">
                <colgroup>
                    
                </colgroup>
                <tbody>
                    <tr>
                        <td><div id="container" style=" margin: 0 auto"></div></td>
                
                        <td><div id="container2" style="height:400px ; margin: 0 auto"></div></td>
                    </tr>
                    <tr>
                        <td><div></div></td>
                        <td><div></div></td>
                    </tr>
                </tbody>
            </table>
        
    </div>
    
			
			
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>

</html>
          