(function($){

	$(window).on('load', function(){
		$('.fade-in').css({ position: 'relative', opacity: 0, top: -14 });
		setTimeout(function(){
			$('#preload-content').fadeOut(400, function(){
				$('#preload').fadeOut(800);
				setTimeout(function(){
					$('.fade-in').each(function(index) {
						$(this).delay(400*index).animate({ top : 0, opacity: 1 }, 800);
					});
				}, 800);
			});
		}, 400);
	});

	$(document).ready( function(){

		// Create a countdown instance. Change the launchDay according to your needs.
		// The month ranges from 0 to 11. I specify the month from 1 to 12 and manually subtract the 1.
		// Thus the launchDay below denotes 7 December, 2017.
		var launchDay = new Date(2017, 12-1, 7);
		$('#timer').countdown({
			until: launchDay
		});

		// Invoke the Placeholder plugin
		$('input, textarea').placeholder();

		// Validate subscribe form
		$('<div class="loading"><span class="bounce1"></span><span class="bounce2"></span><span class="bounce3"></span></div>').hide().appendTo('.form-wrap');
		$('<div class="success"></div>').hide().appendTo('.form-wrap');

		// Open modal window on click
		$('#modal-open-layanan').on('click', function(e) {
			var mainInner = $('#main .inner'),
				modal = $('#modal-layanan');

				clearAllInput()

			mainInner.animate({ opacity: 0.08 }, 400, function(){
				$('html,body').scrollTop(0);
				modal.addClass('modal-active').fadeIn(400);
			});
			e.preventDefault();

			$('#modal-close-layanan').on('click', function(e) {
				modal.removeClass('modal-active').fadeOut(400, function(){
					mainInner.animate({ opacity: 3 }, 400);
				});
				e.preventDefault();
			});
		});

		// Open modal window on click
		$('#modal-open-pemerintah').on('click', function(e) {
			var mainInner = $('#main .inner'),
				modal = $('#modal-pemerintah');

				clearAllInput()

			$("#nop").inputmask({"mask": "99.99.999.999.999-9999.9"});

			mainInner.animate({ opacity: 0.08 }, 400, function(){
				$('html,body').scrollTop(0);
				modal.addClass('modal-active').fadeIn(400);
			});
			e.preventDefault();

			$('#modal-close-pemerintah').on('click', function(e) {
				modal.removeClass('modal-active').fadeOut(400, function(){
					mainInner.animate({ opacity: 3 }, 400);
				});
				e.preventDefault();
			});
		});

		$('#modal-open-publik').on('click', function(e) {
			var mainInner = $('#main .inner'),
				modal = $('#modal-publik');

				clearAllInput()

			mainInner.animate({ opacity: 0.08 }, 400, function(){
				$('html,body').scrollTop(0);
				modal.addClass('modal-active').fadeIn(400);
			});
			e.preventDefault();

			$('#modal-close-publik').on('click', function(e) {
				modal.removeClass('modal-active').fadeOut(400, function(){
					mainInner.animate({ opacity: 3 }, 400);
				});
				e.preventDefault();
			});
		});

		$('#modal-open-opd').on('click', function(e) {
			var mainInner = $('#main .inner'),
				modal = $('#modal-opd');

				clearAllInput()

			mainInner.animate({ opacity: 0.08 }, 400, function(){
				$('html,body').scrollTop(0);
				modal.addClass('modal-active').fadeIn(400);
			});
			e.preventDefault();

			$('#modal-close-opd').on('click', function(e) {
				modal.removeClass('modal-active').fadeOut(400, function(){
					mainInner.animate({ opacity: 3 }, 400);
				});
				e.preventDefault();
			});
		});

		$('#modal-open-survey').on('click', function(e) {
			var mainInner = $('#main .inner'),
				modal = $('#modal-survey');

				clearAllInput()

			mainInner.animate({ opacity: 0.08 }, 400, function(){
				$('html,body').scrollTop(0);
				modal.addClass('modal-active').fadeIn(400);
			});
			e.preventDefault();

			$('#modal-close-survey').on('click', function(e) {
				modal.removeClass('modal-active').fadeOut(400, function(){
					mainInner.animate({ opacity: 3 }, 400);
				});
				e.preventDefault();
			});

			fetch('index.php?r=api/page/survey').then(res => res.text()).then(res => {
				$('.question').html(res)
			})
		});


		// particles JS
		$(function(){
		particlesJS('particles-js', {
        particles: {
            color: '#fff',
            shape: 'circle',
            opacity: 5.5,
            size: 0.5,
            size_random: true,
            nb: 100,
            line_linked: {
                enable_auto: true,
                distance: 150,
                color: '#fff',
                opacity: 0.6,
                width: 1,
                condensed_mode: {
                    enable: false,
                    rotateX: 600,
                    rotateY: 600
                }
            },
            anim: {
                enable: true,
                speed: 0.6
            }
        },
        interactivity: {
            enable: true,
            mouse: {
                distance: 250
            },
            detect_on: 'canvas',
            mode: 'grab',
            line_linked: {
                opacity: 0.5
            },
            events: {
                onclick: {
                    push_particles: {
                        enable: true,
                        nb: 4
                    }
                }
            }
        },
        retina_detect: true
    });

		 });





	});

})(jQuery);


function clearAllInput()
{
	var elements = document.getElementsByTagName("input");
	for (var ii=0; ii < elements.length; ii++) {
		if (elements[ii].type == "text") {
			elements[ii].value = "";
		}
	}
	
	var calc_value = document.querySelectorAll(".calc_value");
	for (var ii=0; ii < calc_value.length; ii++) {
		calc_value[ii].innerHTML = "0";
		// if (elements[ii].type == "text") {
		// }
	}

	document.querySelector('.result').innerHTML = ""

	$('#vNpoptkp').html(0);
	$('#npoptkp').val(0);
}

function nextQuestionTo(qid, result)
{
	// save current
	var formData = new FormData
	formData.append('question_id',qid)
	formData.append('result',result)
	fetch('index.php?r=api/survey-save',{
		method:'POST',
		body:formData
	})
	.then(res => res.text())
	.then(res => {
		// visible next and hide current
		$('#question-'+(qid-1)).addClass('d-none')
		if($('#question-'+qid).length)
		{
			$('#question-'+qid).removeClass('d-none')
		}
		else
		{
			$('.question').html("<h2 style='color:#000'>Terima kasih telah mengisi Survey Kepuasan<h2>")
		}
	})
}