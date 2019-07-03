// rurn date picker if existed
if ($('[data-datepicker]').length) {
	var datepickerOptions = {
		format: 'yyyy-mm-dd',
	//	startDate: '0d',
		autoclose: true
	};
	$('[data-datepicker]').datepicker(datepickerOptions);
};


// rurn select2 if existed
if ($('.select2').length) {
	$('.select2').select2();
};

// rurn daterangepicker if existed
if ($('[data-daterangepicker]').length) {
	$('[data-daterangepicker]').daterangepicker();
};



		var CORE = (function($){
			function __ajaxCall(url, type, method, successCallback){
				$.ajax({
					url: url,
					type: type,
					data: {_method: method},
					success: successCallback
				});
			}

			return {
				ajaxDelete : function(url, successCallback){
					__ajaxCall(url, 'post', 'delete', successCallback);
				},
				ajaxPatch : function(url, successCallback){
					__ajaxCall(url, 'post', 'patch', successCallback);
				},
				confirmDeletion : function(callback){
					swal({
						title: "Are you sure?",
						text: "You will not be able to recover this record!",
						type: "warning",
						showCancelButton: true,
						confirmButtonColor: "#DD6B55",
						confirmButtonText: "Yes, delete it!",
						closeOnConfirm: true
					}, callback);
				}
			};
		})($);

		var GLOBAL = (function($, CORE){

			// displays flash message if it's present
			function __displayFlashMessage(flashMessage){
				// choose title depending on the type of the flash message
				var title = '';
				switch(flashMessage.type){
					case 'success'  : title = 'Success!';               break;
					case 'info'     : title = 'Oops, can\'t do that!!'; break;
					case 'warning'  : title = 'Warning!';               break;
					case 'error'    : title = 'Error!';                 break;

					default: return; // return if the type is not present or is incorrect
				}

				if(flashMessage.type === 'success'){
					swal({
						title: title,
						text: flashMessage.description,
						type: "success",
						timer: 1000,
						showConfirmButton: false
					});
				} else {
					swal({
						title: title,
						text: flashMessage.description,
						type: flashMessage.type,
						showConfirmButton: true
					});
				}
			}

			//// USAGE
			// data-delete          - used to mark the element to delete. if url is provided, the ajax
			//                        call will be issued to that email
			// data-delete-trigger  - used to mark the element that triggers the deletion. if 'no-confirm'
			//                        flag is set, confirmation popup won't appear

			function itemDeletionHandler(event){
				event.preventDefault();

				var $deletionTrigger = $(this);
				var $itemToDelete = $deletionTrigger.closest('[data-delete]');

				// set flags
				var noConfirm   = $deletionTrigger.data('delete-trigger') === 'no-confirm';
				var local       = !$itemToDelete.data('delete');

				// if trigger-delete is set to no-confirm, just delete
				// the html element without making a call to the server
				if(noConfirm && local){
					$itemToDelete.remove();
					return;
				}

				CORE.confirmDeletion(function(){
					// DO NOT send a request to the server
					if(local){
						$itemToDelete.remove();
						return;
					}

					// TODO: refactor the code into slimmer chunks
					// send request to the server
					CORE.ajaxDelete($itemToDelete.data('delete'), function(response){
						var defaultFlashMessage = {};
						
						if(response=='success'){
							$itemToDelete.remove();

							defaultFlashMessage.type = 'success';
							defaultFlashMessage.description = 'The entry was successfully deleted';
						} else {
							defaultFlashMessage.type = 'error';
							defaultFlashMessage.description = 'The entry could not be deleted';
						}

						// if flash message is set, display it, if not - display the default one
						if(response.flashMessage){
							__displayFlashMessage(response.flashMessage)
						} else {
							__displayFlashMessage(defaultFlashMessage);
						}
					});
				});
			}

			function itemRefreshHandler(e){
				e.preventDefault();

				var $parent = $(this).closest('[data-refresh]');
				var shouldReloadPage = $(this).data('refresh-trigger');

				$.ajax({
					url: $parent.data('refresh'),
					type: 'get',
					success: function(response){
						if(response.html){
							var $html = $(response.html);

							$parent.fadeOut(250, function(){
								if($(this).prev().length){
									$(this).prev().after($html);
								} else {
									$(this).parent().prepend($html)
								}

								$(this).remove();
							});
						}

						if(shouldReloadPage) location.reload(true);
					}
				});
			}

			return {
				configureAjax : function(){
					// includes csrf token for every ajax call
					$.ajaxSetup({
						headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
					});
				},
				registerEventHandlers : function() {
					$(document).on('click', '[data-delete-trigger]', itemDeletionHandler);
					$(document).on('click', '[data-refresh-trigger]', itemRefreshHandler);
				},
				displayFlashMessage : function(flashMessage){
					__displayFlashMessage(flashMessage);
				}
			};
		})($, CORE);
		GLOBAL.configureAjax();
		GLOBAL.registerEventHandlers();

		//var ADDITIONAL_MAIL_ADDITION = (function(){
		//
		//	function itemAdditionHandler(event){
		//		event.preventDefault();
		//
		//		var $itemToAdd = $('[data-add]');
		//
		//		CORE.ajaxPatch($itemToAdd.data('add'), function(response, $itemToAdd){
		//			console.log($itemToAdd);
		//
		//			if(response.success){
		//				var $table = $('[data-add-target]');
		//				var $templateTr = $table.find('tr').last();
		//
		//				var $templateTrClone = $templateTr.clone;
		//
		//				// set number of the new entry
		//				var $firstTd = $templateTrClone.find('td:nth-child(1)');
		//
		//				var $previousTrFirstTd = $templateTrClone.prev().find('td:nth-child(1)');
		//				var num = Number($previousTrFirstTd.text()) ? Number($previousTrFirstTd.text()) + 1 : 1;
		//
		//				$firstTd.text(num + '.');
		//
		//				// set the email of the new entry
		//				var $secondTd = $templateTrClone.find('td:nth-child(2)');
		//				$secondTd.text($itemToAdd.val());
		//
		//				// configure the ajax deletion for the new entry
		//				var itemDeletionLink = $templateTrClone.data('delete').replace('placeholder', $itemToAdd.val());
		//				$templateTrClone.data('delete', itemDeletionLink);
		//			}
		//		});
		//		$('data-add-info')
		//	}
		//
		//	return {
		//		registerEventHandlers : function(){
		//			$(document).on('click', '[data-add-trigger]', itemAdditionHandler)
		//		}
		//	}
		//})($, CORE);
		//ADDITIONAL_MAIL_ADDITION.registerEventHandlers();



		