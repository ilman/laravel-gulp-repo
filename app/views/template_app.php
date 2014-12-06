<html>
<?php 
	$current_user = Sentry::getUser();
	$request_path = Request::path();
?>
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
		<?php include('template/header.php') ?>
	</div>
	<!-- header -->
	<div id="content">
		<div class="container">
			<?php 
				$subheader = (isset($subheader)) ? $subheader : true;
			?>
			<?php if($subheader): ?>
				<div id="subheader" class="navbar">
					<div class="navbar-left">
						<?php 
							$page_title = (isset($page_title)) ? $page_title : $request_path;
							$page_icon = isset($page_icon) ? $page_icon : 'icon-page';
							echo SG_Tags::pageTitle($page_title, $page_icon);
						?>
					</div>
					<div class="navbar-right">
						<?php 
							$breadcrumb = (isset($breadcrumb)) ? $breadcrumb : $request_path;
							echo SG_Tags::breadcrumb($breadcrumb);
						?>
					</div>
				</div>
				<!-- subheader -->

				<?php echo SG_Tags::spacer(); ?>
			<?php endif; ?>

			<?php
				echo Notification::container();
				Notification::clearAll();

				$error_messages = $errors->all();
				if($error_messages){
					echo Notification::errorInstant($error_messages);
				}
			?>
			<?php include(app_path().'/views/'.$content.'.php'); ?>
		</div>
	</div>
	<!-- content -->
	<div id="footer">
		<?php include('template/footer.php') ?>
	</div>
	<!-- footer -->
	<script type="text/javascript" src="<?php echo asset('assets/js/functions.js') ?>"></script>
	<script type="text/javascript" src="<?php echo asset('assets/js/script.js') ?>"></script>
</body>
</html>