<?php 
  include "authentication.php" ;
  include "header.php" ;
  if(isset($_SESSION['auth']))
  {
    $_SESSION['status'] = "You are already logged in";
    header('Location: index.php');
    exit(0);
  }
?>
<?php
  if(isset($_SESSION['auth_status']))
  {
    // echo "<h4>".$_SESSION['status']."<h4>";?>
    <div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <strong>Hey!</strong><?php echo $_SESSION['auth_status']; ?>
                </div>
    <?php
    unset($_SESSION['auth_status']);
  }
  ?>
<h2>LOGIN FORM</h2>
<form action="loginform.php" method="POST">
<div class="modal-body">
          <div class="form-group">
            <label for="name">USERNAME</label>
            <input type="text" name="name" placeholder ="Username">
          </div>
          <div class="form-group">
            <label for="Email">EMAIL</label>
            <input type="email" name="email" placeholder ="Email">
          </div>
          <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" name="password" placeholder ="Password">
          </div>
          <button type="submit" class="save" name="loginUser">Login</button>
        </div>
</form>
<?php include "footer.php" ; ?>