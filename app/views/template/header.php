<nav class="navbar navbar-default" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="#"><strong>BRAND</strong></a>
		</div>
		<!-- navbar-header -->
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo url('client') ?>">Klien</a></li>
				<li><a href="<?php echo url('company') ?>">Perusahaan</a></li>
				<li><a href="<?php echo url('product') ?>">Alat</a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown">Dokumen <i class="caret"></i></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo url('invoice') ?>">Invoice</a></li>
						<li><a href="<?php echo url('kwitansi') ?>">Kwitansi</a></li>
						<li><a href="<?php echo url('receipt') ?>">Tanda Terima</a></li>
						<li><a href="<?php echo url('contract') ?>">Kontrak</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown">Report <i class="caret"></i></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo url('report/total-station') ?>">Report Total Station</a></li>
						<li><a href="<?php echo url('report/theodolite') ?>">Report Theodolite</a></li>
						<li><a href="<?php echo url('report/automatic-level') ?>">Report Automatic Level</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>