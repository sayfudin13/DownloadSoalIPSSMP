<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header"><i class="fa fa-file-text-o"></i> New Post</h3>
				<ol class="breadcrumb">
					<li><i class="icon_document_alt"></i>Post</li>
					<li><i class="fa fa-file-text-o"></i>New Post</li>
				</ol>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div id="success" class="alert alert-success hidden">
					<h1><strong>Success create new post!</strong></h1>
				</div>
				<section class="panel">
					<header class="panel-heading">
						New Post
					</header>
					<div class="panel-body">
						<form id="form-new-post" class="form-horizontal form" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label class="col-sm-2 control-label">Judul <span class="required">*</span></label>
								<div class="col-sm-10">
									<input type="text" id="judul" name="judul" class="form-control" maxlength="100">
									<span id='err0' class="err"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">Document File <span class="required">*</span></label>
								<div class="col-sm-8 input-group">
									<input type="file" id="dokumen" name="dokumen" accept="application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.openxmlformats-officedocument.presentationml.slideshow,application/vnd.openxmlformats-officedocument.presentationml.presentation,application/msword,application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf">
									<span class="btn btn-primary btn-sm" onclick="uploadFileDocument('dokumen')">Upload</span><span> Note: Setelah selesai memilih file klik button upload dan tunggu hingga proses upload selesai.</span>
									<div class="progress progress-striped progress-sm">
										<div id="progressBarDocument" class="progress-bar progress-bar-info"  role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
										</div>
									</div>
									<span id="statusDocument">choose a file</span><br/>
									<span id="loaded_n_totalDocument">Uploaded 0 bytes of 0</span><br/>
									<span id='err1' class="err"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">Cover Image File <span class="required">*</span></label>
								<div class="col-sm-8">
									<input type="file" id="gambar" name="gambar" accept="image/*">
									<span class="btn btn-primary btn-sm" onclick="uploadFileGambar('gambar')">Upload</span><span> Note: Setelah selesai memilih file klik button upload dan tunggu hingga proses upload selesai.</span>
									<div class="progress progress-striped progress-sm">
										<div id="progressBarGambar" class="progress-bar progress-bar-info"  role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
										</div>
									</div>
									<img id="showGambar" class='img-responsive blog-img' src='/images/Contoh Surat Keterangan Tidak Mampu.jpg' width='30%' alt='' />
									<span id="statusGambar">choose a file</span><br/>
									<span id="loaded_n_totalGambar">Uploaded 0 bytes of 0</span><br/>
									<span id='err2' class="err"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">Sample / Not Sample <span class="required">*</span></label>
								<div class="col-sm-10">
									<select class="form-control" id="status" name="status">
										<option value="0">Choose : </option>
										<option value="sample">Sample</option>
										<option value="bukan">Not Sample</option>
									</select>
									<span id='err3' class="err"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">Category <span class="required">*</span></label>
								<div class="col-sm-10">
									<select class="form-control" id="category" name="category">
										<option value="0">Choose : </option>
										<option value="kelas-7">Kelas 7</option>
										<option value="kelas-8">Kelas 8</option>
										<option value="kelas-9">Kelas 9</option>
										<option value="osn">OSN</option>
										<option value="silabus-rpp">SILABUS - RPP</option>
										<option value="ppt">PPT</option>
									</select>
									<span id='err4' class="err"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">Deskripsi</label>
								<div class="col-sm-10">
									<textarea class="form-control ckeditor" id="deskripsi" name="deskripsi" maxlength='3000' rows="7"></textarea>
									<span id='err5' class="err"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">Tags</label>
								<div class="col-sm-10">
									<input name="tagsinput" id="tagsinput" class="tagsinput" maxlength='200' value="" />
									<span id='err6' class="err"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2"></label>
								<div class="col-sm-10">
									<a id="add-post" name="add-post" class="btn btn-primary">Submit</a>
									<button type="submit" id="reset-add-post" name="reset-add-post" class="btn btn-default">Reset</button>
								</div>
							</div>
						</form>
					</div>
				</section>
			</div>
		</div>
	</section>
</section>

