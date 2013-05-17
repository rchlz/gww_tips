<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class plugin_gww_tips {

	var $loc_r = 370;
	var $loc_t = 40;
	var $loc_fixed = true;
	var $loc_position = 'relative';
	var $tips_width = 200;
	var $tips_bg = '#FFFFE3';
	
	function global_header() {
		global $_G;
		
		$newpm = $_G['member']['newpm'];
		$newprompt = $_G['member']['newprompt'];
		$display = $newpm || $newprompt ? 'block' : 'none';
		
		$tips_width = $_G['cache']['plugin']['gww_tips']['tips_width'];
		$tips_bg = $_G['cache']['plugin']['gww_tips']['tips_bg'];
		$loc_r = $_G['cache']['plugin']['gww_tips']['loc_r'];
		$loc_t = $_G['cache']['plugin']['gww_tips']['loc_t'];
		$loc_fixed = $_G['cache']['plugin']['gww_tips']['loc_fixed'];
		$loc_position = $loc_fixed ? 'fixed' : 'relative';
		

		$poll_on = $_G['cache']['plugin']['gww_tips']['poll_on'];
		$poll_maxtime = $_G['cache']['plugin']['gww_tips']['poll_maxtime']*1000;
		$poll_mintime = $_G['cache']['plugin']['gww_tips']['poll_mintime']*1000;
		$poll_decay = $_G['cache']['plugin']['gww_tips']['poll_decay']*1000;

		$return='';
		include template('gww_tips:tips');
		return $return;
	}
	
}

?>