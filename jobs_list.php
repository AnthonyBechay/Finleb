<?php
    include 'log.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <html xmlns="http://www.w3.org/1999/xhtml">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link href="css/home.css" rel="stylesheet">

    <link href="css/joblist.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/full-slider.css" rel="stylesheet">

    <!-- Logged in Logo -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg"
        crossorigin="anonymous">
       
       
       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script src="jquery-3.3.1.min.js"></script>




</head>

<body style="background-color: #DCDCDC;">

    <!----------------------------------------------------------- Navigation ------------------------------------------------------------- -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
        <div class="container" id="nav">
            <a class="navbar-brand" href="#">Finleb</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
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
        link.addEventListener("mousedown", function () { form.submit(); });
        
    </script>

    <!-- --------------  Sign Up -------------- -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="container">
                    <br>
                    <h2 style="display: inline;">Login or Register </h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <hr>

                    <form action="index.php" method="POST">
                        <div class="tab-content" id="myTabContent">

                            <!-- Sign in division -->
                            <div class="tab-pane fade show active" id="signin_div" role="tabpanel" aria-labelledby="profile-tab">
                                <p id="error_values" <?php if ($show_err_msg===false){?>
                                    style="display:none"
                                    <?php } ?> style='color: red;margin-left: 25%;font-size:18px;'> Invalid email or password!</p>
                                <label for="email" style="color: #000000;">
                                    <b>Email</b>
                                </label>
                                <input type="text" placeholder="Enter Email" name="signin_email" required>

                                <label for="psw" style="color: #000000;">
                                    <b>Password</b>
                                </label>
                                <input type="password" placeholder="Enter Password" name="signin_password" required>

                                <a href="#" onclick="showStuff('register_div', 'signin_div', this); return false;">or Register here</a>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <input type="submit" class="btn btn-primary" value="Sign in" name="signin_submit"></input>
                                </div>
                            </div>
                        </div>
                    </form>

                    <form action="index.php" method="POST">
                        <!-- Register division -->
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="register_div" role="tabpanel" aria-labelledby="profile-tab" style="display: none;">

                                <table>
                                    <tr>
                                        <td>
                                            <label for="first_name" style="color: #000000;">
                                                <b>First Name</b>
                                            </label>
                                            <input type="text" placeholder="John" name="register_fname" required>
                                        </td>
                                        <td>
                                            <label for="last_name" style="color: #000000;">
                                                <b>First Name</b>
                                            </label>
                                            <input type="text" placeholder="Smith" name="register_lname" required>
                                        </td>
                                    </tr>
                                </table>

                                <label for="email" style="color: #000000;">
                                    <b>Email</b>
                                </label>
                                <input type="text" placeholder="Enter Email" name="register_email" required>

                                <label for="psw" style="color: #000000;">
                                    <b>Password</b>
                                </label>
                                <input type="password" placeholder="Enter Password" name="register_password" required>

                                <input type="checkbox" checked="checked" name="remember" style="margin-bottom:5px">
                                <label style="color: #000000;">
                                    Remember me
                                </label>
                                <br>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <input type="submit" class="btn btn-primary" value="Register" name="register_submit"></input>
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




    <!-- ---------------------------------------------Page Title-------------------------------------------------- -->
    <br>
    <br>
   
    <?php


$choicecat = $_GET["choice_cat"];
echo "<br><h1 style='text-align: center;font-size: 360%;'>$choicecat ";
$choicesub = $_GET["choice_sub"];
echo "$choicesub</h1>";
?>


    <!-- --------------------------------------------Page two-tab navigation-------------------------------------------------- -->

    <br>
    <div class="my-tab">
        <ul class="nav nav-pills nav-fill center-pills">
            <li class="nav-item col-sm-4">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home">FREELANCE</a>
            </li>
            <li class="nav-item col-sm-4">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile">COMPANY</a>
            </li>
        </ul>
    </div>

    <!-- --------------------------------------------tab 1 content-------------------------------------------------------------- -->


    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <br>


            <center>
                <form action="" method="POST" id="form-id">
                <div class="input-group col-md-4">
                    <input  name="required_freelance" onFocus="this.value=''" style="background:transparent; border-color:#4cc985;" class="form-control py-2" placeholder="Search..." type="search" id="searchid">
                    <span class="input-group-append">
                        <input class="btn btn-outline-secondary" onmousedown="hide();" value="Search.." id="but" type="button">
                            
                        </input>
                    </span>
                </div>
            </form>
            </center>
            






            <script>  

    $("#searchid").blur(function() {
    $("#form-id").submit();
     //versions newer than 1.6
 });







var c;

