jQuery(function() {

	var pageSearch = 0;

	jQuery('#btnsearch').on('click', function(){
		pageSearch++;

		var posttype = jQuery("#hidePostType").val();
		var search = jQuery("#hideSearch").val();
		
		var data = {
	      action: 'tornese_search',
	      paged: pageSearch,
	      posttype: posttype,
	      search: search
	    };

	    jQuery.post(
	      'wp-admin/admin-ajax.php',
	      data,
	      function(response){
	      	response = response.substring(0,(response.length - 1));
	        jQuery(".search .listagem .content").append(response);
	      }
	    );
	});

});