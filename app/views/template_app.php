<html>
<head>
	<title></title>

	<link rel="stylesheet" href="<?php echo asset('assets/css/style.css') ?>" />
	<script type="text/javascript" src="<?php echo asset('bower_components/jquery/dist/jquery.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo asset('bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo asset('bower_components/moment/min/moment.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo asset('bower_components/bs-datetimepicker/build/js/bootstrap-datetimepicker.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo asset('bower_components/tinymce/tinymce.min.js') ?>"></script>
	<script type="text/javascript">
		var server_url = '<?php echo url(''); ?>';
	</script>
</head>
<body>
	<div id="header">
		
	</div>
	<!-- header -->
	<div id="content">
		<div class="container">
			<?php 
				$user = Sentry::getUser();
			?>

			<?php echo Notification::container(); ?>
			<?php include(app_path().'/views/'.$content.'.php'); ?>
		</div>
	</div>
	<!-- content -->
	<div id="footer"></div>
	<!-- footer -->
	<script type="text/javascript" src="<?php echo asset('assets/js/functions.js') ?>"></script>
	<script type="text/javascript" src="<?php echo asset('assets/js/script.js') ?>"></script>
</body>
</html>