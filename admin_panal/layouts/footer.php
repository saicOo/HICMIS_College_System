<div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2018. All rights reserved. <a href="https://saicopy.com">Saico</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

<!-- jquery
    ============================================ -->
<script src="<?php echo $assets ?>js/vendor/jquery-1.12.4.min.js"></script>
<!-- bootstrap JS
    ============================================ -->
<script src="<?php echo $assets ?>js/bootstrap.min.js"></script>
<!-- wow JS
    ============================================ -->
<script src="<?php echo $assets ?>js/wow.min.js"></script>
<!-- price-slider JS
    ============================================ -->
<script src="<?php echo $assets ?>js/jquery-price-slider.js"></script>
<!-- meanmenu JS
    ============================================ -->
<script src="<?php echo $assets ?>js/jquery.meanmenu.js"></script>
<!-- owl.carousel JS
    ============================================ -->
<script src="<?php echo $assets ?>js/owl.carousel.min.js"></script>
<!-- sticky JS
    ============================================ -->
<script src="<?php echo $assets ?>js/jquery.sticky.js"></script>
<!-- scrollUp JS
    ============================================ -->
<script src="<?php echo $assets ?>js/jquery.scrollUp.min.js"></script>
<!-- counterup JS
    ============================================ -->
<script src="<?php echo $assets ?>js/counterup/jquery.counterup.min.js"></script>
<script src="<?php echo $assets ?>js/counterup/waypoints.min.js"></script>
<script src="<?php echo $assets ?>js/counterup/counterup-active.js"></script>
<!-- mCustomScrollbar JS
    ============================================ -->
<script src="<?php echo $assets ?>js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?php echo $assets ?>js/scrollbar/mCustomScrollbar-active.js"></script>
<!-- metisMenu JS
    ============================================ -->
<script src="<?php echo $assets ?>js/metisMenu/metisMenu.min.js"></script>
<script src="<?php echo $assets ?>js/metisMenu/metisMenu-active.js"></script>
    <!-- datapicker JS
		============================================ -->
        <script src="<?php echo $assets ?>js/datapicker/bootstrap-datepicker.js"></script>
    <script src="<?php echo $assets ?>js/datapicker/datepicker-active.js"></script>
    <!-- notification JS
============================================ -->
<script src="<?php echo $assets ?>js/notifications/Lobibox.js"></script>
<script src="<?php echo $assets ?>js/notifications/notification-active.js"></script>
<!-- plugins JS
    ============================================ -->
<script src="<?php echo $assets ?>js/plugins.js"></script>
<!-- main JS
    ============================================ -->
<script src="<?php echo $assets ?>js/main.js"></script>

<script>
<?php //  session notification success 
if(isset($_SESSION['success'])): ?>
    Lobibox.notify('success', {
        sound: false,
        msg: "<?php echo $_SESSION['success'] ?>"
    });
<?php   // checked Message count 
         unset($_SESSION['success']); ?>
    <?php endif ?>
<?php   //  session notification success 
 if(isset($_SESSION['error'])): ?>
    Lobibox.notify('error', {
        sound: false,
        msg: "<?php echo $_SESSION['error'] ?>"
    });
    <?php   // checked Message count
            unset($_SESSION['error']); ?>
<?php endif ?>
</script>

       
</body>

</html>