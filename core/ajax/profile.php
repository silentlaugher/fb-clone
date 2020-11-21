<?php 
    include_once '../load.php';
    include_once '../../connect/login.php';

    $userid = login::isLoggedIn();
    if(isset($_POST['imgName'])){
        $imgName = $loadFromUser->checkInput($_POST['imgName']);
        $userid = $loadFromUser->checkInput($_POST['userid']);

        $loadFromUser->update('profile', $userid, array('coverPic' => $imgName));
        echo 'Cover photo found in db';

    }else{
        echo 'Cover photo not found';
    }
    
?>