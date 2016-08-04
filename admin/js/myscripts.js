jQuery(function($) {

	// show-post.php
	// search button
	$('#show-post-button-search').click(function(event) {
		var search = $('#show-post-search').val();
		if(search != ""){
			var searchCategory = $('#searchCategory').val();
			var request_URI = window.location.pathname.split('/');
			request_URI[5] = searchCategory;
			request_URI[6] = search;
			var path = "";
			for (var i = 1; i < request_URI.length; i++) {
				if(request_URI[i] != "")
					path = path+request_URI[i]+"/";
			};
			window.location.href = "/"+path;
		} else {
			$("#show-post-err-msg").removeClass("hidden")
		}
	});

	$('#show-post-remove-search').click(function(event) {
		var search = "";
		var searchCategory = "";
		var request_URI = window.location.pathname.split('/');
		request_URI[5] = searchCategory;
		request_URI[6] = search;
		var path = "";
		for (var i = 1; i < request_URI.length; i++) {
			if(request_URI[i] != "")
				path = path+request_URI[i]+"/";
		};
			window.location.href = "/"+path;
	});

	$("#show-post-search").keyup(function(event){
		if(event.keyCode == 13){
			$("#show-post-button-search").click();
		}
	});

	$('#show-post-itemsShowsPerPage option').on('click', function() {
		var itemsperpage = $('#show-post-itemsShowsPerPage').val();
		var request_URI = window.location.pathname.split('/');
		request_URI[4] = itemsperpage;
		if(request_URI.length == 7){
			request_URI[5] = "";
		} else if(request_URI.length == 9){
			request_URI[7] = "";
		}
		var path = "";
		for (var i = 1; i < request_URI.length; i++) {
			if(request_URI[i] != "")
				path = path+request_URI[i]+"/";
		};
			window.location.href = "/"+path;
	});

	$('.detail-post-button').click(function(event) {
		var a = $(this).attr("value");
		$('#detail-noSoal').html(a);

		$.post('/admin/menu/delete-post/get-post-data.php',{
			no: a
		},function(result){
			var r = JSON.parse(result);
			$('#detail-image').attr("src", r['gambar']);
			$('#delete-post-button').attr("value", a);
			$('#detail-nama').html(r['nama']);
			$('#detail-tanggal').html(r['tanggal']);
			$('#detail-dokumen').attr("href", r['dokumen']);
			$('#detail-dokumen').html(r['namaDokumen']);
			$('#detail-status').html(r['status']);
			$('#detail-category').html(r['category']);
			$('#detail-deskripsi').html(r['deskripsi']);
			$('#detail-tags').html(r['tagsinput']);
		});
	});

	$('#delete-post-button').click(function(event) {
		var a = $(this).attr("value");
		$('#detail-noSoal').html(a);

		$.post('/admin/menu/delete-post/delete-post.php',{
			no: a
		},function(result){
			var r = JSON.parse(result);
			if(r[0]){
				location.reload();
			}
		});
	});

	//end show-post.php

	// edit-post.php
	$('#changeDocumentFile').click(function(event) {
		if( $('#divOldDocument.hidden').length ){
			$('#divOldDocument').removeClass('hidden');
		} else {
			$('#divOldDocument').addClass('hidden');
		}

		if( $('#divNewDocument.hidden').length ){
			$('#divNewDocument').removeClass('hidden');
		} else {
			$('#divNewDocument').addClass('hidden');
		}

		if( $('#divNewDocument.hidden').length ){
			$('#changeDocumentFile').html('New Document File');
			$('#pilihanDocumentFile').val('oldDocument');
		} else {
			$('#changeDocumentFile').html('Old Document File');
			$('#pilihanDocumentFile').val('dokumen');
		}
	});

	$('#changeImageFile').click(function(event) {
		if( $('#divOldImage.hidden').length ){
			$('#divOldImage').removeClass('hidden');
		} else {
			$('#divOldImage').addClass('hidden');
		}

		if( $('#divNewImage.hidden').length ){
			$('#divNewImage').removeClass('hidden');
		} else {
			$('#divNewImage').addClass('hidden');
		}

		if( $('#divNewImage.hidden').length ){
			$('#changeImageFile').html('New Image File');
			$('#pilihanImageFile').val('oldImage');
		} else {
			$('#changeImageFile').html('Old Image File');
			$('#pilihanImageFile').val('gambar');
		}
	});
	// end edit-post.php

	// messages
	$('.detail-message-button').click(function(event) {
		var nomer = $(this).attr("value")
		$.post('/admin/menu/pesan/get-message-data.php',{
			no: nomer
		},function(result){
			var r = JSON.parse(result);
			// $('#delete-post-button').attr("value", a);
			$('#detail-message-sender').html(r['sender']);
			$('#detail-message-tanggal').html(r['tanggal']);
			$('#detail-message-isi').html(r['isi']);
			$('#dibaca-'+nomer).html("");
			totalUnreadMessages();
		});
	});

	$(document).ready(totalUnreadMessages);

	function totalUnreadMessages () {
		$.post('/admin/menu/pesan/get-total-unread-message.php',
			function(result){
			var r = JSON.parse(result);
			$('#total-unread-messages').html(r[0]);
		});
	}

	$('.isi-pendek').condense({ellipsis:'&hellip;', condensedLength: 90});
	// end messages

	// change password
	$('#oldpwd').on('focus input', function(){
		$("#oldpwd").css("border", "1px solid #C7C7CC");
		$('#err0').html("");
	});

	$('#newpwd').on('focus input', function(){
		$("#newpwd").css("border", "1px solid #C7C7CC");
		$('#err1').html("");
	});

	$('#renewpwd').on('focus input', function(){
		$("#renewpwd").css("border", "1px solid #C7C7CC");
		$('#err2').html("");
	});

	//change password enter submit
	$(".change-password").keyup(function(event){
		if(event.keyCode == 13){
			$("#admin-button-change-password").click();
		}
	});

	$("#admin-button-change-password").click(function(){
		$.post('/admin/password/cek-changepass.php',{oldpwd: $('#oldpwd').val(),newpwd: $('#newpwd').val(),renewpwd: $('#renewpwd').val()},function(result){
			var r = JSON.parse(result);
			if(r[0]!=0){
				$('#err0').html(r[0]);
				$("#oldpwd").css("border", "2px solid #00A0DF");
			}
			if(r[1]!=0){
				$('#err1').html(r[1]);
				$("#newpwd").css("border", "2px solid #00A0DF");
			}
			if(r[2]!=0){
				$('#err2').html(r[2]);
				$("#renewpwd").css("border", "2px solid #00A0DF");
			}
			if(r[0]==0 && r[1]==0 && r[2]==0){
				$.post('/admin/password/save-changepass.php',{newpwd: $('#newpwd').val()},function(result){
					if(result == 1){
						$("#alert-change-password").removeClass("hidden");
						$("#oldpwd").val("");
						$("#newpwd").val("");
						$("#renewpwd").val("");
					}
				})
			}
		});
	});

	$('#admin-change-pass').on('hidden.bs.modal', function () {
		$("#alert-change-password").addClass("hidden");
		$("#oldpwd").val("");
		$("#newpwd").val("");
		$("#renewpwd").val("");
		$("#oldpwd").css("border", "1px solid #C7C7CC");
		$('#err0').html("");
		$("#newpwd").css("border", "1px solid #C7C7CC");
		$('#err1').html("");
		$("#renewpwd").css("border", "1px solid #C7C7CC");
		$('#err2').html("");
	});
	// end change password

	// show-user
	$(document).ready(showUserSearchUser);
	$(".show-user-search").on('change input', showUserSearchUser);
	function showUserSearchUser(){
		$.post('/admin/menu/show-user/proses-user.php',{
			searchUsername: $('#show-user-search-username').val(),
			searchEmail: $('#show-user-search-email').val()
		},function(result){
			var r = JSON.parse(result);
			$('#show-table-user tbody').html(r[0]);
		});
	}




	$(document).ready(showUserSearchAdmin);
	$(".show-admin-search").on('change input', showUserSearchAdmin);
	function showUserSearchAdmin(){
		$.post('/admin/menu/show-user/proses-admin.php',{
			searchUsername: $('#show-admin-search-username').val(),
			searchEmail: $('#show-admin-search-email').val()
		},function(result){
			var r = JSON.parse(result);
			$('#show-table-admin tbody').html(r[0]);
		});
	}
	// end show-user

	// add-user
	$('#generate-user').click(function () {
		var text = "";
		var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
		for( var i=0; i < 20; i++ )
				text += possible.charAt(Math.floor(Math.random() * possible.length));
		$('#user-username').val(text);

		$("#user-username").css("border", "2px solid #EAEEF1");
		$('#add-user-err0').html("");
		var link = "/edit-account?h="+$('#user-username').val();
		$('#add-user-link').html("http://www.downloadsoalipssmp.com"+link);
		$('#add-user-link').attr("href",link);
	});

	$('#user-username').on('change focus input', function(){
		$("#user-username").css("border", "2px solid #EAEEF1");
		$('#add-user-err0').html("");
		var link = "/edit-account?h="+$('#user-username').val();
		$('#add-user-link').html("http://www.downloadsoalipssmp.com"+link);
		$('#add-user-link').attr("href",link);
	});

	$('#add-user').click(function () {
		$.post('/admin/menu/add-user/cek-add-user.php',{
			username: $('#user-username').val()
		},function(result){
			var r = JSON.parse(result);
			if (r[0]!=0) {
				$("#user-username").css("border", "2px solid #00A0DF");
				$('#add-user-err0').html(r[0]);
			}
			if (r[0]==0) {
				$.post('/admin/menu/add-user/save-add-user.php',{
					username: $('#user-username').val()
				},function(result){
					if(result == 1){
						$("#add-user-success").removeClass("hidden");
						setTimeout(function() {
							$("#add-user-success").addClass("hidden");
						}, 5000);
					}
				});
			}
		});
	});
	// end add-user

	// add-admin
	$('#admin-username').on('focus change', function(){
		$("#admin-username").css("border", "1px solid #C7C7CC");
		$('#add-admin-err0').html("");
	});
	$('#admin-password').on('focus change', function(){
		$("#admin-password").css("border", "1px solid #C7C7CC");
		$('#add-admin-err1').html("");
	});
	$('#admin-repassword').on('focus change', function(){
		$("#admin-repassword").css("border", "1px solid #C7C7CC");
		$('#add-admin-err2').html("");
	});
	$('#admin-email').on('focus change', function(){
		$("#admin-email").css("border", "1px solid #C7C7CC");
		$('#add-admin-err3').html("");
	});

	$(".add-admin-input ").keyup(function(event){
		if(event.keyCode == 13){
			$("#add-admin").click();
		}
	});

	$('#add-admin').click(function () {
		$.post('/admin/menu/add-user/cek-add-admin.php',{
			username: $('#admin-username').val(),
			password: $('#admin-password').val(),
			repassword: $('#admin-repassword').val(),
			email: $('#admin-email').val()
		},function(result){
			var r = JSON.parse(result);
			if(r[0]!=0){
				$('#add-admin-err0').html(r[0]);
				$("#admin-username").css("border", "2px solid #00A0DF");
			}
			if(r[1]!=0){
				$('#add-admin-err1').html(r[1]);
				$("#admin-password").css("border", "2px solid #00A0DF");
			}
			if(r[2]!=0){
				$('#add-admin-err2').html(r[2]);
				$("#admin-repassword").css("border", "2px solid #00A0DF");
			}
			if(r[3]!=0){
				$('#add-admin-err3').html(r[3]);
				$("#admin-email").css("border", "2px solid #00A0DF");
			}
			if(r[0]==0 && r[1]==0 && r[2]==0 && r[3]==0){
				$.post('/admin/menu/add-user/save-add-admin.php',{
					username: $('#admin-username').val(),
					password: $('#admin-password').val(),
					repassword: $('#admin-repassword').val(),
					email: $('#admin-email').val()
				},function(result){
					if(result == 1){
						$("#add-admin-success").removeClass("hidden");
						setTimeout(function() {
							$("#add-admin-success").addClass("hidden");
						}, 5000);
					}
				})
			}
		});
	});


	// end add-admin

});


	function _(el){
		return document.getElementById(el);
	}

