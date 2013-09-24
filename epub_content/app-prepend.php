<?php
// automatically inject Aloha Editor code into html pages via .htaccess & php auto_prepend_file

function app_loader( $buffer ) {

	$aloha_editor = '
		<!-- load the jQuery and require.js libraries -->
		<script type="text/javascript" src="http://cdn.aloha-editor.org/latest/lib/require.js"></script>
		<script type="text/javascript" src="http://cdn.aloha-editor.org/latest/lib/vendor/jquery-1.7.2.js"></script>

		<!-- Aloha Editor config -->
			<script type="text/javascript">
			var Aloha = window.Aloha || ( window.Aloha = {} );

				Aloha.settings = {
					sidebar: {
						disabled: true
					}
				}
			</script>

		<!-- load the Aloha Editor core and some plugins -->
		<script src="http://cdn.aloha-editor.org/latest/lib/aloha.js"
				data-aloha-plugins="common/ui,
									common/format,
									common/list,
									common/link,
									common/highlighteditables">
		              </script>

		<!-- load the Aloha Editor CSS styles -->
		<link href="http://cdn.aloha-editor.org/latest/css/aloha.css" rel="stylesheet" type="text/css" />

		<!-- make all "section" and "h1" elements with editable with Aloha Editor -->
		<script type="text/javascript">
			Aloha.ready( function() {
				var $ = Aloha.jQuery;
				$("section").aloha();
				/* other rules for editable content */
			});
		</script>
	';

		$buffer = str_replace( "</body>", "\n\n$aloha_editor\n\n</body>", $buffer );
		return $buffer;
}


// tidy contents in order to get valid html
//ob_start( 'ob_tidyhandler' );

// call runty_loader callback function 
ob_start( 'app_loader' );

?>