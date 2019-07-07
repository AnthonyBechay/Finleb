<!DOCTYPE html>
<html lang="en">

<!-------------------------------------- Navigation ----------------------------------- -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
  <div class="container" id="nav">
    <a class="navbar-brand" href="#">Finleb</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home
            <span class="sr-only">(current)</span>
            </a>
        </li>
        <li class="nav-item">
          <?php
            if($_SESSION['login'] == 1){
              echo"
                <form action='index.php' method='POST' id='logout_form'>
                  <a href='?function' class='nav-link' id='logout_link' name='logout_link' style='margin-right: 7px;'><i class='fas fa-sign-out-alt'></i> Logout </a> 
                </form>
                  </li>
                  ";
            }else if($_SESSION['login'] == 0){
              echo"<a class='nav-link' data-toggle='modal' data-target='#exampleModal' style='margin-right: 6px;'>Login/Sign Up</a>";
            }
          ?>
          
        </li>
        <li class="nav-item">
          <form action="jobs_registration.php" method="POST">
            <input type="submit" value="Add Business" class="btn btn-outline-success"></input>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>
              
  <script>
    var form = document.getElementById("logout_form");
    var link = document.getElementById("logout_link");
    link.addEventListener("click",function(){form.submit();});
  </script>
  
     <!-- --------------  Sign Up -------------- -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="container"><br>
          <h2 style="display: inline;">Login or Register </h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <hr>

            <form action="index.php" method="POST">
        <div class="tab-content" id="myTabContent">
              
        <!-- Sign in division -->
              <div class="tab-pane fade show active" id="signin_div" role="tabpanel" aria-labelledby="profile-tab" >
                <p id="error_values" <?php if ($show_err_msg===false){?>style="display:none"<?php } ?> style='color: red;margin-left: 25%;font-size:18px;'> Invalid email or password!</p>
              <label for="email" style="color: #000000;"><b>Email</b></label>
                  <input type="text" placeholder="Enter Email" name="signin_email" required>

              <label for="psw" style="color: #000000;"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="signin_password" required>

            <a href="#" onclick="showStuff('register_div', 'signin_div', this); return false;">or Register here</a>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <input type="submit" class="btn btn-primary" value="Sign in" name="signin_submit"></input>
                </div>
            </div>
        </div>
</form>

        <!-- Register division -->
        <form action="index.php" method="POST" enctype="multipart/form-data">
          <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="register_div" role="tabpanel" aria-labelledby="profile-tab" style="display: none;">

                    <table>
                            <tr>
                              <td>
                                <label for="first_name" style="color: #000000;"><b>First Name</b></label>
                                <input type="text" placeholder="John" name="register_fname" required>
                              </td>
                              <td>
                                <label for="last_name" style="color: #000000;"><b>Last Name</b></label>
                                <input type="text" placeholder="Smith" name="register_lname" required>
                              </td>
                            </tr>
                          </table>

                          <label for="phone" style="color: #000000;"><b>Phone number</b></label>
                          <input type="number" placeholder="Enter phone number" name="register_phone" required>

                          <label for="email" style="color: #000000;"><b>Email</b></label>
                          <input type="text" placeholder="Enter Email" name="register_email" required>

                          <label for="psw" style="color: #000000;"><b>Password</b></label>
                          <input type="password" placeholder="Enter Password" name="register_password" required>

                          <label for="pic" style="color: #000000;"><b>Upload your picture</b></label>
                          <input type="file" name="mypic" accept="format" /> <br> <br>

                          <a href="#" onclick="showStuff('signin_div', 'register_div', this); return false;">Or login if you already have an account</a> 
                              
                          
                          <br>

            <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <input type="submit" class="btn btn-primary" value="Register" name="register_submit" ></input>
                </div>
            </div>

        </div>

        </form>
          </div>
        </div>
      </div>
    </div>
    <script>
        function showStuff(id, text, btn) {
    document.getElementById(id).style.display = 'block';
    // hide the lorem ipsum text
    document.getElementById(text).style.display = 'none';
    // hide the link
    btn.style.display = 'none';
}
    </script>

</html>