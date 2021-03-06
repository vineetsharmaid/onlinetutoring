<?php

/*

CometChat
Copyright (c) 2016 Inscripts
License: https://www.cometchat.com/legal/license

*/

if (!defined('CCADMIN')) { echo "NO DICE"; exit; }

global $getstylesheet;
global $ts;
global $client;
global $keywords;

if(!empty($_GET['addbotprocess'])) {
	if(empty($_REQUEST['apikey'])) {
		return '';
	}
	$url = 'http://app.bots.co/api-cometchat/bot-info?apiKey='.$_REQUEST['apikey'];
	$postdata = array();
	$bot = cc_curl_call($url,$postdata);
	$bot = json_decode($bot,true);

	if(!empty($bot)) {
		$sql = "select id from `cometchat_bots` where `apikey` = '".mysqli_real_escape_string($GLOBALS["dbh"],$_REQUEST['apikey'])."'";
		$query = mysqli_query($GLOBALS["dbh"],$sql);
		if($query && mysqli_num_rows($query) == 0) {
			$filename = dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR."writable".DIRECTORY_SEPARATOR."bots".DIRECTORY_SEPARATOR.$bot['name'];

			if(saveimage($bot['avatar'],$filename)) {
				$avatar = BASE_URL."writable".DIRECTORY_SEPARATOR."bots".DIRECTORY_SEPARATOR.$bot['name'];
			}else {
				$avatar = $bot['avatar'];
			}
			if(!empty($_REQUEST['keywords'])){
                $keywords = $_REQUEST['keywords'];
            }else{
                $keywords = '';
            }

			$sql = "insert into `cometchat_bots`(`name`, `description`, `avatar`, `apikey`,`keywords`) values('".mysqli_real_escape_string($GLOBALS["dbh"],$bot['name'])."','".mysqli_real_escape_string($GLOBALS["dbh"],$bot['description'])."','".mysqli_real_escape_string($GLOBALS["dbh"],$avatar)."','".mysqli_real_escape_string($GLOBALS["dbh"],$_REQUEST['apikey'])."','".mysqli_real_escape_string($GLOBALS["dbh"],$keywords)."')";
			mysqli_query($GLOBALS["dbh"],$sql);
			removeCachedSettings($client.'cometchat_bots');
		}
	}
	header("Location:?module=dashboard&action=loadexternal&type=extension&name=bots");
} else if(!empty($_GET['deletebot'])){
	if(!empty($_REQUEST['botid'])) {
		$sql = "delete from `cometchat_bots` where `id` = '".mysqli_real_escape_string($GLOBALS["dbh"],$_REQUEST['botid'])."'";
		mysqli_query($GLOBALS["dbh"],$sql);
		removeCachedSettings($client.'cometchat_bots');
		header("Location:?module=dashboard&action=loadexternal&type=extension&name=bots");
	}
} else if(!empty($_GET['rebuildbots'])){
	if(!empty($_REQUEST['botid'])) {
		$sql = "select * from `cometchat_bots` where `id` = '".mysqli_real_escape_string($GLOBALS["dbh"],$_REQUEST['botid'])."'";
		if($query = mysqli_query($GLOBALS["dbh"],$sql)) {
			$bot = mysqli_fetch_assoc($query);
			if(!empty($bot)) {
				$url = 'http://app.bots.co/api-cometchat/bot-info?apiKey='.$bot['apikey'];
				$postdata = array();
				$bots = cc_curl_call($url,$postdata);
				$bots = json_decode($bots,true);
				if(!empty($bots)) {
					$filename = dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR."writable".DIRECTORY_SEPARATOR."bots".DIRECTORY_SEPARATOR.$bot['name'];

					if(saveimage($bots['avatar'],$filename)) {
						$avatar = BASE_URL."writable/bots/".$bot['name'];
					}else {
						$avatar = $bots['avatar'];
					}
					if(!empty($_REQUEST['keywords'])){
                        $keywords = $_REQUEST['keywords'];
                    }else{
                        $keywords = '';
                    }

                    $sql = "update `cometchat_bots` set `name`='".mysqli_real_escape_string($GLOBALS["dbh"],$bots['name'])."', `description`='".mysqli_real_escape_string($GLOBALS["dbh"],$bots['description'])."',`avatar`='".mysqli_real_escape_string($GLOBALS["dbh"],$bots['avatar'])."', `keywords` = '".mysqli_real_escape_string($GLOBALS["dbh"],$keywords)."' where id='".mysqli_real_escape_string($GLOBALS["dbh"],$_REQUEST['botid'])."'";
                    mysqli_query($GLOBALS["dbh"],$sql);
					removeCachedSettings($client.'cometchat_bots');
				}
			}
		}
		header("Location:?module=dashboard&action=loadexternal&type=extension&name=bots");
	}
} else {
	include_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'config.php');
	$botslist = '';
	$bots = getBotList();

	if(!empty($bots)) {
		$botslist = '<div class="header">Live Bots:</div><div style="clear:both;padding:5px;"></div>';
		foreach ($bots as $botinfo) {
			if(!empty($botinfo)){
		        $botslist .= '<li class="botlist" id="bot_'.$botinfo['id'].'"><div class="cometchat_botsicon cometchat_bot_'.$botinfo['id'].'" style="margin:0;margin-right:5px;margin-top:2px;float:left;"><img src="'.$botinfo['a'].'" width="16" height="16"></div><span style="font-size:12px;float:left;margin-top:3px;margin-left:5px;" id="'.$botinfo['id'].'_title">'.stripslashes($botinfo["n"]).'</span><span style="font-size:11px;float:right;margin-top:0px;margin-right:5px;"> <a href="?module=dashboard&action=loadexternal&type=extension&name=bots&rebuildbots=true&botid='.$botinfo['id'].'&ts='.$ts.'" style="margin-right:5px"><img src="images/rebuild.png" title="Rebuild" height="16px" width="16px"></a><a href="?module=dashboard&action=loadexternal&type=extension&name=bots&deletebot=true&botid='.$botinfo['id'].'&ts='.$ts.'"><img src="images/remove.png" title="Delete"></a></span><div style="clear:both"></div></li>';
	    	}
		}
	}

