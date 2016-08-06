jQuery(function($) {

	//#main-slider
	$(function(){
		$('#main-slider.carousel').carousel({
			interval: 8000
		});
	});

	$( '.centered' ).each(function( e ) {
		$(this).css('margin-top',  ($('#main-slider').height() - $(this).height())/2);
	});

	$(window).resize(function(){
		$( '.centered' ).each(function( e ) {
			$(this).css('margin-top',  ($('#main-slider').height() - $(this).height())/2);
		});
	});

	//portfolio
	$(window).load(function(){
		$portfolio_selectors = $('.portfolio-filter >li>a');
		if($portfolio_selectors!='undefined'){
			$portfolio = $('.portfolio-items');
			$portfolio.isotope({
				itemSelector : 'li',
				layoutMode : 'fitRows'
			});
			// $portfolio_selectors.on('click', function(){
			// 	$portfolio_selectors.removeClass('active');
			// 	$(this).addClass('active');
			// 	var selector = $(this).attr('data-filter');
			// 	$portfolio.isotope({ filter: selector });
			// 	return false;
			// });
		}
	});

	//contact form
	var form = $('.contact-form');
	form.submit(function () {
		$this = $(this);
		$.post($(this).attr('action'), function(data) {
			$this.prev().text(data.message).fadeIn().delay(3000).fadeOut();
		},'json');
		return false;
	});

	//goto top
	$('.gototop').click(function(event) {
		event.preventDefault();
		$('html, body').animate({
			scrollTop: $("body").offset().top
		}, 500);
	});

	//scroll to how to get your own account
	$('.gotonewaccount').click(function(event) {
		event.preventDefault();
		$('html, body').animate({
			scrollTop: $('#new-account').offset().top
		}, 500);
	});

	//move to how to get your own account
	$('.coba-link').click(function(event) {
		// window.location.replace("/#new-account");
		window.location.href = "/#new-account";
	});

	//feedbak page
	$('#feedback').click(function(event) {
		// window.location.replace("/feedback");
		window.location.href = "/feedback";
	});

	//Pretty Photo
	$("a[rel^='prettyPhoto']").prettyPhoto({
		social_tools: false
	});

	$(".input-search").keyup(function(event){
		if(event.keyCode == 13){
			var element = $(this);
			searchPost(element);
		}
	});
	function searchPost(element) {
		var isiInput = element.val();
		var href = "/search/"+isiInput+"/1/";
		if(isiInput == ""){
			href = "/search";
		}
		window.location.href = href;
	}


	//form-registration
	$('#register-provinsi').change(function(event) {
		$.post('/indonesia/get-kota.php',{
			provinsi: $(this).val()
		},function(result) {
			var inner = "<option value='0'>Pilih : </option>";
			$('#register-kota').html(inner+result);
			$('#register-kecamatan').html(inner);
			$('#register-kelurahan').html(inner);
		});
	});

	$('#register-kota').change(function(event) {
		$.post('/indonesia/get-kecamatan.php',{
			kota: $(this).val()
		},function(result) {
			var inner = "<option value='0'>Pilih : </option>";
			$('#register-kecamatan').html(inner+result);
			$('#register-kelurahan').html(inner);
		});
	});

	$('#register-kecamatan').change(function(event) {
		$.post('/indonesia/get-kelurahan.php',{
			kecamatan: $(this).val()
		},function(result) {
			var inner = "<option value='0'>Pilih : </option>";
			$('#register-kelurahan').html(inner+result);
		});
	});

	$('#register-nama').on('focus input', function(){
		$("#register-nama").css("border", "1px solid #CCC");
		$('#registererr0').html("");
	});

	$('#register-gender').on('focus input', function(){
		$("#register-gender").css("border", "1px solid #CCC");
		$('#registererr1').html("");
	});

	$('#register-tanggal-lahir').on('focus input', function(){
		$("#register-tanggal-lahir").css("border", "1px solid #CCC");
		$('#registererr2').html("");
	});

	$('#register-pendidikan').on('focus input', function(){
		$("#register-pendidikan").css("border", "1px solid #CCC");
		$('#registererr3').html("");
	});

	$('#register-provinsi').on('focus input', function(){
		$("#register-provinsi").css("border", "1px solid #CCC");
		$('#registererr4').html("");
	});

	$('#register-kota').on('focus input', function(){
		$("#register-kota").css("border", "1px solid #CCC");
		$('#registererr5').html("");
	});

	$('#register-kecamatan').on('focus input', function(){
		$("#register-kecamatan").css("border", "1px solid #CCC");
		$('#registererr6').html("");
	});

	$('#register-kelurahan').on('focus input', function(){
		$("#register-kelurahan").css("border", "1px solid #CCC");
		$('#registererr7').html("");
	});

	$('#register-alamat').on('focus input', function(){
		$("#register-alamat").css("border", "1px solid #CCC");
		$('#registererr8').html("");
	});

	$('#register-email').on('focus input', function(){
		$("#register-email").css("border", "1px solid #CCC");
		$('#registererr9').html("");
	});

	$('#register-username').on('focus input', function(){
		$("#register-username").css("border", "1px solid #CCC");
		$('#registererr10').html("");
	});

	$('#register-password').on('focus input', function(){
		$("#register-password").css("border", "1px solid #CCC");
		$('#registererr11').html("");
	});

	$('#register-repassword').on('focus input', function(){
		$("#register-repassword").css("border", "1px solid #CCC");
		$('#registererr12').html("");
	});

	$("#register-button").click(function(){
		$.post('/registrasi/cek-form-registrasi.php',{
			nama: $('#register-nama').val(),
			gender: $('#register-gender').val(),
			bornday: $('#register-tanggal-lahir').val(),
			pendidikan: $('#register-pendidikan').val(),
			provinsi: $('#register-provinsi').val(),
			kota: $('#register-kota').val(),
			kecamatan: $('#register-kecamatan').val(),
			kelurahan: $('#register-kelurahan').val(),
			alamat: $('#register-alamat').val(),
			email: $('#register-email').val(),
			username: $('#register-username').val(),
			password: $('#register-password').val(),
			repassword: $('#register-repassword').val()
		},function(result){
			var r = JSON.parse(result);
			if(r[0]!=0){
				$('#registererr0').html(r[0]);
				$("#register-nama").css("border", "2px solid red");
			}
			if(r[1]!=0){
				$('#registererr1').html(r[1]);
				$("#register-gender").css("border", "2px solid red");
			}
			if(r[2]!=0){
				$('#registererr2').html(r[2]);
				$("#register-tanggal-lahir").css("border", "2px solid red");
			}
			if(r[3]!=0){
				$('#registererr3').html(r[3]);
				$("#register-pendidikan").css("border", "2px solid red");
			}
			if(r[4]!=0){
				$('#registererr4').html(r[4]);
				$("#register-provinsi").css("border", "2px solid red");
			}
			if(r[5]!=0){
				$('#registererr5').html(r[5]);
				$("#register-kota").css("border", "2px solid red");
			}
			if(r[6]!=0){
				$('#registererr6').html(r[6]);
				$("#register-kecamatan").css("border", "2px solid red");
			}
			if(r[7]!=0){
				$('#registererr7').html(r[7]);
				$("#register-kelurahan").css("border", "2px solid red");
			}
			if(r[8]!=0){
				$('#registererr8').html(r[8]);
				$("#register-alamat").css("border", "2px solid red");
			}
			if(r[9]!=0){
				$('#registererr9').html(r[9]);
				$("#register-email").css("border", "2px solid red");
			}
			if(r[10]!=0){
				$('#registererr10').html(r[10]);
				$("#register-username").css("border", "2px solid red");
			}
			if(r[11]!=0){
				$('#registererr11').html(r[11]);
				$("#register-password").css("border", "2px solid red");
			}
			if(r[12]!=0){
				$('#registererr12').html(r[12]);
				$("#register-repassword").css("border", "2px solid red");
			}
			if(r[0]==0 && r[1]==0 && r[2]==0 && r[3]==0 && r[4]==0 && r[5]==0 && r[6]==0 && r[7]==0 && r[8]==0 && r[9]==0 && r[10]==0 && r[11]==0 && r[12]==0){
				$.post('/registrasi/save-registrasi-form.php',{
					nama: $('#register-nama').val(),
					gender: $('#register-gender').val(),
					bornday: $('#register-tanggal-lahir').val(),
					pendidikan: $('#register-pendidikan').val(),
					provinsi: $('#register-provinsi').val(),
					kota: $('#register-kota').val(),
					kecamatan: $('#register-kecamatan').val(),
					kelurahan: $('#register-kelurahan').val(),
					alamat: $('#register-alamat').val(),
					email: $('#register-email').val(),
					username: $('#register-username').val(),
					password: $('#register-password').val()
				},function(result){
					if(result == 1){
						$.post('/registrasi/registrasi-mail', {
							email: $('#register-email').val()
						}, function(result) {
							if (result == 1) {
								var email = $('#register-email').val();
								window.location.replace("/registrasi/success?e="+email);
							}
						});
					}
				})
			}
		});
	});

	$("#registrasi-resend-button").click(function(event) {
		$.post('/registrasi/registrasi-mail',{
			email: $("#registrasi-email").val()
		}, function(result) {
			var alert = '<div class="alert alert-success fade in" style="position: relative; left: -50%;"><button type="button" class="close" data-dismiss="alert">&times;</button>The mail has been sent.</div>';
			var notification = $("#notification").html();
			$("#notification").html(notification+alert);
		});
	});

	//end form-registration

	// feedback
	$('#isi-feedback').on('focus input', function(){
		$("#isi-feedback").css("border", "1px solid #CCC");
		$('#feedbackerr0').html("");
	});

	$("#feedback-button").click(function(){
		$.post('/pesan/cek-feedback.php',{
			feedback: $('#isi-feedback').val()
		},function(result){
			var r = JSON.parse(result);
			if(r[0]!=0){
				$('#feedbackerr0').html(r[0]);
				$("#isi-feedback").css("border", "2px solid red");
			}
			if(r[0]==0){
				$.post('/pesan/save-feedback.php',{
					feedback: $('#isi-feedback').val()
				},function(result){
					if(result == 1){
						window.location.replace("/pesan/feedback_success");
					}
				})
			}
		});
	});
	// feedback

	// forget-password

	$('#forget-password-email').on('focus input', function(){
		$("#forget-password-email").css("border", "1px solid #CCC");
		$('#forgetpasserr0').html("");
	});

	$("#forget-password-button").click(function(event) {
		$.post('/forget-password/cek-email', {
			email: $("#forget-password-email").val()
		}, function(result) {
			var r = JSON.parse(result);
			if (r[0] != 0) {
				$('#forgetpasserr0').html(r[0]);
				$("#forget-password-email").css("border", "2px solid red");
			}
			if (r[0] == 0) {
				$.post('/forget-password/reset-password',{
					email: $("#forget-password-email").val()
				}, function(result) {
					if (result == 1) {
						var email = $("#forget-password-email").val();
						window.location.href = "/forget-password/sent?e="+email;
					} else {
						window.location.href = "/zona-nonaktif";
					}
				});
			}
		});
	});

	$("#reset-password-resend-button").click(function(event) {
		$.post('/forget-password/reset-password',{
			email: $("#reset-password-resend-email").val()
		}, function(result) {
			var alert = '<div class="alert alert-success fade in" style="position: relative; left: -50%;"><button type="button" class="close" data-dismiss="alert">&times;</button>The mail has been sent.</div>';
			var notification = $("#notification").html();
			$("#notification").html(notification+alert);
		});
	});

	//reset
	$('#reset-newpwd').on('focus input', function(){
		$("#reset-newpwd").css("border", "1px solid #CCC");
		$('#reseterr0').html("");
	});

	$('#reset-renewpwd').on('focus input', function(){
		$("#reset-renewpwd").css("border", "1px solid #CCC");
		$('#reseterr1').html("");
	});

	$("#reset-button").click(function(event) {

		$.post('/forget-password/cek-reset', {
			newpwd: $("#reset-newpwd").val(),
			renewpwd: $("#reset-renewpwd").val()
		}, function(result) {
			var r = JSON.parse(result);
			if (r[0] != 0) {
				$('#reseterr0').html(r[0]);
				$("#reset-newpwd").css("border", "2px solid red");
			}
			if (r[1] != 0) {
				$('#reseterr1').html(r[1]);
				$("#reset-renewpwd").css("border", "2px solid red");
			}
			if (r[0] == 0 && r[1] == 0) {
				$.post('/forget-password/save-reset', {
					username: $("#reset-username").val(),
					changepass: $("#reset-key").val(),
					newpwd: $("#reset-newpwd").val()
				}, function(result) {
					if (result == 1) {
						window.location.href = "/forget-password/success";
					} else if (result == -1) {
						window.location.href = "/404";
					}
				});
			}
		});
	});

	// end forget-password

	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
	});

	//toggle search
	$( ".search-button" ).click(function() {
		if ( $('.search-toggle').css("right") == '-230px' )
		$('.search-toggle').css({"right": "0px"});
		else
		$('.search-toggle').css({"right": "-230px"});
	});

	//sembunyikanGambar checkbox
	$("#sembunyikan-gambar:checkbox").change(function(event) {
		$.post('/sembunyikanGambar/sby', function(result) {
			location.reload();
		});
	});

});
