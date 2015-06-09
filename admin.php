<!DOCTYPE html>
<html>
<head>
    
<style>
    
header {
    background-color:grey;
    color:black;
    text-align:center;
    padding:5px;	 
}
    
footer {
    background-color:grey;
    color:white;
    clear:both;
    padding:20px;
    margin-top: bottom;
}
#nav {
    line-height:30px;
    background-color:#eeeeee;
    height:300px;
    width:200px;
    float:left;
    padding:5px;	      
}

ul#menu {
    padding: 0;
}

ul#menu li {
    display: inline;
}

ul#menu li a {
    background-color: black;
    color: white;
    padding:  10px 20px;
    text-decoration: none;
    border-radius: 10px 10px 10px 10px;
}

ul#menu li a:hover {
    background-color: orange;
}

.btn {
    width:100px;
    position:relative;
    line-height:50px;
    align-content: center;
    
}

.notification {
    position:absolute;
    right:-7px;
    top:-7px;
    background-color:red;
    line-height:20px;
    width:20px;
    height:20px;
    border-radius:10px;
}
    </style>
</head>
    
<body>
    <header>
    <h1>Online Hotel Reservation Management System - Administrator Portal</h1>
    </header>
    
    <div id="nav">
        <ul id="menu">
          <li><a href="admin.1.php">Account Management</a></li> <br><br>
       
          <li><a href="/html/default.asp">System Management</a></li> <br><br>
          <li><a href="/html/default.asp">Issue Response</a></li> <br><br>
          <li><a href="/html/default.asp">Message Portal</a></li> <br><br>
        </ul> 
    </div>
 
    <footer>
    </footer>    
</body>
</html>