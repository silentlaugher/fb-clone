<?php 
    include_once 'includes/partials/headers.php';
?>
<div class="header"></div>
<div class="main">
    <div class="left-side">
        <img src="assets/img/facebookSigninImage.png" alt="">
    </div>
    <div class="right-side">
        <div class="error"></div>
        <h1>Create an account</h1>
        <div>It's free and always will be</div>
        <form action="register.php" method="POST" name="user-sign-up">
            < class="sign-up-form">
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
<?php 
    include_once 'includes/partials/footers.php';
?>