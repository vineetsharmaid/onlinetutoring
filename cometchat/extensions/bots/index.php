<?php

/*

CometChat
Copyright (c) 2016 Inscripts
License: https://www.cometchat.com/legal/license

*/
include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."config.php");
include_once(dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR.'colors'.DIRECTORY_SEPARATOR.'color.php');

if (file_exists(dirname(__FILE__).DIRECTORY_SEPARATOR."lang.php")){
	include_once(dirname(__FILE__).DIRECTORY_SEPARATOR."lang.php");
}
$baseUrl = BASE_URL;
$botcontent = array();
global $userid;
if (!empty($_REQUEST['basedata'])) {
	$basedata = $_REQUEST['basedata'];
}
$theme = 'docked';
if(!empty($_REQUEST['cc_theme'])){
	$theme = $_REQUEST['cc_theme'];
}
$caller="";
if(!empty($_REQUEST['caller'])){
	$caller = $_REQUEST['caller'];
}
$botlist = '';
$bothtml = '';
if(function_exists('getBotList')){
	$botlist = getBotList();
}

$imageHeight = '150px';
if($theme == 'docked'){
	$imageHeight = '100px';
}
foreach ($botlist as $key => $value) {
	$botactiveid = $key;

	if(empty($value['d'])){
		$botlist[$key]['d'] = $value['d'] = $bots_language['default_desc'];
	}
	$botcontent[$key] = '<div id="cometchat_botcontainer_'.$value['id'].'" class="cometchat_botcontainer" style="width:94%;"><div class="cometchat_botcontainer_body"><div class="cometchat_bot_info"><div id="cometchat_botlist_'.$value['id'].'" class="cometchat_botinfo"><div class="cometchat_botdata"><img class="cometchat_botavatarimage" src="'.$value['a'].'" style="border-radius: 100px;width:'.$imageHeight.'"></div><div style="clear:both"></div></div><div class="desc"><div class="cometchat_botname center">'.$value['n'].'</div><div class="cometchat_botdesc center">'.$value['d'].'</div></div></div></div></div>';
	$bothtml .= '<div botid="'.$value['id'].'" id="cometchat_botlist_'.$value['id'].'" class="cometchat_botlist" ><div class="cometchat_botscontentavatar"><img class="cometchat_botscontentavatarimage" src="'.$value['a'].'"><div class="cometchat_bots_desc"><div class="cometchat_botscontentname">'.$value['n'].' <span class="cometchat_botrule"> @'.$value['n'].'</span></div><div><div class="cometchat_botslist_desc">'.$value['d'].'</div></div></div></div></div>';
}

