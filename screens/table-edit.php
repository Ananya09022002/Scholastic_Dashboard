<?php 
  include "../auth/authentication.php" ;
  include "../include/header.php" ;
  include "../include/sidebar.php" ; 
   ?>
  <div class="container">
  <?php include "../include/topbar.php" ;
  include "../database/dbcon.php" 
  ?>
  <div class="content">
  <?php
  if(isset($_SESSION['status']))
  {
    echo "<h4>".$_SESSION['status']."<h4>";
    unset($_SESSION['status']);
  }
  ?>
  <h2>Edit Student Details</h2>
  <form action="form.php" method="POST">
        <div class="modal-body">
  <?php
  if(isset($_GET['user_id']))
  {
    $user_id = $_GET['user_id'];
    $query = "SELECT * FROM user WHERE ID = '$user_id' LIMIT 1 ";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) > 0)
    {
        foreach($query_run as $row)
        {
            ?>
            <input type="hidden" name="user_id" value= "<?php echo $row['ID']?>" >
            <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" name="name" value="<?php echo $row['NAME']?>" placeholder ="Name">
          </div>
          <div class="form-group">
            <label for="Roll-Number">Roll Number</label>
            <input type="text" name="roll" value="<?php echo $row['ROLL_NUM']?>" placeholder ="Roll Number">
          </div>
          <div class="form-group">
            <label for="Phone-Number">Phone Number</label>
            <input type="text" name="phone" value="<?php echo $row['PHONE_NUM']?>" placeholder ="Phone Number">
          </div>
          <div class="form-group">
            <label for="Email">Email</label>
            <input type="text" name="email" value="<?php echo $row['EMAIL']?>" placeholder ="Email">
          </div>
          <div class="form-group">
            <label for="Branch">Branch</label>
            <input type="text" name="branch" value="<?php echo $row['BRANCH']?>" placeholder ="Branch">
          </div>
            <?php
        }
    }
    else
    {
        echo "No Record Found";
    }
  }
  ?>
          <button type="submit" name="updateUser">UPDATE</button>
          <a href="table.php" >BACK</a> 
        </div>
      </form>
    </div>
</div>
<?php include "../include/footer.php" ; ?>
