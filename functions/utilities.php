<?php
/**
 * utilities.php
 */

function debugMe($data){

	echo "<script>alert(". print_r(array($data),true)  .");</script>";

}