if(isset($_REQUEST['callbackfn']) && $_REQUEST['callbackfn'] == 'mobileapp'){
	if(!empty($bothtml)){
		$botlh = md5(serialize($botlist));
		$response['botlist'] = $botlist;
		$response['botlh'] = $botlh;
		echo json_encode($response);exit;
	}else{
		$response['nobots'] = $bots_language['no_bots'];
		echo json_encode($response);exit;
	}
}
if(empty($bothtml)){
	$bothtml = '<div class="cometchat_nobots">'.$bots_language['no_bots'].'</div>';
}
$botcontent = empty($botcontent)?'{}':json_encode($botcontent);
$botlist = empty($botlist)?'{}':json_encode($botlist);
$popoutmode = 0;
if(empty($userid) || 1){
	echo <<<EOD
	<!DOCTYPE html>
	<html>
	<head>
		<style type="text/css">
			.botdescription{
				width: 79%;
				float: right;
				margin-top: 20px;
			}
			.cometchat_botavatarimage{
				margin: 0 auto;
				display: block;
			}
			.center{
				text-align: center;
			}
			.cometchat_botcontainer{
				padding: 10px;
				margin-top: 10px;
			}
			.cometchat_botname{
				margin: 10px;
				font-weight: bolder;
			}
			.cometchat_userlist_hover, .cometchat_botlist_hover {
				background-color: {$themeSettings['hover_color']} !important;
			}
			.cometchat_botlist {
				cursor: pointer;
				height: 45px;
				line-height: 100%;
				padding: 2px 8px 2px 5px;
				border-bottom: 1px solid;
				border-color: #E6E7EA;
				clear: both;
				padding: 7px 5px 6px 5px;
				background-color: #ffffff
			}
			.cometchat_botcontentname{
				text-overflow: ellipsis;
				text-transform: capitalize;
				max-width: 195px;
				padding-top: 10px;
				white-space: nowrap;
			}
			.cometchat_botrule {
				text-transform: lowercase;
				color: #56a8e3;
			}
			.cometchat_bots_desc{
				float: right;
				margin-left: 15px;
				margin-top:10px;
			}
			.cometchat_botscontentname{
				margin-top: -6px;
				margin-bottom: 5px;
			}
			.cometchat_botlist:hover{
				background-color: {$themeSettings['hover_color']} !important;
			}
			.cometchat_botslist_desc{
				font-size: 12px;
				color: #aaaaaa;
				max-width: 200px;
				width: 150px;
				text-overflow: ellipsis;
				white-space: nowrap;
				overflow: hidden;
				line-height: 13px;
				float: left;
			}
			.cometchat_botscontentavatar {
				display: block;
				float: left;
				padding-bottom: 1px;
				padding-left: 5px;
				padding-top: 2px;
				position: relative;
			}
			.cometchat_botscontentavatarimage {
				height: 40px;
				width: 40px;
				position: relative;
				border-radius: 50%;
			}
			.cometchat_nobots{
				font-family: {$themeSettings['font_family']};
				font-size: 13px;
				line-height: 1.3em;
				padding: 10px;
				color: {$themeSettings['text_color']};
				text-align: center;
			}
		</style>
		<script src="../../js.php?type=core&name=jquery" type="text/javascript"></script>
		<script src="../../js.php?type=core&name=scroll" type="text/javascript"></script>
		<script type="text/javascript">
			jqcc(function() {
				var botcontent = $botcontent;
				var botlist = $botlist;

				jqcc('.cometchat_botlist').live('click', function() {
					var botid = jqcc('#' + this.id).attr('botid');
					jqcc('.cometchat_bots_wrapper').html(botcontent[botid]);
					jqcc("#bots_window", parent.document).find("#cometchat_windowtitlebar").prepend('<div id="cometchat_botsback" class="cometchat_backwindow" ><img src="themes/{$theme}/images/leftarrow.svg"/></div>');
					jqcc("#bots_window", parent.document).find("#cometchat_bot_title_text").text(botlist[botid]['n']);
					jqcc("#cometchat_bots_popup", parent.document).find(".cometchat_userstabtitle").prepend('<div id="cometchat_botsback" class="cometchat_back" ></div>');
					jqcc("#cometchat_bots_popup", parent.document).find(".cometchat_userstabtitletext").text(botlist[botid]['n']);
					jqcc("#cometchat_bots_popup", parent.document).find(".cometchat_userstabtitletext").css('margin-left', '10px');
				});
				jqcc('.cometchat_bots_wrapper').slimScroll({
					height: 'auto'
				});
				if (jqcc("#bots_window", parent.document).find("#cometchat_botsback").length > 0) {
					jqcc("#bots_window", parent.document).find("#cometchat_botsback").remove();
				}
				if (jqcc("#cometchat_bots_popup", parent.document).find("#cometchat_botsback").length > 0) {
					jqcc("#cometchat_bots_popup", parent.document).find("#cometchat_botsback").remove();
				}
				jqcc("#bots_window", parent.document).find("#cometchat_botsback").live('click', function() {
					jqcc('.cometchat_bots_wrapper').html('{$bothtml}');
					jqcc("#bots_window", parent.document).find("#cometchat_botsback").remove();
					jqcc("#bots_window", parent.document).find("#cometchat_bot_title_text").text("{$bots_language['bots']}");
				});
				jqcc('#bots_closewindow', parent.document).live('click', function() {
					jqcc("#bots_window", parent.document).find("#cometchat_bot_title_text").text("{$bots_language['bots']}");
				});
				jqcc("#cometchat_bots_popup", parent.document).find("#cometchat_botsback").live('click', function() {
					jqcc('.cometchat_bots_wrapper').html('{$bothtml}');
					jqcc("#cometchat_bots_popup", parent.document).find("#cometchat_botsback").remove();
					jqcc("#cometchat_bots_popup", parent.document).find(".cometchat_userstabtitletext").text("{$bots_language['bots']}");
					jqcc("#cometchat_bots_popup", parent.document).find(".cometchat_userstabtitletext").css('margin-left', '20px');
				});
			});
		</script>
	</head>
	<body style="margin:0px;">
	<div style="background: #FFF;font-family: Tahoma,Verdana,Arial,'Bitstream Vera Sans',sans-serif;font-size: 13px;height: 100vh;" class="cometchat_bots_wrapper">
		{$bothtml}
	</div>
	<body>
	</html>
EOD;
	exit;
}
