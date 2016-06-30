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
    <title>Terms and Conditions | Download Soal IPS SMP</title>
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
                    <h1>Terms and Conditions</h1>
                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada</p>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="/">Home</a></li>
                        <li class="active">Terms and Conditions</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title-->    

    <section id="terms" class="container">
        <h1>Terms and Conditions ("Terms")</h1>
        <p>Last updated: January 23, 2016</p>

        <p>Please read these Terms and Conditions ("Terms", "Terms and Conditions") carefully before using the www.downloadsoalipssmp.com website (the "Service") operated by Downloa Soal IPS SMP ("us", "we", or "our").</p>

        <p>Your access to and use of the Service is conditioned on your acceptance of and compliance with these Terms. These Terms apply to all visitors, users and others who access or use the Service.</p>

        <p>By accessing or using the Service you agree to be bound by these Terms. If you disagree with any part of the terms then you may not access the Service.</p>

        <p><strong>Accounts</strong></p>

        <p>When you create an account with us, you must provide us information that is accurate, complete, and current at all times. Failure to do so constitutes a breach of the Terms, which may result in immediate termination of your account on our Service.</p>

        <p>You are responsible for safeguarding the password that you use to access the Service and for any activities or actions under your password, whether your password is with our Service or a third-party service.</p>

        <p>You agree not to disclose your password to any third party. You must notify us immediately upon becoming aware of any breach of security or unauthorized use of your account.</p>    

        <p><strong>Links To Other Web Sites</strong></p>

        <p>Our Service may contain links to third-party web sites or services that are not owned or controlled by Downloa Soal IPS SMP.</p>

        <p>Downloa Soal IPS SMP has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third party web sites or services. You further acknowledge and agree that Downloa Soal IPS SMP shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services.</p>

        <p>We strongly advise you to read the terms and conditions and privacy policies of any third-party web sites or services that you visit.</p>

        <p><strong>Termination</strong></p>

        <p>We may terminate or suspend access to our Service immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.</p>

        <p>All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.</p>

        <p>We may terminate or suspend your account immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.</p>

        <p>Upon termination, your right to use the Service will immediately cease. If you wish to terminate your account, you may simply discontinue using the Service.</p>

        <p>All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.</p>

        <p><strong>Governing Law</strong></p>

        <p>These Terms shall be governed and construed in accordance with the laws of Indonesia, without regard to its conflict of law provisions.</p>

        <p>Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights. If any provision of these Terms is held to be invalid or unenforceable by a court, the remaining provisions of these Terms will remain in effect. These Terms constitute the entire agreement between us regarding our Service, and supersede and replace any prior agreements we might have between us regarding the Service.</p>

        <p><strong>Changes</strong></p>

        <p>We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material we will try to provide at least 30 days notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.</p>

        <p>By continuing to access or use our Service after those revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, please stop using the Service.</p>

        <p><strong>Contact Us</strong></p>

        <p>If you have any questions about these Terms, please contact us.</p>
    </section><!--/#terms-->

    
    <?php 
    include('add/bottom.php'); 
    if(isset($_SESSION['username'])){
        include ("modal/modal-change-password.php");    
    }
    ?>
</body>
</html>