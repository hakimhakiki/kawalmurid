<!DOCTYPE html>
<html lang="en">
	<!-- Here lies the noble header -->
	<?php $this->load->view("_partials/01header"); ?>
	<body>
		<!-- Navbar goes here -->
		<?php $this->load->view("_partials/02navbar"); ?>
		<!-- Aside and Main contents -->
		<div class="container-fluid">
			<div class="row">
				<!-- Sidebar Here -->
				<?php $this->load->view("_partials/03sidebar"); ?>
				<div class="col-md-10" style="padding: 1% 1% 1% 1%;">
					<!-- Main body goes here -->
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-3">
								<div class="card shadow-sm">
									<div class="card-body bg-primary text-light">
										<h3 class="card-title"><i class="fa fa-users"></i> Visitor</h3>
										<div class="card-text"><strong>366</strong> link visitation</div>
									</div>
									<div class="card-footer"><a href="#">More <i class="fa fa-arrow-right"></i></a></div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card shadow-sm">
									<div class="card-body bg-success text-light">
										<h3 class="card-title"><i class="fa fa-shopping-cart"></i> Product</h3>
										<div class="card-text"><strong>15</strong> new product</div>
									</div>
									<div class="card-footer"><a href="#">More <i class="fa fa-arrow-right"></i></a></div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card shadow-sm">
									<div class="card-body bg-warning text-light">
										<h3 class="card-title"><i class="fa fa-flag-o"></i> Issue</h3>
										<div class="card-text"><strong>30</strong> issues made</div>
									</div>
									<div class="card-footer"><a href="#">More <i class="fa fa-arrow-right"></i></a></div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card shadow-sm">
									<div class="card-body bg-danger text-light">
										<h3 class="card-title"><i class="fa fa-ban"></i> Error</h3>
										<div class="card-text"><strong>5</strong> error found</div>
									</div>
									<div class="card-footer"><a href="#">More <i class="fa fa-arrow-right"></i></a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Script goes here -->
		<?php $this->load->view("_partials/04modal"); ?>
		<?php $this->load->view("_partials/05footer"); ?>
	</body>
</html>