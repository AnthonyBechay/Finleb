<?php
include 'log.php';
$search_freelance_query="Select * from user,company,type,subcategory where type_name='freelance'  AND comp_u_id=u_id AND comp_type_id=type_id AND comp_sub_id=sub_id AND sub_name='$choice_sub' AND (u_fname='$required_freelance' OR u_lname='$required_freelance')";
$search_result = mysqli_query($idcon, $search_freelance_query);


while ($row = mysqli_fetch_array($search_result)) {
    $image_path = $row["u_pic_path"];
    $image_name = $row["u_pic_name"];
    
    echo " 
    
    <div class='single-card2'>
    <div class='card' onclick=document.location.href='company_profile.php?fname={$row['u_fname']}&u_lname={$row['u_lname']}' style='width: 18rem; height:45vh;'>
        <div class='hovereffect' style='width: 18rem;'>
            <img class='card-img-top minipic' height='250' src='".$image_path."".$image_name."' alt='images/user.png' onerror=this.src='images/user.png''; '>
            <div class='overlay'>
                <h2>{$row['comp_name']} </h2>
                <p>
                    <a href='company_profile.php?fname={$row['u_fname']}&u_lname={$row['u_lname']}'>LINK HERE</a>
                </p>
            </div>
        </div>
        <div class='card-body' style='width: 18rem; max-height:15vh;'>
            <h5 class='card-title'></h5>
            <p class='card-text'>{$row['comp_desc']}.</p>
            <div class='progress'>
                <div class='progress-bar progress-bar-info' role='progressbar' aria-valuenow='50' aria-valuemin='0' aria-valuemax='100' style='width:50%'>
                score
                </div>
            </div>
        </div>
    </div>
    <br>
</div>
    
    
    ";
    
}
?>
