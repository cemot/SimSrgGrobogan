<!--   Core JS Files   -->
<script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/material.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>

<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="../../../cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

<!-- Library for adding dinamically elements -->
<script src="<?php echo base_url(); ?>assets/js/arrive.min.js" type="text/javascript"></script>

<!-- Forms Validations Plugin -->
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>

<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/moment-with-locales.js"></script>

<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="<?php echo base_url(); ?>assets/js/chartist.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/chartist-plugin-tooltip.min.js"></script>

<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="<?php echo base_url(); ?>assets/js/jquery.bootstrap-wizard.js"></script>

<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-notify.js"></script>

<!--   Sharrre Library    -->
<script src="<?php echo base_url(); ?>assets/js/jquery.sharrre.js"></script>

<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.js"></script>

<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="<?php echo base_url(); ?>assets/js/jquery-jvectormap.js"></script>

<!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
<script src="<?php echo base_url(); ?>assets/js/nouislider.min.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1_8C5Xz9RpEeJSaJ3E_DeBv8i7j_p6Aw"></script>

<!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="<?php echo base_url(); ?>assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="<?php echo base_url(); ?>assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="<?php echo base_url(); ?>assets/js/sweetalert2.js"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="<?php echo base_url(); ?>assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="<?php echo base_url(); ?>assets/js/fullcalendar.min.js"></script>
<!-- Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="<?php echo base_url(); ?>assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="<?php echo base_url(); ?>assets/js/material-dashboard23cd.js?v=1.2.1"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url(); ?>assets/js/demo.js"></script>
<script src="<?php echo base_url(); ?>assets/js/tinymce/tinymce.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>

<script type="text/javascript">
    $("#hsl_pengujian").change(function() {
        if ($("#hsl_pengujian").val() == 'Diterima') {
            $("#id_gudang").prop('required', true);
            $("#satuan_barang").prop('required', true);
            $("#harga_barang").prop('required', true);
            $("#no_resi").prop('required', true);
            $("#masa_aktif").prop('required', true);
            $("#pilGudang").css('visibility', 'visible');
            $(".harga").css('visibility', 'visible');
            $(".resi").css('visibility', 'visible');
        } else {
            $("#id_gudang").prop('required', false);
            $("#satuan_barang").prop('required', false);
            $("#harga_barang").prop('required', false);
            $("#no_resi").prop('required', false);
            $("#masa_aktif").prop('required', false);
            $("#pilGudang").css('visibility', 'hidden');
            $(".harga").css('visibility', 'hidden');
            $(".resi").css('visibility', 'hidden');
        }
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        <?php if($this->session->flashdata('class') && $this->session->flashdata('message')) : ?>
            notification('<?php echo $this->session->flashdata('class');?>' , '<?php echo $this->session->flashdata('message');?>');
        <?php endif; ?>

        function notification(type, message) {
            $.notify({
                icon: "notifications",
                message: message
            }, {
                type: type,
                timer: 500,
                placement: {
                    from: 'bottom',
                    align: 'right'
                }
            });
        }
    });
</script>
<script type="text/javascript">
    $.ajax({
        url: "<?php echo base_url('ajaxAPI/getDataBeras'); ?>",
        dataType: "json",
        success: function(data)
        {
            var dataChart = {
              labels: data.labels,
              series: [data.series]
            };
            var settingChart = {
                // fullWidth: true,
                chartPadding: {
                    right: 40
                },
                plugins: [
                    Chartist.plugins.tooltip()
                ]
            };
            var chart = new Chartist.Line('#chartBeras', dataChart, settingChart);
        }
    });
    $.ajax({
        url: "<?php echo base_url('ajaxAPI/getDataJagung'); ?>",
        dataType: "json",
        success: function(data)
        {
            var dataChart = {
              labels: data.labels,
              series: [data.series]
            };
            var settingChart = {
                // fullWidth: true,
                chartPadding: {
                    right: 40
                },
                plugins: [
                    Chartist.plugins.tooltip()
                ]
            };
            var chart = new Chartist.Line('#chartJagung', dataChart, settingChart);
        }
    });
    $.ajax({
        url: "<?php echo base_url('ajaxAPI/getDataGabah'); ?>",
        dataType: "json",
        success: function(data)
        {
            var dataChart = {
              labels: data.labels,
              series: [data.series]
            };
            var settingChart = {
                // fullWidth: true,
                chartPadding: {
                    right: 40
                },
                plugins: [
                    Chartist.plugins.tooltip()
                ]
            };
            var chart = new Chartist.Line('#chartGabah', dataChart, settingChart);
        }
    });
</script>
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

        $('.datepicker').datetimepicker({
            format: 'MM/DD/YYYY',
            locale: 'id',
            minDate: today,
            maxDate: new Date(new Date().setDate(date.getDate() + 14)),
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
<script>
    $(document).ready(function() {
        tinymce.init({
            selector:'textarea',
            // menubar : false,
            // toolbar : false,
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        md.initSliders()
        demo.initFormExtendedDatetimepickers();
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();
        demo.initVectorMap();
    });
</script>
<!-- <script type="text/javascript">
    $(document).ready(function() {
        var i = 1;
        $('.datatables').DataTable({
            "ajax": "<?php echo base_url('admin/user/all'); ?>",
            "columns": [
                { "data": i++ },
                { "data": "username" },
                { "data": "nama" },
                { "data": "no_tlp" },
                { "data": "updated_at" },
                { "data": "created_at" }
            ],
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }

        });

        $('.card .material-datatables label').addClass('form-group');
    });
</script> -->
<script type="text/javascript">
    $(document).ready(function() {
        $('.datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }

        });

        $('.card .material-datatables label').addClass('form-group');
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        // setInterval(startTime, 1000);
    });

    function belumAda(){
      swal({
        title: "Mohon Maaf!",
        text: "Fitur ini belum tersedia",
        type: "error",
        timer: 1250,
        showConfirmButton: false
      });
    }

    // function startTime() {
    //     var strDate = $('#serverTime').val();
    //     var today = new Date(strDate);
    //     today.setSeconds(today.getSeconds() + 1);
    //     $('#serverTime').val(today);

    //     //var today = new Date();
    //     var hour = today.getHours();
    //     var min = today.getMinutes();
    //     var sec = today.getSeconds();

    //     var months = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
    //     var date = new Date();
    //     var day = zeroPad(date.getDate(), 2);
    //     var month = date.getMonth();
    //     var yy = date.getYear();
    //     var year = (yy < 1000) ? yy + 1900 : yy;

    //     hour = checkTime(hour);
    //     min = checkTime(min);
    //     sec = checkTime(sec);
    //     document.getElementById('clock').innerHTML = "<i class='fa fa-clock-o'></i>&nbsp;&nbsp;" + day + "/" + months[month] + "/" + year + "  " + hour + ":" + min + ":" + sec + "&nbsp;WIB";
    // }

    // function checkTime(i) {
    //     if (i < 10) {
    //         i = "0" + i;
    //     }
    //     return i;
    // }
    // function zeroPad(num, places) {
    //     var zero = places - num.toString().length + 1;
    //     return Array(+(zero > 0 && zero)).join("0") + num;
    // }

</script>
