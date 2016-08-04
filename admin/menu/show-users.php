<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header"><i class="icon_profile"></i> Show Users</h3>
				<ol class="breadcrumb">
					<li><i class="icon_group"></i>Users</li>
					<li><i class="icon_profile"></i>Show Users</li>
				</ol>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-6">
				<section class="panel">
					<header class="panel-heading">
					 Show Users
					</header>
					<div class="panel-body">
						<div class="form-horizontal form">
							<div class="form-group">
								<div class="col-md-6">
									<input id="show-user-search-username" class="form-control show-user-search" placeholder="Search by username" type="text" value="">
								</div>
								<div class="col-md-6">
									<input id="show-user-search-email" class="form-control show-user-search" placeholder="Search by email" type="text" value="">
								</div>
							</div>
						</div>
						<br/>
						<div class="table-responsive">
							<table id="show-table-user" class="table table-striped table-advance table-hover table-bordered">
								<thead>
									<tr>
										<th class="col-md-4">Username</th>
										<th class="col-md-8">Email</th>
									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>
					</div>
				</section>
			</div>
			<div class="col-lg-6">
				<section class="panel">
					<header class="panel-heading">
					 Show Admin
					</header>
					<div class="panel-body">
						<div class="form-horizontal form">
							<div class="form-group">
								<div class="col-md-6">
									<input id="show-admin-search-username" class="form-control show-admin-search" placeholder="Search by username" type="text" value="">
								</div>
								<div class="col-md-6">
									<input id="show-admin-search-email" class="form-control show-admin-search" placeholder="Search by email" type="text" value="">
								</div>
							</div>
						</div>
						<br/>
						<div class="table-responsive">
							<table id="show-table-admin" class="table table-striped table-advance table-hover table-bordered">
								<thead>
									<tr>
										<th class="col-md-4">Username</th>
										<th class="col-md-8">Email</th>
									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>
					</div>
				</section>
			</div>
		</div>
	</section>
</section>

<div class='modal fade' id='detail-user' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
	<div class='modal-dialog'>
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<h4 class='modal-title' id='myModalLabel'>Detail User</h4>
			</div>
			<div class='modal-body'>
				<div class="row">
					<div class="col-md-12">
						<div class="form-horizontal form popup">
							<input id="detail-username" type="hidden" name="name" value="">
							<div class="form-group">
								<label class="col-sm-3 control-label">Username :</label>
								<label id="detail-user-username" class="col-sm-9 control-label " style="text-align:left;"></label>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Email :</label>
								<label id="detail-user-email" class="col-sm-9 control-label " style="text-align:left;"></label>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Nama :</label>
								<label id="detail-user-nama" class="col-sm-9 control-label " style="text-align:left;"></label>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Gender :</label>
								<label id="detail-user-gender" class="col-sm-9 control-label " style="text-align:left;"></label>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Tanggal lahir :</label>
								<label id="detail-user-bornday" class="col-sm-9 control-label " style="text-align:left;"></label>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Pendidikan :</label>
								<label id="detail-user-pendidikan" class="col-sm-9 control-label " style="text-align:left;"></label>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Provinsi :</label>
								<label id="detail-user-provinsi" class="col-sm-9 control-label " style="text-align:left;"></label>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Kota :</label>
								<label id="detail-user-kota" class="col-sm-9 control-label " style="text-align:left;"></label>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Kecamatan :</label>
								<label id="detail-user-kecamatan" class="col-sm-9 control-label " style="text-align:left;"></label>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Kelurahan :</label>
								<label id="detail-user-kelurahan" class="col-sm-9 control-label " style="text-align:left;"></label>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Alamat :</label>
								<label id="detail-user-alamat" class="col-sm-9 control-label " style="text-align:left;"></label>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="aktifasi-button-footer" class="modal-footer">
      </div>
		</div>
	</div>
</div>

<div class='modal fade' id='konfirmasi-aktifasi' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
	<div class='modal-dialog' style="margin-top:100px;">
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<h4 class='modal-title' id='myModalLabel'>Konfirmasi </h4>
			</div>
			<div class='modal-body'>
				<div>
					<p>Apakah Anda yakin dengan perintah ini?</p>
				</div>
			</div>
			<div class="modal-footer">
				<span class="pull-right">
					<a class="btn btn-danger" data-dismiss='modal'><i class="fa fa-times"></i> No</a>&nbsp
					<button id="aktifasi-user-button" class="btn btn-success" value=""><i class="fa fa-check"></i> Yes</button>
				</span>
      </div>
		</div>
	</div>
</div>

<div id="notification" style="max-width:400px;min-width:300px;position:absolute;right:0;top:80px;">

</div>
