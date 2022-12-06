<!DOCTYPE html>
<html lang="en-US">
<head>
 <title>BADAN PENDAPATAN DAERAH KABUPATEN ASAHAN</title>
 <meta http-equiv="Content-Type" content="text/html;charset=utf-8;" />
 <meta http-equiv="cache-control" content="max-age=0" />
 <meta http-equiv="expires" content="0" />
 <meta name="description" content="BADAN PENDAPATAN DAERAH KABUPATEN ASAHAN" itemprop="description" />
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta property="og:type" content="article" />
 <meta property="og:site_name" content="BADAN PENDAPATAN DAERAH KABUPATEN ASAHAN" />
 <meta property="og:title" content="BADAN PENDAPATAN DAERAH KABUPATEN ASAHAN" />
 <meta property="og:description" content="BADAN PENDAPATAN DAERAH KABUPATEN ASAHAN" />
 <meta property="og:image:type" content="image/jpeg" />
 <meta property="og:image:width" content="754" />
 <meta property="og:image:height" content="357" />
 <meta name="robots" content="index, follow" />
 <meta content="BADAN PENDAPATAN DAERAH KABUPATEN ASAHAN" itemprop="headline" />
 <link rel="shortcut icon" href="images/icon.png">
 <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,700,900&subset=cyrillic-ext' rel='stylesheet' type='text/css'>
 <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
 <link rel="stylesheet" type="text/css" media="all" href="<?=asset('assets-landing/css/style.css')?>" />
 <link rel="stylesheet" type="text/css" media="all" href="<?=asset('assets-landing/css/override.css')?>" />
 <script type="text/javascript" src="<?=asset('assets-landing/js/modernizr.js')?>"></script>
 <style>
 .hide-home {
	padding-left: 10px; position: relative; opacity: 0 !important; top: 0px !important;
 }
 </style>
</head>

