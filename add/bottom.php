<section id="bottom" class="wet-asphalt">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <h4>Contact Info</h4>
                <div>
                    <ul class="unstyled">
                        <li><i class="icon-user"></i> Name : Hendry Suhardiman</li>
                        <li><i class="icon-map-marker"></i> Address : Margahayu, Bandung</li>
                        <li><i class="icon-credit-card"></i> BCA : 2797006960</li>
                    </ul>
                </div>
            </div> <!--/.col-md-3-->

            <div class="col-md-4 col-sm-4">
                <h4>Soal dan Meteri</h4>
                <div>
                    <ul class="arrow">
                        <li><a href="/soal-dan-materi/kelas-7/1/">Kelas 7</a></li>
                        <li><a href="/soal-dan-materi/kelas-8/1/">Kelas 8</a></li>
                        <li><a href="/soal-dan-materi/kelas-9/1/">Kelas 9</a></li>
                        <li><a href="/soal-dan-materi/osn/1/">OLIMPIADE SISWA NASIONAL</a></li>
                        <li><a href="/soal-dan-materi/silabus-rpp/1/">SILABUS - RPP</a></li>
                        <li><a href="/soal-dan-materi/ppt/1/">Power Point File</a></li>
                        <li><a href="/soal-dan-materi/sample/1/">Free Sample</a></li>
                    </ul>
                </div>
            </div><!--/.col-md-3-->

            <div class="col-md-4 col-sm-4">
                <h4>Terms and Privacy</h4>
                <div>
                    <ul class="arrow">
                        <li><a href="/cara-mendapatkan-akun" style="color:#84DE02">Cara mendapatkan akun</a></li>
                        <li><a href="/privacy-policy">Privacy Policy</a></li>
                        <li><a href="/terms-and-conditions">Terms and Conditions</a></li>
                        <li><a href="/terms-of-service">Terms of Service</a></li>
                        <li><a href="/terms-of-use">Terms of Use</a></li>
                    </ul>
                </div>
            </div><!--/.col-md-3-->
        </div>
    </div>
</section><!--/#bottom-->

<footer id="footer" class="midnight-blue">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-sm-6">
                <a href="/">DownloadSoalIPSSMP<span style="color:orange;">.com</span></a> &copy; 2016. All Rights Reserved.
            </div>
            <div class="col-md-2 col-sm-6">
                <a id="gototop" class="gototop pull-right" href="#">Go to top &nbsp<i class="icon-chevron-up"></i></a><!--#gototop-->
            </div>
        </div>
    </div>
</footer><!--/#footer-->
<?php
    $searchValue = (isset($_GET['search'])) ? $_GET['search'] : "";
    function searchIsset()
    {
        return (isset($_GET['search'])) ? "right:0px" : "";
    }
?>
    <div class='search-toggle container' class='follow-scroll' style="<?=searchIsset()?>">
        <div class="row">
            <div class="col-sm-2 search-button" style="padding-top: 6px;" title="Search">
                <font color="white"><i class="icon-search"></i></font>
            </div>
            <div class="col-sm-10">
                <input type='search' id="input-search" class='form-control' placeholder='Search' value="<?=$searchValue?>">
            </div>
        </div>
    </div>
    <?php
        if(isset($_SESSION['username']))
            echo "
                <div id='feedback' class='follow-scroll' title='Feedback'></div>
            ";
    ?>
