    <!-- Custom template | don't include it in your project! -->
    <div id="iframe">
        <iframe id="pdf" src="" width="100%" height="1000px"></iframe>
    </div>
    <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->
    <script src="<?= base_url() ?>assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="<?= base_url() ?>assets/js/core/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery UI -->
    <script src="<?= base_url() ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <!-- Moment JS -->
    <script src="<?= base_url() ?>assets/js/plugin/moment/moment.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="<?= base_url() ?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


    <!-- Chart JS -->
    <script src="<?= base_url() ?>assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- DateTimePicker -->
    <script src="<?= base_url() ?>assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="<?= base_url() ?>assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="<?= base_url() ?>assets/js/plugin/chart-circle/circles.min.js"></script>


    <!-- Bootstrap Notify -->
    <script src="<?= base_url() ?>assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>


    <!-- Sweet Alert -->
    <script src="<?= base_url() ?>assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Select2 -->
    <script src="<?= base_url() ?>assets/js/plugin/select2/select2.full.min.js"></script>

    <!-- Datatables -->
    <script src="<?= base_url() ?>assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Atlantis JS -->
    <script src="<?= base_url() ?>assets/js/atlantis.min.js"></script>
    <script src="<?= base_url() ?>assets/js/setting-demo2.js"></script>
    <?php
    $this->load->view('include/crud');

    ?>


    <script>
        $(document).ready(function() {

            $('#iframe').hide();
            $('.scrollbar-inner').scrollbar();

        });


        $(function() {

            var table, current = location.pathname.split("/").slice(-1)[0].replace(/^\/|\/$/g, '');
            //alert(location.pathname.split("/").slice(1)[0])
            console.log(current);

            $('.nav a[href~="' + location.href + '"]').parent('li').addClass('active');

            switch (current) {
                case "elemen_mk":
                    $('.nav .collapse').parent('li').addClass('active ');
                    $('.nav .collapse').addClass('show');
                    break;
                case "matakuliah":

                    $('.nav .collapse').parent('li').addClass('active ');
                    $('.nav .collapse').addClass('show');
                    break;
                case "user":
                    $('.nav .BARUUU').parent('li').addClass('active ');
                    $('.nav .BARUUU').addClass('show');
                    break;
                case "pejabat":
                    $('.nav .BARUUU').parent('li').addClass('active ');
                    $('.nav .BARUUU').addClass('show');
                    break;
                case "batas":
                    $('.nav .BARUUU').parent('li').addClass('active ');
                    $('.nav .BARUUU').addClass('show');
                    break;

                default:
                    $('.nav .collapse').parent('li').removeClass('active ');
                    $('.nav .collapse').removeClass('show');
                    break;
            }

        });

        $('input[name="tahunAng"]').on('change', function() {
            setTA($(this).val());
        });

        function setTA(ta) {
            $.ajax({
                type: "GET",
                url: "<?php echo base_url('ta') ?>",
                data: {
                    ta: ta
                },
                success: function(data) {
                    swal("Tahun Akademik Diganti", {

                        icon: "success",
                        buttons: {
                            confirm: {
                                className: 'btn btn-success'
                            }
                        }
                    });
                    table.ajax.reload();
                }
            });
        }

        function setProdi(prodi) {
            $.ajax({
                type: "GET",
                url: "<?php echo base_url('ta/prodi') ?>",
                data: {
                    prodi: prodi
                },
                success: function(data) {

                    $('.ttp').attr('title', 'Prodi : ' + data);
                    swal({
                        title: "Prodi Di ganti",
                        text: "prodi :" + data,
                        icon: "success",
                        buttons: {
                            confirm: {
                                className: 'btn btn-success'
                            }
                        }
                    });
                    table.ajax.reload();
                }
            });
        }

        $('.selectNim').select2({
            theme: "bootstrap",
            ajax: {
                url: '<?= base_url(); ?>api/mahasiswa',
                data: function(q) {
                    return {
                        q: q.term
                    }
                },
                dataType: 'JSON',
                cache: true
            },

            minimumInputLength: 1,
            placeholder: 'Pilih Mahasiswa',
        });

        $('#PrintForm').on('submit', function(e) {
            e.preventDefault();
            let nim = $('#PrintForm [name="nimPrint"]').val();
            let judulTa = $('#PrintForm [name="judulTa"]').val();
            $('#pdf').attr('src', '<?= base_url() ?>operator/report/daftarNilai?judulta=' + judulTa + '&nim=' + nim + '');
            $('#printModal').modal('hide');
            $('#PrintForm').trigger("reset");
            $('#iframe').hide();

        });
    </script>