<?php
session_start();
$con = mysqli_connect("localhost","root","","car");
if(!$con){
    die("Connection Failed: " . mysqli_connect_error());
}
if(isset($_POST['signup']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    
    if(!empty($name) && !empty($email) && !empty($mobile) && !empty($password) )
    {
        $sql = "select * from signups where email='$email'";
        $res = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($res);
        if($row)
        {
            echo "email already alvailable in db";
            require 'index.php';
        }
        else
        {
            $sql = "insert into signups (name,email,mobile,password) values('$name','$email','$mobile','$password')";
            $res = mysqli_query($con,$sql);
            if($res)
            {
                echo "Successfully Inserted data !!";
                require 'index.php';
            }
            else 
            {
                echo mysqli_error($con);
            }
        }
    }
    else
    {
        echo "All fields are required to fill";
        require 'index.php';
    }

}
elseif(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    if((!empty($email) && !empty($password)))
    {
        $sql = "select * from signups where email='$email'";
        $res = mysqli_query($con, $sql); 
        $row = mysqli_fetch_array($res);
        if($row>0)
        {
            $sql = "select * from signups where email='$email'and password='$password'";
            $res = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($res);

                $_SESSION['id'] = $row['id'];
                $_SESSION['user_name'] = $row['name'];
                $_SESSION['user_email'] = $row['email'];
                
            if(!empty($_SESSION['id']))
            {
                // echo "login";
                header("Location: carshow.php");
                exit;
            }
            else
            {
                echo "Password is wrong";
                require 'login.php';
            }
        }
        else
        {
            echo "Email is not available in db";
            require 'login.php';
        }
    }
    else 
    {
        echo "Please fill all fields";
        require 'login.php';
    }
}
elseif(isset($_POST['book']))
{
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $days = $_POST['days'];
    
    $car_id = $_SESSION['car_id'];
    $sql = "INSERT INTO bookings (name, phone, car_id, days)
            VALUES ('$name','$phone','$car_id','$days')";

    if(mysqli_query($con, $sql)){
        
        $_SESSION['name'] = $name;
        $_SESSION['days'] = $days;
        $_SESSION['return'] = $return;
        $_SESSION['car_id'] = $car_id;
        $_SESSION['booking_id'] = $booking_id;
        

        header("Location: success.php");
        exit;
    } else {
        echo mysqli_error($con);
    }
}
elseif(isset($_GET['delete']))
{
    $id = $_GET['delete'];
    $sql = "DELETE FROM bookings WHERE id='$id'";
    mysqli_query($con,$sql );

    header("Location: carshow.php");
    exit;
}
?>