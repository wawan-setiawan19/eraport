  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version 16</b>
    </div>
    <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#"><?php echo $aplikasi['namasek']; ?></a></strong> by SMP IQU ALBAHJAH
  </footer>
 
</div>

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo $base; ?>theme/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo $base; ?>theme/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo $base; ?>theme/bower_components/morris.js/morris.min.js"></script>
<!-- DataTables -->
<script src="<?php echo $base; ?>theme/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $base; ?>theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $(".example1").DataTable();
    $("#example1").DataTable({
      "pageLength": 20
    });
    $('#example2').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": false,
      "autoWidth": false
    });
    $('#example3').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": false,
      "autoWidth": false
    });
  });
</script>
<!-- SlimScroll -->
<script src="<?php echo $base; ?>theme/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo $base; ?>theme/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $base; ?>theme/dist/js/adminlte.min.js"></script>
<!-- iCheck -->
<script src="<?php echo $base; ?>theme/plugins/iCheck/icheck.min.js"></script>
<!-- Select2 -->
<script src="<?php echo $base; ?>theme/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?php echo $base; ?>theme/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo $base; ?>theme/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo $base; ?>theme/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="<?php echo $base; ?>theme/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo $base; ?>theme/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo $base; ?>theme/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo $base; ?>theme/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo $base; ?>theme/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
  $(function () {
    //Initialize Select2 Elements
    $("#select2").select2();
  });
  $(function () {
    //Initialize Select2 Elements
    $("#select3").select2();
  });
  $(function () {
    //Initialize Select2 Elements
    $("#select4").select2();
  });
  $(function () {
    //Initialize Select2 Elements
    $(".select").select2();
  });
//angka 500 dibawah ini artinya pesan akan muncul dalam 0,5 detik setelah document ready
$(document).ready(function(){setTimeout(function(){$(".alert").fadeIn('fast');}, 100);});
//angka 3000 dibawah ini artinya pesan akan hilang dalam 3 detik setelah muncul
setTimeout(function(){$(".alert").fadeOut('fast');}, 3000);
</script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo $base; ?>theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    //bootstrap WYSIHTML5 - text editor
    $('#textarea2').wysihtml5()
  })
</script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $base; ?>theme/dist/js/demo.js"></script>
</body>
</html>
