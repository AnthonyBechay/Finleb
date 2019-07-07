<meta charset="utf-8">

<?php
    include 'log.php';
    include 'nav_signup.php';
?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Job Registration</title>

<html xmlns="http://www.w3.org/1999/xhtml">


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
    
    

    

<!-------------------------------------- Carousel ----------------------------------- -->

    <header>
      <div id="carouselExampleIndicators" class="carousel slide div_hide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">

          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('css/images/p1.jpg')"></div>

          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('css/images/p2.jpg')"></div>

          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('css/images/p4.jpg')"></div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>


    <div class="div_mobi">
    </div>


    <!-- Smooth Scroll Buttons -->
    <div class="div_goto">
      <button type="button" class="btn btn-primary" style="font-size : 25px;" onclick="smoothScrollA(document.getElementById('div_hire'))"> I want to hire </button>
      <button type="button" class="btn btn-primary" style="font-size : 25px;" onclick="smoothScrollB(document.getElementById('div_work'))"> Snippets</button>
    </div>

<!-------------------------------------- Division Hire ----------------------------------- -->
<style>

@media screen and (min-width: 600px) {
  div.div_hire {
    background-image: url('css/images/bag1.png');
    background-size: 100% 124%;
    }
}


@media screen and (max-width: 1000px) {
  div.div_hire {
    background-image: none;
    
  }
}
</style>


<div class="div_hire" id="div_hire">
  <br>
  <h1 style="font-size: 50px;color:black;"> What do you want to explore?</h1>
<h1>
<div>
    <p style="font-size: 22px;color:#B22222;">Find the service to your needs while searching in our categories and sub-categories: </p>
</div>
  <nav id="menu" style="margin-left: 20%;margin-right: 20%;">
    <label for="tm" id="toggle-menu">Category <span class="drop-icon">▾</span></label>
    <input type="checkbox" id="tm">

    <ul class="main-menu clearfix">
      <li>
                <a style="font-size: 17px;">Select<span class="drop-icon">▾</span>
                <label title="Toggle Drop-down" class="drop-icon" for="sm1">▾</label>
                </a>
                
                <input type="checkbox" id="sm1">

                <ul class="sub-menu">
                
                 <?php                                  

                  $query = "SELECT * From category";
                  $result = mysqli_query($idcon, $query);

                  echo "<link href='css/classes.css' rel='stylesheet'>";
                  while ($row = mysqli_fetch_array($result)) {
                    echo "
                        <li><a style='font-size: 17px;'>{$row['cat_name']}
                            <span class='drop-icon'>▾</span>
                            <label title='Toggle Drop-down' class='drop-icon' for='sm2'>▾</label>
                        </a>
                        <input type='checkbox' id='sm2'>
                        <ul class='sub-menu'>";
                    $id = $row['cat_id'];
                    $query_sub = "SELECT * FROM subcategory where sub_cat_id=$id";
                    $result_sub = mysqli_query($idcon, $query_sub);
                    while ($row_sub = mysqli_fetch_array($result_sub)) {
                      echo "
                            <li><a style='font-size: 17px;' href='jobs_list.php?choice_sub={$row_sub['sub_name']}&choice_cat={$row['cat_name']}'>{$row_sub['sub_name']}</a></li>";
                    }
                    echo "
                            </ul>
                            </li>";
                  }
                  ?>
        </ul>
      </li>
    </ul>
  </nav>
  </h1>
  </div>


  <!-------------------------------------- Division Work ----------------------------------- -->
<div class="div_work" id="div_work" style="background-color: #87CEFA;height:auto;height:auto !important;height:30px;  "> 
<br> <br>
  <h1 style="font-size: 42px;color:black;"> Some snippets of companies:</h1> 
  <h1>
<div>
    <p style="font-size: 27px;color:#0000CD;">Share with us your business to be featured right below!</p> <br> 
</div>
  


       <div style="margin-left: auto;
  margin-right: auto;
  display: table;">
  

                     <?php
