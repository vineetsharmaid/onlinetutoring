<?php

if (!defined('CCADMIN')) { echo "NO DICE"; exit; }

$options = array(
    "chatboxWidth"  => array('textbox','Set the Width of the Chat (Minimum Width can be 350px)'),
    "chatboxHeight" => array('textbox','Set the Height of the Chat (Minimum Height can be 420px)'),
);

if (empty($_GET['process']) && empty($_GET['updatesettings'])) {
    include_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'config.php');
    $base_url = BASE_URL;
    $form = '';
if(empty($generateembedcodesettings)) {
        $curl = 0;
        $errorMsg = '';

        $chatroom = '';
        $private = '';
        $none = '';

        if ($enableType == '0') {
            $none = "selected";
        } else if ($enableType == '1') {
            $chatroom = "selected";
        } else if ($enableType == '2') {
            $private = "selected";
        }

echo <<<EOD
    <!DOCTYPE html>
    <html>
    <head>
    <script src="../js.php?type=core&name=jquery"></script>
    <script>
        $ = jQuery = jqcc;
        function resizeWindow() {
            window.resizeTo(($("form").outerWidth(false)+window.outerWidth-$("form").outerWidth(false)), ($('form').outerHeight(false)+window.outerHeight-window.innerHeight));
        }
    </script>
    </head>
    <body>
        <form name="themesettings" style="height:100%;" action="?module=dashboard&action=loadthemetype&type=layout&name=synergy&updatesettings=true" method="post">
        <div id="content" style="width:auto;">
                <h2>Settings</h2><br />
                <h3 id='data'>You can enable/disable Private chat or Chatroom.</h3>
                <div style="margin-bottom:10px;">
                        <div class="title">Enable :</div>
                        <div class="element" id="">
                            <select name="enableType" id="TypeSelector">
                                <option value="0" $none>Both</option>
                                <option value="1" $chatroom>Only Chatroom</option>
                                <option value="2" $private>Only One-on-one Chat</option>
                            </select>
                        </div>
                        <div style="clear:both;padding:10px;"></div>

                    <div style="clear:both;padding:5px;"></div>
                </div>
                <input type="submit" value="Update Settings" class="button">&nbsp;&nbsp;or <a href="javascript:window.close();">cancel or close</a>
        </div>
        </form>
        <script type="text/javascript" language="javascript">
            $(function() {
                setTimeout(function(){
                    resizeWindow();
                },200);
            });
        </script>
    </body>
    </html>
EOD;
    } else {
        foreach ($options as $option => $result) {
            $req = '';
            if($option == 'chatboxHeight' OR $option == 'chatboxWidth') {
                $req = 'required';
            }
                $form .= '<div class="form-group row"><div class="col-md-6"><label>'.$result[1].'</label>
                          </div><div class="col-md-6">';
            if ($result[0] == 'textbox') {
                $form .=  '<input type="text" class="form-control" id="'.$option.'" name="'.$option.'" value="'.${$option}.'" '.$req.'>';
            }
            $form .= '</div></div>';
        }
echo <<<EOD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="images/favicon.ico">
    <title>Generate Embed Code</title>
    <link href="{$base_url}/css.php?admin=1" rel="stylesheet">
    <script src="{$base_url}/js.php?admin=1"></script>
</head>
 <body class="navbar-fixed sidebar-nav fixed-nav" style="background-color: white;overflow-y:hidden;">
    <div class="col-sm-6 col-lg-6">
        <div class="card">
        <div class="card-block">
             <form action="?module=dashboard&action=loadthemetype&type=layout&name=embedded&process=true" onsubmit="return validate();" method="post">
            {$form}
            <div class="row col-md-4" style="">
                <input type="submit" value="Generate Code" class="btn btn-primary">
            </div>
            </form>
        </div>
        </div>
    </div>
    <script>
        function validate(){
            var cbHeight = parseInt($("#chatboxHeight").val());
            $("#chatboxHeight").val(cbHeight)
            var cbWidth = parseInt($("#chatboxWidth").val());
            $("#chatboxWidth").val(cbWidth);
            if(cbHeight < 420) {
                alert('Height must be greater than 420');
                return false;
            } else if(cbWidth < 350){
                alert('Width must be greater than 350');
                return false;
            } else {
                return true;
            }
        }
    </script>
</body>
EOD;

            }
        } else if (!empty($_GET['updatesettings']) && $_GET['updatesettings'] == true) {
            if (isset($_POST['enableType'])) {
                configeditor(array('synergy_settings' => $_POST));
            }
            header("Location:?module=dashboard&action=loadthemetype&type=layout&name=synergy");
        } else {
        	include_once(dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR.'config.php');
             $base_url = BASE_URL;
            $embed_code = '&lt;div id="cometchat_embed_synergy_container" style="width:'.$_POST['chatboxWidth'].'px;height:'.$_POST['chatboxHeight'].'px;max-width:100%;border:1px solid #CCCCCC;border-radius:5px;overflow:hidden;" &gt;&lt;/div&gt;&lt;script src="'.BASE_URL.'js.php?type=core&name=embedcode" type="text/javascript"&gt;&lt;/script&gt;&lt;script&gt;var iframeObj = {};iframeObj.module="synergy";iframeObj.style="min-height:420px;min-width:350px;";iframeObj.width="'.$_POST['chatboxWidth'].'px";iframeObj.height="'.$_POST['chatboxHeight'].'px";iframeObj.src="'.BASE_URL.'cometchat_embedded.php"; if(typeof(addEmbedIframe)=="function"){addEmbedIframe(iframeObj);}&lt;/script&gt;';
            echo <<<EOD
                <!DOCTYPE html>
                <html>
                    <head>
                        <link href="{$base_url}/css.php?admin=1" rel="stylesheet">
                        <script type="text/javascript" src="../js.php?admin=1"></script>
                        <script type="text/javascript" language="javascript">
                            $(function() {
                                setTimeout(function(){
                                    resizeWindow();
                                },200);
                            });
                            function resizeWindow() {
                                window.resizeTo((520), (190+window.outerHeight-window.innerHeight));
                            }
                        </script>
                    </head>
                    <body style="background-color: white;overflow-y:hidden;">
                        <textarea readonly="" style="width:100%;height:250px">{$embed_code}</textarea>
                    </body>
                </html>
EOD;
       }
?>
