<?php
    include 'log.php';
    include 'jobs_registration_values.php';
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Job Registration</title>

<html xmlns="http://www.w3.org/1999/xhtml">

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="css/home.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/full-slider.css" rel="stylesheet">

    <!-- Logged in Logo -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">


  </head>


    <body>

   <!-- ---------------------------- Please Login Modal -------------------------- -->
   <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"  id="onload">
   
       <div class="modal-dialog">
   
         <!-- Modal content-->
         <div class="modal-content">
           <div class="modal-header" style="height: 12vh;">
             <center> <h4 class="modal-title"><i class="fa"></i>Login first!</h4> </center>
             <button type="button" class="close" data-dismiss="modal">×</button>
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

   
  <!-- ---------------------------- php for category and subcategory -------------------------- -->

  <?php
  $db = new mysqli('localhost','root','root','finleb');
  $query = "SELECT * FROM category";
  $result = $db->query($query);

  while($row = $result->fetch_assoc()){
    $categories[] = array("id" => $row['cat_id'], "val" => $row['cat_name']);
  }

  $query = "SELECT * FROM subcategory";
  $result = $db->query($query);

  while($row = $result->fetch_assoc()){
    $subcats[$row['sub_cat_id']][] = array("id" => $row['sub_id'], "val" => $row['sub_name']);
  }

  $jsonCats = json_encode($categories);
  $jsonSubCats = json_encode($subcats);


?>
    <script>
      <?php
        echo "var categories = $jsonCats; \n";
        echo "var subcats = $jsonSubCats; \n";
      ?>

 // script to launch javascript functions independantly
 
        
 function myEvent(where,evt,func,op)
{
 if (op)
  {
   if (where.attachEvent) where.attachEvent("on"+evt,func);
   else if (where.addEventListener) where.addEventListener(evt,func,false)
  }
  else 
  {
   if (where.detachEvent) where.detachEvent("on"+evt,func);
   else if (where.removeEventListener) where.removeEventListener(evt,func,false);
  }
}

myEvent(window, 'load', loadCategories1, true);
myEvent(window, 'load', loadCategories2, true);



  


function loadCategories2(){
        var select = document.getElementById("categoriesSelect");
        select.onchange = updateSubCats2;
        for(var i = 0; i <= categories.length; i++){
          select.options[i] = new Option(categories[i].val,categories[i].id);
        }
}
     function updateSubCats2(){
        var catSelect = this;
        var catid = this.value;
        var subcatSelect = document.getElementById("subcatsSelect");
        subcatSelect.options.length = 0;
        for(var i = 0; i < subcats[catid].length; i++){
          subcatSelect.options[i] = new Option(subcats[catid][i].val,subcats[catid][i].id);
        }
      }
      
      function loadCategories1(){
        var select = document.getElementById("categoriesSelect_freelance");
        select.onchange = updateSubCats1;
        for(var i = 0; i <= categories.length; i++){
          select.options[i] = new Option(categories[i].val,categories[i].id);
        }
      }
      function updateSubCats1(){
        var catSelect = this;
        var catid = this.value;
        var subcatSelect = document.getElementById("subcatsSelect_freelance");
        subcatSelect.options.length = 0;
        for(var i = 0; i < subcats[catid].length; i++){
          subcatSelect.options[i] = new Option(subcats[catid][i].val,subcats[catid][i].id);
        }
      }
 



      
    </script>


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

           <form action="jobs_registration.php" method="POST">
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

<form action="jobs_registration.php" method="POST">
       <!-- Register division -->
         <div class="tab-content" id="myTabContent">
             <div class="tab-pane fade show active" id="register_div" role="tabpanel" aria-labelledby="profile-tab" style="display: none;">

                   <table>
                           <tr>
                             <td>
                               <label for="first_name" style="color: #000000;"><b>First Name</b></label>
                               <input type="text" placeholder="John" name="register_fname" required>
                             </td>
                             <td>
                               <label for="last_name" style="color: #000000;"><b>First Name</b></label>
                               <input type="text" placeholder="Smith" name="register_lname" required>
                             </td>
                           </tr>
                         </table>

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

        <div class="container" style="margin-top: 80px;">
        <h1 style="font-size: 360%;"> Share your Business </h1>
        </div> <br>

<hr>


<!-- --------------------------------- Tabs for Shop and FreeLance --------------------------------- -->
  
