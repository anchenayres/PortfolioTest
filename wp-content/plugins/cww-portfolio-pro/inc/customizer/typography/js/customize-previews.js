jQuery( document ).ready( function() {
"use strict"; 
	wp.customize(
		'menu_font_family',
		function( value ) {
			value.bind(
				function( to ) {
					if(to != 'Arial' && to != 'Verdana' && to != 'Trebuchet' && to != 'Georgia' && to != 'Tahoma' && to != 'Palatino' && to != 'Helvetica' ){
					WebFont.load({
			            google: {
			              families: [to]
			            }
			          });
					}
					jQuery( '.main-navigation ul li a,.full-screen-side-nav-wrapp ul.first-level li a' ).css( 'font-family', to );
				}
			);
		}
	);

	wp.customize(
		'menu_font_style',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( '.main-navigation ul li a,.full-screen-side-nav-wrapp ul.first-level li a' ).css( {
						'font-style': to
					} );
				}
			);
		}
	);

	wp.customize(
		'menu_font_weight',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( '.main-navigation ul li a,.full-screen-side-nav-wrapp ul.first-level li a' ).css( {
						'font-weight': to
					} );
				}
				
			);
		}
	);

	wp.customize(
		'menu_text_transform',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( '.main-navigation ul li a,.full-screen-side-nav-wrapp ul.first-level li a' ).css( 'text-transform', to );
				}
			);
		}
	);

	wp.customize(
		'menu_text_decoration',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( '.main-navigation ul li a,.full-screen-side-nav-wrapp ul.first-level li a' ).css( 'text-decoration', to );
				}
			);
		}
	);

	wp.customize(
		'menu_font_size',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( '.main-navigation ul li a,.full-screen-side-nav-wrapp ul.first-level li a' ).css( 'font-size', to + 'px' );
				}
			);
		}
	);

	wp.customize(
		'menu_line_height',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( '.main-navigation ul li a,.full-screen-side-nav-wrapp ul.first-level li a' ).css( 'line-height', to + 'px');
				}
			);
		}
	);

	wp.customize(
		'menu_typography_padding',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( '.main-navigation ul li' ).css( 'margin-right', to + 'em');
				}
			);
		}
	);

	wp.customize(
		'menu_color',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( '.main-navigation ul li a,.full-screen-side-nav-wrapp ul.first-level li a' ).css( 'color', to );
				}
			);
		}
	);
