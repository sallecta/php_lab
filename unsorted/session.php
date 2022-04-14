<?php
// echo PHP_SESSION_ACTIVE;
// echo '<p>session_status(): '.session_status().'</p>';
session_start([
    'cookie_lifetime' => 0,
	'cookie_httponly'=>1,
	'use_strict_mode'=>1,
	'sid_length'=>128,
	'sid_bits_per_character'=>6,
]);
//session_regenerate_id(true); 
echo '<p>session_id() : ' . session_id() . '</p>';
echo '<p>SID predefined constant : ' .SID. '</p>';
echo '<p>var_dump($_SESSION):</p>';
var_dump($_SESSION);
echo '<p> session_name(): '. session_name().'</p>';
echo '<p> ini_get(session.use_cookies) : '. ini_get('session.use_cookies')  .'</p>';
echo '<p> ini_get(session.use_only_cookies) : '. ini_get('session.use_only_cookies')  .'</p>';
echo '<p> ini_get(session.cookie_lifetime) : '. ini_get('session.cookie_lifetime')  .'</p>';
echo '<p> ini_get(session.cookie_path) : '. ini_get('session.cookie_path')  .'</p>';
echo '<p> session_save_path (): '. session_save_path().'</p>';
echo '<p> ini_get(session.cookie_domain) : '. ini_get('session.cookie_domain')  .'</p>';
echo '<p> ini_get(session.cookie_secure) : '. ini_get('session.cookie_secure')  .'</p>';
echo '<p> ini_get(session.cookie_httponly) : '. ini_get('session.cookie_httponly')  .'</p>';
echo '<p> ini_get(session.cookie_samesite) : '. ini_get('session.cookie_samesite')  .'</p>';
echo '<p> ini_get(session.sid_length) : '. ini_get('session.sid_length')  .'</p>';
echo '<p> ini_get(session.sid_bits_per_character) : '. ini_get('session.sid_bits_per_character')  .'</p>';
// remove all session variables
session_unset();

// destroy the session
session_destroy(); 

?>
