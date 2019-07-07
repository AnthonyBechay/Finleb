<?php
    include("php/connexion.inc.php");
    $idcon = connex();
    extract($_POST);
    session_start();

    $v = $_SESSION['login'];

    if (isset($_GET['function'])){
      session_destroy();
      $v = 0;
    }

    $show_err_msg=false;

    if(isset($signin_submit)){
    session_start();

    

    $id = "SELECT u_id FROM user WHERE u_email = '$signin_email'";
    $result_id = mysqli_query($idcon, $id);

    $data = mysqli_fetch_array($result_id, MYSQLI_NUM);



    if($data[0] > 1) {
      $result_user = mysqli_query($idcon, $id);
      $row_id = mysqli_fetch_array($result_user);

      $_SESSION['u_id'] = $row_id['u_id'];

        $pass = "SELECT * FROM user WHERE u_email = '$signin_email'";
        $result_pass = mysqli_query($idcon,$pass);

        $data_pass = mysqli_fetch_array($result_pass);


        if($signin_password == $data_pass['u_password']){
          $show_err_msg=false;


          $_SESSION['login'] = 1 ;
          $v = $_SESSION['login'];
        }else if("$signin_password" != $result_pass){
          $_SESSION['login'] = 0 ;
          $v = $_SESSION['login'];
          $show_err_msg=true;
        }
    }else{
      $_SESSION['login'] = 0 ;
      $v = $_SESSION['login'];
      $show_err_msg=true;
    }
  }


  if(isset($register_submit)){


    $id_reg = "SELECT u_id FROM user WHERE u_email = '$register_email' OR u_phone = '$register_phone'";
    $result_id_reg = mysqli_query($idcon, $id_reg);

    $data_reg = mysqli_fetch_array($result_id_reg, MYSQLI_NUM);

    if($data_reg[0] > 1) {
      echo"
      <script>
      alert('User with this email or phone number already exists');
      </script>
      ";
    }



    else{
    $upload_image=$_FILES["mypic"][ "name" ];


    $folder="D:/IT/wamp server/wamp/www/projet fin d'etude/finleb/images/imagesUSER/";
    $folder_database="http://localhost/projet%20fin%20d&#39;etude/finleb/images/imagesUSER/";
    //echo '<script>alert("'.$upload_image.'");</script>';

    move_uploaded_file($_FILES["mypic"]["tmp_name"], "$folder".$_FILES["mypic"]["name"]);
    
    $insert_path="INSERT INTO user(u_fname,u_lname,u_email,u_password,u_phone,u_pic_name,u_pic_path) VALUES('$register_fname','$register_lname','$register_email','$register_password','$register_phone','$upload_image','$folder_database')";
    $var=mysqli_query($idcon,$insert_path);

    $id_c = "SELECT u_id FROM user WHERE u_email = '$register_email'";

    $result_user_c = mysqli_query($idcon, $id_c);
    $row_id_c = mysqli_fetch_array($result_user_c);

    $_SESSION['u_id'] = $row_id_c['u_id'];

    $_SESSION['login'] = 1 ;
    $v = $_SESSION['login'];

    mysqli_close($idcon);
    }
  }

?>