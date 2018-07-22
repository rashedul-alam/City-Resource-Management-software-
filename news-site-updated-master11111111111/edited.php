<?php
    session_start();

    
    require 'config.php';
    $result = mysqli_query($conn, "select * from test where id='".$_SESSION['id']."'");
    if (mysqli_num_rows($result) > 0) 
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $eid=$row["id"];
            $eheading=$row["heading"];
            $esummertext=$row["summertext"];
            $edatetime=$row["datetime"];
        }
    } 
    else 
    {
        echo "0 results";
    }
    $ed1 = "UPDATE test SET heading='".$_POST['heading']."',summertext='".$_POST['newsbody']."' WHERE id='".$_SESSION['id']."';";
    $ed2 = "INSERT INTO edited (id,heading,summertext,datetime)
    VALUES ('".$eid."', '".$eheading."', '".$esummertext."','".$edatetime."')";
    if (mysqli_query($conn, $ed1) && mysqli_query($conn, $ed2))
    {
        header('location:listdata.php');
    } 
    mysqli_close($conn);
?>