//detail-user

	function detailUser(element){
		var username = element.getAttribute("username");
		var formdata = new FormData();
		formdata.append("username", username);
		var ajax = new XMLHttpRequest();
		ajax.addEventListener("load", completeHandlerDetailUser, false);
		ajax.open("POST", "/admin/menu/show-user/get-user-data.php");
		ajax.send(formdata);
	}
	function completeHandlerDetailUser(event){
		var data = JSON.parse(event.target.responseText);
		_("detail-user-username").innerHTML = data['username2'];
		$("#detail-username").val(data['username']);
		_("detail-user-email").innerHTML = data['email'];
		_("detail-user-nama").innerHTML = data['nama'];
		_("detail-user-gender").innerHTML = data['gender'];
		_("detail-user-bornday").innerHTML = data['bornday'];
		_("detail-user-pendidikan").innerHTML = data['pendidikan'];
		_("detail-user-provinsi").innerHTML = data['provinsi'];
		_("detail-user-kota").innerHTML = data['kota'];
		_("detail-user-kecamatan").innerHTML = data['kecamatan'];
		_("detail-user-kelurahan").innerHTML = data['kelurahan'];
		_("detail-user-alamat").innerHTML = data['alamat'];
		_("aktifasi-button-footer").innerHTML = data['button'];
		$("#detail-user").modal("show");
	}

	$('#aktifasi-user-button').click(function () {
		$.post('/admin/menu/show-user/aktifasi-user.php',{
			username: $('#detail-username').val()
		},function(result){
			if(result == 1){
				$("#konfirmasi-aktifasi").modal("hide");
				$("#detail-user").modal("hide");
				var alert = '<div class="alert alert-success fade in"><button type="button" class="close" data-dismiss="alert">&times;</button>Status akun berhasil diubah.</div>';
				var notification = $("#notification").html();
				$("#notification").html(notification+alert);
			}
		});
	});

