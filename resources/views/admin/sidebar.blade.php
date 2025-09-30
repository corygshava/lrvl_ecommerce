<nav class="sidebar sidebar-offcanvas" id="sidebar">
	<div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
		<a class="w3-text-white sidebar-brand brand-logo" href="./site_admin">myAdmin</a>
		<a class="w3-text-white sidebar-brand brand-logo-mini" href="./site_admin">myAdmin</a>
	</div>
	<ul class="nav">
		<li class="nav-item profile w3-hide">
			<div class="profile-desc">
				<div class="profile-pic">
					<div class="count-indicator">
						<img class="img-xs rounded-circle " src="./adm_ass/assets/images/faces/face15.jpg" alt="">
						<span class="count bg-success"></span>
					</div>
					<div class="profile-name">
						<h5 class="mb-0 font-weight-normal">Henry Klein</h5>
						<span>Gold Member</span>
					</div>
				</div>
				<a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
				<div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
					<a href="#" class="dropdown-item preview-item">
						<div class="preview-thumbnail">
							<div class="preview-icon bg-dark rounded-circle">
								<i class="mdi mdi-settings text-primary"></i>
							</div>
						</div>
						<div class="preview-item-content">
							<p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
						</div>
					</a>
					<div class="dropdown-divider"></div>
					<a href="#" class="dropdown-item preview-item">
						<div class="preview-thumbnail">
							<div class="preview-icon bg-dark rounded-circle">
								<i class="mdi mdi-onepassword  text-info"></i>
							</div>
						</div>
						<div class="preview-item-content">
							<p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
						</div>
					</a>
					<div class="dropdown-divider"></div>
					<a href="#" class="dropdown-item preview-item">
						<div class="preview-thumbnail">
							<div class="preview-icon bg-dark rounded-circle">
								<i class="mdi mdi-calendar-today text-success"></i>
							</div>
						</div>
						<div class="preview-item-content">
							<p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
						</div>
					</a>
				</div>
			</div>
		</li>

		<li class="nav-item nav-category">
			<span class="nav-link">Navigation</span>
		</li>

		<li class="nav-item menu-items">
			<a class="nav-link" href="./site_admin">
				<span class="menu-icon">
					<i class="mdi mdi-speedometer"></i>
				</span>
				<span class="menu-title">Dashboard</span>
			</a>
		</li>
		<li class="nav-item menu-items">
			<a class="nav-link" data-bs-toggle="collapse" href="#ui-basic0" aria-expanded="false" aria-controls="ui-basic">
				<span class="menu-icon">
					<i class="mdi mdi-warehouse"></i>
				</span>
				<span class="menu-title">products</span>
				<i class="menu-arrow"></i>
			</a>
			<div class="collapse" id="ui-basic0">
				<ul class="nav flex-column sub-menu">
					<li class="nav-item"> <a class="nav-link" href="{{url('admin_new_product')}}">add new product</a></li>
					<li class="nav-item"> <a class="nav-link" href="{{url('admin_list_products')}}">view products</a></li>
				</ul>
			</div>
		</li>
		<li class="nav-item menu-items">
			<a class="nav-link" data-bs-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic">
				<span class="menu-icon">
					<i class="mdi mdi-shopping"></i>
				</span>
				<span class="menu-title">Orders</span>
				<i class="menu-arrow"></i>
			</a>
			<div class="collapse" id="ui-basic1">
				<ul class="nav flex-column sub-menu">
					<li class="nav-item"><a class="nav-link" href="{{url('admin_list_orders')}}">view orders</a></li>
				</ul>
			</div>
		</li>
	</ul>
</nav>