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
					<header class="panel-heading">
					 Show Post
					</header>
					<div class="panel-body"> 
						<div class="table-responsive">
							<table class="table table-striped table-advance table-hover table-bordered">
								<thead>
									<?php
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

										$order = array('dibaca' => "", 'sender' => "", 'isi' => "", 'tanggal' => "" );
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
										<th class="col-md-1">new<span class='pull-right'><a href="<?php echo "http://$_SERVER[HTTP_HOST]".$order['dibaca']; ?>" title="Unread Messages"><i class='fa fa-sort<?php echo sortedAscOrDesc('dibaca'); ?>'></i></a></span></th>
										<th class="col-md-2">Sender<span class='pull-right'><a href="<?php echo "http://$_SERVER[HTTP_HOST]".$order['sender']; ?>" title="Sort by Sender"><i class='fa fa-sort<?php echo sortedAscOrDesc('sender'); ?>'></i></a></span></th>
										<th class="col-md-7">Isi<span class='pull-right'><a href="<?php echo "http://$_SERVER[HTTP_HOST]".$order['isi']; ?>" title="Sort by Subject"><i class='fa fa-sort<?php echo sortedAscOrDesc('isi'); ?>'></i></a></span></th>
										<th class="col-md-1">Tanggal<span class='pull-right'><a href="<?php echo "http://$_SERVER[HTTP_HOST]".$order['tanggal']; ?>" title="Sort by Tanggal"><i class='fa fa-sort<?php echo sortedAscOrDesc('tanggal'); ?>'></i></a></span></th>
										<th class="col-md-1">Action</th>
									</tr>
								</thead>
								<tbody>
								<?php
									include_once("../db/config.inc.php");
									
									$maxItemShownPerPage = 10;
									$maxPageNumberShownPerPage = 5;
									$halfOfMaxPageNumberShownPerPage = floor($maxPageNumberShownPerPage/2);
									$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
									$itemStart = $maxItemShownPerPage * ($page - 1);

									$qry = "SELECT * FROM messages ORDER BY ".$_GET['order']." LIMIT $itemStart,$maxItemShownPerPage";
									$query_messages = mysqli_query($link,$qry);
									while ($data_messages = mysqli_fetch_array($query_messages)) {
										$date = new DateTime($data_messages['tanggal']); 
										date_default_timezone_set('Asia/Jakarta');
										if (date("d") == $date->format('d') && date("m") == $date->format('m') && date("Y") == $date->format('Y')) {
											$tanggal = $date->format('H:i');
										} else if (date("Y") == $date->format('Y')) {
											$tanggal = $date->format('M d');
										} else {
											$tanggal = $date->format('d/m/Y');
										}

										$read = "";
										if ($data_messages['dibaca'] == 0) {
											$read = "<span id='dibaca-".$data_messages['no']."' style='color:purple;'><i class='icon_circle-slelected'></i></span>";
										}

										echo "
											<tr>
												<td>".$read."</td>
												<td>".$data_messages['sender']."</td>
												<td><p class='isi-pendek'>".str_replace("<br />"," ",$data_messages['isi'])."</p></td>
												<td>".$tanggal."</td>
												<td>
													<button class='btn btn-info detail-message-button' value='".$data_messages['no']."' data-toggle='modal' data-target='#detail-message' title='See'><i class='fa fa-eye'></i></button>
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
						  		$qry = "SELECT * FROM messages ORDER BY ".$_GET['order']."";
						  		$query_messages = mysqli_query($link,$qry);
						  		$totalPages = ceil(mysqli_num_rows($query_messages) / $maxItemShownPerPage);
						  		$totalitems = mysqli_num_rows($query_messages);

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
						  			$link = "/admin/show-post/".$_GET['order']."/";
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
<div class='modal fade' id='detail-message' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
	<div class='modal-dialog' style="width:700px;">
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<h4 class='modal-title' id='myModalLabel'>Detail Message</h4>
			</div>
			<div class='modal-body'>
				<div class="row">
					<div class="col-md-12">
						<div class="form-horizontal form">
							<div class="form-group">
								<label class="col-sm-3 control-label">Sender</label>
								<label id="detail-message-sender" class="col-sm-9 control-label " style="text-align:left;"></label>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Tanggal</label>
								<label id="detail-message-tanggal" class="col-sm-9 control-label " style="text-align:left;"></label>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Isi</label>
								<div id="detail-message-isi" class="col-sm-9">
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