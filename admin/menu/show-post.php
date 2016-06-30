<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header"><i class="fa fa-file-text-o"></i> Show Post</h3>
				<ol class="breadcrumb">
					<li><i class="icon_document_alt"></i>Post</li>
					<li><i class="fa fa-file-text-o"></i>Show Post</li>
				</ol>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<div id="show-post-err-msg" class="alert alert-warning hidden">
						<h1><strong>Tolong isi bagian kolom pencarian!</strong></h1>
					</div>
					<header class="panel-heading">
					 Show Post
					</header>
					<div class="panel-body">	
						<div class="form-horizontal form">
							<div class="form-group">
								<div class="col-sm-3">
									<input id="show-post-search" class="form-control" placeholder="Search" type="text" value="<?php echo getSearch();?>">
								</div>
								<label class="control-label col-sm-1">by</label>
								<div class="col-sm-2">
									<select id="searchCategory" class="form-control" name="category">
										<option value="no" <?php echo searchCategorySelected('no');?> >No</option>
										<option value="nama" <?php echo searchCategorySelected('nama');?> >Judul</option>
										<option value="status" <?php echo searchCategorySelected('status');?> >Status</option>
										<option value="category" <?php echo searchCategorySelected('category');?> >Category</option>
									</select>
								</div>
								<div class="col-sm-3">
									<button id="show-post-button-search" class='btn btn-primary'><i class='fa fa-search'></i> Search</button>
									<button id="show-post-remove-search" class='btn btn-danger'><i class='fa fa-times'></i> Remove Search</button>
								</div>
								<label class="control-label col-sm-2 ">items / page : </label>
								<div class="col-sm-1 text-right ">
									<select id="show-post-itemsShowsPerPage" class="form-control" name="itemsShowsPerPage">
										<option value="10" <?php echo itemsShowsPerPageSelected(10);?> >10</option>
										<option value="20" <?php echo itemsShowsPerPageSelected(20);?> >20</option>
										<option value="50" <?php echo itemsShowsPerPageSelected(50);?> >50</option>
										<option value="100" <?php echo itemsShowsPerPageSelected(100);?> >100</option>
									</select>
								</div>
							</div>
						</div>
						<br/>
						<div class="table-responsive">
							<table class="table table-striped table-advance table-hover table-bordered">
								<thead>
									<?php
										function getSearch(){
											if(isset($_GET['search'])){
												return $_GET['search'];
											} else {
												return "";
											}
										}

										function searchCategorySelected($value){
											if(isset($_GET['searchCategory']) && $_GET['searchCategory'] == $value){
												return "selected=''";
											} else {
												return "";
											}
										}

										function itemsShowsPerPageSelected($value){
											if(isset($_GET['itemperpage']) && $_GET['itemperpage'] == $value){
												return "selected=''";
											} else {
												return "";
											}
										}

										function sortedAscOrDesc($value){
											if(explode(" ", $_GET['order'])[0] == $value){
												if(explode(" ", $_GET['order'])[1] == "asc"){
													return "-asc";
												} else {
													return "-desc";
												}
											} else {
												return "";
											}
										}

										$order = array('no' => "", 'nama' => "", 'status' => "", 'category' => "", 'tanggal' => "" );
										$request_URI = explode("/", $_SERVER['REQUEST_URI']);
										foreach($order as $key => $value) {
											if($key == explode(" ", $_GET['order'])[0]){
												if(explode(" ", $_GET['order'])[1] == "asc"){
													$request_URI[3] = "$key desc";
												} else {
													$request_URI[3] = "$key asc";
												}
											} else {
												$request_URI[3] = "$key asc";
											}
											for ($i=0; $i < count($request_URI)-1; $i++) { 
												$order[$key] = $order[$key].$request_URI[$i]."/";
												
											};
										}
									?>
									<tr>
										<th class="col-md-1">No<span class='pull-right'><a href="<?php echo "http://$_SERVER[HTTP_HOST]".$order['no']; ?>" title="Sort by No"><i class='fa fa-sort<?php echo sortedAscOrDesc('no'); ?>'></i></a></span></th>
										<th class="col-md-5">Judul<span class='pull-right'><a href="<?php echo "http://$_SERVER[HTTP_HOST]".$order['nama']; ?>" title="Sort by Judul"><i class='fa fa-sort<?php echo sortedAscOrDesc('nama'); ?>'></i></a></span></th>
										<th class="col-md-1">Status<span class='pull-right'><a href="<?php echo "http://$_SERVER[HTTP_HOST]".$order['status']; ?>" title="Sort by Status"><i class='fa fa-sort<?php echo sortedAscOrDesc('status'); ?>'></i></a></span></th>
										<th class="col-md-1">Category<span class='pull-right'><a href="<?php echo "http://$_SERVER[HTTP_HOST]".$order['category']; ?>" title="Sort by Category"><i class='fa fa-sort<?php echo sortedAscOrDesc('category'); ?>'></i></a></span></th>
										<th class="col-md-2">Tanggal<span class='pull-right'><a href="<?php echo "http://$_SERVER[HTTP_HOST]".$order['tanggal']; ?>" title="Sort by Tanggal"><i class='fa fa-sort<?php echo sortedAscOrDesc('tanggal'); ?>'></i></a></span></th>
										<th class="col-md-2">Action</th>
									</tr>
								</thead>	
								<tbody>
								<?php 
									include_once("../db/config.inc.php");
									
									$maxItemShownPerPage = $_GET['itemperpage'];
									$maxPageNumberShownPerPage = 5;
									$halfOfMaxPageNumberShownPerPage = floor($maxPageNumberShownPerPage/2);
									$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
									$itemStart = $maxItemShownPerPage * ($page - 1);

									if(isset($_GET['search'])){
										$qry = "SELECT * FROM soal WHERE ".$_GET['searchCategory']." LIKE '%".$_GET['search']."%' ORDER BY ".$_GET['order']." LIMIT $itemStart,$maxItemShownPerPage";
									} else {
										$qry = "SELECT * FROM soal ORDER BY ".$_GET['order']." LIMIT $itemStart,$maxItemShownPerPage";
									}

									$query_item = mysqli_query($link,$qry);
									while ($data_item = mysqli_fetch_array($query_item)) {
										$date = new DateTime($data_item['tanggal']); 
										echo "
											<tr>
												<td>".$data_item['no']."</td>
												<td>".$data_item['nama']."</td>
												<td>".$data_item['status']."</td>
												<td>".$data_item['category']."</td>
												<td>".$date->format('M jS, Y')."</td>
												<td>
													<button class='btn btn-info detail-post-button' value='".$data_item['no']."' data-toggle='modal' data-target='#detail-post' title='details'><i class='fa fa-eye'></i></button>
													<a class='btn btn-success' href='/admin/edit-post/".$data_item['no']."/' title='edit'><i class='icon_pencil-edit'></i></a>
												</td>
											</tr>
										";
									}

								?>
								</tbody>
							</table>
						</div>
						<div class="form-group text-center">

						  	<?php
						  		if(isset($_GET['search'])){
						  			$qry = "SELECT * FROM soal WHERE ".$_GET['searchCategory']." LIKE '%".$_GET['search']."%' ORDER BY ".$_GET['order']."";
						  		} else {
						  			$qry = "SELECT * FROM soal ORDER BY ".$_GET['order']."";
						  		}
						  		$query_item = mysqli_query($link,$qry);
						  		$totalPages = ceil(mysqli_num_rows($query_item) / $maxItemShownPerPage);
						  		$totalitems = mysqli_num_rows($query_item);

						  		echo getPaginationString($page, $totalitems, $maxItemShownPerPage, 2, "/", "?page=");

						  		//function to return the pagination string
						  		function getPaginationString($page = 1, $totalitems, $limit = 15, $adjacents = 1, $targetpage = "/", $pagestring = "?page=")
						  		{		
						  			//defaults
						  			if(!$adjacents) $adjacents = 1;
						  			if(!$limit) $limit = 15;
						  			if(!$page) $page = 1;
						  			if(!$targetpage) $targetpage = "/";
						  			
						  			//other vars
						  			$prev = $page - 1;									//previous page is page - 1
						  			$next = $page + 1;									//next page is page + 1
						  			$lastpage = ceil($totalitems / $limit);				//lastpage is = total items / items per page, rounded up.
						  			$lpm1 = $lastpage - 1;								//last page minus 1
						  			
						  			/* 
						  				Now we apply our rules and draw the pagination object. 
						  				We're actually saving the code to a variable in case we want to draw it more than once.
						  			*/
						  			$pagination = "";
						  			if($lastpage > 1)
						  			{	
						  				$pagination .= "<div class='btn-group'>";

						  				//previous button
						  				if ($page > 1) 
						  					$pagination .= "<a class='btn btn-default' href='".paginatingLink($prev)."' title='Prev'><i class='fa fa-angle-left'></i></a>";
						  				else
						  					$pagination .= "";	
						  				
						  				//pages	
						  				if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
						  				{	
						  					for ($counter = 1; $counter <= $lastpage; $counter++)
						  					{
						  						if ($counter == $page)
						  							$pagination .= "<span class='btn btn-primary' title='$counter'>$counter</span>";
						  						else
						  							$pagination .= "<a class='btn btn-default' href='".paginatingLink($counter)."' title='$counter'>$counter</a>";					
						  					}
						  				}
						  				elseif($lastpage >= 7 + ($adjacents * 2))	//enough pages to hide some
						  				{
						  					//close to beginning; only hide later pages
						  					if($page < 1 + ($adjacents * 3))		
						  					{
						  						for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
						  						{
						  							if ($counter == $page)
						  								$pagination .= "<span class='btn btn-primary' title='$counter'>$counter</span>";
						  							else
						  								$pagination .= "<a class='btn btn-default' href='".paginatingLink($counter)."' title='$counter'>$counter</a>";					
						  						}
						  						$pagination .= "<span class='btn btn-default' >...</span>";
						  						$pagination .= "<a class='btn btn-default' href='".paginatingLink($lpm1)."' title='$lpm1'>$lpm1</a>";
						  						$pagination .= "<a class='btn btn-default' href='".paginatingLink($lastpage)."' title='$lastpage'>$lastpage</a>";		
						  					}
						  					//in middle; hide some front and some back
						  					elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
						  					{
						  						$pagination .= "<a class='btn btn-default' href='".paginatingLink(1)."' title='1'>1</a>";
						  						$pagination .= "<a class='btn btn-default' href='".paginatingLink(2)."' title='2'>2</a>";	
						  						$pagination .= "<span class='btn btn-default' >...</span>";
						  						for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
						  						{
						  							if ($counter == $page)
						  								$pagination .= "<span class='btn btn-primary' title='$counter'>$counter</span>";
						  							else
						  								$pagination .= "<a class='btn btn-default' href='".paginatingLink($counter)."' title='$counter'>$counter</a>";					
						  						}
						  						$pagination .= "<span class='btn btn-default' >...</span>";
						  						$pagination .= "<a class='btn btn-default' href='".paginatingLink($lpm1)."' title='$lpm1'>$lpm1</a>";
						  						$pagination .= "<a class='btn btn-default' href='".paginatingLink($lastpage)."' title='$lastpage'>$lastpage</a>";		
						  					}
						  					//close to end; only hide early pages
						  					else
						  					{
						  						$pagination .= "<a class='btn btn-default' href='".paginatingLink(1)."' title='1'>1</a>";
						  						$pagination .= "<a class='btn btn-default' href='".paginatingLink(2)."' title='2'>2</a>";	
						  						$pagination .= "<span class='btn btn-default' >...</span>";
						  						for ($counter = $lastpage - (1 + ($adjacents * 3)); $counter <= $lastpage; $counter++)
						  						{
						  							if ($counter == $page)
						  								$pagination .= "<span class='btn btn-primary' title='$counter'>$counter</span>";
						  							else
						  								$pagination .= "<a class='btn btn-default' href='".paginatingLink($counter)."' title='$counter'>$counter</a>";					
						  						}
						  					}
						  				}
						  				
						  				//next button
						  				if ($page < $counter - 1) 
						  					$pagination .= "<a class='btn btn-default' href='".paginatingLink($next)."' title='Next'><i class='fa fa-angle-right'></i></a>";
						  				else
						  					$pagination .= "";
						  				$pagination .= "</div>";
						  			}
						  			
						  			return $pagination;

						  		}
						  		
							  	function paginatingLink($page){
						  			$link = "/admin/show-post/".$_GET['order']."/".$_GET['itemperpage']."/";
						  			if(isset($_GET['search'])){
						  				$link .= $_GET['searchCategory']."/".$_GET['search']."/";
						  			}
						  			$link .= $page."/";
						  			return $link;
						  		}
							  ?>

						</div>
					</div>
				</section>
			</div>
		</div>
	</section>
