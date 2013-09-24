<?php
// remove all xhtml declarations
// <?xml version="1.0" encoding="UTF-8"?\>

if ($handle = opendir('.')) {
	while (false !== ($entry = readdir($handle))) {
		$path_parts = pathinfo($entry);
		if (isset($path_parts['extension']) && $path_parts['extension'] == 'xhtml') {
			$file_contents = file_get_contents($entry);
			$file_contents = str_replace('<?xml version="1.0" encoding="UTF-8"?>', '', trim($file_contents));
			file_put_contents($entry, $file_contents);
		}
	}
	closedir($handle);
}
?>