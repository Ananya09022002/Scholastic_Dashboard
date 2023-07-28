<?php
include('authentication.php');
include('dbcon.php');

if(isset($_POST['logoutUser']))
{
    session_destroy();
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);

    $_SESSION['status'] = "Logged out succesfully";
    header('Location: login.php');
    exit(0);
}
if(isset($_POST['addUser']))
{
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $branch = $_POST['branch'];
    $password = $_POST['password'];

    $user_query = "INSERT INTO user (ROLL_NUM,NAME,PHONE_NUM,EMAIL,BRANCH,PASSWORD) VALUE ('$roll','$name','$phone','$email','$branch','$password')";
    $user_query_run = mysqli_query($con, $user_query);

    if($user_query_run)
    {
        $_SESSION['status'] = "User Added Successfully";
        header("Location: table.php");
    }
    else
    {
        $_SESSION['status'] = "User Failed";
        header("Location: table.php");
    }
}

if(isset($_POST['updateUser']))
{
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $branch = $_POST['branch'];
    $password = $_POST['password'];

    $query = "UPDATE user SET NAME='$name', ROLL_NUM='$roll', PHONE_NUM='$phone', EMAIL='$email', BRANCH='$branch' ,PASSWORD='$password' WHERE ID='$user_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "User Updated Successfully";
        header("Location: table.php");
    }
    else
    {
        $_SESSION['status'] = "User Updation Failed";
        header("Location: table.php");
    }
}

if(isset($_POST['deleteUser']))
{
    $user_id = $_POST['user_id'];

    $query_del = "DELETE FROM user WHERE ID = '$user_id' ";
    $query_del_run = mysqli_query($con,$query_del);

    if($query_del_run)
    {
        $_SESSION['status'] = "User Deleted Successfully";
        header("Location: table.php");
    }
    else
    {
        $_SESSION['status'] = "User DeletionFailed";
        header("Location: table.php");
    }
}
?>