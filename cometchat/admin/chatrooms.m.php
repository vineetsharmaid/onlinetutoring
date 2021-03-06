<?php

/*

CometChat
Copyright (c) 2016 Inscripts
License: https://www.cometchat.com/legal/license

*/

if (!defined('CCADMIN')) {echo 'NO DICE';exit;}

include_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'modules'.DIRECTORY_SEPARATOR.'chatrooms'.DIRECTORY_SEPARATOR.'config.php';

function index()
{
	global $body, $chatroomTimeout, $moderatorUserIDs;
	$BASE_URL = BASE_URL;
	$alert = 'Please enter valid IDs seperated by a comma. For Example: 5,234,1075 \n*Note: It should not end with a comma. It must be integer value.';
	$moderatorids = '';

	foreach ($moderatorUserIDs as $b) {
		$moderatorids .= $b.',';
	}
	$moderatorids = substr($moderatorids, 0, -1);

	$ts = time();

	$sql = ('select * from cometchat_chatrooms order by name asc');
	$query = mysqli_query($GLOBALS['dbh'], $sql);
	if (defined('DEV_MODE') && DEV_MODE == '1') {
		echo mysqli_error($GLOBALS['dbh']);
	}

	$chatroomlist = '';

	while ($chatroom = mysqli_fetch_assoc($query)) {
		$type = $status = $typeuser = '';
		$extra = "<td></td><td></td>";
		$time = $chatroom['lastactivity'];

		switch ($chatroom['type']) {
			case '0':
				$type = 'Public';
				break;
			case '1':
				$type = 'Password protected';
				break;
			case '2':
				$type = 'Invitation only';
				break;
			case '3':
				$type = 'Private';
				break;
			default:
				$type = '';
				break;
		}
		if ($chatroom['createdby'] != 0) {
			$typeuser = 'user created';
		}

		if (getTimeStamp() - $chatroom['lastactivity'] > $chatroomTimeout * 100) {
			$status = '<span style="float:right;" class="tag tag-pill tag-warning">Idle</span>';
		} elseif (getTimeStamp() - $chatroom['lastactivity'] > $chatroomTimeout && getTimeStamp() - $chatroom['lastactivity'] < $chatroomTimeout * 100) {
			$status = '<span style="float:right;" class="tag tag-pill tag-danger">Inactive</span>';
		}

		if ($type == 'Public' || $type == 'Private' ) {
			$extra = '<td><a data-toggle="tooltip" title="Embed code for group" onclick="javascript:embed_link(\''.BASE_URL.'modules/chatrooms/index.php?id='.$chatroom['id'].'\',\'500\',\'300\');" href="#" style="color:black;"><i class="fa fa-lg fa-code"></i></a></td>';
		}
		$chatroomlist .= '<tr><td class="capitalize">'.$chatroom['name'].$status.'</td><td>'.$chatroom['id'].'</td><td class="capitalize">'.$type.'</td><td>'.datify($time)[0].'<td><a class="red" data-toggle="tooltip" title="Delete Group" href="?module=chatrooms&amp;action=deletechatroom&amp;data='.$chatroom['id'].'&ts='.$ts.'"><i class="fa fa-lg fa-minus-circle"></i></a></td>'.$extra.'</tr>';
	}
	$errormessage = '';
	if (!$chatroomlist) {
		$errormessage = '<tr><td colspan="4">There are no groups at the moment!</td></tr>';
	}

$body .= <<<EOD
<div class="row">
  <div class="col-sm-9 col-lg-9">
    <div class="card">
      <div class="card-header">
        Groups
      </div>
      <div class="card-block">
		<table class="table" style="overflow: auto;">
		  <thead>
		    <tr>
		      <th width="30%">Name</th>
		      <th width="10%">ID</th>
		      <th width="25%">Type</th>
		      <th width="25%">Created On</th>
		      <th >&nbsp;</th>
		      <th>&nbsp;</th>
		    </tr>
		  </thead>
		  <tbody>
		    {$errormessage} {$chatroomlist}
		  </tbody>
		</table>
    </div>
    </div>
  </div>
	<div class="col-sm-3 col-lg-3">
		<div class="row">
	  	 <div class="col-sm-12 col-lg-12">
		    <div class="card">
		      <div class="card-header">
		        Add New Group
		      </div>
		      <div class="card-block">
		        <form action="?module=chatrooms&action=newchatroomprocess&ts={$ts}" method="post" enctype="multipart/form-data">
		          <div class="form-group row">
		            <div class="col-md-12">
		              <label class="">Name</label>
		              <input class="form-control" type="text" required="true"id="chatroom" name="chatroom" placeholder="Enter your group name">
		            </div>
		          </div>
		          <div class="form-group row">
		            <div class="col-md-12">
		              <label for="ccyear">Type</label>
		              <select class="form-control" id="chatroomtype" name="type">
	                	<option value="0">Public Group</option>
	                 	<option value="1">Password Protected Group</option>
	                    <option value="3">Private Group</option>
		              </select>
		            </div>
		          </div>
		          <div class="form-group row" id="password_field" style="display:none">
		            <div class="col-md-12">
		              <label>Password</label>
		              <input class="form-control" type="text" id="ppassword" name="ppassword" placeholder="Enter the group password">
		            </div>
		          </div>
		          <div class="form-actions">
		            <input type="submit" value="Add Group" class="btn btn-primary">
		          </div>
		        </form>
		      </div>
		    </div>
		  </div>
	  	 <div class="col-sm-12 col-lg-12">
		    <div class="card">
		      <div class="card-header">Manage Moderators
		      <h4><small>Moderators can kick/ban users from any group. Please enter their user IDs.</small></h4>
		      </div>
		      <div class="card-block">
		        <form action="?module=chatrooms&action=moderatorprocess&ts={$ts}" method="post" onsubmit="return validateID()" name="modForm">

		          <div class="form-group row">
		            <div class="col-md-12">
		              <label for="company">Moderators</label>
		              <input type="text" class="form-control" name="moderatorUserIDs" value="$moderatorids" placeholder="Enter Moderator IDs (comma separated)">
		            </div>
		          </div>
		          <div class="form-actions">
		            <input type="submit" value="Update Moderators" class="btn btn-primary">
		          </div>
		        </form>
		      </div>
		       <div class="card-footer">
		        <a data-toggle="modal" id="searchuser" href="javascript:void();" data-target="#myModal">Don't know Moderator's ID?</a>
			   </div>
		       <div class="card-footer">
		        <a href="javascript:void();" onclick="javascript:modules_configmodule('chatrooms');">Group Settings</a>
			   </div>
		       <div class="card-footer">
		        <a onclick="javascript:embed_link('{$BASE_URL}modules/chatrooms/index.php','600','300');"  href="javascript:void(0)">Group Embed Code</a>
			   </div>
		    </div>
		  </div>
	</div>
	</div>
</div>
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Find User ID</h4>
        </div>
        <div class="modal-body col-sm-12">

        </div>
        <div class="modal-footer">
        </div>
      </div>

    </div>
  </div>
<!-- Modal -->
<script type="text/javascript">
    $("#chatroomtype").change(function() {
        var selected = $("#chatroomtype :selected").val();
        if(selected=="1") {
            $('#password_field').show();
            $('#ppassword').attr('required',true);
        } else {
            $('#password_field').hide();
            $('#ppassword').attr('required',false);
        }
    });
	function validateID(){
		var moderatorid = document.forms["modForm"]["moderatorUserIDs"].value;
		var valid = /^(\d+(,\d+)*)$/.test(moderatorid.trim());
		if(moderatorid == ''){
			valid = true;
		}
		if(!valid){
			alert("{$alert}");
			return false;
		}
		return true;
	}

	function ccAutoComplete(inputbox){
		var ajax;
		var moderator = '';
		var userslist = '';
		$('#suggestions').html('');
		if(inputbox.value.trim().length > 2){
			if(ajax && ajax.readystate != 4){
	            ajax.abort();
	        }
	        ajax = $.ajax({
				type: "POST",
				url: "?module=chatrooms&action=ccautocomplete&ts={$ts}",
				data: {suggest: inputbox.value},
				success: function(data) {
					var h = 0;
					data.forEach(function(entry) {
						h = h + 35;
						moderator = '<a style="font-size:16px;font-weight:bold;float:right;color:green;" data-toggle="tooltip" title="Make Moderator" href="?module=chatrooms&amp;action=makemoderatorprocess&amp;susername='+entry.username+'&amp;moderatorid='+entry.id+'&amp;ts={$ts}&amp;autosuggest=1"><i class="fa fa-lg fa-plus"></i></a>';
		                if(entry.isModerator == '1') {
		                moderator = '<a style="font-size:16px;font-weight:bold;float:right;color:red;" data-toggle="tooltip" title="Remove Moderator" href="?module=chatrooms&amp;action=removemoderatorprocess&amp;susername='+entry.username+'&amp;moderatorid='+entry.id+'&amp;ts={$ts}&amp;autosuggest=1"><i class="fa fa-lg fa-close"></i></a>';
		                }
		                userslist += '<li class="suggestion_list"><span style="font-size:13px;float:left;margin-top:2px;margin-left:5px;">'+entry.username+' - '+entry.id+'</span>'+moderator+'<div style="clear:both"></div></li>';
					});
					if(h > 400){h = 400;}else {	h = h + 20;	}
					$('#suggestions').append(userslist).css("height",h+"px");
					$('[data-toggle="tooltip"]').tooltip();
	            },
				dataType: 'json'
			});
		}
	}
	$(function(){
		$(this).click(function(){
			$('#suggestions').html('').css("height","0px");;
		});
		$("#searchuser").click(function(){
			var form = '<div class="modal-body col-sm-12"><div class="row"><div class="form-group row"><div class="col-md-12"><label for="company">Username</label><input onkeyup="ccAutoComplete(this)" type="text" class="form-control" id="susername" name="susername" required="true" autocomplete="off" placeholder="Enter Username"><div id="suggestions"></div></div></div><div class="form-actions"><button  type="button" id="search" class="btn btn-primary">Search</button></div></div></div>';
			$('.modal-body').html(form);
			$("#search").off('click').click(function(){
				var user = $("#susername").val();
				if(user == ''){
					alert("Please enter the username");
					return false;
				}else{
			       	$.ajax({
						type: "POST",
						url: "?module=chatrooms&action=searchlogs&ts={$ts}",
						data: {susername: user},
						success: function(data) {
							$('.modal-body').html(data);
			            }
					});
				}

			});
		});
	});
</script>
EOD;
	template();
}