function align(){
  if(c!=1){
    $(document).ready(function() {
    var divs = $('.single-card4');
    for (var i = 0; i < divs.length; i += 4) {
            divs.slice(i, i + 4).wrapAll('<div class="card-deck"></div>');
    }
    c=1;
});
}
}

function hide() {
align();
var x = document.getElementById("freelance_div");
var y = document.getElementById("freelance_search_div");
var z = document.getElementById("but");
if (x.style.display != "none") {
  
    x.style.display = "none";
    y.style.display = "block";
    z.value = "go Back";
}
else{
y.style.display="none";
x.style.display="block";
z.value = "Search..";

}

}







function align2(){
  if(c!=1){
    $(document).ready(function() {
    var divs = $('.single-card5');
    for (var i = 0; i < divs.length; i += 4) {
            divs.slice(i, i + 4).wrapAll('<div class="card-deck"></div>');
    }
    c=1;
});
}
}

function hide2() {
align2();
var a = document.getElementById("company_div");
var b = document.getElementById("company_search_div");
var d = document.getElementById("but2");
if (a.style.display != "none") {
  
    a.style.display = "none";
    b.style.display = "block";
    d.value = "go Back";
}
else{
b.style.display="none";
a.style.display="block";
d.value = "Search..";

}

}

// var form = document.getElementById("form-id");

// document.getElementById("your-id").addEventListener("click", function () {
//   form.submit();
// });



            
//  var c;
// function align(){
//     if(c!=1){
//     $(document).ready(function() {
//     var divs = $('.single-card4');
//     for (var i = 0; i < divs.length; i += 4) {
//             divs.slice(i, i + 4).wrapAll('<div class="card-deck"></div>');
//     }
//     c=1;
// });
// }
// }


</script>


            <br>
            <!--
     ejo ma3 l search box bas ma elun 3aze apparently 
     
      <style> 
input[type=text] {
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    border-color:white;
    font-size: 16px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 100%;
}
</style>  -->
            <!-- ---------------------------------------------------- FREELANCE CARD SHOW ------------------------------------------------------------------------------ -->



<div id="freelance_div">

            <?php
//SELECT * From user,company,subcategory,type where u_id=comp_u_id AND comp_sub_id=sub_id AND comp_type_id=type_id AND  type_name='freelance' AND sub_name='mecanics';
    $query = "SELECT * From user,company,subcategory,`type`,branch where comp_id=br_comp_id AND u_id=comp_u_id AND comp_sub_id=sub_id AND comp_type_id=`type_id` AND `type_name`='freelance' AND sub_name='$choicesub' group by comp_id;";