echo <<<EOD
<!DOCTYPE html>

$getstylesheet
<script src="../js.php?type=core&name=jquery"></script>
<script>
	$ = jQuery = jqcc;
</script>
<script type="text/javascript" language="javascript">
    function resizeWindow() {
        window.resizeTo(550, ($('body').outerHeight(false)+window.outerHeight-window.innerHeight));
    }
</script>

<div style="width:auto;padding:20px;">
		<h2>Bots</h2>
		<ul class="list">
			<li class="botinstructions">Please visit <a href="https://app.bots.co/bots" target="_blank">app.bots.co</a> and create a new bot for CometChat.</li>
			<li class="botinstructions">After creating the bot, you can use the api key to add the same bot in CometChat.</li>
		</ul>
		<div>
		<div style="clear:both;padding:10px;"></div>
		<div class="header">Add Bot:</div>
			<form style="height:100%;padding:0px 20px;" action="?module=dashboard&action=loadexternal&type=extension&name=bots&addbotprocess=true" method="post" onSubmit="">
			<div>
				<div class="title" style="width:auto;">Enter the API key: </div><div class="element"><input type="text" class="inputbox" name="apikey" required="true"/></div>
				<div style="clear:both;padding:10px;"></div>
				<input type="submit" value="Add Bot" class="button">
			</div>
			</form>
		</div>
		<div style="clear:both;padding:7.5px;"></div>
		{$botslist}
</div>

<script type="text/javascript" language="javascript">
	$(function() {
		setTimeout(function(){
				resizeWindow();
			},200);
	});
</script>
EOD;
}

function saveimage($url,$target) {
	if(!empty($url) && !empty($target)) {
		if(file_get_contents_curl_core($url, $target)) {
			return true;
		}else {
			return false;
		}
	}
}
