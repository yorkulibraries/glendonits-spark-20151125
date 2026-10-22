/* home page */
var openPop = "";
jQuery(document).ready(function(e) {
  	jQuery("ul.breadcrumb").find("li > a[href=#]").attr('href', baseUrl + '/site-map/');

    jQuery('.content-logo-button, .content-logo-link1').click(function () {
	document.location = "../index.php";	
	});
	
    jQuery('.content-logo-link2').click(function () {
		//alert("test");
	});
	
	// glossary
	jQuery('.content-gloss-term').hover( 
		function () {
			var n = jQuery(this).index('.content-gloss-term');
			var x = (jQuery( window ).width()/2)-(jQuery('.content-gloss-pop').width()/2);
			var y = (jQuery( window ).height()/2)-(jQuery('.content-gloss-pop').height()/2);
			var z = parseInt(jQuery(this).attr('ofs'));
			if (!isNaN(z)) { x = x + z; }
			jQuery('.content-gloss-pop:eq(' + n + ')').css('top', y + 'px');
			jQuery('.content-gloss-pop:eq(' + n + ')').css('left', x + 'px');
			jQuery('.content-gloss-pop:eq(' + n + ')').show();
		},
		function () {
			jQuery('.content-gloss-pop').hide();
		}
	);
	
	jQuery('.pop-driver').click( function () {
		var n = jQuery(this).index('.pop-driver');
		var m = '.pop-cart-' + n;
		if (jQuery(m).length > 0) {
			openPop = m;
			jQuery(m).resizable();
			jQuery(m).resize( function () {
				jQuery(m + " > .popup-content").css('height', jQuery(m).height()-33 + "px");
			});
			jQuery(m).draggable();
			jQuery('.dark-blanket').show();
			var x = (jQuery( window ).width()/2)-(jQuery(m).width()/2);
			var y = (jQuery( window ).height()/2)-(jQuery(m).height()/2);
			jQuery(m).css('top', y + 'px');
			jQuery(m).css('left', x + 'px');
			jQuery(m).show();
		}
	});
	
	jQuery('.pop-objectives-driver').click( function () {

		var m = '.pop-objectives';
		if (jQuery(m).length > 0) {
			openPop = m;
			jQuery(m).resizable();
			jQuery(m).resize( function () {
				jQuery(m + " > .popup-content").css('height', jQuery(m).height()-33 + "px");
			});
			jQuery(m).draggable();
			jQuery('.dark-blanket').show();
			var x = (jQuery( window ).width()/2)-(jQuery(m).width()/2);
			var y = (jQuery( window ).height()/2)-(jQuery(m).height()/2);
			jQuery(m).css('top', y + 'px');
			jQuery(m).css('left', x + 'px');
			jQuery(m).show();
		}
	});
	
	jQuery('.DLG_titleCloseBtn').click( function () {
		jQuery('.dark-blanket').hide();
		jQuery(openPop).hide();
	});

	jQuery('.video-mac-view, .video-mac-view-fr').click( function () {
		var x = window.open(jQuery(this).attr("loc"));
	});
	
	jQuery('.video-transcript-pop, .video-transcript-pop-fr').click( function () {
		var popupTrans = jQuery('#pop-transcript-' + jQuery(this).attr('rel-id'));
		if (popupTrans.length > 0) {
			var newWindow = window.open('_blank');
			
			newWindow.document.open();
			newWindow.document.write(popupTrans.html());
			newWindow.document.close();
		}
	});

	var startQuizInput = jQuery('.fr .wpProQuiz_content input[name=startQuiz]');

	setTimeout(function(){
		jQuery('.fr input[name=next]').each(function() {
			if (jQuery(this).val() == 'Finish quiz') {
				jQuery(this).val('Finir le test');
			}
		});

		jQuery('.fr .wpProQuiz_content .wpProQuiz_incorrect > span.wpProQuiz_respone_span').text('Mauvaise réponse');
		jQuery('.fr .wpProQuiz_content .wpProQuiz_correct > span.wpProQuiz_respone_span').text('Bonne réponse');
	}, 1000);

	var correctCount = 0;
	var checkbutton = jQuery('.fr .wpProQuiz_content li.wpProQuiz_listItem input[name=next]');
	checkbutton.click( function () {
		correctCount += jQuery('.wpProQuiz_correct:visible').length;
		var totalCount = jQuery('.wpProQuiz_list li.wpProQuiz_listItem').length;

		var resultText = jQuery('.fr .wpProQuiz_content .wpProQuiz_results p:first');
		resultText.text('Vous avez bien répondu à ' + correctCount + ' des ' + totalCount + ' questions');

		var timeText = jQuery('.fr .wpProQuiz_content .wpProQuiz_results p.wpProQuiz_quiz_time');
		var spanTimeText = timeText.find('span'); 
		timeText.html('Votre temps: <span></span>');

		var pointsText = jQuery('.fr .wpProQuiz_content .wpProQuiz_results p.wpProQuiz_points');
		pointsText.text('Vous avez obtenu ' + correctCount + ' de ' + totalCount + ' points, (' + Math.floor((correctCount / totalCount) * 100) + '%)');
	});

	startQuizInput.val('Commencez le test');
	jQuery('.fr .wpProQuiz_content li.wpProQuiz_listItem input[name=next]').val('Suivant');
	jQuery('.fr .wpProQuiz_content li.wpProQuiz_listItem input[name=check]').val('Vérifier');

	//jQuery(".fr .wpProQuiz_content").find("li.wpProQuiz_listItem input[name=next]").last().val('Completer le questionnaire');


	jQuery('.fr .wpProQuiz_content input[name=reShowQuestion]').val('Réviser les questions');
	jQuery('.fr .wpProQuiz_content .wpProQuiz_results h4.wpProQuiz_header').text('Résultats');
});

/* add this in the page as required */
function playerReady(obj){
  	if(obj['id'] == 'swfvideo3043') { video3043.setFlashPlayer(); video3043.flsPlayer.addModelListener("STATE", "OnStateChange"); }
}

function OnStateChange(obj){
  	if(obj['id'] == 'swfvideo3043') { if( obj['newstate'] == 'PLAYING') video3043.autoPlay = true; else video3043.autoPlay = false; }
}
