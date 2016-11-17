<?php $this->load->view('admin/components/page_head'); ?>
<body class="hold-transition login-page">
	<?php $this->load->view($subview); ?>

 <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- iCheck -->
    <script src="../plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
<?php $this->load->view('admin/components/page_head'); ?>