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
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {        
	header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
	setCookie("PHPSESSID", "", 0x7fffffff,  "/");
  	session_destroy();
	die( header( 'location: /404.php' ) );
}
/**
 * @param string $SITESUBTITLE
 * @return void
 */
function site_header(string $SITESUBTITLE = ""): void
{
  // starting secure urls
  secure_url();
  // starting header section
  echo "
<!doctype html>
<html lang='en'>
    <head>
		<!-- ####################################################### -->
		<!-- #   Powered by xUCP Free V3.0.2                       # -->
		<!-- #   Copyright (c) 2022 DerStr1k3r.                    # -->
		<!-- #   All rights reserved.                              # -->
		<!-- ####################################################### -->	
        <meta charset='utf-8' />
        <title>".$_SESSION['xucp_uname']['site_settings_site_name']." | ".$SITESUBTITLE."</title>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<meta name='generator' content='Powered by xUCP Free V3.0.2' />
        <link rel='shortcut icon' href='/themes/default/assets/images/favicon.ico'>
        <link href='/themes/default/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css' rel='stylesheet' type='text/css' />
        <link rel='stylesheet' href='/themes/default/assets/css/preloader.min.css' type='text/css' />
        <link href='/themes/default/assets/css/bootstrap.min.css' id='bootstrap-style' rel='stylesheet' type='text/css' />
        <link href='/themes/default/assets/css/icons.min.css' rel='stylesheet' type='text/css' />
        <link href='/themes/default/assets/css/app.min.css' id='app-style' rel='stylesheet' type='text/css' />
        <link href='/themes/default/assets/libs/alertifyjs/build/css/alertify.min.css' rel='stylesheet' type='text/css' />
        <link href='/themes/default/assets/libs/alertifyjs/build/css/themes/default.min.css' rel='stylesheet' type='text/css' />";
		header("X-XSS-Protection: 1; mode=block");
		header("X-Content-Type-Options: nosniff");
		header("Strict-Transport-Security: max-age=31536000");
		header("Referrer-Policy: origin-when-cross-origin");
		header("Expect-CT: max-age=7776000, enforce");
		header("Feature-Policy: vibrate 'self'; usermedia *; sync-xhr 'self'");
echo "
    </head>
    <body data-layout-mode='".$_SESSION['xucp_uname']['site_settings_themes']."' data-sidebar='".$_SESSION['xucp_uname']['site_settings_themes']."'>
        <!-- Begin page -->
        <div id='layout-wrapper'>
            <header id='page-topbar'>
                <div class='navbar-header'>
                    <div class='d-flex'>
                        <div class='navbar-brand-box'>
                            <a href='/usercp/dashboard/index.php' class='logo logo-dark'>
                                <span class='logo-sm'>
                                    <img src='/themes/default/assets/images/logo-bg.png' alt='' height='24'>
                                </span>
                                <span class='logo-lg'>
                                    <img src='/themes/default/assets/images/logo-bg.png' alt='' height='24'> <span class='logo-txt'>".$_SESSION['xucp_uname']['site_settings_site_name']."</span>
                                </span>
                            </a>
                            <a href='/usercp/dashboard/index.php' class='logo logo-light'>
                                <span class='logo-sm'>
                                    <img src='/themes/default/assets/images/logo-bg.png' alt='' height='24'>
                                </span>
                                <span class='logo-lg'>
                                    <img src='/themes/default/assets/images/logo-bg.png' alt='' height='24'> <span class='logo-txt'>".$_SESSION['xucp_uname']['site_settings_site_name']."</span>
                                </span>
                            </a>
                        </div>
                        <button type='button' class='btn btn-sm px-3 font-size-16 header-item' id='vertical-menu-btn'>
                            <i class='fa fa-fw fa-bars'></i>
                        </button>
                    </div>						
						
                    <div class='d-flex'>
                        <div class='dropdown d-none d-sm-inline-block'>
                            <button type='button' class='btn header-item' id='page-header-user-dropdown'
                            data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                <i class='mdi mdi-chevron-down d-none d-xl-inline-block'></i>
                            </button>
                            <div class='dropdown-menu dropdown-menu-end'>
								<a href='javascript:void(0);' class='dropdown-item notify-item language' id='logout' data-toggle='dropdown' role='button'>
									<form action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data'>							
										<button type='submit' name='logout' class='btn btn-sm px-3 font-size-16 header-item'>
											<i class='mdi mdi-logout font-size-16 align-middle me-1'></i>&nbsp;".SITE_LOGOUT."
										</button>							
									</form>						
								</a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>";
}