<body>
	<div class="wrap">
		<div id="main">
			<div class="inner fade-in hide-home" style="padding-left:10px;">
				<header class="site-header">
					<h1 class="site-title"><img src="<?=asset('assets-landing/images/logo.png')?>" width="130" height="60" alt="InTime" /></h1>
				</header>
				<section class="content">
					<h3 class="main-phrase">BADAN PENDAPATAN DAERAH</h3>
					<h1 class="main-phrase-2">KABUPATEN ASAHAN</h1>
					<div class="modal-toggle">
						<a href="#" id="modal-open-layanan" class="button-about"><span class="fa fa-print"></span> AMBIL ANTRIAN</a>
						<a href="#" id="modal-open-pemerintah" class="button-about"><span class="fa fa-fire"></span> CEK PBB</a>
						<a href="#" id="modal-open-publik" class="button-about"><span class="fa fa-edit"></span> KALKULATOR PBB</a>
						<a href="#" id="modal-open-opd" class="button-about"><span class="fa fa-globe"></span> KALKULATOR BPTHB</a>
					</div>
        </section>
			</div>
		</div>

		<div id="modal-layanan">
			<div class="inner"  style="padding-left:10px;">
				<div class="social">
					<a href="#" id="modal-close-layanan"><span class="fa fa-times" title="Close"></span></a>
				</div>
				<section class="content container-fluid">
					<h1 class="section-title">Pilih Pelayanan</h1>
					<?php foreach($services as $service): ?>
            <button class="button-about button-layanan" onclick="ambilAntrian(<?=$service->id?>)"><span class="fa fa-check"></span> <?=$service->name?></button>
					<?php endforeach ?>
				</section>
			</div>
		</div>

		<!-- Modal Layanan Pemerintah -->
		<div id="modal-pemerintah">
			<div class="inner"  style="padding-left:10px;">
				<div class="social">
					<a href="#" id="modal-close-pemerintah"><span class="fa fa-times" title="Close"></span></a>
				</div>
				<section class="content">
					<h1 class="section-title">CEK PBB</h1>
					<div class="bg-white">
						<center>
							<form action="" method="post" onsubmit="cekPbb(this); return false">
								<!-- Our form fields -->
								<div class="form-group">
									<label>Nomor Objek Pajak</label>
									<input class="form-control" id="nop" name="nop" type="text" value="" required>
								</div>
								<div class="form-group">
									<button class="btn btn-primary">Cari <i class="fas fa-search"></i></button>
								</div>
							</form>
						</center>
						<div class="result" style="margin-top:25px;"></div>
					</div>
				</section>
			</div>
		</div>

    	<!-- Modal Layanan Publik -->
		<div id="modal-publik">
			<div class="inner"  style="padding-left:10px;">
				<div class="social">
					<a href="#" id="modal-close-publik"><span class="fa fa-times" title="Close"></span></a>
				</div>
				<section class="content">
					<h1 class="section-title">Kalkulator PBB</h1>
					<div class="bg-white">
						<div class="calculator">
							<div class="row">
								<div class="one-half wow fadeIn" data-wow-delay="0.10s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
									<div class="contact-form">
										<div class="form-group">
											<label>Luas Tanah (M<sup>2</sup>) :</label>
											<input name="form[luas_tanah]" value="" id="luasTanah" onkeyup="sumTanah();" onkeypress="return isNumberKey(event)" class="form-control" type="text" autocomplete="off">
										</div>
										<div class="form-group">
											<label>NJOP Tanah Per M<sup>2</sup> :</label>
											<input name="form[njop_tanah]" value="0" id="njopTanah" onkeyup="sumTanah();" onkeypress="return isNumberKey(event)" class="form-control"  type="text" autocomplete="off">
										</div>
										<div class="form-group">
											<label>Luas x NJOP Tanah :</label>
											<input id="totalHasilNjopTanah" name="form[hasil_njop_tanah]" class="form-control" value="0" type="text" readonly="">
										</div>
										<div class="form-group d-none">
											<label>Total NJOP PBB :</label>
											<input id="totalHasilNjop" name="form[hasil_njop]" value="0" type="text" class="form-control" readonly="">
										</div>
									</div>
								</div>
								<div class="one-half wow fadeIn" data-wow-delay="0.10s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
									<div class="contact-form">
										<div class="form-group">
											<label>Luas Bangunan (M<sup>2</sup>) :</label>
											<input name="form[luas_bangunan]" value="0" id="luasBangunan" onkeyup="sumTanah();" onkeypress="return isNumberKey(event)" class="form-control" type="text" autocomplete="off" required="">
										</div>
										<div class="form-group">
											<label>NJOP Bangunan Per M<sup>2</sup> :</label>
											<input name="form[njop_bangunan]" value="0" id="njopBangunan" onkeyup="sumTanah();" onkeypress="return isNumberKey(event)" class="form-control" type="text" autocomplete="off" required="">
										</div>
										<div class="form-group">
											<label>Luas x NJOP Bangunan :</label>
											<input id="totalHasilNjopBangunan" name="form[hasil_njop_bangunan]" class="form-control" value="0" type="text" readonly="">
										</div>
									</div>
								</div>
                <div class="row">
                  <div class="one">
                    <div class="one-half">
                      <div class="form-group">
    										<label for="">NJOP Sebagai Dasar Pengenaan PBB</label>
    										<p id="njop_dasar">0</p>
    									</div>
    									<div class="form-group">
    										<label for="">NJOPTKP (NJOP Tidak Kena Pajak)</label>
    										<p id="njoptkp">0</p>
    									</div>
                    </div>
                    <div class="one-half">
    									<div class="form-group">
    										<label for="">NJOP untuk perhitungan PBB</label>
    										<p id="njop_pbb">0</p>
    									</div>
    									<div class="form-group">
    										<label for="">Jumlah Pembayaran PBB <span id="persen_pbb">0,10%</span></label>
    										<p id="jumlah_pbb">0</p>
    									</div>
    								</div>
    							</div>
    						</div>
              </div>
            </section>
          </div>
        </div>

    <!-- Modal Subdomain -->
		<div id="modal-opd">
			<div class="inner"  style="padding-left:10px;">
				<div class="social">
					<a href="#" id="modal-close-opd"><span class="fa fa-times" title="Close"></span></a>
				</div>
				<section class="content">
					<h1 class="section-title">Kalkulator BPHTB</h1>
					<div class="bg-white">
						<div class="calculator">
							<div class="row">
								<div class="one-half wow fadeIn" data-wow-delay="0.10s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
									<div class="contact-form">
										<div class="form-group">
											<label style="float:left">Jenis Hak :</label>
											<select name="form[jenis_hak]" class="form-control">
											<option value="">- Pilih Jenis Hak -</option>
											<option value="2">HAK GUNA BANGUNAN</option>
											<option value="3">HAK GUNA USAHA</option>
											<option value="1">HAK MILIK</option>
											<option value="5">HAK MILIK ATAS SATUAN RUMAH SUSUN</option>
											<option value="4">HAK PAKAI</option>
											<option value="6">HAK PERORANGAN</option>
											<option value="7">HAK TANGGUNGAN</option>
											</select>
										</div>
										<div class="form-group">
											<label style="float:left">Jenis Perolehan Hak Atas Tanah dan Atau Bangunan :</label>
											<select name="form[jenis_perolehan]" class="form-control" id="perolehan" onchange="perolehan()">
											<option value="">- Pilih Jenis Perolehan -</option>
											<option value="13">APHB</option>
											<option value="3">HIBAH</option>
											<option value="4">HIBAH WASIAT</option>
											<option value="1">JUAL BELI</option>
											<option value="14">LELANG</option>
											<option value="6">PEMASUKAN DALAM PERSEROAN/BADAN HUKUM LAIN</option>
											<option value="7">PEMISAHAN HAK</option>
											<option value="10">PENINGKATAN HAK</option>
											<option value="9">PERMOHONAN HAK</option>
											<option value="15">PRONA / PTSL</option>
											<option value="2">TUKAR MENUKAR</option>
											<option value="5">WARIS</option>
											<option value="8">WASIAT PHB (PEMBAGIAN HAK BERSAMA)</option>
											</select>
										</div>
										<div class="form-group">
											<input type="hidden" id="jumlahPerekaman">
											<label style="float:left">Harga Transaksi/Nilai Pasar :</label>
											<input name="form[harga_transaksi]" value="0" id="hargaTransaksi" onkeypress="return isNumberKey(event)" class="form-control" type="text" autocomplete="off">
										</div>
										<div class="form-group" style="text-align:left">
											<label>Nilai Perolehan Objek Pajak (NPOP) :</label>
											<div class="msg-npop" style="font-size:15px;"><i><font color="#D32F2F">Pilih Jenis Perolehan terlebih dahulu </font></i></div>
											<input type="text" readonly="" name="form[npop]" value="0" id="hasilNpop" onkeyup="sumBphtb();" onkeypress="return isNumberKey(event)" class="form-control input-npop">
										</div>
                    <div class="form-group" style="text-align:left">
											<label>Nilai Perolehan Objek Pajak Tidak Kena Pajak (NPOPTKP) :</label>
											<div id="vNpoptkp"><b>0</b></div>
											<input name="form[npoptkp]" value="0" id="npoptkp" class="form-control" type="hidden" readonly="">
										</div>
                    <div class="form-group" style="text-align:left">
											<label>Nilai Perolehan Objek Pajak Kena Pajak (NPOPKP) :</label>
											<div id="vHasilNpopkp"><b>0</b></div>
											<input name="form[npopkp]" value="" id="hasilNpopkp" class="form-control" type="hidden" readonly="">
										</div>
									</div>
								</div>
								<div class="one-half wow fadeIn" data-wow-delay="0.10s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
									<div class="contact-form">
										<div class="form-group" style="text-align:left">
											<label>Bea Perolehan Hak atas Tanah dan Bangunan yang terutang :</label>
											<div id="vBphtbTerhutang"><b>0</b></div>
											<input name="form[bphtb_terhutang]" value="" id="bphtbTerhutang" class="form-control" type="hidden" readonly="">
										</div>
                    <div class="form-group" style="text-align:left">
											<label>Pengurangan (%) :</label>
											<input type="text" name="form[pengurangan]" value="0" id="pengurangan" onkeyup="sumBphtb();" onkeypress="return isNumberKey(event)" class="form-control">
										</div>
										<div class="form-group" style="text-align:left">
											<label>Total Pengurangan :</label>
											<div id="vTotalPengurangan"><b>0</b></div>
											<input name="form[total_pengurangan]" value="" id="totalPengurangan" class="form-control" type="hidden" readonly="">
										</div>
										<div class="form-group" style="text-align:left">
											<label>Pengenaan BPHTB :</label>
											<div id="vBphtb" style="font-style: italic; font-size:40px;"><b>0</b></div>
											<input name="form[bphtb]" value="" id="bphtb" class="form-control" type="hidden" readonly="">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>

	<div class="body-bg"></div>
	<div id="preload-content">
		<div class="preload-spinner"></div>
	</div>

	<script src="https://code.responsivevoice.org/responsivevoice.js?key=R2qA371F"></script>
	<script src="<?=asset('assets/js/core/jquery.3.2.1.min.js')?>"></script>
	<script type="text/javascript" src="<?=asset('assets-landing/js/particles.js')?>"></script>
	<script type="text/javascript" src="<?=asset('assets-landing/js/plugins.js')?>"></script>
	<script type="text/javascript" src="<?=asset('assets-landing/js/scripts.js')?>"></script>
	<script src="<?=asset('assets/js/count.js')?>"></script>
	<script type="text/javascript" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
  <script type="text/javascript">
    $(document).ready( function(){
      $.backstretch([
			<?php foreach($slides as $slide): ?>
  			'<?=asset($slide->file)?>',
			<?php endforeach ?>
  		], {
  			fade: 1600,
  			duration: 5000
  		});

      $('ul.tabs li').click(function(){
    		var tab_id = $(this).attr('data-tab');

    		$('ul.tabs li').removeClass('current');
    		$('.tab-content').removeClass('current');

    		$(this).addClass('current');
    		$("#"+tab_id).addClass('current');
    	});
    });

  </script>
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

	async function cekPbb(form)
	{
		document.querySelector('.result').innerHTML = "Loading..."
		var url = "api/page/cek-pbb-result?nop="
		var nop = form.querySelector('#nop').value
		var request = await fetch(url + nop)
		if(request.ok)
		{
			var response = await request.text()
			document.querySelector('.result').innerHTML = response
		}
	}

	async function cekPbbWithYear(nop, year)
	{
		document.querySelector('.result').innerHTML = "Loading..."
		var url = "api/page/cek-pbb-result?nop="+nop+'&year=' + year
		var request = await fetch(url)
		if(request.ok)
		{
			var response = await request.text()
			document.querySelector('.result').innerHTML = response
		}
	}

	async function ambilAntrian(service_id)
	{
		// alert(service_id)
		var request = await fetch('api/get-antrian',{
			method:'POST',
			body:'service_id='+service_id,
			headers:{
				'content-type':'application/x-www-form-urlencoded'
			}
		})

		if(request.ok)
		{
			var response = await request.json()
			if(response.status == 'success')
			{
				// alert('Antrian berhasil di ambil')
			}
		}
	}

	var slideJs = {
		images: [],
		steady:false,
		steadyTimeout:30000,
		_steadyTimeout:false,
		ready: e => {
			if(!slideJs.steady)
			{
				document.querySelector('#main > .inner').classList.toggle('hide-home')
				slideJs.steady = true
			}

			if(slideJs._steadyTimeout)
			{
				clearTimeout(slideJs._steadyTimeout)
			}
			slideJs._steadyTimeout = setTimeout(ev => {
				document.querySelector('#main > .inner').classList.toggle('hide-home')
				$('#modal-pemerintah').removeClass('modal-active').hide();
				$('#modal-layanan').removeClass('modal-active').hide();
				$('#modal-opd').removeClass('modal-active').hide();
				$('#modal-public').removeClass('modal-active').hide();
				$('#main .inner').animate({ opacity: 3 });
				slideJs.steady = false
			}, slideJs.steadyTimeout)
		}
	}

	document.addEventListener('mousemove', slideJs.ready)
	document.addEventListener('keypress', slideJs.ready)
	</script>
</body>
</html>
