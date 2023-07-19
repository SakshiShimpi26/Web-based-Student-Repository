<?php
    $useridlogin=$_POST['id'];
    $userpasswordlogin=$_POST['password'];

    $conn=new mysqli('localhost','root','','dbms_project');
    if($conn->connect_error){
        die("Failed to Connect : ".$conn->connect_error);
    }
    else{
        $stmt=$conn->prepare("select user_id, user_psw from user_details where user_id=?");
        $stmt->bind_param("s",$useridlogin);
        $stmt->execute();
        $stmt_result=$stmt->get_result();
        if($stmt_result->num_rows>0)
        {
            $data=$stmt_result->fetch_assoc();
            if($data['user_psw']==$userpasswordlogin)
            {
                echo '<script>alert("LOGIN Successfull")</script>';
                header("Location: page4.html");
                exit();
            }
            else
            {
                echo '<script>alert("INVALID USERNAME OF PASSWORD")</script>';
            }
        }
        else
        {
            echo '<script>alert("IF YOU ARE A NEW USER.....PLEASE REGISTER!!!!!!")</script>';
        }
    }
?>