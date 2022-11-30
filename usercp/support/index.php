<?php 
// ************************************************************************************//
// * xUCP Free
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 2.2
// * 
// * Copyright (c) 2022 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//
include(dirname(__FILE__) . "/../../include/features.php");

site_secure();
secure_url();

$limit = 10;  
if (isset($_GET["site"])) {
	$site  = $_GET["site"]; 
}else{ 
	$site=1;
};  
$start_from = ($site-1) * $limit;

site_header(USERSUPPORT);
site_navi_logged();
site_content_logged();

echo"
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".USERSUPPORT."</h4>

                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/usercp/support/index.php'>".$_SESSION['username']['site_settings_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".USERSUPPORT."</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>";  

if(isset($_POST['posted_sup'])){
	$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
	$msg 	= filter_input(INPUT_POST, 'msg', FILTER_SANITIZE_SPECIAL_CHARS);
	$bug 	= filter_input(INPUT_POST, 'bug', FILTER_SANITIZE_SPECIAL_CHARS);
	$posted 	= date('Y-m-d H:i:s');

	// The 2nd check to make sure that nothing bad can happen.
	if (preg_match('/[A-Za-z0-9]+/', $_POST['msg']) == 0) {
			echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".USERSUPPORT."</h4>
									</div>
									<div class='card-body'>
										".MSG_10."
									</div>
								</div>
							</div>
						</div>";
	}
	if (preg_match('/[A-Za-z0-9]+/', $_POST['bug']) == 0) {
			echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".USERSUPPORT."</h4>
									</div>
									<div class='card-body'>
										".MSG_10."
									</div>
								</div>
							</div>
						</div>";					
	}			
	
	$sql = "insert into xucp_support (username, msg, bug, posted) value('".$username."', '".$msg."', '".$bug."', NOW())";
	$result = mysqli_query($conn, $sql);
	if($result)
	{
			echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".USERSUPPORT."</h4>
									</div>
									<div class='card-body'>
										".SUPPORTADDDONE."
									</div>
								</div>
							</div>
						</div>";					
	}
}			

$sql = "SELECT username FROM accounts WHERE id = ".$_SESSION['username']['secure_first']."";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
	while($support = $result->fetch_assoc()) {
		echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".USERSUPPORT."</h4>
										<p class='card-title-desc'>".SUPPORTADDTICKET1."</p>
									</div>
									<div class='card-body'>
										<form action='".$_SERVER['PHP_SELF']."?support=addticket' method='post' enctype='multipart/form-data'>
											<tr>				  
												<td>
													<h6 class='title'>
														".SUPPORTUSERNAME."
														<small class='text-muted'>".SUPPORTUSERINFO1."</small>
													</h6>
													<div class='input-group'>
														<input style='box-shadow: 0 0 1px rgba(0,0,0, .4);' type='text' name='username' size='50' maxlength='60' class='form-control' value='".htmlentities($support['username'], ENT_QUOTES, 'UTF-8')."' required>
													</div>	
												</td>
											</tr>
											<tr>				  
												<td>
													<h6 class='title'>
														".SUPPORTSUBJECT."
														<small class='text-muted'>".SUPPORTUSERINFO2."</small>
													</h6>
													<div class='input-group'>
														<input style='box-shadow: 0 0 1px rgba(0,0,0, .4);' type='text' name='bug' size='50' maxlength='60' class='form-control' required>
													</div>	
												</td>
											</tr>
											<tr>					  
												<td>
													<h6 class='title'>
														".SUPPORTMSG."
														<small class='text-muted'>".SUPPORTUSERINFO3."</small>
													</h6>
													<div class='input-group'>";
														textbbcode('msg', htmlspecialchars(stripslashes($support['msg'])));
												echo"
													</div>	
												</td>						
											</tr>
											<br />
											<tr>					  
												<td>						
													<button type='submit' name='posted_sup' class='btn btn-secondary btn-sm waves-effect waves-light' id='liveToastBtn'>
														".SUPPORTSAVE."
													</button>
													</submit>
												</td>							
											</tr>				  						
										</form>
									</div>
								</div>
							</div>
						</div>";
	}
}

site_footer();
?>