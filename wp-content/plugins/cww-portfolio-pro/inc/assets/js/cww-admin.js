jQuery(document).ready(function ($) {
	
	 function cww_pp_sections_order( container ){

	    var sections = $('#sub-accordion-panel-cww_homepage_panel').sortable('toArray');
	    var s_ordered = [];
	    $.each(sections, function( index, s_id ) {
	      s_id = s_id.replace( "accordion-section-", "");
	      s_ordered.push(s_id);
	    });

	    $.ajax({
	      url: cwwPP.ajax_url,
	      type: 'post',
	      dataType: 'html',
	      data: {
	        'action': 'cww_pp_order_sections',
	        'sections': s_ordered,
	      }
	    })
	    .done( function( data ) {
	      wp.customize.previewer.refresh();
	    });

	  }

	  $('#sub-accordion-panel-cww_homepage_panel').sortable({
	    helper: 'clone',
	    items: '> li.control-section:not(#accordion-section-cww_homepage_section)',
	    cancel: 'li.ui-sortable-handle.open',
	    delay: 150,
	    update: function( event, ui ) {

	      cww_pp_sections_order( $('#sub-accordion-panel-cww_homepage_panel') );

	    },

	  });



  });//Main document ending