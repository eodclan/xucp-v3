<?php
// ************************************************************************************//
// * xUCP Free
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 3.0 alpha
// *
// * Copyright (c) 2022 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//
include(dirname(__FILE__) . "/../../include/features.php");

site_secure();
secure_url();
site_secure_staff_check();

site_header(FRAGE_HEADER_2);
site_navi_logged();
site_content_logged();

$id = $_GET['id'];
$select_stmt = $db->prepare(query: "SELECT * FROM xucp_whitelist WHERE id = ".$id);
$select_stmt->execute();
$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
if($select_stmt->rowCount() > 0){
    echo"
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".FRAGE_HEADER_2." ".FROM_WL." " .$row['ucpname']. "</h4>

                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/staffcp/whitelist/index-wllist.php'>".$_SESSION['username']['site_settings_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".FRAGE_HEADER_2." ".FROM_WL." " .$row['ucpname']. "</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <div class='row'>

              <div class='col-lg-12'>
                <div class='card'>
                  <div class='card-body'>
						<form class='forms-sample' name='form' method='post' action='/staffcp/whitelist/index-wllist-view.php?id=".$id."'>
                            <input type='hidden' name='new' value='1' />
                            <div class='form-group'>
								<div class='form-line'>
									<label  class='col-sm-3 col-form-label'>UCP Name</label>
									<div class='col-sm-9'>
										" .$row['ucpname']. "
									</div>
								</div>
                            </div>
                            <div class='form-group'>
								<div class='form-line'>
									<label  class='col-sm-3 col-form-label'>Charakter Name</label>
									<div class='col-sm-9'>
										" .$row['charname']. "
									</div>
								</div>							
                            </div>
                            <div class='form-group'>
								<div class='form-line'>
									<label  class='col-sm-3 col-form-label'>Charakter Story</label>
									<div class='col-sm-9'>
										" .$row['charstory']. "
									</div>
								</div>							
                            </div>
                            <div class='form-group'>
								<div class='form-line'>
									<label  class='col-sm-3 col-form-label'>".FRAGE1."</label>
									<div class='col-sm-9'>
										" .$row['frage1']. "
									</div>
								</div>							
                            </div>
                            <div class='form-group'>
								<div class='form-line'>
									<label  class='col-sm-3 col-form-label'>".FRAGE2."</label>
									<div class='col-sm-9'>
										" .$row['frage2']. "
									</div>
								</div>							
                            </div>
                            <div class='form-group'>
								<div class='form-line'>
									<label  class='col-sm-3 col-form-label'>".FRAGE3."</label>
									<div class='col-sm-9'>
										" .$row['frage3']. "
									</div>
								</div>							
                            </div>
                            <div class='form-group'>
								<div class='form-line'>
									<label  class='col-sm-3 col-form-label'>".FRAGE4."</label>
									<div class='col-sm-9'>
										" .$row['frage4']. "
									</div>
								</div>							
                            </div>
                            <div class='form-group'>
								<div class='form-line'>
									<label  class='col-sm-3 col-form-label'>".FRAGE5."</label>
									<div class='col-sm-9'>
										" .$row['frage5']. "
									</div>
								</div>							
                            </div>
                            <div class='form-group'>
								<div class='form-line'>
									<label  class='col-sm-3 col-form-label'>".FRAGE6."</label>
									<div class='col-sm-9'>
										" .$row['frage6']. "
									</div>
								</div>							
                            </div>
                            <div class='form-group'>
								<div class='form-line'>
									<label  class='col-sm-3 col-form-label'>".FRAGE7."</label>
									<div class='col-sm-9'>
										" .$row['frage7']. "
									</div>
								</div>							
                            </div>
                            <div class='form-group'>
								<div class='form-line'>
									<label  class='col-sm-3 col-form-label'>".FRAGE8."</label>
									<div class='col-sm-9'>
										" .$row['frage8']. "
									</div>
								</div>							
                            </div>
                            <div class='form-group'>
								<div class='form-line'>
									<label  class='col-sm-3 col-form-label'>".FRAGE9."</label>
									<div class='col-sm-9'>
										" .$row['frage9']. "
									</div>
								</div>							
                            </div>
                            <div class='form-group'>
								<div class='form-line'>
									<label  class='col-sm-3 col-form-label'>".FRAGE10."</label>
									<div class='col-sm-9'>
										" .$row['frage10']. "
									</div>
								</div>							
                            </div>
                            <div class='form-group'>
								<div class='form-line'>
									<label  class='col-sm-3 col-form-label'>".FRAGE11."</label>
									<div class='col-sm-9'>
										" .$row['frage11']. "
									</div>
								</div>							
                            </div>
                            <div class='form-group'>
								<div class='form-line'>
									<label  class='col-sm-3 col-form-label'>".FRAGE12."</label>
									<div class='col-sm-9'>
										" .$row['frage12']. "
									</div>
								</div>							
                            </div>
						</form>
						</div>							
					</div>
				</div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->";
}
site_footer();
?>