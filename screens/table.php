  <?php 
  include "../auth/authentication.php" ;
  include "../include/header.php" ;
  include "../include/sidebar.php" ; 
   ?>
  <div class="container">
  <?php include "../include/topbar.php" ;
  include "../database/dbcon.php" ;
  ?>
  <div class="content">
  <?php
  if(isset($_SESSION['status']))
  {
    // echo "<h4>".$_SESSION['status']."<h4>";?>
    <div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <strong>Hey!</strong><?php echo $_SESSION['status']; ?>
                </div>
    <?php
    unset($_SESSION['status']);
  }
  ?>
  <button class="open">Add User</button>
  <!--Creates the popup body-->
  <div class="popup-overlay">
  <!--Creates the popup content-->
    <div class="popup-content">
      <form action="form.php" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" name="name" placeholder ="Name">
          </div>
          <div class="form-group">
            <label for="Roll-Number">Roll Number</label>
            <input type="text" name="roll" placeholder ="Roll Number">
          </div>
          <div class="form-group">
            <label for="Phone-Number">Phone Number</label>
            <input type="text" name="phone" placeholder ="Phone Number">
          </div>
          <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" name="email" placeholder ="Email">
          </div>
          <div class="form-group">
            <label for="Branch">Branch</label>
            <input type="text" name="branch" placeholder ="Branch">
          </div>
          <div class="form-group">
            <label for="Branch">Password</label>
            <input type="password" name="password" placeholder ="password">
          </div>
          <button type="submit" class="save" name="addUser">Add</button>
          <button class="close">Close</button> 
        </div>
      </form>
    </div>
</div>

<!--Content shown when popup is not displayed-->
  <table id="myTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Roll No.</th>
            <th>Name</th>
            <th>Phone No.</th>
            <th>Email</th>
            <th>Branch</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      <?php
      $query = "SELECT * FROM user";
      $query_run = mysqli_query($con, $query);

      if(mysqli_num_rows($query_run) > 0)
      {
        foreach($query_run as $row)
        {
          ?>
          <tr>
            <td><?php echo $row['ID']; ?></td>
            <td><?php echo $row['ROLL_NUM']; ?></td>
            <td><?php echo $row['NAME']; ?></td>
            <td><?php echo $row['PHONE_NUM']; ?></td>
            <td><?php echo $row['EMAIL']; ?></td>
            <td><?php echo $row['BRANCH']; ?></td>
            <td>
              <a href="table-edit.php?user_id=<?php echo $row['ID']; ?>">Edit</a>
              <form action="form.php" method="POST">
              <input type="hidden" name="user_id" value= "<?php echo $row['ID']?>" >
              <input type="submit" name ="deleteUser" value="DELETE">
              </form>
            </td>
        </tr>
          <?php
        }
      }
      else
      {
        ?>
        <tr>
          <td>No Record Found</td>
        </tr>
        <?php
      }
      ?>
    </tbody>
</table>
</div>
<?php include "../include/footer.php" ; ?>