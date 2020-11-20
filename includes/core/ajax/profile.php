<?php 
    include_once 'includes/core/database/load.php';
    include_once 'includes/connect/login.php';

    $userid = login::isLoggedIn();
    if(isset($_POST['imgName'])){
        $imgName = $loadFromUser->checkInput($_POST['imgName']);
        $userid = $loadFromUser->checkInput($_POST['userid']);

        $loadFromUser->update('profile', $userid, array('coverPic' => $imgName));
        echo 'Cover found in db';
        //echo $imgName;

    }else{
        echo 'Cover not found';
    }
    
?>