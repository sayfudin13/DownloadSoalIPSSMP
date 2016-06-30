<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Privacy Policy | Download Soal IPS SMP</title>
    <?php include('add/css-js-icon.php'); ?>
</head><!--/head-->
<body>
    <header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">DownloadSoalIPSSMP<span style="color:lightblue;">.com</span></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><input type='search' class='form-control input-search visible-xs' placeholder='Search'></li>
                    <li><a href="/">Home</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Soal dan Materi <i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="/soal-dan-materi/kelas-7/1/">Kelas 7</a></li>
                            <li><a href="/soal-dan-materi/kelas-8/1/">Kelas 8</a></li>
                            <li><a href="/soal-dan-materi/kelas-9/1/">Kelas 9</a></li>
                            <li><a href="/soal-dan-materi/osn/1/">OLIMPIADE SISWA NASIONAL</a></li>
                            <li><a href="/soal-dan-materi/silabus-rpp/1/">SILABUS - RPP</a></li>
                            <li><a href="/soal-dan-materi/ppt/1/">Power Point File</a></li>
                            <li><a href='/soal-dan-materi/sample/1/' >Free Sample</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Daftar Pustaka</a></li>
                    <?php include('add/login.php'); ?>
                </ul>
            </div>
        </div>
    </header><!--/header-->

    <section id="title" class="emerald">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Privacy Policy</h1>
                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada</p>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="/">Home</a></li>
                        <li class="active">Privacy Policy</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title--> 

    <section id="privacy-policy" class="container">
        <h1>Privacy Policy</h1>

        <p>Last updated: January 23, 2016</p>

        <p>Downloa Soal IPS SMP ("us", "we", or "our") operates the www.downloadsoalipssmp.com website (the "Service").</p>

        <p>This page informs you of our policies regarding the collection, use and disclosure of Personal Information when you use our Service.</p>

        <p>We will not use or share your information with anyone except as described in this Privacy Policy.</p>

        <p>We use your Personal Information for providing and improving the Service. By using the Service, you agree to the collection and use of information in accordance with this policy. Unless otherwise defined in this Privacy Policy, terms used in this Privacy Policy have the same meanings as in our Terms and Conditions, accessible at www.downloadsoalipssmp.com</p>

        <p><strong>Information Collection And Use</strong></p>

        <p>While using our Service, we may ask you to provide us with certain personally identifiable information that can be used to contact or identify you. Personally identifiable information may include, but is not limited to, your name, phone number and other information ("Personal Information").</p>

        <p><strong>Log Data</strong></p>

        <p>We collect information that your browser sends whenever you visit our Service ("Log Data"). This Log Data may include information such as your computer's Internet Protocol ("IP") address, browser type, browser version, the pages of our Service that you visit, the time and date of your visit, the time spent on those pages and other statistics.</p>

        <p><strong>Cookies</strong></p>

        <p>Cookies are files with small amount of data, which may include an anonymous unique identifier. Cookies are sent to your browser from a web site and stored on your computer's hard drive.</p>

        <p>We use "cookies" to collect information. You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent. However, if you do not accept cookies, you may not be able to use some portions of our Service.</p>

        <p><strong>Service Providers</strong></p>

        <p>We may employ third party companies and individuals to facilitate our Service, to provide the Service on our behalf, to perform Service-related services or to assist us in analyzing how our Service is used.</p>

        <p>These third parties have access to your Personal Information only to perform these tasks on our behalf and are obligated not to disclose or use it for any other purpose.</p>

        <p><strong>Security</strong></p>

        <p>The security of your Personal Information is important to us, but remember that no method of transmission over the Internet, or method of electronic storage is 100% secure. While we strive to use commercially acceptable means to protect your Personal Information, we cannot guarantee its absolute security.</p>

        <p><strong>Links To Other Sites</strong></p>

        <p>Our Service may contain links to other sites that are not operated by us. If you click on a third party link, you will be directed to that third party's site. We strongly advise you to review the Privacy Policy of every site you visit.</p>

        <p>We have no control over, and assume no responsibility for the content, privacy policies or practices of any third party sites or services.</p>

        <p><strong>Children's Privacy</strong></p>

        <p>Our Service does not address anyone under the age of 13 ("Children").</p>

        <p>We do not knowingly collect personally identifiable information from children under 13. If you are a parent or guardian and you are aware that your Children has provided us with Personal Information, please contact us. If we discover that a Children under 13 has provided us with Personal Information, we will delete such information from our servers immediately.</p>

        <p><strong>Changes To This Privacy Policy</strong></p>

        <p>We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page.</p>

        <p>You are advised to review this Privacy Policy periodically for any changes. Changes to this Privacy Policy are effective when they are posted on this page.</p>

        <p><strong>Contact Us</strong></p>

        <p>If you have any questions about this Privacy Policy, please contact us.</p>
    </section><!--/#privacy-policy-->

    <?php 
    include('add/bottom.php'); 
    if(isset($_SESSION['username'])){
        include ("modal/modal-change-password.php");    
    }
    ?>
</body>
</html>