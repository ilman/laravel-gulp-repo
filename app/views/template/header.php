<nav class="navbar navbar-main" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="<?php echo url('/') ?>">
				<strong>BRAND</strong>
			</a>
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
<?php if($current_user): ?>
	<div class="navbar navbar-default" role="navigation">	
		<div class="container">
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-left">					
					<li>
						<a href="<?php echo url('member') ?>">
							<?php echo trans('link.dashboard') ?>
						</a>
					</li>
					<li>
						<a href="<?php echo url('member/company') ?>">
							<?php echo trans('link.company') ?>
						</a>
					</li>		
					<li>
						<a href="<?php echo url('member/product') ?>">
							<?php echo trans('link.product') ?>
						</a>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">			
					<li>
						<a href="<?php echo url('member/comment') ?>">
							<?php echo trans('link.comment') ?>
						</a>
					</li>
					<li>
						<a href="<?php echo url('member/message') ?>">
							<?php echo trans('link.message') ?>
						</a>
					</li>
					<li>
						<a href="<?php echo url('member/setting') ?>">
							<?php echo trans('link.settings') ?>
						</a>
					</li>	
				</ul>
			</div>
		</div>
	</div>
<?php endif; ?>