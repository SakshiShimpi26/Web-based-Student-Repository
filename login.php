<?php
    $userid=$_POST['uid'];
    $useremail=$_POST['uemail'];
    $userpassword=$_POST['upsw'];

    $conn=new mysqli('localhost','root','','dbms_project');
    if($conn->connect_error){
        die("Failed to Connect : ".$conn->connect_error);
    }
    else{
        $query="insert into user_details values('$userid','$useremail','$userpassword')";
        $result=$conn->query($query);
        if(!$result)
        {
            die("Database Access Failed: ".conn->error);
        }
        else
        {
            echo '<script>alert("REGISTER SUCCESSFULLY......Press Back To Login")</script>';
        }
    }

?>