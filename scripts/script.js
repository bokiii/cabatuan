var modalModule = (function() {

	var modalShow = function() {
		$('#myModal').on('show.bs.modal', function (e) {
			//console.log('showed');
		});
	};     
	
	var modalHide = function() {
		$('#myModal').on('hide.bs.modal', function (e) {
			$(document).find("#modal_form").trigger("reset");
		});   
	};
	
	return {
		modalShow: 	modalShow, 
		modalHide: 	modalHide
	}

})()

modalModule.modalShow();   
modalModule.modalHide();




