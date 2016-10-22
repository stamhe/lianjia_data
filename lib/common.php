<?php

function build_return($code, $msg, $data)
{
	$data = array(
		'code'	=> $code,
		'msg'	=> $msg,
		'data'	=> $data,
	);
	
	echo json_encode($data);exit;
}