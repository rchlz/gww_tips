<?php


if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

if(!submitcheck('submit')) {

	global $_G;

	loadcache('plugin');
	
	$poll_on = $_G['cache']['plugin']['gww_tips']['poll_on'] ? 'checked' : '';
	$poll_maxtime = $_G['cache']['plugin']['gww_tips']['poll_maxtime'];
	$poll_mintime = $_G['cache']['plugin']['gww_tips']['poll_mintime'];
	$poll_decay = $_G['cache']['plugin']['gww_tips']['poll_decay'];
	
	showtips(lang('plugin/gww_tips', 'setting_tips'), 'gww_tips');
	showtableheader(lang('plugin/gww_tips', 'poll_setting'));
	showformheader('plugins&operation=config&identifier=gww_tips&pmod=setting');
	showtablerow('', array('class="td25"', 'class="td25"'), array(
				lang('plugin/gww_tips', 'poll_on'),
				'<input type="checkbox" name="poll_on" value="1" '.$poll_on.' />',
				'压力大就关了'
	));
	
	showtablerow('', array('class="td25"', 'class="td25"'), array(
				lang('plugin/gww_tips', 'poll_maxtime'),
				'<input type="text" name="poll_maxtime" value="'.$poll_maxtime.'" />',
				' 单位:秒(s)'
	));
	
	showtablerow('', array('class="td25"', 'class="td25"'), array(
				lang('plugin/gww_tips', 'poll_mintime'),
				'<input type="text" name="poll_mintime" value="'.$poll_mintime.'" />',
				' 单位:秒(s)'
	));
	
	showtablerow('', array('class="td25"', 'class="td25"'), array(
				lang('plugin/gww_tips', 'poll_decay'),
				'<input type="text" name="poll_decay" value="'.$poll_decay.'" />',
				' 单位:秒(s)'
	));
	
	showsubmit('submit','submit', '', '', '');
	
	showtablefooter();
	showformfooter();

}else{
	
	$poll_on = !!daddslashes(trim($_POST['poll_on']));
	$poll_maxtime = daddslashes(trim($_POST['poll_maxtime']));
	$poll_mintime = daddslashes(trim($_POST['poll_mintime']));
	$poll_decay = daddslashes(trim($_POST['poll_decay']));
	
	$data = array('poll_on'=>$poll_on,'poll_maxtime'=>$poll_maxtime,'poll_mintime'=>$poll_mintime,'poll_decay'=>$poll_decay);
	
	DB::update('common_pluginvar', array('value'=>$poll_on), "pluginid=".$pluginid." and variable='poll_on'");
	DB::update('common_pluginvar', array('value'=>$poll_maxtime), "pluginid=".$pluginid." and variable='poll_maxtime'");
	DB::update('common_pluginvar', array('value'=>$poll_mintime), "pluginid=".$pluginid." and variable='poll_mintime'");
	DB::update('common_pluginvar', array('value'=>$poll_decay), "pluginid=".$pluginid." and variable='poll_decay'");

	loadcache('plugin');
	$_G['cache']['plugin']['gww_tips']['poll_on'] = $poll_on;
	$_G['cache']['plugin']['gww_tips']['poll_maxtime'] = $poll_maxtime;
	$_G['cache']['plugin']['gww_tips']['poll_mintime'] = $poll_mintime;
	$_G['cache']['plugin']['gww_tips']['poll_decay'] = $poll_decay;


	/*
	DB::query("UPDATE ".DB::table('gwwtips_setting')." SET poll_on='$poll_on',poll_maxtime='$poll_maxtime',poll_mintime='$poll_mintime',poll_decay='$poll_decay' WHERE sid=1");

	loadcache('plugin'); //读取插件缓存
	*/
	
	cpmsg('OK', 'action=plugins&operation=config&identifier=gww_tips&pmod=setting');
	
}
?>