/**
 * @param string $SITESUBTITLE
 * @return void
 */
function site_header_nologged(string $SITESUBTITLE = ""): void
{
  // starting secure urls  
  secure_url();
  // starting header section  
  echo "
<!doctype html>
<html lang='en'>
    <head>
		<!-- ####################################################### -->
		<!-- #   Powered by xUCP Free V3.0.2                       # -->
		<!-- #   Copyright (c) 2022 DerStr1k3r.                    # -->
		<!-- #   All rights reserved.                              # -->
		<!-- ####################################################### -->	
        <meta charset='utf-8' />
        <title>".$_SESSION['xucp_uname']['site_settings_site_name']." | ".$SITESUBTITLE."</title>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<meta name='generator' content='Powered by xUCP Free V3.0.2' />
        <link rel='shortcut icon' href='/themes/default/assets/images/favicon.ico'>
        <link href='/themes/default/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css' rel='stylesheet' type='text/css' />
        <link rel='stylesheet' href='/themes/default/assets/css/preloader.min.css' type='text/css' />
        <link href='/themes/default/assets/css/bootstrap.min.css' id='bootstrap-style' rel='stylesheet' type='text/css' />
        <link href='/themes/default/assets/css/icons.min.css' rel='stylesheet' type='text/css' />
        <link href='/themes/default/assets/css/app.min.css' id='app-style' rel='stylesheet' type='text/css' />";
		header("X-XSS-Protection: 1; mode=block");
		header("X-Content-Type-Options: nosniff");
		header("Strict-Transport-Security: max-age=31536000");
		header("Referrer-Policy: origin-when-cross-origin");
		header("Expect-CT: max-age=7776000, enforce");
		header("Feature-Policy: vibrate 'self'; usermedia *; sync-xhr 'self'");
echo "
    </head>
    <body data-layout-mode='".$_SESSION['xucp_uname']['site_settings_themes']."' data-sidebar='".$_SESSION['xucp_uname']['site_settings_themes']."'>
        <div id='layout-wrapper'>
            <header id='page-topbar'>
                <div class='navbar-header'>
                    <div class='d-flex'>
                        <div class='navbar-brand-box'>
                            <a href='/index.php' class='logo logo-dark'>
                                <span class='logo-sm'>
                                    <img src='/themes/default/assets/images/logo-bg.png' alt='' height='24'>
                                </span>
                                <span class='logo-lg'>
                                    <img src='/themes/default/assets/images/logo-bg.png' alt='' height='24'> <span class='logo-txt'>".$_SESSION['xucp_uname']['site_settings_site_name']."</span>
                                </span>
                            </a>
                            <a href='/index.php' class='logo logo-light'>
                                <span class='logo-sm'>
                                    <img src='/themes/default/assets/images/logo-bg.png' alt='' height='24'>
                                </span>
                                <span class='logo-lg'>
                                    <img src='/themes/default/assets/images/logo-bg.png' alt='' height='24'> <span class='logo-txt'>".$_SESSION['xucp_uname']['site_settings_site_name']."</span>
                                </span>
                            </a>
                        </div>
                        <button type='button' class='btn btn-sm px-3 font-size-16 header-item' id='vertical-menu-btn'>
                            <i class='fa fa-fw fa-bars'></i>
                        </button>
                    </div>
                </div>
            </header>";
}