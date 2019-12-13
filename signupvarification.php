<?php
    $username=test_input($_POST['username']);
    $password=test_input($_POST['pass']);
    $email=test_input($_POST['email']);
    $dob=test_input($_POST['dob']);
    $address=test_input($_POST['address']);
    $gender=test_input($_POST['gender']);
    $phoneno=test_input($_POST['phoneno']);
    $avatar=test_input($_POST['avatar']);
    $type=test_input($_POST['type']);

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    
    $newdob="";
    $newdob.=$dob[8].$dob[9]."-";

    if($dob[5]=="0" && $dob[6]=="1")
    {
        $newdob.="JAN";
    }
    if($dob[5]=="0" && $dob[6]=="2")
    {
        $newdob.="FEB";
    }
    if($dob[5]=="0" && $dob[6]=="3")
    {
        $newdob.="MAR";
    }
    if($dob[5]=="0" && $dob[6]=="4")
    {
        $newdob.="APR";
    }
    if($dob[5]=="0" && $dob[6]=="5")
    {
        $newdob.="MAY";
    }
    if($dob[5]=="0" && $dob[6]=="6")
    {
        $newdob.="JUN";
    }
    if($dob[5]=="0" && $dob[6]=="7")
    {
        $newdob.="JUL";
    }
    if($dob[5]=="0" && $dob[6]=="8")
    {
        $newdob.="AUG";
    }
    if($dob[5]=="0" && $dob[6]=="9")
    {
        $newdob.="SEP";
    }
    if($dob[5]=="1" && $dob[6]=="0")
    {
        $newdob.="OCT";
    }
    if($dob[5]=="1" && $dob[6]=="1")
    {
        $newdob.="NOV";
    }
    if($dob[5]=="1" && $dob[6]=="2")
    {
        $newdob.="DEC";
    }
    $newdob.="-".$dob[0].$dob[1].$dob[2].$dob[3];

    $db = oci_connect('system', 'system', 'localhost/orcl');
    $sql='INSERT INTO ACCOUNT(ID,EMAIL,NAME,PASSWORD,ADDRESS,GENDER,DOB,PHONENO,TYPE) '.
    'VALUES (seq_accountid.nextval,:email,:username,:password,:address,:gender,:newdob,:phoneno,:type)';

    $compiled = oci_parse($db, $sql);
    
    oci_bind_by_name($compiled, ':email', $email);
    oci_bind_by_name($compiled, ':username', $username);
    oci_bind_by_name($compiled, ':password', $password);
    oci_bind_by_name($compiled, ':address', $address);
    oci_bind_by_name($compiled, ':gender', $gender);
    oci_bind_by_name($compiled, ':newdob', $newdob);
    oci_bind_by_name($compiled, ':phoneno', $phoneno);
    oci_bind_by_name($compiled, ':type', $type);

    if(oci_execute($compiled))
    {
        oci_close($db);
        header('Location:signin.php');
    }
    else
    {
        oci_rollback($db);
        $error=oci_error($sql);
        echo $error['message'];
        oci_close($db);
    }
    /*if($execute)
    {
        oci_commit($c);
        oci_close($c);
        header('Location:signin.php');
    }
    else
    {
        oci_rollback($c);
        $error=oci_error($statement);
        echo $error['message'];
        oci_close($c);
    } */
    
    /*MYSQL starts here*/
    /*
    $conn = mysqli_connect("localhost","root","","db");
    if (!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "INSERT INTO `account` (`id`, `email`, `name`, `password`, `address`, `avatar`, `gender`, `dob`, `phoneno`, `type`) 
    VALUES (NULL, '".$email."', '".$username."', '".$password."', '".$address."', NULL, '".$gender."', '".$dob."', '".$phoneno."', '".$type."');";

    if (mysqli_query($conn, $sql))
    {
        mysqli_close($conn);
        header('Location:signin.php');
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
    */
    /*MYSQL ends here*/
?>