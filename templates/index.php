<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Badan Pendapatan Daerah Kabupaten Asahan</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?=asset('assets/img/logo-bwhite.webp')?>" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="<?=asset('assets/js/plugin/webfont/webfont.min.js')?>"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?=asset('assets/css/fonts.min.css')?>']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?=asset('assets/css/bootstrap.min.css')?>">
	<link rel="stylesheet" href="<?=asset('assets/css/landing.css')?>">
	<script src="<?=asset('assets/js/core/jquery.3.2.1.min.js')?>"></script>
	<script src="<?=asset('assets/js/count.js')?>"></script>
	<script type="text/javascript" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
</head>
<body>
	<div class="landing-content">
		
	</div>
	<script src="https://code.responsivevoice.org/responsivevoice.js?key=R2qA371F"></script>
	<script src="<?=asset('assets/js/slide.js')?>"></script>
	<script>
	function perolehan(){
		$.ajax({
			type: "POST",
			url: "api/cek-perolehan",
			data: "perolehan="+$("#perolehan").val(),
			success: function(response){
				setTimeout(function(){
				if ( response ) {
					var npoptkp_awal = response.npoptkp;
					var valueJumlahPerekaman = document.getElementById('jumlahPerekaman').value;
					$('.input-npop').removeAttr('readonly');
					$('.msg-npop').html('');

					if ( valueJumlahPerekaman > 0 ) {
					$('#vNpoptkp').html(0);
					$('#npoptkp').val(0);
					} else {
					$('#vNpoptkp').html(number_format(npoptkp_awal,0,',','.'));
					$('#npoptkp').val(npoptkp_awal);
					}

					$(".input-npop").trigger('keyup');

				} else {
					var npoptkp_awal = 0;
					$('.msg-npop').html('<i><font color="#D32F2F">Pilih Jenis Perolehan terlebih dahulu </font></i>');
				}
				}, 200);

			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert(thrownError);
			}
		});
	}
	</script>
</body>
</html>
