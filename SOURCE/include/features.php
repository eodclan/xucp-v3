<?php
// ************************************************************************************//
// * xUCP Free
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 3.0.2
// *
// * Copyright (c) 2022 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//
require_once(dirname(__FILE__) . "/config/config_mysql.php");
require_once(dirname(__FILE__) . "/config/config_settings.php");
require_once(dirname(__FILE__) . "/config/config_class.php");
// ************************************************************************************//
// Themes System
// ************************************************************************************//
include(dirname(__FILE__) . "/../themes/default/templates/xucp_header.php");
include(dirname(__FILE__) . "/../themes/default/templates/xucp_leftnavi.php");
include(dirname(__FILE__) . "/../themes/default/templates/xucp_content.php");
include(dirname(__FILE__) . "/../themes/default/templates/xucp_footer.php");
include(dirname(__FILE__) . "/../themes/default/templates/xucp_secure.php");
// ************************************************************************************//
// Functions files from this xucp
// ************************************************************************************//
require_once(dirname(__FILE__) . "/xucp_session.php");
require_once(dirname(__FILE__) . "/xucp_lang.php");
require_once(dirname(__FILE__) . "/xucp_avatar.php");
require_once(dirname(__FILE__) . "/xucp_hash.php");
require_once(dirname(__FILE__) . "/xucp_urls.php");
// ************************************************************************************//
// Logout System
// ************************************************************************************//
if(isset($_POST['logout'])){
  site_header_nologged(LOGOUT);
  setCookie("PHPSESSID", "", 0x7fffffff,  "/");
  session_destroy();
  session_write_close();
  site_navi_nologged();
  site_content_nologged();
  echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".LOGOUT."</h4>
                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/index.php'>".$_SESSION['xucp_uname']['site_settings_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".LOGOUT."</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>

                    <div class='row'>
                        <div class='col-xl-12'>
                            <div class='card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>".LOGOUT."</h4>
                                    <p class='card-title-desc'>".WELCOMETO." ".LOGOUT."</p>
                                </div>
                                <div class='card-body'>
									".MSG_17."
                                </div>
                            </div>
                        </div>
                    </div>";					
  site_footer(); 
  exit();  
}
// ************************************************************************************//
// BB-Code-Editor System
// ************************************************************************************//
function textbbcode($text, $content = ""): void
{
    $button = "/themes/default/assets/editor/";

    print("\n<div style=\"text-align: left; width: 650px;\">\n" .
          "  <script type=\"text/javascript\" src=\"/themes/default/assets/js/editor.js\"></script>\n" .
          "  <script type=\"text/javascript\">edToolbar('" . $text . "','" . $button . "','true');</script>\n" .
          "  <textarea name=\"" . $text . "\" id=\"" . $text . "\" class=\"form-control\" rows=\"16\" cols=\"80\">" . $content . "</textarea>\n" .
          "</div>\n" .
          "<br style=\"clear: left;\" />");
}
// ************************************************************************************//
// Format Comment System for BB-Code-Editor System
// ************************************************************************************//
function format_comment($text, $strip_html = true): array|string
{
    $s = stripslashes($text); 

    if ($strip_html)
        $s = htmlspecialchars($s); 
     // [center]Centered text[/center]
    $s = preg_replace("/\[center\]((\s|.)+?)\[\/center\]/i", "<center>\\1</center>", $s); 
    // [list]List[/list]
    $s = preg_replace("/\[list\]((\s|.)+?)\[\/list\]/", "<ul>\\1</ul>", $s); 
    // [list=disc|circle|square]List[/list]
    $s = preg_replace("/\[list=(disc|circle|square)\]((\s|.)+?)\[\/list\]/", "<ul type=\"\\1\">\\2</ul>", $s); 
    // [list=1|a|A|i|I]List[/list]
    $s = preg_replace("/\[list=(1|a|A|i|I)\]((\s|.)+?)\[\/list\]/", "<ol type=\"\\1\">\\2</ol>", $s); 
    // [*]
    $s = preg_replace("/\[\*\]/", "<li>", $s); 
    // [b]Bold[/b]
    $s = preg_replace("/\[b\]((\s|.)+?)\[\/b\]/", "<b>\\1</b>", $s); 
    // [i]Italic[/i]
    $s = preg_replace("/\[i\]((\s|.)+?)\[\/i\]/", "<i>\\1</i>", $s); 
    // [u]Underline[/u]
    $s = preg_replace("/\[u\]((\s|.)+?)\[\/u\]/", "<u>\\1</u>", $s); 
    // [u]Underline[/u]
    $s = preg_replace("/\[u\]((\s|.)+?)\[\/u\]/i", "<u>\\1</u>", $s); 
    // [color=blue]Text[/color]
    $s = preg_replace("/\[color=([a-zA-Z]+)\]((\s|.)+?)\[\/color\]/i",
        "<font color=\\1>\\2</font>", $s);
    // [img]http://www/image.gif[/img]
    $s = preg_replace("/\[img\]([^\s'\"<>]+?)\[\/img\]/i", "<img src=\"\\1\" alt=\"\" border=\"0\">", $s); 
    // [img=http://www/image.gif]
    $s = preg_replace("/\[img=([^\s'\"<>]+?)\]/i", "<img src=\"\\1\" alt=\"\" border=\"0\">", $s); 
    // [color=#ffcc99]Text[/color]
    $s = preg_replace("/\[color=(#[a-f0-9][a-f0-9][a-f0-9][a-f0-9][a-f0-9][a-f0-9])\]((\s|.)+?)\[\/color\]/i",
        "<font color=\\1>\\2</font>", $s); 
    // [url=http://www.example.com]Text[/url]
    $s = preg_replace("/\[url=([^()<>\s]+?)\]((\s|.)+?)\[\/url\]/i",
        "<a href=\"\\1\">\\2</a>", $s); 
    // [url]http://www.example.com[/url]
    $s = preg_replace("/\[url\]([^()<>\s]+?)\[\/url\]/i",
        "<a href=\"\\1\">\\1</a>", $s); 
    // [size=4]Text[/size]
    $s = preg_replace("/\[size=([1-7])\]((\s|.)+?)\[\/size\]/i",
        "<font size=\\1>\\2</font>", $s); 
    // [font=Arial]Text[/font]
    $s = preg_replace("/\[font=([a-zA-Z ,]+)\]((\s|.)+?)\[\/font\]/i",
        "<font face=\"\\1\">\\2</font>", $s);

	$s = preg_replace("/\[center\]((\s|.)+?)\[\/center\]/i", "<center>\\1</center>", $s);

	$s = preg_replace("/\[scroll=([a-zA-Z ,]+)\]((\s|.)+?)\[\/scroll\]/i",
        "<marquee class='tableb' direction=\"\\1\" scrollamount=3 scrolldelay=2 onmouseover='this.stop()'' onmouseout='this.start()'>\\2</marquee>", $s);
	// [quote]Text[/quote]
	$s = preg_replace("/\[quote\](.+?)\[\/quote\]/is",
		"<div class=\"col-lg-4\"><div class=\"card\"><div class=\"card-header\">".BBCODE_EDITOR."</div><div class=\"card-body\"><div class=\"container py-5 h-100\"><blockquote class=\"card-blockquote mb-0\">\\1</blockquote></div></div></div></div>", $s);
	// [quote=Author]Text[/quote]
	$s = preg_replace("/\[quote=(.+?)\](.+?)\[\/quote\]/is",
		"<div class=\"col-lg-4\"><div class=\"card\"><div class=\"card-header\">\\".BBCODE_EDITOR_INFO."</div><div class=\"card-body\"><div class=\"container py-5 h-100\"><blockquote class=\"card-blockquote mb-0\">\\2</blockquote></div></div></div></div>", $s);
    // Linebreaks
    $s = nl2br($s); 
    // [pre]Preformatted[/pre]
    $s = preg_replace("/\[pre\]((\s|.)+?)\[\/pre\]/i", "<tt><nobr>\\1</nobr></tt>", $s); 
    // Maintain spacing
    $s = str_replace("  ", " &nbsp;", $s);

    return $s;
}