<form action="jobs_registration.php" method="POST">
  <div class="this_div" style="margin-left: 5%; margin-right: 5%;">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="width: 70%;margin: auto;">
      <li class="nav-item">
        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true" style="width: 56vh;text-align: center;font-size : 17px;" >Shop</a>    
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false" style="width: 56vh;text-align: center;font-size : 17px;" >Freelance</a>
      </li>
    </ul> 
  </div>

<div style="margin-left: 15%; margin-right: 15%;">
<hr>
<div class="tab-content" id="pills-tabContent">
 
  <!-- --------------------------------- Shop Division --------------------------------- -->
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress"> Company Name <p style='color: red;display:inline;'> *</p> </label>
                        <?php 
                          if($_SESSION['login'] == 0){
                            echo"<input type='text' class='form-control' name='shop_comp_name' data-toggle='modal'  data-target='.bs-example-modal-lg'>";
                          }else if($_SESSION['login'] == 1){
                            echo"<input type='text' class='form-control' name='shop_comp_name'>";
                          }
                        ?>
                        
                    </div>
                    <div class="form-group col-md-6"></div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Website</label>
                        <input type="text" class="form-control" name="shop_comp_website">
                    </div>
                    <div class="form-group col-md-6"></div>
                </div>

                <div class="form-group">
                <label for="exampleFormControlSelect1">What is your work category ? <p style='color: red;display:inline;'> *</p> </label>
            <!--<form action="jobs_registration.php" method="POST"> -->
                

                <select id='categoriesSelect' class="form-control" name="shop_comp_cat">
                <option>...</option>
                  </select>
            <!-- </form> -->

                </div>
                <div class="form-group">
                <label for="exampleFormControlSelect2">Subcategory ? <p style='color: red;display:inline;'> *</p></label>

                <select id='subcatsSelect' multiple class="form-control" id="exampleFormControlSelect2" name="shop_comp_subcat">
                </select>

              
                </div>

                <div class="form-group">
                <label for="exampleFormControlTextarea1">Description <p style='color: red;display:inline;'> *</p></label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="shop_comp_desc"></textarea>
                </div>
                <div class="form-group">
                </div>

                <?php 
                  if($_SESSION['login'] == 0){
                    echo"<input type='button' class='btn btn-primary' value='Sign in' style='width: 70px;' data-toggle='modal' data-target='.bs-example-modal-lg'></input>";
                        
                  }else if($_SESSION['login'] == 1){
                    echo"<button type='submit' class='btn btn-primary' name='shop_signin'>Sign in</button>";
                  }
                ?>

                <br> <br>
  
  </div>
                  


  <!-- --------------------------------- FreeLance Division --------------------------------- -->
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
       

                  <div class="form-group">
                <label for="exampleFormControlSelect1_freelance">What is your work category ? <p style='color: red;display:inline;'> *</p> </label>
            <!--<form action="jobs_registration.php" method="POST"> -->

                <select id='categoriesSelect_freelance' class="form-control" name="shop_comp_cat_freelance">
                <option>...</option>
                  </select>
            <!-- </form> -->

                </div>
                <div class="form-group">
                <label for="exampleFormControlSelect2">Subcategory ? <p style='color: red;display:inline;'> *</p> </label>

                <select id='subcatsSelect_freelance' multiple class="form-control" name="shop_comp_subcat_freelance">
                </select>

                </body>
                </div>
  
                  <div class="form-group">
                  <label for="exampleFormControlTextarea1">Description <p style='color: red;display:inline;'> *</p></label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="freelance_description"></textarea>
                  </div>

                  <div class="form-group">
                <label for="exampleFormControlTextarea1">Covering Area</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="freelance_location"></textarea>
                </div>

                <?php 
                  if($_SESSION['login'] == 0){
                    echo"<input type='button' class='btn btn-primary' value='Sign in' style='width: 70px;' data-toggle='modal' data-target='.bs-example-modal-lg'></input>";
                        
                  }else if($_SESSION['login'] == 1){
                    echo" <button type='submit' class='btn btn-primary' name='freelance_signin'>Sign in</button>";
                  }
                ?>
  
                  
                  <br> <br>
  
          </div>

      </div>

    </div>

    </div>
  </form>

  </body>
</html>












    <!-------------------------------------- Bootstrap core JavaScript ----------------------------------- -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script type="text/javascript" src="list/jquery.min.js"></script>
  <script type="text/javascript" src="list/js.js"></script>

    </body>

</html>