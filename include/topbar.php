
<div class="header">
            <div class="nav">
                <div class="user">
                    <?php
                     if(isset($_SESSION['auth']))
                     {
                        echo $_SESSION['auth_user']['user_name'];
                     }
                     else
                     {
                        echo "Not Logged In";
                     }
                    ?>
                    <form action="form.php" method="POST">
                    <input type="submit" name ="logoutUser" value="LOGOUT">
                    </form>
                </div>
            </div>
</div>

