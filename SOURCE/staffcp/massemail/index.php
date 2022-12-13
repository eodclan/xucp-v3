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

site_header(EMAIL_SYSTEM_HEADER);
site_navi_logged();
site_content_logged();

echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".EMAIL_SYSTEM_HEADER."</h4>
                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/staffcp/massemail/index.php'>".$_SESSION['xucp_uname']['site_settings_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".EMAIL_SYSTEM_HEADER."</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>";

if(isset($_POST['message'])){
    $select_stmt = $db->prepare("SELECT * FROM accounts");
    $select_stmt->execute();
    $norep=$select_stmt->fetch(PDO::FETCH_ASSOC);

    if($select_stmt->rowCount() > 0){
        $subject = substr(htmlspecialchars(stripslashes($_POST["subject"])), 0, 80);
        if ($subject == "")
        {
            $subject = "(No subject)";
            $subject = "Fw: $subject";
            $message = htmlspecialchars(stripslashes($_POST["message"]));
        }
        $to = $norep["email"];
        $message = EMAIL_SYSTEM_NOTE2 ." ".$_SESSION['username']['site_settings_site_name']." ".EMAIL_SYSTEM_NOTE3." " . date("Y-m-d H:i:s") . ".\n" .EMAIL_SYSTEM_NOTE1."\n" .
            "---------------------------------------------------------------------\n\n" .
            $message .htmlspecialchars(stripslashes($_POST['message']))."\n\n" .
            "---------------------------------------------------------------------\n\n" .
            "Powered by xUCP Free V3\n\n" .
            "---------------------------------------------------------------------\n\n";
        $success = mail($to, $subject, $message, "From: ".SITE_EMAIL, "-f ".SITE_EMAIL);
    }
    echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".EMAIL_SYSTEM_HEADER."</h4>
									</div>
									<div class='card-body'>
										".EMAIL_SYSTEM_INFO."
									</div>
								</div>
							</div>
						</div>";
}

echo "
                    <div class='row'>
                        <div class='col-xl-12'>
                            <div class='card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>".EMAIL_SYSTEM_HEADER."</h4>
									<p class='card-title-desc'>".NEWS_INFO."</p>
                                </div>
                                <div class='card-body'>
									<form action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data'>
										<table class='table table-bordered table-striped'>
											<thead>
												<tr>
													<h6>
														".EMAIL_SYSTEM_SUBJECT."
													</h6>
													<div class='input-group'>
														<input type='text' size='80' name='subject' class='form-control' />
													</div>
												</tr>
												<tr>
													<h6>
														".EMAIL_SYSTEM_MESSAGE."
													</h6>
													<div class='input-group'>";
                                                        textbbcode("message", htmlspecialchars(stripslashes($_POST["message"])));
											echo "
													</div>
												</tr>
												<tr><br />
													<div class='input-group'>
														<input type='submit' value='".EMAIL_SYSTEM_SUBMIT."' class='btn btn-primary btn-round' />
													</div>
												</tr>												
											</thead>
										</table>
									</form>
								</div>
							</div>
						</div>
					</div>";
site_footer(); 
