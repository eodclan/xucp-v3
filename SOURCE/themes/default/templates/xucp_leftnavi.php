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
 * @return void
 */
function site_navi_logged(): void
{
		echo "
            <div class='vertical-menu'>
                <div data-simplebar class='h-100'>
                    <div id='sidebar-menu'>
                        <ul class='metismenu list-unstyled' id='side-menu'>
                            <li class='menu-title' data-key='t-menu'>".$_SESSION['xucp_uname']['site_settings_site_name']."</li>
                            <li>
                                <a href='/usercp/dashboard/index.php'>
                                    <i class='dripicons-home'></i>
                                    <span data-key='t-dashboard'>".DASHBOARD."</span>
                                </a>
                            </li>
                            <li>
                                <a href='ts3server://".$_SESSION['xucp_uname']['site_settings_teamspeak']."'>
                                    <i class='dripicons-headset'></i>
                                    <span data-key='t-dashboard'>Teamspeak</span>
                                </a>
                            </li>
                            <li>
                                <a href='/usercp/rules/index.php'>
                                    <i class='dripicons-map'></i>
                                    <span data-key='t-dashboard'>".RULES."</span>
                                </a>
                            </li>				
                            <li>
                                <a href='javascript: void(0);' class='has-arrow'>
                                    <i class='mdi mdi-alpha-a-circle'></i>
                                    <span data-key='t-apps'>".USERACCOUNT."</span>
                                </a>
                                <ul class='sub-menu' aria-expanded='false'>
                                    <li>
                                        <a href='/usercp/profile/index.php'>
                                            <span data-key='t-calendar'>".USERPROFILECHANGE."</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href='/usercp/support/index.php'>
                                            <span data-key='t-email'>".USERSUPPORT."</span>
                                        </a>
                                    </li>									
								</ul>
							</li>
							<li>
								<a href='javascript: void(0);' class='has-arrow'>
									<i class='dripicons-help'></i>
									<span data-key='t-chat'>".USERSUPPORT."</span>
								</a>
								<ul class='sub-menu' aria-expanded='false'>
									<li><a href='/usercp/client/index.php' data-key='t-inbox'>".GSERVER_INFO_HEAD."</a></li>
									<li><a href='/usercp/keyboard/index.php' data-key='t-read-email'>".KEY_HEADER_2."</a></li>
								</ul>
							</li>";
							if(intval($_SESSION['xucp_uname']['secure_staff']) >= UC_CLASS_SUPPORTER) {
							echo "
							<li>
								<a href='javascript: void(0);' class='has-arrow'>
									<i class='dripicons-user-group'></i>
									<span data-key='t-contacts'>Supporter</span>
								</a>
								<ul class='sub-menu' aria-expanded='false'>
									<li><a href='/staffcp/users/index-control.php' data-key='t-user-list'>".STAFF_USERCONTROL."</a></li>
									<li><a href='/staffcp/whitelist/index-wlquestion.php' data-key='t-profile'>".WHITELIST_HEADER."</a></li>
									<li><a href='/staffcp/whitelist/index-wllist.php' data-key='t-profile'>".FRAGE_HEADER_2."</a></li>
									<li><a href='/staffcp/support/index.php' data-key='t-profile'>".SUPPORT_HEADER_LIST."</a></li>											
								</ul>
							</li>";
							}
							if(intval($_SESSION['xucp_uname']['secure_staff']) >= UC_CLASS_PROJECT_MANAGEMENT) {
							echo "
							<li>
								<a href='javascript: void(0);' class='has-arrow'>
									<i class='dripicons-user-group'></i>
									<span data-key='t-blog'>Project Management</span>
								</a>
								<ul class='sub-menu' aria-expanded='false'>
									<li><a href='/staffcp/siteconfig/index.php' data-key='t-blog-grid'>".SITECONFIG_HEADER."</a></li>
									<li><a href='/staffcp/whitelist/index-wlask.php' data-key='t-blog-list'>".FRAGE_HEADER."</a></li>
									<li><a href='/staffcp/news/index.php' data-key='t-blog-details'>".NEWS_HEADER."</a></li>
									<li><a href='/staffcp/rules/index.php' data-key='t-blog-grid'>".STAFF_RULESACP."</a></li>
									<li><a href='/staffcp/keyboard/index.php' data-key='t-blog-list'>".KEY_HEADER."</a></li>
									<li><a href='/staffcp/massemail/index.php' data-key='t-blog-list'>".EMAIL_SYSTEM_HEADER."</a></li>
								</ul>
							</li>";
							}
		echo "
						</ul>";
                    if(intval($_SESSION['xucp_uname']['site_settings_upgrade_note']) == 1) {
                        echo "
                        <div class='card sidebar-alert border-0 text-center mx-4 mb-0 mt-5'>
                            <div class='card-body'>
                                <div class='mt-4'>
                                    <h5 class='alertcard-title font-size-16'>Unlimited Access</h5>
                                    <p class='font-size-13'>Upgrade your Free Version, to select Pro Version.</p>
                                    <a href='https://discord.gg/xg5mnYUWch' class='btn btn-primary mt-2'>Buy upgrade now</a>
                                </div>
                            </div>
                        </div>";
                    } else {
                        // Even if you turn this off in the settings, you have the free version!
                    }
                    echo "
                    </div>
                </div>
            </div>";
}

/**
 * @return void
 */
function site_navi_nologged(): void
{
		echo "
            <div class='vertical-menu'>
                <div data-simplebar class='h-100'>
                    <div id='sidebar-menu'>
                        <ul class='metismenu list-unstyled' id='side-menu'>
                            <li class='menu-title' data-key='t-menu'>".$_SESSION['xucp_uname']['site_settings_site_name']."</li>
                            <li>
                                <a href='/usercp/login/index.php'>
                                    <i class='dripicons-lock-open'></i>
                                    <span data-key='t-dashboard'>".LOGIN."</span>
                                </a>
                            </li>
                            <li>
                                <a href='/usercp/register/index.php'>
                                    <i class='dripicons-lock'></i>
                                    <span data-key='t-dashboard'>".REGISTER."</span>
                                </a>
                            </li>							
                        </ul>";
                    if(intval($_SESSION['xucp_uname']['site_settings_upgrade_note']) == 1) {
                        echo "
                        <div class='card sidebar-alert border-0 text-center mx-4 mb-0 mt-5'>
                            <div class='card-body'>
                                <div class='mt-4'>
                                    <h5 class='alertcard-title font-size-16'>Unlimited Access</h5>
                                    <p class='font-size-13'>Upgrade your Free Version, to select Pro Version.</p>
                                    <a href='https://discord.gg/xg5mnYUWch' class='btn btn-primary mt-2'>Buy upgrade now</a>
                                </div>
                            </div>
                        </div>";
                    } else {
                        // Even if you turn this off in the settings, you have the free version!
                    }
                    echo "
                    </div>
                </div>
            </div>";  
}