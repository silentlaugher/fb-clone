<?php 
    $page_title = "Facebook Clone - Register Page -";
    include_once 'includes/partials/headers.php';
    include_once 'includes/connect/db.php';
    include_once 'includes/core/database/load.php';

    if(isset($_POST['first-name']) && !empty($_POST['first-name'])){
        $upFirst = $_POST['first-name'];
        $upLast = $_POST['last-name'];
        $upEmailMobile = $_POST['email-mobile'];
        $upPassword = $_POST['up-password'];
        $birthDay = $_POST['birth-day'];
        $birthMonth = $_POST['birth-month'];
        $birthYear = $_POST['birth-year'];
        if(!empty($_POST['gen'])){
            $upgen = $_POST['gen'];
        }
        $birth = ''.$birthYear.'-'.$birthMonth.'-'.$birthDay.'';
        if(empty($upFirst) or empty($upLast) or empty($upEmailMobile) or empty($upgen)){
            $error = 'All feilds are required';
        }else{
            $first_name = $loadFromUser->checkInput($upFirst);
            $last_name = $loadFromUser->checkInput($upLast);
            $email_mobile = $loadFromUser->checkInput($upEmailMobile);
            $password = $loadFromUser->checkInput($upPassword);
            $screenName = ''.$first_name.'_'.$last_name.'';
            if (DB::query('SELECT screenName FROM users WHERE screenName = :screenName', array(':screenName' => $screenName ))) {
                $screenRand = rand();
                $userLink = ''.$screenName.''.$screenRand.'';
            }else{
                $userLink = $screenName;
            }
            if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email_mobile)){
                if(!preg_match("^[0-9]{11}^", $email_mobile)){
                    $error = 'Email id or Mobile number is not correct. Please try again.';
                    }
                }else{
                  if(!filter_var($email_mobile)){
                      $error = "Invalid Email Format";
                }else if(strlen($first_name) > 20){
                        $error = "Name must be between 2-20 character";
                }else if(strlen($password) <8 && strlen($password) >= 60){
                        $error = "The password is either too short or too long";
                }else{
                    if((filter_var($email_mobile,FILTER_VALIDATE_EMAIL)) && $loadFromUser->checkEmail($email_mobile) === true){
                        $error = "Email is already in use";
                    }else{
                        $user_id = $loadFromUser->create('users', array('first_name' =>$first_name, 'last_name'=>$last_name, 'email'=>$email_mobile, 'password'=>password_hash($password, PASSWORD_BCRYPT),'screenName'=>$screenName,'userLink'=>$userLink, 'birthday'=>$birth, 'gender'=>$upgen));
                    }
                }
            }
        }
    }else{
        echo 'User not found!';
    }
?>
<div class="header"></div>
<div class="main">
    <div class="left-side">
        <img src="assets/img/facebookSigninImage.png" alt="">
    </div>
    <div class="right-side">
        <div class="error">
            <?php if(!empty($error)){echo $error;} ?>
        </div>
        <h1>Create an account</h1>
        <div>It's free and always will be</div>
        <form action="register.php" method="POST" name="user-sign-up">
            <div class="sign-up-form">
                <div class="sign-up-name">
                    <input type="text" name="first-name" id="first-name" class="text-field" placeholder="First Name">
                    <input type="text" name="last-name" id="last-name" class="text-field" placeholder="Last Name">
                </div>
                <div class="sign-wrap-mobile">
                    <input type="text" name="email-mobile" id="up-email" class="text-input" placeholder="Mobile number or email address">
                </div>
                <div class="sign-up-password">
                    <input type="password" name="up-password" id="up-password" class="text-input" placeholder="Password">
                </div>
                <div class="sign-up-birthday">
                    <div class="bday">Birthday</div>
                    <div class="form-birthday">
                        <select name="birth-month" id="months" class="select-body"></select>
                        <select name="birth-day" id="days" class="select-body"></select>
                        <select name="birth-year" id="years" class="select-body"></select>
                    </div>
                </div>
                <div class="gender-wrap">
                    <input type="radio" name="gen" id="male" value="male" class="m0">
                    <label for="male" class="gender">Male</label>
                    <input type="radio" name="gen" id="female" value="female" class="m0">
                    <label for="female" class="gender">Female</label>
                    <input type="radio" name="gen" id="irns" value="irns" class="m0">
                    <label for="irns" class="gender">I'd rather not say</label>
                </div>
                <div class="term">
                    By clicking Register, you agree to our Terms and Conditions, Privacy policy, Data policy, and Cookie policy. You may receive SMS notifications or emails from us and can opt out at any time.
                </div>
                <input type="submit" value="Register" class="sign-up">
            </div>
        </form>
    </div>
</div>
<script src="assets/js/jquery.js"></script>
<script>
        for (i = new Date().getFullYear(); i > 1899; i--) {
            //    2019,2018, 2017,2016.....1901
            $("#years").append($('<option/>').val(i).html(i));

        }
        for (i = 1; i < 13; i++) {
            $('#months').append($('<option/>').val(i).html(i));
        }
        updateNumberOfDays();

        function updateNumberOfDays() {
            $('#days').html('');
            month = $('#months').val();
            year = $('#years').val();
            days = daysInMonth(month, year);
            for (i = 1; i < days + 1; i++) {
                $('#days').append($('<option/>').val(i).html(i));
            }

        }
        $('#years, #months').on('change', function() {
            updateNumberOfDays();
        });
        function daysInMonth(month, year) {
            return new Date(year, month, 0).getDate();
        }
</script>
<?php 
    include_once 'includes/partials/footers.php';
?>