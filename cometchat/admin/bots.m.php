<?php
/*
CometChat
Copyright (c) 2016 Inscripts
License: https://www.cometchat.com/legal/license
*/
if (!defined('CCADMIN')) {echo 'NO DICE';exit;}

function index()
{
  global $body, $usebots, $ts;
  $disableBoty = $disableBotn = '';
    if ($usebots == 1) {
        $disableBoty = "checked";
    } else {
        $disableBotn = "checked";
    }
    $botslist = '<tr><td colspan="3">No record found!</td></tr>';
    $bots = getBotList();
    if(!empty($bots)) {
    $botslist = '';
    foreach ($bots as $botinfo) {
      if(!empty($botinfo)){
            $botslist .= '<tr class="botlist" id="bot_'.$botinfo['id'].'"><td class="cometchat_bot_'.$botinfo['id'].'"><img style="border-radius:25px;" src="'.$botinfo['a'].'" width="30" height="30"></td><td id="'.$botinfo['id'].'_title">'.stripslashes($botinfo["n"]).'</td><td> <a style="color:black;" data-toggle="tooltip" title="Rebuild" href="?module=bots&action=rebuildBots&botid='.$botinfo['id'].'&ts='.$ts.'"><i class="fa fa-lg fa-refresh"></i></a></td><td><a data-toggle="tooltip" title="Delete" style="color:red;" href="?module=bots&action=removeBot&botid='.$botinfo['id'].'&ts='.$ts.'"><i class="fa fa-lg fa-minus-circle"></i></a></td></tr>';
        }
    }
  }

$body = <<<EOD
<div class="row">
    <div class="col-sm-4 col-lg-4">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
              <div class="card-header">
                Bot Settings
              </div>
              <div class="card-block">
                <form action="?module=bots&action=updatBotsetting&ts={$ts}" method="post" onSubmit="">
                    <div class="form-group row">
                        <div class="col-md-12">
                        <label class="form-control-label">Enable Bot?</label>
                            <div class=""><label class=""><div style="position:relative;"><input style="position: absolute;" type="radio" name="usebots" value="1" $disableBoty ></div><span style="padding-left:25px;">Yes</span></label><label class=""><div style="position:relative;"><input style="position: absolute;left:8px;" type="radio" name="usebots" value="0" $disableBotn></div><span style="padding-left:30px;">No</span></label></div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" value="Update" class="btn btn-primary">
                    </div>
                </form>
              </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-12">
            <div class="card">
              <div class="card-header">
                Add New Bot
              </div>
              <div class="card-block">
                <form action="?module=bots&action=addBot&ts={$ts}" method="post" onSubmit="">
                    <div class="form-group row">
                    <div class="col-md-12">
                       <label class="form-control-label">
                        Enter the API Key:
                      </label>
                      <input type="text" required="true" id="apikey" name="apikey" class="form-control">
                    </div>
                    </div>
                  <div class="form-actions">
                    <input type="submit" value="Add Bot" class="btn btn-primary">
                  </div>
                </form>
              </div>
            </div>
        </div>
    </div>
    </div>
    <div class="col-sm-8 col-lg-8">
  <div class="row">
  <div class="col-sm-12 col-lg-12">
    <div class="card">
      <div class="card-header">
        Bots
      </div>
      <div class="card-block">
        <div class="note note-success">
            Please visit <a href = "https://app.bots.co/" style="text-decoration:none">app.bots.co</a> and create a new bot for CometChat.<br>
            After creating the bot, you can use the api key to add the same bot in CometChat.
        </div>
        <table class="table">
          <thead>
            <tr>
              <th width="10%">Icon</th>
              <th width="80%">Name</th>
              <th width="5%">&nbsp;</th>
              <th width="5%">&nbsp;</th>
            </tr>
          </thead>
            {$botslist}
        </table>
    </div>
    </div>
  </div>
    </div>
</div>


</div>
EOD;

    template();
}

function saveimage($url,$target) {
  if(!empty($url) && !empty($target)) {
    $file = file_get_contents($url);
    if(file_put_contents($target, $file)) {
      return true;
    }else {
      return false;
    }
  }
}

function updatBotsetting () {
    global $ts;
    configeditor($_POST);
    $_SESSION['cometchat']['error'] = 'Settings updated successfully';
    header("Location:?module=bots&ts=".$ts);
}

