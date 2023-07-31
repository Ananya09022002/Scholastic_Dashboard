<?php 
  session_start();
  include('../database/dbcon.php');

if(isset($_POST['loginUser']))
{
    $user_name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $log_query = "SELECT * FROM user WHERE NAME='$user_name' AND EMAIL='$email' AND PASSWORD='$password' LIMIT 1";
    $log_query_run = mysqli_query($con, $log_query);

    if(mysqli_num_rows($log_query_run) > 0)
    {
        foreach($log_query_run as $row){
            $user_id = $row['ID'];
            $user_name = $row['NAME'];
            $user_email = $row['EMAIL'];
        }

        $_SESSION['auth'] = true;
        $_SESSION['auth_user'] = [
            'user_id' => $user_id,
            'user_name' => $user_name,
            'user_email' => $user_email
        ];

        $_SESSION['status'] = "LOGIN SUCCESSFUL";
        header('Location: index.php');

    }
}
else{
    $_SESSION['status'] = "ACESS DENIED";
    header('Location: login.php');
}
?>