$result = mysqli_query($idcon, $query);
while ($row = mysqli_fetch_array($result)) {
    $image_path = $row["u_pic_path"];
    $image_name = $row["u_pic_name"];
    echo "
                <div class='single-card'>
                    <div class='card' onclick=document.location.href='freelance_profile.php?u_id={$row['u_id']}' style='width: 18rem; height:45vh;'>
                        <div class='hovereffect' style='width: 18rem;'>
                            <img  class='card-img-top minipic' height='250' src='".$image_path."".$image_name."' alt='images/user.png' onerror=this.src='images/user.png'; '>
                            <div class='overlay'>
                                <h2>{$row['u_fname']} {$row['u_lname']} </h2>
                                <p>
                                    <a href='freelance_profile.php?u_id={$row['u_id']}'>LINK HERE</a>
                                </p>
                            </div>
                        </div>
                        <div class='card-body' style='width: 18rem; max-height:15vh;'>
                            <h5 class='card-title'></h5>
                            <p class='card-text'><a href='mailto:{$row['u_email']}'>{$row['u_email']}</a></p>";
                           
                            $selected_freelance_id=$row['comp_id'];
                            $query3 = "SELECT ROUND(AVG(rate_score),1) as avgscore1 From company,branch,rating where br_id=rate_br_id AND comp_id=br_comp_id AND comp_id='$selected_freelance_id' group by comp_id; ";
                            $resul = mysqli_query($idcon, $query3);
                            
                            while ($row3 = mysqli_fetch_array($resul)) {
                                echo"
                           
                            <div class='progress'>
                                <div class='progress-bar progress-bar-info' role='progressbar' aria-valuenow='{$row3['avgscore1']}' aria-valuemin='0' aria-valuemax='100' style='width:calc({$row3['avgscore1']}%*20)'>
                                {$row3['avgscore1']}
                                </div>
                            </div>
                            ";}
                    echo"
                        </div>
                    </div>
                    <br>
                </div>";}?>
            </div>
            




            <!-- ----------- for freelance search --------------- -->

<div id="freelance_search_div" style="display: none;">

<?php
//SELECT * From user,company,subcategory,type where u_id=comp_u_id AND comp_sub_id=sub_id AND comp_type_id=type_id AND  type_name='freelance' AND sub_name='mecanics';
$query = "Select * from `user`,company,type,subcategory where type_name='freelance' AND comp_sub_id=sub_id AND comp_u_id=u_id AND comp_type_id=type_id AND sub_name='$choicesub' AND (u_fname='$required_freelance' OR u_lname='$required_freelance')";
$result = mysqli_query($idcon, $query);
while ($row = mysqli_fetch_array($result)) {
$image_path = $row["u_pic_path"];
$image_name = $row["u_pic_name"];
echo "
    <div class='single-card4'>
        <div class='card' onclick=document.location.href='freelance_profile.php?u_id={$row['u_id']}' style='width: 18rem; height:45vh;'>
            <div class='hovereffect' style='width: 18rem;'>
                <img  class='card-img-top minipic' height='250' src='".$image_path."".$image_name."' alt='images/user.png' onerror=this.src='images/user.png'; '>
                <div class='overlay'>
                    <h2>{$row['u_fname']} {$row['u_lname']} </h2>
                    <p>
                        <a href='freelance_profile.php?u_id={$row['u_id']}'>LINK HERE</a>
                    </p>
                </div>
            </div>
            <div class='card-body' style='width: 18rem; max-height:15vh;'>
                <h5 class='card-title'></h5>
                <p class='card-text'><a href='mailto:{$row['u_email']}'>{$row['u_email']}</a></p>";
               
                $selected_freelance_id=$row['comp_id'];
                $query3 = "SELECT ROUND(AVG(rate_score),1) as avgscore1 From company,branch,rating where br_id=rate_br_id AND comp_id=br_comp_id AND comp_id='$selected_freelance_id' group by comp_id; ";
                $resul = mysqli_query($idcon, $query3);
                
                while ($row3 = mysqli_fetch_array($resul)) {
                    echo"
               
                <div class='progress'>
                    <div class='progress-bar progress-bar-info' role='progressbar' aria-valuenow='{$row3['avgscore1']}' aria-valuemin='0' aria-valuemax='100' style='width:calc({$row3['avgscore1']}%*20)'>
                    {$row3['avgscore1']}
                    </div>
                </div>
                ";}
        echo"
            </div>
        </div>
        <br>
    </div>";}?>

</div>
</div>
        




            <!-- ------------------------------------------------------------------ Tab Company ------------------------------------- -->



        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <br>

            <!-- ----------- Search box --------------- -->



       <center>
                <form action="jobs_list.php?choice_sub=<?php echo $choicesub ?>&choice_cat=<?php echo $choicecat ?>#profile" method="POST" id="form-id2" >
                <div class="input-group col-md-4">
                    <input  name="required_company" id="searchid2" onFocus="this.value=''" style="background:transparent; border-color:#4cc985;" class="form-control py-2" placeholder="Search..." type="search" >
                    <span class="input-group-append">
                        <input class="btn btn-outline-secondary" onmousedown="hide2();" value="Search.." id="but2" type="button">
                            
                        </input>
                    </span>
                </div>
            </form>
            </center>
            <br>



            <!-- $search_freelance_query="Select * from user,company,type,subcategory where type_name='freelance' AND comp_sub_id=sub_id AND comp_u_id=u_id AND comp_type_id=type_id AND sub_name='$choice_sub' AND (u_fname='$required_freelance' OR u_lname='$required_freelance')"; -->






            <!-- ------------------------------------------------------ COMPANY CARD SHOW ------------------------------------------------------------------------------- -->
<div id="company_div" >
            <?php
//SELECT * From user,company,subcategory,type where u_id=comp_u_id AND comp_sub_id=sub_id AND comp_type_id=type_id AND  type_name='freelance' AND sub_name='mecanics';
$query = "SELECT * From user,company,subcategory,`type`,branch  where  comp_id=br_comp_id AND u_id=comp_u_id AND comp_sub_id=sub_id AND comp_type_id=`type_id` AND `type_name`='shop' AND sub_name='$choicesub' group by comp_id; ";
$result = mysqli_query($idcon, $query);

while ($row = mysqli_fetch_array($result)) {
    $image_path = $row["u_pic_path"];
    $image_name = $row["u_pic_name"];
    echo "
    <div class='single-card2'>
    <div class='card' onclick=document.location.href='company_profile.php?comp_id={$row['comp_id']}&u_id={$row['u_id']}' style='width: 18rem; height:45vh;'>
        <div class='hovereffect' style='width: 18rem;'>
            <img class='card-img-top minipic' height='250' src='".$image_path."".$image_name."' alt='images/user.png' onerror=this.src='images/user.png' '>
            <div class='overlay'>
                <h2>{$row['comp_name']} </h2>
                <p>
                    <a href='company_profile.php?comp_id={$row['comp_id']}&u_id={$row['u_id']}'>LINK HERE</a>
                </p>
            </div>
        </div>
        <div class='card-body' style='width: 18rem; max-height:15vh;'>
            <h5 class='card-title'></h5>
            <p><a href='http://{$row['comp_website']}' class='card-text'>{$row['comp_website']}.</a></p>
            ";
            $selected_comp_id=$row['comp_id'];
            $query2 = "SELECT ROUND(AVG(rate_score),1) as avgscore From company,branch,rating where br_id=rate_br_id AND comp_id=br_comp_id AND comp_id='$selected_comp_id' group by comp_id; ";
            $res = mysqli_query($idcon, $query2);
            
            while ($row2 = mysqli_fetch_array($res)) {
                echo"

            <div class='progress'>
                <div class='progress-bar progress-bar-info' role='progressbar' aria-valuenow='{$row2['avgscore']}' aria-valuemin='0' aria-valuemax='100' style='width:calc({$row2['avgscore']}%*20)'>
                {$row2['avgscore']}
                </div>
            </div>
";}
echo"
        </div>
    </div>
    <br>
</div> " ; } ?>
        </div>









<div id="company_search_div" style="display: none;">
            <?php
//SELECT * From user,company,subcategory,type where u_id=comp_u_id AND comp_sub_id=sub_id AND comp_type_id=type_id AND  type_name='freelance' AND sub_name='mecanics';
$query = "Select * from `user`,company,type,subcategory where type_name='shop' AND comp_sub_id=sub_id AND comp_u_id=u_id AND comp_type_id=type_id AND sub_name='$choicesub' AND comp_name='$required_company'";
$result = mysqli_query($idcon, $query);

while ($row = mysqli_fetch_array($result)) {
    $image_path = $row["u_pic_path"];
    $image_name = $row["u_pic_name"];
    echo "
    <div class='single-card5'>
    <div class='card' onclick=document.location.href='company_profile.php?comp_id={$row['comp_id']}&u_id={$row['u_id']}' style='width: 18rem; height:45vh;'>
        <div class='hovereffect' style='width: 18rem;'>
            <img class='card-img-top minipic' height='250' src='".$image_path."".$image_name."' alt='images/user.png' onerror=this.src='images/user.png' '>
            <div class='overlay'>
                <h2>{$row['comp_name']} </h2>
                <p>
                    <a href='company_profile.php?comp_id={$row['comp_id']}&u_id={$row['u_id']}'>LINK HERE</a>
                </p>
            </div>
        </div>
        <div class='card-body' style='width: 18rem; max-height:15vh;'>
            <h5 class='card-title'></h5>
            <p><a href='{$row['comp_website']}' class='card-text'>{$row['comp_website']}.</a></p>
            ";
            $selected_comp_id=$row['comp_id'];
            $query2 = "SELECT ROUND(AVG(rate_score),1) as avgscore From company,branch,rating where br_id=rate_br_id AND comp_id=br_comp_id AND comp_id='$selected_comp_id' group by comp_id; ";
            $res = mysqli_query($idcon, $query2);
            
            while ($row2 = mysqli_fetch_array($res)) {
                echo"

            <div class='progress'>
                <div class='progress-bar progress-bar-info' role='progressbar' aria-valuenow='{$row2['avgscore']}' aria-valuemin='0' aria-valuemax='100' style='width:calc({$row2['avgscore']}%*20)'>
                {$row2['avgscore']}
                </div>
            </div>
";}
echo"
        </div>
    </div>
    <br>
</div> " ; } ?>
        </div>


<script>
$("#searchid2").blur(function() {
    $("#form-id2").submit();

     //versions newer than 1.6
 });


$(function(){
  var hash = window.location.hash;
  hash && $('ul.nav a[href="' + hash + '"]').tab('show');

  $('.nav-item a').click(function (e) {
    $(this).tab('show');
    var scrollmem = $('body').scrollTop() || $('html').scrollTop();
    window.location.hash = this.hash;
    $('html,body').scrollTop(scrollmem);
  });
});
</script>





    </div>
    </div>



    <!-- ---------------------------------------------NavBar for all pages-------------------------------------------------- -->


    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="javascript/ourjs.js"></script>
    <script src="jquery-3.3.1.min.js"></script>



</body>


</html>