<?php
     $selected = $_POST['semesters'];  

    $conn=new mysqli('localhost','root','','dbms_project');
    if($conn->connect_error){
        die("Failed to Connect : ".$conn->connect_error);
    }
    else{
        $stmt=$conn->prepare("select * from subjects where sem=?");
        $stmt->bind_param("s",$selected);
        $stmt->execute();
        $stmt_result=$stmt->get_result();
        if($stmt_result->num_rows>0)
        {
            $data=$stmt_result->fetch_assoc();
            if($data['sem']==$selected)
            {
                echo($data['sub1']);
                echo("<br>");
                echo($data['sub2']);
                echo("<br>");
                echo($data['sub3']);
                echo("<br>");
                echo($data['sub4']);
                echo("<br>");
                echo($data['sub5']);

                header("Location: page5.html");
                exit();
            }
            else
            {
                echo '<script>alert("SELECT VALID SEMESTER")</script>';
            }
        }
    }

?>