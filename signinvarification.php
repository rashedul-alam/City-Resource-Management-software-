<?php 
    $flag=0;
    session_start();
    
    $c = oci_connect('system', 'system', 'localhost/orcl');
    $statement = "select * from ACCOUNT";
    $s = oci_parse($c, $statement);
    oci_execute($s);
    while (($row = oci_fetch_assoc($s)) != false) 
    {
        if($row['EMAIL']==$_POST['em'] && $row['PASSWORD']==$_POST['pw'])
        {
            $flag=1;
            $_SESSION['id']=$row['ID'];
            $_SESSION['name']=$row['NAME'];
            $_SESSION['type']=$row['TYPE'];
            $_SESSION['gender']=$row['GENDER'];
            $_SESSION['dob']=$row['DOB'];
            oci_close($c);
            header('Location:index.php');
        }
    }
    if($flag==0)
    {
        $_SESSION['varification']="false";
        header('Location:signin.php');
    }
    oci_close($c);
    
    /*MySql starts here*/
    /*$conn = mysqli_connect("localhost","root","","db");
    if (!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM account";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            if($row['email']==$_POST['em'] && $row['password']==$_POST['pw'])
            {
                $flag=1;
                $_SESSION['id']=$row['id'];
                $_SESSION['name']=$row['name'];
                $_SESSION['type']=$row['type'];
                mysqli_close($conn);   
                header('Location:index.php');
            }
        }
    }
    if($flag==0)
    {
        $_SESSION['varification']="false";
        header('Location:signin.php');
    }
    mysqli_close($conn);  
    */
    /*MySql ends here*/    
?>
