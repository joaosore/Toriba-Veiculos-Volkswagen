<?php 

function distinct() {
	return "DISTINCT";
}
add_filter('posts_distinct', 'distinct');

?>