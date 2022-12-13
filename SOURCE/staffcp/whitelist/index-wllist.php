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

$limit = 10;  
if (isset($_GET["site"])) {
	$site  = $_GET["site"]; 
}else{ 
	$site=1;
};  
$start_from = ($site-1) * $limit;

site_header(FRAGE_HEADER_2);
site_navi_logged();
site_content_logged();

echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".FRAGE_HEADER_2."</h4>
                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/staffcp/whitelist/index-wllist.php'>".$_SESSION['xucp_uname']['site_settings_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".FRAGE_HEADER_2."</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class='row'>
							<div class='col-lg-12'>
								<div class='card'>
									<div class='card-body'>
										<table class='table'>
											<thead>
												<tr>
													<th>ID</th>
													<th>".MYWHITELIST_USERNAME."</th>
													<th>".MYWHITELIST_CHARNAME."</th>
													<th>".STAFF_USERCONTROLOPTION."</th>
												</tr>
											</thead>
											<tbody>";
										$select_stmt = $db->prepare(query: "SELECT * FROM xucp_whitelist WHERE id LIKE ?");
										$select_stmt->execute(array("%$query%"));
										while($row = $select_stmt->fetch()) {
											echo"		
												<tr>
													<td>".$row['id']."</td>
													<td>".$row['ucpname']."</td>
													<td>".$row['charname']."</td>
													<td>
														<a href='/staffcp/whitelist/index-wllist-view.php?id=".$row['id']."' class='btn btn-primary w-100 waves-effect waves-light'>
															<i class='dripicons-checkmark'></i>&nbsp;".FRAGE_VIEW."
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
