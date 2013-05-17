<?php


/**
 *	[ЦјХнЬсаб(gww_tips.feed)] (C)2013-2015 Powered by gww QQ:270144592.
 *	Version: 1.0
 *	Date: 2013-5-15 11:42
 */

if (!defined('IN_DISCUZ')) {
	exit ('Access Denied');
}
global $_G;

$arr = array('newpm'=>$_G['member']['newpm'],'newprompt'=>$_G['member']['newprompt']);

$json = json_encode($arr);

$callback = $_GET['callback'];

echo $callback.'('.$json.')';


?>