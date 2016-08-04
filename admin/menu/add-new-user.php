<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header"><i class="fa fa-user-plus"></i> New User</h3>
				<ol class="breadcrumb">
					<li><i class="icon_group"></i>Post</li>
					<li><i class="fa fa-user-plus"></i>New User</li>
				</ol>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div id="add-admin-success" class="alert alert-success hidden">
					<h1><strong>Success create new admin!</strong></h1>
					<p>this notification will disappear in 5 seconds.</p>
				</div>
				<section class="panel">
					<header class="panel-heading">
						New Admin
					</header>
					<div class="panel-body">
						<div id="form-new-admin" class="form-horizontal form">
							<div class="form-group">
								<label class="col-sm-3 control-label">Username <span class="required">*</span></label>
								<div class="col-sm-9">
									<input type="text" id="admin-username" name="admin-username" class="add-admin-input form-control" maxlength="20" >
									<span id='add-admin-err0' class="err"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Password <span class="required">*</span></label>
								<div class="col-sm-9">
									<input type="password" id="admin-password" name="admin-password" class="add-admin-input form-control" >
									<span id='add-admin-err1' class="err"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Repassword <span class="required">*</span></label>
								<div class="col-sm-9">
									<input type="password" id="admin-repassword" name="admin-repassword" class="add-admin-input form-control" >
									<span id='add-admin-err2' class="err"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Email <span class="required">*</span></label>
								<div class="col-sm-9">
									<input type="email" id="admin-email" name="admin-email" class="add-admin-input form-control" maxlength="254" >
									<span id='add-admin-err3' class="err"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3"></label>
								<div class="col-sm-9">
									<a id="add-admin" name="add-admin" class="btn btn-primary">Add Admin</a>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</section>
</section>
