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
include(dirname(__FILE__) . "/../../include/features.php");

site_secure();
secure_url();

site_header(GSERVER_INFO_HEAD);
site_navi_logged();
site_content_logged();
	
	echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".GSERVER_INFO_HEAD."</h4>
                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/usercp/client/index.php'>".$_SESSION['xucp_uname']['site_settings_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".GSERVER_INFO_HEAD."</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>	
					<div class='row'>
                        <div class='col-xl-12'>
                            <div class='card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>".GSERVER_INFO_HEAD."</h4>
                                    <p class='card-title-desc'>".GSERVER_INFO_01." <br />".GSERVER_INFO_02."</p>
                                </div>
                                <div class='card-body'>
									<div class='row gy-3'>
										<div class='col-lg-6'>
											<label class='form-label'>".SITECONFIG_GSERVERNAME."</label>
										</div>
										<div class='col-lg-6'>
											<label class='form-label'>".$_SESSION['xucp_uname']['site_settings_gservername']."</label>
										</div>
										<div class='col-lg-6'>
											<label class='form-label'>".SITECONFIG_GSERVERIP."</label>
										</div>
										<div class='col-lg-6'>
											<label class='form-label'>".$_SESSION['xucp_uname']['site_settings_gserverip']."</label>
										</div>
										<div class='col-lg-6'>
											<label class='form-label'>".SITECONFIG_GSERVERPORT."</label>
										</div>
										<div class='col-lg-6'>
											<label class='form-label'>".$_SESSION['xucp_uname']['site_settings_gserverport']."</label>
										</div>
										<div class='col-lg-6'>
											<label class='form-label'>".SITECONFIG_GSERVER_STATUS."</label>
										</div>
										<div class='col-lg-6'>
											<label class='form-label'>";
											if (false === fsockopen($_SESSION['xucp_uname']['site_settings_gserverip'], $_SESSION['xucp_uname']['site_settings_gserverport'], $errno, $errstr, 3600)) {
												echo "
													<span style='color: #F00000; '><b>".UPTIME_DOWN."</b></span>";
											}
											else
											{
												echo "
													<span style='color: #31B404; '><b>".UPTIME_UP."</b></span></td>";
											}
											echo "
											</label>
										</div>										
										<div class='col-lg-6'>
											<label class='form-label'>Voice Chat</label>
										</div>					
										<div class='col-lg-6'>
											<label class='form-label'>
												<a href='https://gaming.v10networks.com/saltychat/download/3.1.0'>
													<span>SaltyChat</span>
												</a>						
											</label>
										</div>";
									if(intval($_SESSION['xucp_uname']['site_settings_dl_section_ragemp']) >= 1) {
									echo"
										<div class='col-lg-6'>
											<label class='form-label'>Client</label>
										</div>					
										<div class='col-lg-6'>
											<label class='form-label'>
												<a href='https://cdn.rage.mp/public/files/RAGEMultiplayer_Setup.exe'>
													<span>".SITECONFIG_RAGEMP."</span>
												</a>						
											</label>
										</div>";
									}
									if(intval($_SESSION['xucp_uname']['site_settings_dl_section_altv']) >= 1) {
									echo"
										<div class='col-lg-6'>
											<label class='form-label'>Client</label>
										</div>					
										<div class='col-lg-6'>
											<label class='form-label'>
												<a href='https://cdn.altv.mp/altv-release.zip'>
													<span>".SITECONFIG_ALTV."</span>
												</a>						
											</label>					
										</div>";
									}
									if(intval($_SESSION['xucp_uname']['site_settings_dl_section_fivem']) >= 1) {
									echo"
										<div class='col-lg-6'>
											<label class='form-label'>Client</label>
										</div>					
										<div class='col-lg-6'>
											<label class='form-label'>
												<a href='https://runtime.fivem.net/client/FiveM.exe'>
													<span>".SITECONFIG_FIVEM."</span>
												</a>						
											</label>
										</div>";
									}
									if(intval($_SESSION['xucp_uname']['site_settings_dl_section_redm']) >= 1) {
									echo"
										<div class='col-lg-6'>
											<label class='form-label'>Client</label>
										</div>					
										<div class='col-lg-6'>
											<label class='form-label'>
												<a href='https://runtime.fivem.net/redm/RedM.exe'>
													<span>".SITECONFIG_REDM."</span>
												</a>						
											</label>
										</div>";
									}					
									echo "					
									</div>
                                </div>
                            </div>
                        </div>
                    </div>";	
site_footer();