<?php
extract($_POST);
session_start();

$u_id = $_SESSION['u_id'];

  if(isset($shop_signin)) {
      if($_SESSION['login'] ==  0){
        echo"
        <script>
        alert('Login first');
        </script>
        ";
      }else{


    $id_shop_reg = "SELECT comp_id FROM company WHERE comp_name = '$shop_comp_name'";
        $result_id_shop = mysqli_query($idcon, $id_shop_reg);
    
        $data_shop_reg = mysqli_fetch_array($result_id_shop, MYSQLI_NUM);
    
        if($data_shop_reg[0] > 1) {
          echo"
          <script>
          alert('A company with this name already exists!');
          </script>
          ";
        }



    $insert_shop = "INSERT INTO company(comp_name,comp_website,comp_desc,comp_u_id,comp_type_id,comp_sub_id) VALUES('$shop_comp_name','$shop_comp_website','$shop_comp_desc','$u_id','2','$shop_comp_subcat')";
    mysqli_query($idcon, $insert_shop);
    header('Location: branches_registration.php');

    $q_comp_id = "SELECT comp_id FROM company WHERE comp_name = '$shop_comp_name'";
    $r_comp_id = mysqli_query($idcon, $q_comp_id);

    $row_comp = mysqli_fetch_array($r_comp_id);
    if (!isset($_SESSION['comp_id'])){
    $_SESSION['comp_id'] = $row_comp['comp_id'];
    }
}

  }else if(isset($freelance_signin)){
    if($_SESSION['login'] ==  0){
        echo"
        <script>
        alert('Login first');
        </script>
        ";
      }else{
    $q_user_email = "SELECT u_email FROM user WHERE u_id = '$u_id';";
    $r_user_email = mysqli_query($idcon, $q_user_email);

    while($row = mysqli_fetch_array($r_user_email)){
        $user_email = $row['u_email'];
    }

    $insert_freelance = "INSERT INTO company(comp_name,comp_website,comp_desc,comp_u_id,comp_type_id,comp_sub_id) VALUES('$user_email','','$freelance_description','$u_id','1','$shop_comp_subcat_freelance');";
    mysqli_query($idcon, $insert_freelance);

    $q_comp_id = "SELECT comp_id FROM company WHERE comp_name = '$user_email'";
    $r_comp_id = mysqli_query($idcon, $q_comp_id);

    while($row_c = mysqli_fetch_array($r_comp_id)){
        $comp_id = $row_c['comp_id'];
    }

    $insert_freelance_branch = "INSERT INTO branch(br_desc,br_location,br_tel,br_comp_id) VALUES('$freelance_location','','','$comp_id');";
    mysqli_query($idcon, $insert_freelance_branch);

    echo"
    <script>
    alert('Your business has been successfully added!');
    </script>
    ";
}
}
?>