function addBot()
{
  global $ts,$client;
  if(empty($_REQUEST['apikey'])) {
    $_SESSION['cometchat']['error'] = 'Please enter API Key';
    $_SESSION['cometchat']['type'] = 'alert';
    header("Location:?module=bots&ts=".$ts);
    exit;
  }
  $url = 'http://app.bots.co/api-cometchat/bot-info?apiKey='.$_REQUEST['apikey'];
  $postdata = array();
  $bot = cc_curl_call($url,$postdata);
  $bot = json_decode($bot,true);

  if(!empty($bot)) {
    $sql = "select id from `cometchat_bots` where `apikey` = '".mysqli_real_escape_string($GLOBALS["dbh"],$_REQUEST['apikey'])."'";
    $query = mysqli_query($GLOBALS["dbh"],$sql);
    if($query && mysqli_num_rows($query) == 0) {
      $filename = dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."writable".DIRECTORY_SEPARATOR."bots".DIRECTORY_SEPARATOR.$bot['name'].".jpg";

      if(empty($client) && saveimage($bot['avatar'],$filename)) {
        $avatar = BASE_URL."writable".DIRECTORY_SEPARATOR."bots".DIRECTORY_SEPARATOR.$bot['name'].".jpg";
      }else {
        $avatar = $bot['avatar'];
      }

      $sql = "insert into `cometchat_bots`(`name`, `description`, `avatar`, `apikey`) values('".mysqli_real_escape_string($GLOBALS["dbh"],$bot['name'])."','".mysqli_real_escape_string($GLOBALS["dbh"],$bot['description'])."','".mysqli_real_escape_string($GLOBALS["dbh"],$avatar)."','".mysqli_real_escape_string($GLOBALS["dbh"],$_REQUEST['apikey'])."')";
      mysqli_query($GLOBALS["dbh"],$sql);
      removeCachedSettings($client.'cometchat_bots');
    }
  }
  $_SESSION['cometchat']['error'] = 'Bot added successfully!';
  header("Location:?module=bots&ts=".$ts);
  exit;
}

function removeBot()
{
  global $ts, $client;
  if(!empty($_REQUEST['botid'])) {
      $sql = "delete from `cometchat_bots` where `id` = '".mysqli_real_escape_string($GLOBALS["dbh"],$_REQUEST['botid'])."'";
      mysqli_query($GLOBALS["dbh"],$sql);
      removeCachedSettings($client.'cometchat_bots');
      $_SESSION['cometchat']['error'] = 'Bot removed successfully!';
      header("Location:?module=bots&ts=".$ts);
      exit();
  } else {
      $_SESSION['cometchat']['error'] = 'Failed to remove bot';
      $_SESSION['cometchat']['type'] = 'alert';
      header("Location:?module=bots&ts=".$ts);
      exit();
  }
}

function rebuildBots()
{
    global $ts,$client;
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
            $filename = dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."writable".DIRECTORY_SEPARATOR."bots".DIRECTORY_SEPARATOR.$bot['name'].".jpg";

            if(empty($client) && saveimage($bot['avatar'],$filename)) {
              $avatar = BASE_URL."writable".DIRECTORY_SEPARATOR."bots".DIRECTORY_SEPARATOR.$bot['name'].".jpg";
            }else {
              $avatar = $bots['avatar'];
            }
            $sql = "update `cometchat_bots` set `name`='".mysqli_real_escape_string($GLOBALS["dbh"],$bots['name'])."', `description`='".mysqli_real_escape_string($GLOBALS["dbh"],$bots['description'])."',`avatar`='".mysqli_real_escape_string($GLOBALS["dbh"],$avatar)."' where id='".mysqli_real_escape_string($GLOBALS["dbh"],$_REQUEST['botid'])."'";
            mysqli_query($GLOBALS["dbh"],$sql);
            removeCachedSettings($client.'cometchat_bots');
          }
        }
      }
      $_SESSION['cometchat']['error'] = 'Successfully Rebuild!';
      header("Location:?module=bots&ts=".$ts);
      exit();
    } else{
      $_SESSION['cometchat']['error'] = 'Invalid bot ID';
      $_SESSION['cometchat']['type'] = 'alert';
      header("Location:?module=bots&ts=".$ts);
      exit();
    }
}
