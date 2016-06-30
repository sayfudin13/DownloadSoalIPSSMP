<section id="main-content">
	<?php 
		include_once("../db/config.inc.php");
		$query_soal = mysqli_query($link, "SELECT * FROM soal WHERE no = '".$_GET['noSoal']."'");
		$row = mysqli_num_rows($query_soal);
		$data_soal = mysqli_fetch_array($query_soal);
	?>
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header"><i class="icon_pencil-edit"></i> <?php echo $data_soal['nama'];?></h3>
				<ol class="breadcrumb">
					<li><i class="icon_document_alt"></i>Post</li>
					<li><i class="fa fa-file-text-o"></i>Show Post</li>
					<li><i class="icon_pencil-edit"></i><?php echo $data_soal['nama'];?></li>
				</ol>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div id="success" class="alert alert-success hidden">
					<h1><strong>Success edit post!</strong></h1>
					<h4>Go back to previous page in 3 second</h4>
				</div>
				<section class="panel">
					<header class="panel-heading">
					 <?php echo $data_soal['nama'];?>
					</header>
					
					<div class="panel-body">	
						<form id="form-new-post" class="form-horizontal form" method="post" enctype="multipart/form-data">
							<input id="no" type="hidden" name="no" value="<?php echo $data_soal['no'];?>">
							<div class="form-group">
								<label class="col-sm-2 control-label">Judul <span class="required">*</span></label>
								<div class="col-sm-10">
									<input type="text" id="judul" name="judul" class="form-control" maxlength="100" value="<?php echo $data_soal['nama'];?>">
									<span id='err0' class="err"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">Document File <span class="required">*</span></label>
								<input id="pilihanDocumentFile" type="hidden" name="pilihanDocumentFile" value="oldDocument">
								<div id="divOldDocument" class="col-sm-8">
									<?php echo "<a href='/admin/download/".sha1($data_soal['no'])."/'>".after_last('/',$data_soal['alamat_file'])."</a>";?>
									<input id="oldDocument" type="hidden" name="oldDocument" value="<?php echo after_last('/',$data_soal['alamat_file']);?>">
								</div>
								<div id="divNewDocument" class="col-sm-8 hidden">
									<input type="file" id="dokumen" name="dokumen" value="<?php echo $data_soal['alamat_file'];?>" accept="application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.openxmlformats-officedocument.presentationml.slideshow,application/vnd.openxmlformats-officedocument.presentationml.presentation,application/msword,application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf">
									<span class="btn btn-primary btn-sm" onclick="uploadFileDocument()">Upload</span><span> Note: Setelah selesai memilih file klik button upload dan tunggu hingga proses upload selesai.</span>
									<div class="progress progress-striped progress-sm">
										<div id="progressBarDocument" class="progress-bar progress-bar-info"  role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
										</div>
									</div>
									<span id="statusDocument">choose a file</span><br/>
									<span id="loaded_n_totalDocument">Uploaded 0 bytes of 0</span><br/>
									<span id='err1' class="err"></span>
								</div>
								<div class="col-sm-2">
									<span id="changeDocumentFile" class="btn btn-warning">New Document File</span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">Cover Image File <span class="required">*</span></label>
								<input id="pilihanImageFile" type="hidden" name="pilihanImageFile" value="oldImage">
								<div id="divOldImage" class="col-sm-8">
									<?php echo "<img class='img-responsive blog-img' src='".$data_soal['alamat_gambar']."' width='25%' alt='".$data_soal['nama']."' />";?>
									<input id="oldImage" type="hidden" name="oldImage" value="<?php echo after_last('/',$data_soal['alamat_gambar']);?>">
								</div>
								<div id="divNewImage" class="col-sm-8 hidden">
									<input type="file" id="gambar" name="gambar" value="<?php echo $data_soal['alamat_gambar'];?>" accept="image/*">
									<span class="btn btn-primary btn-sm" onclick="uploadFileGambar()">Upload</span><span> Note: Setelah selesai memilih file klik button upload dan tunggu hingga proses upload selesai.</span>
									<div class="progress progress-striped progress-sm">
										<div id="progressBarGambar" class="progress-bar progress-bar-info"  role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
										</div>
									</div>
									<img id="showGambar" class='img-responsive blog-img' src='/images/Contoh Surat Keterangan Tidak Mampu.jpg' width='30%' alt='' />
									<span id="statusGambar">choose a file</span><br/>
									<span id="loaded_n_totalGambar">Uploaded 0 bytes of 0</span><br/>
									<span id='err2' class="err"></span>
								</div>
								<div class="col-sm-2">
									<span id="changeImageFile" class="btn btn-warning">New Image File</span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">Sample / Not Sample <span class="required">*</span></label>
								<div class="col-sm-10">
									<?php
										function statusSelected($value,$statusSoal){
											if($value == $statusSoal){
												return "selected=''";
											} else {
												return "";
											}
										}
									?>
									<select class="form-control" id="status" name="status">
										<option value="0" >Choose : </option>
										<option value="sample" <?php echo statusSelected('sample',$data_soal['status']);?> >Sample</option>
										<option value="bukan" <?php echo statusSelected('bukan',$data_soal['status']);?> >Not Sample</option>
									</select>
									<span id='err3' class="err"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">Category <span class="required">*</span></label>
								<div class="col-sm-10">
									<?php
										function categorySelected($value,$categorySoal){
											if($value == $categorySoal){
												return "selected=''";
											} else {
												return "";
											}
										}
									?>
									<select class="form-control" id="category" name="category">
										<option value="0">Choose : </option>
										<option value="kelas-7" <?php echo categorySelected('kelas-7',$data_soal['category']);?> >Kelas 7</option>
										<option value="kelas-8" <?php echo categorySelected('kelas-8',$data_soal['category']);?> >Kelas 8</option>
										<option value="kelas-9" <?php echo categorySelected('kelas-9',$data_soal['category']);?> >Kelas 9</option>
										<option value="osn" <?php echo categorySelected('osn',$data_soal['category']);?> >OSN</option>
										<option value="silabus-rpp" <?php echo categorySelected('silabus-rpp',$data_soal['category']);?> >SILABUS - RPP</option>
										<option value="ppt" <?php echo categorySelected('ppt',$data_soal['category']);?> >PPT</option>
									</select>
									<span id='err4' class="err"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">Deskripsi</label>
								<div class="col-sm-10">
									<textarea class="form-control ckeditor" id="deskripsi" name="deskripsi" maxlength='3000' rows="7"><?php echo $data_soal['deskripsi'];?></textarea>
									<span id='err5' class="err"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">Tags</label>
								<div class="col-sm-10">
									<input name="tagsinput" id="tagsinput" class="tagsinput" maxlength='200' value="<?php echo $data_soal['tags'];?>" />
									<span id='err6' class="err"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2"></label>
								<div class="col-sm-10">
									<a id="edit-post" name="edit-post" class="btn btn-primary">Edit</a>
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
<?php
	function after ($this, $inthat)
	{
			if (!is_bool(strpos($inthat, $this)))
			return substr($inthat, strpos($inthat,$this)+strlen($this));
	};

	function after_last ($this, $inthat)
	{
			if (!is_bool(strrevpos($inthat, $this)))
			return substr($inthat, strrevpos($inthat, $this)+strlen($this));
	};

	function before ($this, $inthat)
	{
			return substr($inthat, 0, strpos($inthat, $this));
	};

	function before_last ($this, $inthat)
	{
			return substr($inthat, 0, strrevpos($inthat, $this));
	};

	function between ($this, $that, $inthat)
	{
			return before ($that, after($this, $inthat));
	};

	function between_last ($this, $that, $inthat)
	{
	 return after_last($this, before_last($that, $inthat));
	};
	// use strrevpos function in case your php version does not include it
	function strrevpos($instr, $needle)
	{
		$rev_pos = strpos (strrev($instr), strrev($needle));
		if ($rev_pos===false) return false;
		else return strlen($instr) - $rev_pos - strlen($needle);
	};
?>