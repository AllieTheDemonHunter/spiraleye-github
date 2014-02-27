$(document).ready(function(){
	$(function() {
	    $( "#dialog-form" ).dialog({
	      autoOpen: false,
	      height: 500,
	      width: 500,
	      modal: true,
	      buttons: {
	        Cancel: function() {
	          $( this ).dialog( "close" );
	        }
	      },
	      close: function() {
	        allFields.val( "" ).removeClass( "ui-state-error" );
	      }
	    });
	 
	    $( "#create_issue" )
	      .click(function() { 
	        $( "#dialog-form" ).dialog( "open" );
	      });
	  });
})