//end detail-user

// new-post.php

	function uploadFileDocument(){
		var file = _("dokumen").files[0];
		var formdata = new FormData();
		formdata.append("file1", file);
		var ajax = new XMLHttpRequest();
		ajax.upload.addEventListener("progress", progressHandlerDocument, false);
		ajax.addEventListener("load", completeHandlerDocument, false);
		ajax.addEventListener("error", errorHandlerDocument, false);
		ajax.addEventListener("abort", abortHandlerDocument, false);
		ajax.open("POST", "/admin/menu/new-post/uploadDocument.php");
		ajax.send(formdata);
	}
	function progressHandlerDocument(event){
		_("loaded_n_totalDocument").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
		var percent = (event.loaded / event.total) * 100;
		_("progressBarDocument").style.width = Math.round(percent)+"%";
		_("statusDocument").innerHTML = Math.round(percent)+"% uploaded... please wait";
	}
	function completeHandlerDocument(event){
		_("statusDocument").innerHTML = event.target.responseText;
	}
	function errorHandlerDocument(event){
		_("statusDocument").innerHTML = "Upload Failed";
	}
	function abortHandlerDocument(event){
		_("statusDocument").innerHTML = "Upload Aborted";
	}

	function uploadFileGambar(){
		var file = _("gambar").files[0];
		var formdata = new FormData();
		formdata.append("file1", file);
		var ajax = new XMLHttpRequest();
		ajax.upload.addEventListener("progress", progressHandlerGambar, false);
		ajax.addEventListener("load", completeHandlerGambar, false);
		ajax.addEventListener("error", errorHandlerGambar, false);
		ajax.addEventListener("abort", abortHandlerGambar, false);
		ajax.open("POST", "/admin/menu/new-post/uploadGambar.php");
		ajax.send(formdata);
	}
	function progressHandlerGambar(event){
		_("loaded_n_totalGambar").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
		var percent = (event.loaded / event.total) * 100;
		_("progressBarGambar").style.width = Math.round(percent)+"%";
		_("statusGambar").innerHTML = Math.round(percent)+"% uploaded... please wait";
	}
	function completeHandlerGambar(event){
		_("statusGambar").innerHTML = event.target.responseText;
		_("showGambar").src="/gambar/"+_("gambar").files[0].name;
		_("showGambar").alt=_("gambar").files[0].name;
	}
	function errorHandlerGambar(event){
		_("statusGambar").innerHTML = "Upload Failed";
		_("showGambar").src="/gambar/"+_("gambar").files[0].name;
		_("showGambar").alt=_("gambar").files[0].name;
	}
	function abortHandlerGambar(event){
		_("statusGambar").innerHTML = "Upload Aborted";
	}

		$(document).ready(function(){
		$('#judul').on('focus input', function(){
			$("#judul").css("border", "2px solid #EAEEF1");
			$('#err0').html("");
		});

		$('#dokumen').on('focus change', function(){
			$("#dokumen").css("border", "none");
			$('#err1').html("");
		});

		$('#gambar').on('focus input', function(){
			$("#gambar").css("border", "none");
			$('#err2').html("");
		});

		$('#status').on('focus change', function(){
			$("#status").css("border", "2px solid #EAEEF1");
			$('#err3').html("");
		});

		$('#category').on('focus change', function(){
			$("#category").css("border", "2px solid #EAEEF1");
			$('#err4').html("");
		});

		$('.cke_inner ').focusin(function(){
			$('#err5').html("");
		});

		$('.tagsinput').focusin(function(){
			$('#err6').html("");
		});

		$("#add-post").click(function(){
			$.post('/admin/menu/new-post/cek-new-post.php',{
				judul: $('#judul').val(),
				dokumen: $("#dokumen").prop("files")[0].name,
				gambar: $("#gambar").prop("files")[0].name,
				status: $('#status').val(),
				category: $('#category').val(),
				deskripsi: CKEDITOR.instances['deskripsi'].getData(),
				tagsinput: $('#tagsinput').val()
			},function(result){
				var r = JSON.parse(result);
				if(r[0]!=0){
					$('#err0').html(r[0]);
					$("#judul").css("border", "2px solid #00A0DF");
				}
				if(r[1]!=0){
					$('#err1').html(r[1]);
					$("#dokumen").css("border", "2px solid #00A0DF");
				}
				if(r[2]!=0){
					$('#err2').html(r[2]);
					$("#gambar").css("border", "2px solid #00A0DF");
				}
				if(r[3]!=0){
					$('#err3').html(r[3]);
					$("#status").css("border", "2px solid #00A0DF");
				}
				if(r[4]!=0){
					$('#err4').html(r[4]);
					$("#category").css("border", "2px solid #00A0DF");
				}
				if(r[5]!=0){
					$('#err5').html(r[5]);
				}
				if(r[6]!=0){
					$('#err6').html(r[6]);
				}
				if(r[0]==0 && r[1]==0 && r[2]==0 && r[3]==0 && r[4]==0 && r[5]==0 && r[6]==0){
					$.post('/admin/menu/new-post/save-new-post.php',{
						judul: $('#judul').val(),
						dokumen: $("#dokumen").prop("files")[0].name,
						gambar: $("#gambar").prop("files")[0].name,
						status: $('#status').val(),
						category: $('#category').val(),
						deskripsi: CKEDITOR.instances['deskripsi'].getData(),
						tagsinput: $('#tagsinput').val()
					},function(result){
						if(result == 1){
							$("#success").removeClass("hidden");
							$('html, body').animate({
								scrollTop: $("body").offset().top
							}, 500);
						}
					})
				}
			});
		});

		$("#edit-post").click(function(){
			var idDokumen = $('#pilihanDocumentFile').val();
			if(idDokumen == "oldDocument"){
				var isiDokumen = $('#oldDocument').val();
			} else {
				var isiDokumen = $("#dokumen").prop("files")[0].name;
			}

			var idGambar = $('#pilihanImageFile').val();
			if(idGambar == "oldImage"){
				var isiGambar = $('#oldImage').val();
			} else {
				var isiGambar = $("#gambar").prop("files")[0].name;
			}

			$.post('/admin/menu/edit-post/cek-edit-post.php',{
				judul: $('#judul').val(),
				dokumen: isiDokumen,
				gambar: isiGambar,
				status: $('#status').val(),
				category: $('#category').val(),
				deskripsi: CKEDITOR.instances['deskripsi'].getData(),
				tagsinput: $('#tagsinput').val()
			},function(result){
				var r = JSON.parse(result);
				if(r[0]!=0){
					$('#err0').html(r[0]);
					$("#judul").css("border", "2px solid #00A0DF");
				}
				if(r[1]!=0){
					$('#err1').html(r[1]);
					$("#dokumen").css("border", "2px solid #00A0DF");
				}
				if(r[2]!=0){
					$('#err2').html(r[2]);
					$("#gambar").css("border", "2px solid #00A0DF");
				}
				if(r[3]!=0){
					$('#err3').html(r[3]);
					$("#status").css("border", "2px solid #00A0DF");
				}
				if(r[4]!=0){
					$('#err4').html(r[4]);
					$("#category").css("border", "2px solid #00A0DF");
				}
				if(r[5]!=0){
					$('#err5').html(r[5]);
				}
				if(r[6]!=0){
					$('#err6').html(r[6]);
				}
				if(r[0]==0 && r[1]==0 && r[2]==0 && r[3]==0 && r[4]==0 && r[5]==0 && r[6]==0){
					$.post('/admin/menu/edit-post/save-edit-post.php',{
						no: $('#no').val(),
						judul: $('#judul').val(),
						dokumen: isiDokumen,
						gambar: isiGambar,
						status: $('#status').val(),
						category: $('#category').val(),
						deskripsi: CKEDITOR.instances['deskripsi'].getData(),
						tagsinput: $('#tagsinput').val()
					},function(result){
						if(result == 1){
							$("#success").removeClass("hidden");
							$('html, body').animate({
								scrollTop: $("body").offset().top
							}, 500);
							setTimeout(function () { parent.history.back();}, 3000);
						}
					})
				}
			});
		});

	});



// end new-post.php