function deletechatroom()
{
	global $ts;
	if (!empty($_GET['data'])) {
		$controlparameters = array('type' => 'modules', 'name' => 'chatroom', 'method' => 'deletedchatroom', 'params' => array('id' => $_GET['data']));
		$controlparameters = json_encode($controlparameters);
		sendChatroomMessage($_GET['data'], 'CC^CONTROL_'.$controlparameters, 0);

		$sql = ("delete from cometchat_chatrooms where id = '".mysqli_real_escape_string($GLOBALS['dbh'], sanitize_core($_GET['data']))."'");
		$query = mysqli_query($GLOBALS['dbh'], $sql);
	}
	$_SESSION['cometchat']['error'] = 'Groups deleted successfully!';
	header("Location:?module=chatrooms&ts={$ts}");
}

function newchatroomprocess()
{
	global $ts;
	$chatroom = mysqli_real_escape_string($GLOBALS['dbh'], $_POST['chatroom']);
	$type = mysqli_real_escape_string($GLOBALS['dbh'], $_POST['type']);
	$password = mysqli_real_escape_string($GLOBALS['dbh'], $_POST['ppassword']);

	if (!empty($password) && ($type == 1 || $type == 2)) {
		$passwordhash = sha1($password);
	} else {
		$passwordhash = '';
	}
	$chatroom = trim($chatroom);
	if (!empty($chatroom) && (strlen(trim($password)) !== 0 || empty($passwordhash))) {
		$sql = ("insert into cometchat_chatrooms (name,createdby,lastactivity,password,type) values ('".mysqli_real_escape_string($GLOBALS['dbh'], sanitize_core($chatroom))."', '0','".mysqli_real_escape_string($GLOBALS['dbh'], getTimeStamp())."','".mysqli_real_escape_string($GLOBALS['dbh'], $passwordhash)."','".mysqli_real_escape_string($GLOBALS['dbh'], $type)."')");
		$query = mysqli_query($GLOBALS['dbh'], $sql);
		$_SESSION['cometchat']['error'] = 'Group created successfully.';
		header("Location: ?module=chatrooms&ts={$ts}");
	} elseif (empty($chatroom)) {
		$_SESSION['cometchat']['error'] = 'Group name cannot be blank.';
		$_SESSION['cometchat']['type'] = 'error';
		header("Location: ?module=chatrooms&action=newchatroom&ts={$ts}");
	} else {
		$_SESSION['cometchat']['error'] = 'Password cannot start with space.';
		$_SESSION['cometchat']['type'] = 'error';
		header("Location: ?module=chatrooms&action=newchatroom&ts={$ts}");
	}
}

