<nav class="navbar navbar-default" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="#"><strong>BRAND</strong></a>
		</div>
		<!-- navbar-header -->
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<?php if($current_user): ?>
					<li>
						<a href="<?php echo url('member/account') ?>">
							<?php echo trans('link.account') ?>
						</a>
					</li>
					<li><a href="<?php echo url('logout') ?>">Logout</a></li>
				<?php else: ?>
					<li><a href="<?php echo url('login') ?>">Login</a></li>
					<li><a href="<?php echo url('register') ?>">Register</a></li>
				<?php endif; ?>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown">Dropdown <i class="caret"></i></a>
					<ul class="dropdown-menu">
						<li><a href="#">Link 1</a></li>
						<li><a href="#">Link 2</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>