<?php 
    $page_title = "Friendbook - Profile Page -";
    include_once 'includes/partials/headers.php';
?>
    <header>
    <div class="top-bar">
        <div class="top-left-part">
            <div class="profile-logo"><img src="assets/img/logo.jpg" alt=""></div>
            <div class="search-wrap">
                <div class="search-input" style="display:flex;justify-content:center;align-items:center;width:100%;">
                    <input type="text" name="main-search" id="main-search">
                    <div class="s-icon top-icon top-css">
                        <img src="assets/img/icons8-search-36.png" alt="">
                </div>
            </div>
            <div id="search-show">
                <div class="search-result">
                </div>
            </div>
        </div>
    </div>
        <div class="top-right-part"></div>
        </div>
    </header>
    <main>
        <div class="main-area">
            <div class="profile-left-wrap">
                <div class="profile-cover-wrap"></div>
                <div class="cover-bottom-part"></div>
                <div class="bio-timeline">
                    <div class="bio-wrap"></div>
                    <div class="status-timeline-wrap"></div>
                </div>
            </div>
            <div class="profile-right-wrap"> </div>
        </div>
        <div class="top-box-show"></div>
        <div id="adv_dem"> </div>
    </main>
<?php 
    include_once 'includes/partials/footers.php';
?>