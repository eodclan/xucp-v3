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
site_secure_staff_check();

site_header(STAFF_USERCONTROL);
site_navi_logged();
site_content_logged();

echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".STAFF_USERCONTROL."</h4>
                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/staffcp/users/index-control.php'>".$_SESSION['xucp_uname']['site_settings_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".STAFF_USERCONTROL."</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".USERSUPPORT."</h4>
										<p class='card-title-desc'></p>
									</div>
									<div class='card-body'>										
							<div class='table-responsive'>
								<table class='table'>
									<thead class=' text-primary'>
										<th>
											".STAFF_USERCONTROLUSERID."
										</th>
										<th>
											".STAFF_USERCONTROLUSERNAME."
										</th>					  
										<th>
											".STAFF_USERCONTROLEMAIL."
										</th>				  
										<th>
											".STAFF_USERCONTROLACCOUNTWHITELIST."
										</th>
										<th>
											".PROFILE_PORTFOLIO_WEBSITE."
										</th>
										<th>
											".PROFILE_PORTFOLIO_DISCORDTAG."
										</th>	
										<th>
											".STAFF_USERCONTROLOPTION."
										</th>																			
									</thead>
									<tbody>";
                                $select_stmt = $db->prepare(query: "SELECT * FROM accounts WHERE id LIKE ?");
                                $select_stmt->execute(array("%$query%"));
                                while($row = $select_stmt->fetch()) {
									echo "
										<tr>
											<td>
												" . $row["id"]. "
											</td>
											<td>
												" . $row["username"]. "
											</td>						
											<td>
												" . $row["email"]. "
											</td>
											<td>
												" . $row["whitelisted"]. "
											</td>
											<td>
												" . $row["userhp"]. "
											</td>
											<td>
												" . $row["userdiscordtag"]. "
											</td>
                                            <td>
                                                <a href='/staffcp/users/index-change-view.php?id=".$row['id']."' class='btn btn-primary w-100 waves-effect waves-light'>
                                                    <i class='dripicons-checkmark'></i>&nbsp;".STAFF_CHANGE_USER."
                                                </a>
                                            </td>											
										</tr>";
								}					
								echo "					  
									</tbody>
								</table>			  
								</div>
							</div>
						</div>
					</div>";
site_footer();	
