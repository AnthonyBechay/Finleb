<?php
    include 'log.php';
    include 'php/navbar.php';
    include 'jobs_registration_values.php';
    $user_id = $_GET["u_id"]; //owner taba3 l account
    $client_id = $_SESSION['u_id']; //li feyit ychuf l website
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">

    <title>Freelance profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="/AFFA6098-F5F7-0E47-AC7A-C2CF9F79383A/main.js" charset="UTF-8"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="css/profiles.css" rel="stylesheet">
    <link href="css/home.css" rel="stylesheet">

    <!-- Logged in Logo -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg"
        crossorigin="anonymous">

    <!-- for rating score -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


</head>




<body>

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
        <form action="index.php" method="POST">
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

                            <input type="checkbox" checked="checked" name="remember" style="margin-bottom:5px">
                            <label style="color: #000000;">
                            Remember me
                          </label> <br>

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

    <br>
    <br>

    <div class="container">

        <div class="row">
            <div class="col-md-4 m0">


                <?php
        $query = "SELECT * From user,company,subcategory where u_id=comp_u_id AND comp_sub_id=sub_id AND u_id='$user_id' ";
        $result = mysqli_query($idcon, $query);
        while ($row = mysqli_fetch_array($result)) {
            $image_path = $row["u_pic_path"];
            $image_name = $row["u_pic_name"];

                echo"
                            <div class='card'>
                                <div class='card-content pt20 pb20 profile-header'>
                                    <div class='profile__avatar'>
                                    <img src='".$image_path."".$image_name."' alt='images/user.png' onerror=this.src='images/user.png' '>
                                    </div>
                                    <h4 class='card-title text-center mb20'>{$row['u_fname']} {$row['u_lname']}</h4>
                                    <p>
                                    {$row['comp_desc']}
                                    </p>
                                    <hr>
                                    <input id='copy-text' type='text' value='{$row['u_phone']}'>
                                    <t id='copied'></t>
                                    </hr>
                ";}    ?>


<script>
  var div = document.getElementById('copied');

document.getElementById("copy-text").onclick = function() {
  this.select();
  document.execCommand('copy');
div.innerHTML = 'copied!';

}
</script>
<br><br>

                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <strong>Welcome!</strong> You should check in some of our website functionalities : <br>
  You can:<br>
  -Review and rate this profile <br>
  -check other reviews<br>
  -see profile pictures<br>

</div>


                <!--skill bar-->
            </div>
            <!--content-->

        </div>
    </div>
    <div class="col-md-8 mb30">
        <div class="card">
            <div>

                <!-- Nav tabs -->
                <ul class="nav tabs-admin" role="tablist">
                    <li role="presentation" class="nav-item">
                        <a class="nav-link active" href="#t1" aria-controls="t1" role="tab" data-toggle="tab">Activities</a>
                    </li>

                </ul>

                <br>
                <hr>



                <!-- ------------------------------------- Top buttons (review and rating) -------------------------------------------- -->
                <center>
                    <p>
                        <a style="margin-left:10px;" class="btn btn-primary" data-toggle="collapse" href="#collapse1" role="button" aria-expanded="false"
                            aria-controls="collapseExample">
                            Add review and rating
                        </a>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapseExample">
                            View Rating score
                        </button>
                    </p>
                </center>
                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"  id="onload">
   
   
   
                   <!-- ------------------------------------- if not login modal -------------------------------------------- -->

   
   <div class="modal-dialog">

     <!-- Modal content-->
     <div class="modal-content">
       <div class="modal-header" style="height: 7vh;">
          <h4 class="modal-title"><i class="fa"></i>Login first!</h4>
         <button type="button" class="close" data-dismiss="modal">x</button>
       </div>
       <div class="modal-body">
        In order to get full access to this page, you have to login first.
       </div>
       <div class="modal-footer" >
         <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color: #B22222;display: block; margin: 0 auto;height: 20%;width: 35%;">OK</button>
       </div>
     </div>

   </div>
</div>





                <!-- ------------------------------------- Add review and rating -------------------------------------------- -->


                <div style="margin-left:10px; margin-right:10px;" class="collapse" id="collapse1">
                    <div class="card card-body">
                        <form accept-charset="UTF-8" action="" method="post" id='reviewid'>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Review</label>
                                <?php 
                          if($_SESSION['login'] == 0){
                            echo" <textarea class='form-control' name='reviewta' id='exampleFormControlTextarea1' rows='3' data-toggle='modal'  data-target='.bs-example-modal-lg'></textarea> ";
                          }else if($_SESSION['login'] == 1){
                            echo"<textarea class='form-control' name='reviewta' id='exampleFormControlTextarea1' rows='3'></textarea>";
                          }
                        ?>


                            </div>

                            <div class="container">
                                <div class="starrating risingstar d-flex justify-content-center flex-row-reverse">
                                    <input type="radio" id="star5" name="rating" value="5" />
                                    <label for="star5" title="5 star"></label>
                                    <input type="radio" id="star4" name="rating" value="4" />
                                    <label for="star4" title="4 star"></label>
                                    <input type="radio" id="star3" name="rating" value="3" />
                                    <label for="star3" title="3 star"></label>
                                    <input type="radio" id="star2" name="rating" value="2" />
                                    <label for="star2" title="2 star"></label>
                                    <input type="radio" id="star1" name="rating" value="1" />
                                    <label for="star1" title="1 star"></label>

                                </div>
                                <input type="submit" name="reviewsubmit" class="btn btn-success"></input>

                            </div>
                        </form>

                    </div>
                </div>



                <?php
if(isset($_POST['reviewsubmit']) ){
  $selectbranchid="select br_id,br_location from user, company , branch where  u_id=comp_u_id AND comp_id=br_comp_id AND u_id= $user_id;";
  $res = mysqli_query($idcon, $selectbranchid);
  while ($row = mysqli_fetch_array($res)){
  $br_id=$row['br_id'];
  }
    
$insertreview="INSERT INTO review (rev_text,rev_br_id,rev_u_id) VALUES ('$reviewta',$br_id,'$client_id'); ";
$res1 = mysqli_query($idcon, $insertreview);
 //23 is the id of the person commenting or putting a rating (take from mike)
$insertrating="INSERT INTO rating (rate_score,rate_br_id,rate_u_id) VALUES ('$rating',$br_id,'$client_id'); ";
$res2 = mysqli_query($idcon, $insertrating);
}
?>



                <!-- ------------------------------------- View rating score -------------------------------------------- -->





                <div style="margin-left:10px; margin-right:10px;" class="collapse" id="collapse2">
                    <div class="card card-body">

                        <span class="heading">User Rating</span>

                        <hr style="border:3px solid #f1f1f1">
                        <div class="row">
                           
                        <?php
                        $query2 = "SELECT ROUND(AVG(rate_score),1) as avgscore1 From user,company,branch,rating where u_id=comp_u_id AND br_id=rate_br_id AND comp_id=br_comp_id AND u_id='$user_id'  ";
                            $result2 = mysqli_query($idcon, $query2);
                            while ($row_rating = mysqli_fetch_array($result2)) {
                    echo"
                            <div class='side'>
                            <div>{$row_rating['avgscore1']}</div>
                            </div>
                            <div class='middle'>
                            <div class='progress'>
                            <div class='progress-bar bg-success' role='progressbar' style='width:calc({$row_rating['avgscore1']}%*20)' aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'></div>
                            </div>
                            </div>
                            <div class='side right'>
                            </div>

                            ";
        }?>
                        </div>
                    </div>
                </div>

                <hr>



                <!--------------------------------------------------- tab panes -------------------------------------------------->

                <div class="tab-content admin-tab-content pt30">
                    <div role="tabpanel" class="tab-pane active show" id="t1">

                        <ul class="activity-list list-unstyled">

                            <?php
                                /*user 1 : owner of this profile (company owner) || user 2: is the commenter.*/
                                $query1 = "select u2.u_fname as commenterfname,u2.u_lname as commenterlname ,u2.u_phone as phonenb ,rev_text as rev_text,u2.u_pic_path as u2_pic_path , u2.u_pic_name as u2_pic_name from user u1,user u2, company, branch, review where u1.u_id=comp_u_id AND comp_id=br_comp_id AND br_id=rev_br_id AND u2.u_id=rev_u_id AND u1.u_id=$user_id  ";
                                $result1 = mysqli_query($idcon, $query1);

                                while ($row = mysqli_fetch_array($result1)) {
                                    $image_path = $row["u2_pic_path"];
                                    $image_name = $row["u2_pic_name"];

                                echo"
                               <li class='clearfix'>
                                    <div class='float-left'>
                                        <a href='#' onclick='return false;' data-toggle='popover' data-placement='left'   title='Contact me:' data-trigger='focus' data-content='{$row['phonenb']}'>
                                        <img src='".$image_path."".$image_name."' alt='images/user.png' onerror=this.src='images/user.png' class='img-fluid rounded-circle'></a>
                                    </div>
                                    <div class='act-content'>
                                        <div class='font400'>
                                            <a href='#' onclick='return false;' data-toggle='popover' data-placement='top'   title='Contact me:' data-trigger='focus' data-content='{$row['phonenb']}' class='font600'> {$row['commenterfname']} {$row['commenterlname']} </a> Added a Review
                                        </div>
                                        <p class='mb0'>
                                        {$row['rev_text']}                                         </p>
                                    </div>
                                </li>
"; }


?>


                

                        </ul>
                    </div>



    <!-- popovers -->
    <script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});

</script>


                </div>
            </div>
        </div>
    </div>
    <!-- </div>
    </div> -->

    <script src="http://netdna.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        /* i used these for my tabs*/
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    </script>
</body>

</html>