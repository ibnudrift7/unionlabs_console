<?php
$dt_DB = array();
$in_domains = ['budhist.sbe-socialbread.my.id'];
if (in_array($_SERVER['HTTP_HOST'], $in_domains)) {
	$dt_DB =  array(
		'server' => 'mymariadb',
		'username' => 'sb_user_n1',
		'password' => '1q2w3e4r5t',
		'database' => 'budhist_wrp',
);
} else {
	//online
	$dt_DB =  array(
		'server' => 'localhost',
		'username' => 'root',
		'password' => '',
		'database' => 'budhist',
	);
}