//SELECT * From user,company,subcategory,type where u_id=comp_u_id AND comp_sub_id=sub_id AND comp_type_id=type_id AND  type_name='freelance' AND sub_name='mecanics';
for($i=0;$i<3;$i++){
$query = "SELECT * FROM user,company,type
 where `type_id`=comp_type_id AND comp_u_id=u_id AND type_name='shop'
 ORDER BY RAND()
LIMIT 1";
$result = mysqli_query($idcon, $query);

while ($row = mysqli_fetch_array($result)) {
    $image_path = $row["u_pic_path"];
    $image_name = $row["u_pic_name"];
    echo "
    <div class='single-card'>
    <div class='card' onclick=document.location.href='company_profile.php?comp_id={$row['comp_id']}' style='width: 18rem; height:45vh;'>
        <div class='hovereffect' style='width: 18rem;'>
            <img class='card-img-top minipic' height='250' src='".$image_path."".$image_name."' alt='images/user.png' onerror=this.src='images/user.png' '>
            <div class='overlay'>
                <h2>{$row['comp_name']} </h2>
                <p>
                    <a style='font-size:20px;' href='company_profile.php?comp_id={$row['comp_id']}&u_id={$row['u_id']}'>LINK HERE</a>
                </p>
            </div>
        </div>
        <div class='card-body' style='width: 18rem; max-height:15vh;'>
            <h5 class='card-title'></h5>
            <p><a style='font-size:20px;' href='http://{$row['comp_website']}' class='card-text'>{$row['comp_website']}.</a></p>
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
</div> " ; }} ?>
                </div>
</div>
<style>
    .hovereffect {
        width: 100%;
        height: 100%;
        float: left;
        overflow: hidden;
        position: relative;
        text-align: center;
        cursor: default;
        background: #68be74;
      }
      
      .hovereffect .overlay {
        width: 100%;
        height: 100%;
        position: absolute;
        overflow: hidden;
        top: 0;
        left: 0;
        padding: 50px 20px;
      }
      
      .hovereffect img {
        display: block;
        position: relative;
        max-width: none;
        width: calc(100% + 20px);
        -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
        transition: opacity 0.35s, transform 0.35s;
        -webkit-transform: translate3d(-10px,0,0);
        transform: translate3d(-10px,0,0);
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
      }
      
      .hovereffect:hover img {
        opacity: 0.4;
        filter: alpha(opacity=40);
        -webkit-transform: translate3d(0,0,0);
        transform: translate3d(0,0,0);
      }
      
      .hovereffect h2 {
        text-transform: uppercase;
        color: #fff;
        text-align: center;
        position: relative;
        font-size: 17px;
        overflow: hidden;
        padding: 0.5em 0;
        background-color: transparent;
      }
      
      .hovereffect h2:after {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background: #fff;
        content: '';
        -webkit-transition: -webkit-transform 0.35s;
        transition: transform 0.35s;
        -webkit-transform: translate3d(-100%,0,0);
        transform: translate3d(-100%,0,0);
      }
      
      .hovereffect:hover h2:after {
        -webkit-transform: translate3d(0,0,0);
        transform: translate3d(0,0,0);
      }
      
      .hovereffect a, .hovereffect p {
        color: #FFF;
        opacity: 0;
        filter: alpha(opacity=0);
        -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
        transition: opacity 0.35s, transform 0.35s;
        -webkit-transform: translate3d(100%,0,0);
        transform: translate3d(100%,0,0);
      }
      
      .hovereffect:hover a, .hovereffect:hover p {
        opacity: 1;
        filter: alpha(opacity=100);
        -webkit-transform: translate3d(0,0,0);
        transform: translate3d(0,0,0);
      }


    .card:hover {
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,.19),0 0.3rem 0.3rem rgba(0,0,0,.23);
    }

      /* end */
  
  </style>
                </div>
</div>


  <!-------------------------------------- Footer ----------------------------------- -->
<!-- Page Content -->
<section class="py-5">
    <center><div class="container">
      <h1>Connect with us:</h1> <br>

      <button type="button" class="btn btn-outline-primary" style="border-radius: 8px;width: 70px;color: blue;font-size : 20px;"><i class="fab fa-facebook-f"></i></button>
      <button type="button" class="btn btn-outline-danger" style="border-radius: 8px;width: 70px;color: red;font-size : 20px;"><i class="fab fa-google"></i></button>
      <button type="button" class="btn btn-outline-info" style="border-radius: 8px;width: 70px;color: DeepSkyBlue ;font-size : 20px;"><i class="fab fa-linkedin-in"></i></button>
      
    </div> </center>
  </section>

  
  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">&copy; Finleb - 2018</p>
    </div>
    <!-- /.container -->
  </footer>



    <!-------------------------------------- Bootstrap core JavaScript ----------------------------------- -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="javascript/ourjs.js"></script>
        <script type="text/javascript" src="list/jquery.min.js"></script>
        <script type="text/javascript" src="list/js.js"></script>
    <!-- Scripts -->
    <script src="javascript/scripts.js"></script>

  </body>

</html>



