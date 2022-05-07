<div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2018. All rights reserved. Template by <a href="https://colorlib.com/wp/templates/">Colorlib</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

<!-- jquery
    ============================================ -->
<script src="/admin_panal/assets/js/vendor/jquery-1.12.4.min.js"></script>
<!-- bootstrap JS
    ============================================ -->
<script src="/admin_panal/assets/js/bootstrap.min.js"></script>
<!-- wow JS
    ============================================ -->
<script src="/admin_panal/assets/js/wow.min.js"></script>
<!-- price-slider JS
    ============================================ -->
<script src="/admin_panal/assets/js/jquery-price-slider.js"></script>
<!-- meanmenu JS
    ============================================ -->
<script src="/admin_panal/assets/js/jquery.meanmenu.js"></script>
<!-- owl.carousel JS
    ============================================ -->
<script src="/admin_panal/assets/js/owl.carousel.min.js"></script>
<!-- sticky JS
    ============================================ -->
<script src="/admin_panal/assets/js/jquery.sticky.js"></script>
<!-- scrollUp JS
    ============================================ -->
<script src="/admin_panal/assets/js/jquery.scrollUp.min.js"></script>
<!-- counterup JS
    ============================================ -->
<script src="/admin_panal/assets/js/counterup/jquery.counterup.min.js"></script>
<script src="/admin_panal/assets/js/counterup/waypoints.min.js"></script>
<script src="/admin_panal/assets/js/counterup/counterup-active.js"></script>
<!-- mCustomScrollbar JS
    ============================================ -->
<script src="/admin_panal/assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="/admin_panal/assets/js/scrollbar/mCustomScrollbar-active.js"></script>
<!-- metisMenu JS
    ============================================ -->
<script src="/admin_panal/assets/js/metisMenu/metisMenu.min.js"></script>
<script src="/admin_panal/assets/js/metisMenu/metisMenu-active.js"></script>
    <!-- datapicker JS
		============================================ -->
        <script src="/admin_panal/assets/js/datapicker/bootstrap-datepicker.js"></script>
    <script src="/admin_panal/assets/js/datapicker/datepicker-active.js"></script>
<!-- morrisjs JS
    ============================================ -->
<!-- <script src="/admin_panal/assets/js/sparkline/jquery.sparkline.min.js"></script> -->
<!-- <script src="/admin_panal/assets/js/sparkline/jquery.charts-sparkline.js"></script> -->
<!-- <script src="/admin_panal/assets/js/sparkline/sparkline-active.js"></script> -->
<!-- notification JS
============================================ -->
<script src="/admin_panal/assets/js/notifications/Lobibox.js"></script>
<script src="/admin_panal/assets/js/notifications/notification-active.js"></script>
<!-- calendar JS
    ============================================ -->
<!-- <script src="/admin_panal/assets/js/calendar/moment.min.js"></script> -->
<!-- <script src="/admin_panal/assets/js/calendar/fullcalendar.min.js"></script> -->
<!-- <script src="/admin_panal/assets/js/calendar/fullcalendar-active.js"></script> -->
<!-- plugins JS
    ============================================ -->
<script src="/admin_panal/assets/js/plugins.js"></script>
<!-- main JS
    ============================================ -->
<script src="/admin_panal/assets/js/main.js"></script>

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
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
       
</body>

</html>