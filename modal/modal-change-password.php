	<script>
		$(document).ready(function(){
			$('#oldpwd').on('focus input', function(){
				$("#oldpwd").css("border", "2px solid #EAEEF1");
				$('#err0').html("");
			});
			
			$('#newpwd').on('focus input', function(){
				$("#newpwd").css("border", "2px solid #EAEEF1");
				$('#err1').html("");
			});

			$('#renewpwd').on('focus input', function(){
				$("#renewpwd").css("border", "2px solid #EAEEF1");
				$('#err2').html("");
			});

			//change password enter submit
			$(".change-password").keyup(function(event){
				if(event.keyCode == 13){
					$("#save").click();
				}
			});

			$("#save").click(function(){
				$.post('/password/cek-changepass.php',{oldpwd: $('#oldpwd').val(),newpwd: $('#newpwd').val(),renewpwd: $('#renewpwd').val()},function(result){
					var r = JSON.parse(result);
					if(r[0]!=0){
						$('#err0').html(r[0]);
						$("#oldpwd").css("border", "2px solid red");
					}
					if(r[1]!=0){
						$('#err1').html(r[1]);
						$("#newpwd").css("border", "2px solid red");
					}
					if(r[2]!=0){
						$('#err2').html(r[2]);
						$("#renewpwd").css("border", "2px solid red");
					}
					if(r[0]==0 && r[1]==0 && r[2]==0){
						$.post('/password/save-changepass.php',{newpwd: $('#newpwd').val()},function(result){
							if(result == 1)
								window.location.replace("/password/changepass_success.php");
						})
					}
				});
			});

			$('#changepass').on('hidden.bs.modal', function () {
				$("#oldpwd").val("");
				$("#newpwd").val("");
				$("#renewpwd").val("");
				$("#oldpwd").css("border", "2px solid #EAEEF1");
				$('#err0').html("");
				$("#newpwd").css("border", "2px solid #EAEEF1");
				$('#err1').html("");
				$("#renewpwd").css("border", "2px solid #EAEEF1");
				$('#err2').html("");
			})
			
		});

	</script>

	<div class='modal fade ' id='changepass' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
					<h4 class='modal-title' id='myModalLabel'>Change Password</h4>
				</div>
				<div class='modal-body'>
					<div class='form'>
						<div class="form-group">
							<span><label>Old Password</label></span>
							<span><input type='password' class='change-password' id='oldpwd' name='oldpwd'></span>
							<span class='err' id='err0'></span>
						</div>
						<div class="form-group">
							<span><label>New Password</label></span>
							<span><input type='password' class='change-password' id='newpwd' name='newpwd'></span>
							<span class='err' id='err1'></span>
						</div>
						<div class="form-group">
							<span><label>Retype New Password</label></span>
							<span><input type='password' class='change-password' id='renewpwd' name='renewpwd'></span>
							<span class='err' id='err2'></span>
						</div>
					</div>
				</div>
				<div class="modal-footer">
				<span class="pull-right">
					<a class="btn btn-danger" data-dismiss='modal'><i class="fa fa-times"></i> Cancel</a>&nbsp
					<button id="save" class="btn btn-success" value=""><i class="fa fa-check"></i> Save Change</button>
				</span>
      </div>
			</div>
		</div>
	</div>
