<footer class="footer">
        <div class="container-fluid">
            <nav class="pull-left">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            BAPPENDA
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright ml-auto">
                Copyright &copy; <?=date('Y')?> <a href="#">Badan Pendapatan Daerah Kabupaten Asahan</a>
            </div>				
        </div>
    </footer>
</div>
<!-- End Custom template -->
</div>
	<!--   Core JS Files   -->
	<script src="<?=asset('assets/js/core/jquery.3.2.1.min.js')?>"></script>
	<script src="<?=asset('assets/js/core/popper.min.js')?>"></script>
	<script src="<?=asset('assets/js/core/bootstrap.min.js')?>"></script>

	<!-- jQuery UI -->
	<script src="<?=asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')?>"></script>
	<script src="<?=asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')?>"></script>

	<!-- jQuery Scrollbar -->
	<script src="<?=asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')?>"></script>


	<!-- Chart JS -->
	<script src="<?=asset('assets/js/plugin/chart.js/chart.min.js')?>"></script>

	<!-- jQuery Sparkline -->
	<script src="<?=asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')?>"></script>

	<!-- Chart Circle -->
	<script src="<?=asset('assets/js/plugin/chart-circle/circles.min.js')?>"></script>

	<!-- Datatables -->
	<script src="<?=asset('assets/js/plugin/datatables/datatables.min.js')?>"></script>

	<!-- Bootstrap Notify -->
	<script src="<?=asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')?>"></script>

	<!-- jQuery Vector Maps -->
	<script src="<?=asset('assets/js/plugin/jqvmap/jquery.vmap.min.js')?>"></script>
	<script src="<?=asset('assets/js/plugin/jqvmap/maps/jquery.vmap.world.js')?>"></script>

	<!-- Sweet Alert -->
	<script src="<?=asset('assets/js/plugin/sweetalert/sweetalert.min.js')?>"></script>

	<!-- Atlantis JS -->
	<script src="<?=asset('assets/js/atlantis.min.js')?>"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="https://code.responsivevoice.org/responsivevoice.js?key=R2qA371F"></script>
	<script src="<?=asset('assets/js/plugin/datatables-pagingtype/full_numbers_no_ellipses.js')?>"></script>
	<script>
		$('.datatable-crud').dataTable({
			stateSave:true,
			pagingType: 'full_numbers_no_ellipses',
			processing: true,
			search: {
				return: true
			},
			serverSide: true,
			ajax: location.href
		})
		$('.datatable').dataTable();

		<?php if(get_route() == 'default/index'): ?>

		Circles.create({
			id:'circles-1',
			radius:80,
			value:<?=$survey_tidak_memuaskan?>,
			maxValue:<?=$survey_total?>,
			width:10,
			text: <?=number_format(($survey_tidak_memuaskan/$survey_total)*100,0)?>+'%',
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-2',
			radius:80,
			value:<?=$survey_cukup_memuaskan?>,
			maxValue:<?=$survey_total?>,
			width:10,
			text: <?=number_format(($survey_cukup_memuaskan/$survey_total)*100,0)?>+'%',
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-3',
			radius:80,
			value:<?=$survey_memuaskan?>,
			maxValue:<?=$survey_total?>,
			width:10,
			text: <?=number_format(($survey_memuaskan/$survey_total)*100,0)?>+'%',
			colors:['#f1f1f1', '#F25961'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})
		
		Circles.create({
			id:'circles-4',
			radius:80,
			value:<?=$survey_sangat_memuaskan?>,
			maxValue:<?=$survey_total?>,
			width:10,
			text: <?=number_format(($survey_sangat_memuaskan/$survey_total)*100,0)?>+'%',
			colors:['#f1f1f1', '#9b59b6'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})
		
		Circles.create({
			id:'circles-5',
			radius:80,
			value:<?=$survey_total?>,
			maxValue:<?=$survey_total?>,
			width:10,
			text: <?=$survey_total?>,
			colors:['#f1f1f1', '#3498db'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		<?php endif ?>
	</script>
</body>
</html>
