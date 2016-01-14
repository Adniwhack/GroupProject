<?php 
    include 'function.php';
    if (!isset($_SESSION['customer_ID'])){
        
    }
    if($_SERVER['REQUEST_METHOD'] == "POST"){


        $comment = $_POST['comment'];

        $UserID =  $_SESSION['customer_ID'] ;
        $Hotel_ID = $_POST['hotel_id'];

        $rating1=$_POST['rating1'];
        $rating2=$_POST['rating2'];
        $rating3=$_POST['rating3'];
        $rating4=$_POST['rating4'];

        $log= new dbFunction();
        $que = "INSERT INTO comment (HotelID, UserID,Comment,Location,Cleanliness,Service, Rooms) VALUES ('$Hotel_ID', '$UserID', '$comment', $rating1, $rating2, $rating3, $rating4)";
        echo $que;
        $res = mysql_query($que);
        header("location:Hotel-profile.php?hotel_id=$Hotel_ID");

    }



?>