function moderatorprocess()
{
	global $ts;
	$_SESSION['cometchat']['error'] = 'Moderator list successfully modified.';
	if (!empty($_POST['moderatorUserIDs'])) {
		$moderators = explode(',', $_POST['moderatorUserIDs']);
	} else {
		$moderators = array();
	}
	configeditor(array('moderatorUserIDs' => $moderators));
	removeCache('chatroom_list');
	header("Location:?module=chatrooms&action=chatrooms&ts={$ts}");
}

function ccautocomplete()
{
	global $ts, $usertable_userid, $usertable_username, $usertable, $navigation, $body, $moderatorUserIDs;
	$suggestions = array();

	if (!empty($_REQUEST['suggest'])) {
		$username = $_REQUEST['suggest'];

		$sql = ("select $usertable_userid id, $usertable_username username from $usertable where $usertable_username LIKE '%".mysqli_real_escape_string($GLOBALS['dbh'], sanitize_core($username))."%' limit 10");
		$query = mysqli_query($GLOBALS['dbh'], $sql);

		while ($user = mysqli_fetch_assoc($query)) {
			if (in_array($user['id'], $moderatorUserIDs)) {
				$user['isModerator'] = '1';
			} else {
				$user['isModerator'] = '0';
			}
			array_push($suggestions, $user);
		}
	}
	echo json_encode($suggestions);
}

