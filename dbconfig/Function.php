<?php  
function inject_checker ($Connection, $field) {
	return (htmlentities(trim (mysli_real_escape_string($Connection, $field))));
}
?>