/* === <p> === */
	wp.customize(
		'p_font_family',
		function( value ) {
			value.bind(
				function( to ) {
					if(to != 'Arial' && to != 'Verdana' && to != 'Trebuchet' && to != 'Georgia' && to != 'Tahoma' && to != 'Palatino' && to != 'Helvetica' ){
					WebFont.load({
			            google: {
			              families: [to]
			            }
			          });
					}
					jQuery( 'p' ).css( 'font-family', to );
				}
			);
		}
	);

	wp.customize(
		'p_font_style',
		function( value ) {
			value.bind(
				function( to ) {
					var weight = to.replace(/\D/g,'');
					var style = to.replace(/\d+/g, '');
					jQuery( 'p' ).css( {
						'font-weight': weight,
						'font-style' : style
					} );
				}
			);
		}
	);

	wp.customize(
		'p_text_transform',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'p' ).css( 'text-transform', to );
				}
			);
		}
	);

	wp.customize(
		'p_text_decoration',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'p' ).css( 'text-decoration', to );
				}
			);
		}
	);

	wp.customize(
		'p_font_size',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'p' ).css( 'font-size', to + 'px' );
				}
			);
		}
	);

	wp.customize(
		'p_line_height',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'p' ).css( 'line-height', to );
				}
			);
		}
	);

	wp.customize(
		'p_color',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'p' ).css( 'color', to );
				}
			);
		}
	);

	/* === <h1> === */
	wp.customize(
		'h1_font_family',
		function( value ) {
			value.bind(
				function( to ) {
					if(to != 'Arial' && to != 'Verdana' && to != 'Trebuchet' && to != 'Georgia' && to != 'Tahoma' && to != 'Palatino' && to != 'Helvetica' ){
					WebFont.load({
			            google: {
			              families: [to]
			            }
			          });
					}
					jQuery( 'h1' ).css( 'font-family', to );
				}
			);
		}
	);

	wp.customize(
		'h1_font_style',
		function( value ) {
			value.bind(
				function( to ) {
					var weight = to.replace(/\D/g,'');
					var style = to.replace(/\d+/g, '');
					jQuery( 'h1' ).css( {
						'font-weight': weight,
						'font-style' : style
					} );
				}
			);
		}
	);

	wp.customize(
		'h1_text_transform',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'h1' ).css( 'text-transform', to );
				}
			);
		}
	);

	wp.customize(
		'h1_text_decoration',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'h1' ).css( 'text-decoration', to );
				}
			);
		}
	);

	wp.customize(
		'h1_font_size',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'h1' ).css( 'font-size', to + 'px' );
				}
			);
		}
	);

	wp.customize(
		'h1_line_height',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'h1' ).css( 'line-height', to );
				}
			);
		}
	);

	wp.customize(
		'h1_color',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'h1' ).css( 'color', to );
				}
			);
		}
	);

	/* === <h2> === */
	wp.customize(
		'h2_font_family',
		function( value ) {
			value.bind(
				function( to ) {
					if(to != 'Arial' && to != 'Verdana' && to != 'Trebuchet' && to != 'Georgia' && to != 'Tahoma' && to != 'Palatino' && to != 'Helvetica' ){
					WebFont.load({
			            google: {
			              families: [to]
			            }
			          });
					}
					jQuery( 'h2' ).css( 'font-family', to );
				}
			);
		}
	);

	wp.customize(
		'h2_font_style',
		function( value ) {
			value.bind(
				function( to ) {
					var weight = to.replace(/\D/g,'');
					var style = to.replace(/\d+/g, '');
					jQuery( 'h2' ).css( {
						'font-weight': weight,
						'font-style' : style
					} );
				}
			);
		}
	);

	wp.customize(
		'h2_text_transform',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'h2' ).css( 'text-transform', to );
				}
			);
		}
	);

	wp.customize(
		'h2_text_decoration',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'h2' ).css( 'text-decoration', to );
				}
			);
		}
	);

	wp.customize(
		'h2_font_size',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'h2' ).css( 'font-size', to + 'px' );
				}
			);
		}
	);

	wp.customize(
		'h2_line_height',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'h2' ).css( 'line-height', to );
				}
			);
		}
	);

	wp.customize(
		'h2_color',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'h2' ).css( 'color', to );
				}
			);
		}
	);

	/* === <h3> === */
	wp.customize(
		'h3_font_family',
		function( value ) {
			value.bind(
				function( to ) {
					if(to != 'Arial' && to != 'Verdana' && to != 'Trebuchet' && to != 'Georgia' && to != 'Tahoma' && to != 'Palatino' && to != 'Helvetica' ){
					WebFont.load({
			            google: {
			              families: [to]
			            }
			          });
					}
					jQuery( 'h3' ).css( 'font-family', to );
				}
			);
		}
	);

	wp.customize(
		'h3_font_style',
		function( value ) {
			value.bind(
				function( to ) {
					var weight = to.replace(/\D/g,'');
					var style = to.replace(/\d+/g, '');
					jQuery( 'h3' ).css( {
						'font-weight': weight,
						'font-style' : style
					} );
				}
			);
		}
	);

	wp.customize(
		'h3_text_transform',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'h3' ).css( 'text-transform', to );
				}
			);
		}
	);

	wp.customize(
		'h3_text_decoration',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'h3' ).css( 'text-decoration', to );
				}
			);
		}
	);

	wp.customize(
		'h3_font_size',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'h3' ).css( 'font-size', to + 'px' );
				}
			);
		}
	);

	wp.customize(
		'h3_line_height',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'h3' ).css( 'line-height', to );
				}
			);
		}
	);

	wp.customize(
		'h3_color',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'h3' ).css( 'color', to );
				}
			);
		}
	);

	/* === <h4> === */
	wp.customize(
		'h4_font_family',
		function( value ) {
			value.bind(
				function( to ) {
					if(to != 'Arial' && to != 'Verdana' && to != 'Trebuchet' && to != 'Georgia' && to != 'Tahoma' && to != 'Palatino' && to != 'Helvetica' ){
					WebFont.load({
			            google: {
			              families: [to]
			            }
			          });
					}
					jQuery( 'h4' ).css( 'font-family', to );
				}
			);
		}
	);

	wp.customize(
		'h4_font_style',
		function( value ) {
			value.bind(
				function( to ) {
					var weight = to.replace(/\D/g,'');
					var style = to.replace(/\d+/g, '');
					jQuery( 'h4' ).css( {
						'font-weight': weight,
						'font-style' : style
					} );
				}
			);
		}
	);

	wp.customize(
		'h4_text_transform',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'h4' ).css( 'text-transform', to );
				}
			);
		}
	);

	wp.customize(
		'h4_text_decoration',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'h4' ).css( 'text-decoration', to );
				}
			);
		}
	);

	wp.customize(
		'h4_font_size',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'h4' ).css( 'font-size', to + 'px' );
				}
			);
		}
	);

	wp.customize(
		'h4_line_height',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'h4' ).css( 'line-height', to );
				}
			);
		}
	);

	wp.customize(
		'h4_color',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'h4' ).css( 'color', to );
				}
			);
		}
	);

	/* === <h5> === */
	wp.customize(
		'h5_font_family',
		function( value ) {
			value.bind(
				function( to ) {
					if(to != 'Arial' && to != 'Verdana' && to != 'Trebuchet' && to != 'Georgia' && to != 'Tahoma' && to != 'Palatino' && to != 'Helvetica' ){
					WebFont.load({
			            google: {
			              families: [to]
			            }
			          });
					}
					jQuery( 'h5' ).css( 'font-family', to );
				}
			);
		}
	);

	wp.customize(
		'h5_font_style',
		function( value ) {
			value.bind(
				function( to ) {
					var weight = to.replace(/\D/g,'');
					var style = to.replace(/\d+/g, '');
					jQuery( 'h5' ).css( {
						'font-weight': weight,
						'font-style' : style
					} );
				}
			);
		}
	);

	wp.customize(
		'h5_text_transform',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'h5' ).css( 'text-transform', to );
				}
			);
		}
	);

	wp.customize(
		'h5_text_decoration',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'h5' ).css( 'text-decoration', to );
				}
			);
		}
	);

	wp.customize(
		'h5_font_size',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'h5' ).css( 'font-size', to + 'px' );
				}
			);
		}
	);

	wp.customize(
		'h5_line_height',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'h5' ).css( 'line-height', to );
				}
			);
		}
	);

	wp.customize(
		'h5_color',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'h5' ).css( 'color', to );
				}
			);
		}
	);

	/* === <h6> === */
	wp.customize(
		'h5h6_font_family',
		function( value ) {
			value.bind(
				function( to ) {
					if(to != 'Arial' && to != 'Verdana' && to != 'Trebuchet' && to != 'Georgia' && to != 'Tahoma' && to != 'Palatino' && to != 'Helvetica' ){
					WebFont.load({
			            google: {
			              families: [to]
			            }
			          });
					}
					jQuery( 'h6' ).css( 'font-family', to );
				}
			);
		}
	);

	wp.customize(
		'h6_font_style',
		function( value ) {
			value.bind(
				function( to ) {
					var weight = to.replace(/\D/g,'');
					var style = to.replace(/\d+/g, '');
					jQuery( 'h6' ).css( {
						'font-weight': weight,
						'font-style' : style
					} );
				}
			);
		}
	);

	wp.customize(
		'h6_text_transform',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'h6' ).css( 'text-transform', to );
				}
			);
		}
	);

	wp.customize(
		'h6_text_decoration',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'h6' ).css( 'text-decoration', to );
				}
			);
		}
	);

	wp.customize(
		'h6_font_size',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'h6' ).css( 'font-size', to + 'px' );
				}
			);
		}
	);

	wp.customize(
		'h6_line_height',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'h6' ).css( 'line-height', to );
				}
			);
		}
	);

	wp.customize(
		'h6_color',
		function( value ) {
			value.bind(
				function( to ) {
					jQuery( 'h6' ).css( 'color', to );
				}
			);
		}
	);


} ); // jQuery( document ).ready