function searchlogs()
{
	global $ts, $usertable_userid, $usertable_username, $usertable, $body, $moderatorUserIDs;
	$username = $_REQUEST['susername'];
	$userslist = '<div style="height:500px;overflow:auto;overflow-x:hidden;"><table class="table"><thead><tr><th width="40%">Name</th><th>ID</th><th>&nbsp;</th></tr></thead><tbody>';

	if (empty($username)) {
		$username = 'Q293YXJkaWNlIGFza3MgdGhlIHF1ZXN0aW9uIC0gaXMgaXQgc2FmZT8NCkV4cGVkaWVuY3kgYXNrcyB0aGUgcXVlc3Rpb24gLSBpcyBpdCBwb2xpdGljPw0KVmFuaXR5IGFza3MgdGhlIHF1ZXN0aW9uIC0gaXMgaXQgcG9wdWxhcj8NCkJ1dCBjb25zY2llbmNlIGFza3MgdGhlIHF1ZXN0aW9uIC0gaXMgaXQgcmlnaHQ/DQpBbmQgdGhlcmUgY29tZXMgYSB0aW1lIHdoZW4gb25lIG11c3QgdGFrZSBhIHBvc2l0aW9uDQp0aGF0IGlzIG5laXRoZXIgc2FmZSwgbm9yIHBvbGl0aWMsIG5vciBwb3B1bGFyOw0KYnV0IG9uZSBtdXN0IHRha2UgaXQgYmVjYXVzZSBpdCBpcyByaWdodC4=';
	}
	$sql = ("select $usertable_userid id, $usertable_username username from $usertable where $usertable_username LIKE '%".mysqli_real_escape_string($GLOBALS['dbh'], sanitize_core($username))."%'");
	$query = mysqli_query($GLOBALS['dbh'], $sql);

	while ($user = mysqli_fetch_assoc($query)) {
		if (function_exists('processName')) {
			$user['username'] = processName($user['username']);
		}
		$moderator = '<a style="font-size:16px;font-weight:bold;float:right;color:green;" data-toggle="tooltip" title="Make Moderator" href="?module=chatrooms&amp;action=makemoderatorprocess&amp;susername='.$username.'&amp;moderatorid='.$user['id'].'&amp;ts={$ts}&amp;autosuggest=1"><i class="fa fa-plus"></i></a>';
		if (in_array($user['id'], $moderatorUserIDs)) {
			$moderator = '<a style="font-size:16px;font-weight:bold;float:right;color:red;" data-toggle="tooltip" title="Remove Moderator" href="?module=chatrooms&amp;action=removemoderatorprocess&amp;susername='.$username.'&amp;moderatorid='.$user['id'].'&amp;ts={$ts}&amp;autosuggest=1"><i class="fa fa-close"></i></a>';
		}
		$userslist .= '<tr><td class="capitalize">'.$user['username'].'</td><td>'.$user['id'].'</td><td>'.$moderator.'</td></tr>';
	}
	$userslist .= '</tbody></table></div>';

echo $body = <<<EOD
	$userslist
EOD;

}

function makemoderatorprocess()
{
	global $ts;
	global $moderatorUserIDs;
	$_SESSION['cometchat']['error'] = 'Moderator list successfully modified.';

	if (isset($_GET['moderatorid'])) {
		array_push($moderatorUserIDs, $_GET['moderatorid']);
	}
	configeditor(array('moderatorUserIDs' => $moderatorUserIDs));
	if (isset($_GET['autosuggest'])) {
		header("Location:?module=chatrooms&ts={$ts}");
		exit;
	}
	header("Location:?module=chatrooms&ts={$ts}");
}

function removemoderatorprocess()
{
	global $ts;
	global $moderatorUserIDs;

	$_SESSION['cometchat']['error'] = 'Moderator list successfully modified.';
	if (($key = array_search($_GET['moderatorid'], $moderatorUserIDs)) !== false) {
		unset($moderatorUserIDs[$key]);
	}
	configeditor(array('moderatorUserIDs' => $moderatorUserIDs));
	if (isset($_GET['autosuggest'])) {
		header("Location:?module=chatrooms&ts={$ts}");
		exit;
	}
	header("Location:?module=chatrooms&ts={$ts}");
}