</section>
<div class='modal fade' id='detail-post' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
	<div class='modal-dialog' style="width:1000px;">
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<h4 class='modal-title' id='myModalLabel'>Detail Post</h4>
			</div>
			<div class='modal-body'>
				<div class="row">
					<div class="col-md-4">
						<img id="detail-image" class='img-responsive blog-img' src='' width='100%' alt='' />
					</div>
					<div class="col-md-8">
						<div class="form-horizontal form">
							<div class="form-group">
								<label class="col-sm-3 control-label">No</label>
								<label id="detail-noSoal" class="col-sm-9 control-label " style="text-align:left;">No</label>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Judul</label>
								<label id="detail-nama" class="col-sm-9 control-label " style="text-align:left;"></label>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Tanggal</label>
								<label id="detail-tanggal" class="col-sm-9 control-label " style="text-align:left;"></label>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Document File</label>
								<a id="detail-dokumen" href='' class="col-sm-9 control-label " style="text-align:left;">sss</a>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Status</label>
								<label id="detail-status" class="col-sm-9 control-label " style="text-align:left;"></label>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Category</label>
								<label id="detail-category" class="col-sm-9 control-label " style="text-align:left;"></label>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Deskripsi</label>
								<div id="detail-deskripsi" class="col-sm-9">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3"><i class='fa fa-tags'></i> Tags</label>
								<div id="detail-tags" class="tags col-sm-9">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
        
      </div>
		</div>
	</div>
</div>
<div class='modal fade' id='delete-post' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
	<div class='modal-dialog'>
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<h4 class='modal-title' id='myModalLabel'>Delete Post </h4>
			</div>
			<div class='modal-body'>
				<div>
					<p>Are you sure want to delete this post?</p>
				</div>
			</div>
			<div class="modal-footer">
				<span class="pull-right">
					<a class="btn btn-success" data-dismiss='modal'><i class="fa fa-times"></i> No</a>&nbsp
					<button id="delete-post-button" class="btn btn-danger" value=""><i class="fa fa-check"></i> Yes</button>
				</span>
      </div>
		</div>
	</div>
</div>