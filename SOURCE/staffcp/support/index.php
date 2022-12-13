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
site_secure_staff_check_rank();

if (isset($_GET["support"])) $support = trim(htmlentities($_GET["support"]));
elseif (isset($_POST["support"])) $support = trim(htmlentities($_POST["support"]));
else $support = "view";

site_header(SUPPORT_HEADER_LIST);
site_navi_logged();
site_content_logged();

echo"
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".SUPPORT_HEADER_LIST."</h4>
                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/staffcp/support/index.php'>".$_SESSION['xucp_uname']['site_settings_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".SUPPORT_HEADER_LIST."</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>";

if ($support == "remoticket") {
	if(isset($_POST['sup_rem'])){
        $select_stmt = $db->prepare("DELETE FROM xucp_support");
        $select_stmt->execute();
        $support=$select_stmt->fetch(PDO::FETCH_ASSOC);

        if($select_stmt->rowCount() > 0){
            echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".USERSUPPORT."</h4>
									</div>
									<div class='card-body'>
										".SUPPORTDELETEINFO."
									</div>
								</div>
							</div>
						</div>";
        }
	}		           		
}						
echo"						
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".SUPPORT_HEADER_LIST."</h4>
										<p class='card-title-desc'>
											<form method='post' action='".$_SERVER['PHP_SELF']."?support=remoticket' enctype='multipart/form-data'>
												<div class='d-flex flex-wrap gap-3 align-items-center'>
													<button type='submit' name='sup_rem' class='btn btn-secondary btn-sm waves-effect waves-light'>".SUPPORTDELETE2."</submit>
												</div>
											</form>
										</p>
									</div>
									<div class='card-body'>
										<div class='table-responsive'>
											<table class='table'>
												<thead class='text-primary'>
													<th>
														".SUPPORTUSERID."
													</th>
													<th>
														".SUPPORTUSERNAME."
													</th>					  
													<th>
														".SUPPORTSUBJECT."
													</th>
													<th>
														".SUPPORTMSG."
													</th>				  
													<th>
														".SUPPORTDATE."
													</th>				  
												</thead>
												<tbody>";
                                                $select_stmt = $db->prepare("SELECT * FROM xucp_support WHERE id LIKE ?");
                                                $select_stmt->execute(array("%$query%"));
                                                while($support = $select_stmt->fetch()) {
													echo"					
													<tr>
														<td>
															".htmlentities($support['id'], ENT_QUOTES, 'UTF-8')."
														</td>
														<td>
															".htmlentities($support['username'], ENT_QUOTES, 'UTF-8')."
														</td>						
														<td>
															".htmlentities($support['bug'], ENT_QUOTES, 'UTF-8')."
														</td>
														<td>
															".format_comment($support['msg'])."
														</td>
														<td>
															".htmlentities($support['posted'], ENT_QUOTES, 'UTF-8')."
														</td>					
													</tr>";
											    }
										        echo"									  
												</tbody>
											</table>
										</div>		  
									</div>
								</div>
							</div>
						</div>";
site_footer();
