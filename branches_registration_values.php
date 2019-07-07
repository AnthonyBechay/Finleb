<?php
    extract($_POST);
    session_start();

    $comp_id = $_SESSION['comp_id'];

    if(isset($branch_register)){
  
        $id_br_reg = "SELECT br_id FROM branch WHERE br_tel = '$branch_tel'";
        $result_id_br = mysqli_query($idcon, $id_br_reg);
    
        $data_br_reg = mysqli_fetch_array($result_id_br, MYSQLI_NUM);
    
        if($data_br_reg[0] > 1) {
          echo"
          <script>
          alert('Branch with this phone number already exists!');
          </script>
          ";

        }else{

            echo"
            <script>
            alert('Your branch was successfully added!');
            </script>
            ";

            $insert_branch = "INSERT INTO branch(br_location,br_desc,br_tel,br_comp_id) VALUES('$branch_location','$branch_desc','$branch_tel','$comp_id');";
            mysqli_query($idcon, $insert_branch);

            foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){

            $id_b = "SELECT MAX(br_id) AS max_br FROM branch WHERE br_comp_id = '$comp_id'";

            $result_user_d = mysqli_query($idcon, $id_b);
            $row_id_d = mysqli_fetch_array($result_user_d);

            $br_id = $row_id_d['max_br']; 

            $file_name = $_FILES['files']['name'][$key];
            $file_tmp = $_FILES['files']['tmp_name'][$key];

            $folder="D:/IT/wamp server/wamp/www/projet fin d'etude/finleb/images/imagesUSER/";
			$folder_database="http://localhost/projet%20fin%20d&#39;etude/finleb/images/imagesUSER/";
            
            $insert_path_branch="INSERT INTO picture(pic_name,pic_path,pic_br_id) VALUES('$file_name','$folder_database','$br_id')";

			$var_branch = mysqli_query($idcon,$insert_path_branch);
            
            if(is_dir($dir)==false){
				move_uploaded_file($file_tmp,"images/imagesUSER/".$file_name);
			}
			
			
            
            
            }
            mysqli_close($idcon);
        }
}

?>

