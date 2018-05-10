<footer class="py-5 bg-dark">
  <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; Sistem Resi Gudang Kab. Grobogan 2018</p>
  </div>
  <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="<?php echo base_url(); ?>assets/landing/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/landing/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/landing/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/moment-with-locales.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.select2').select2({
            theme: "bootstrap"
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var date = new Date();
        var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());

        $('#datepicker').datetimepicker({
            format: 'MM/DD/YYYY',
            locale: 'id',
            // minDate: new Date(new Date().setDate(date.getYear()),
            maxDate: today,
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-clock-o',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'
            }
        });
    });
</script>
