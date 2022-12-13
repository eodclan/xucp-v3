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
                                            <li class='breadcrumb-item'><a href='/usercp/support/index.php'>".$_SESSION['xucp_uname']['site_settings_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".USERSUPPORT."</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>";
if(isset($_REQUEST['xucp_submit']))
{
    $username = strip_tags($_REQUEST['xucp_username']);
    $msg 	= strip_tags($_REQUEST['xucp_msg']);
    $bug 	= strip_tags($_REQUEST['xucp_bug']);

    if(empty($username)){
        $errorMsg[]=MSG_10;
    }
    else if(empty($msg)){
        $errorMsg[]=MSG_10;
    }
    else if(empty($bug)){
        $errorMsg[]=MSG_10;
    }
    else
    {
        try
        {
            if(!isset($errorMsg))
            {
                $insert_stmt=$db->prepare("INSERT INTO `xucp_support` (username,msg,bug) VALUES
																(:xucp_username,:xucp_msg,:xucp_bug)");

                if($insert_stmt->execute(array(	':xucp_username'	=>$username,
                    ':xucp_msg'	=>$msg,
                    ':xucp_bug'	=>$bug))){

                    $doneMsg=SUPPORTADDDONE;
                }
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}

if(isset($errorMsg))
{
    foreach($errorMsg as $error)
    {
        echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".USERSUPPORT."</h4>
									</div>
									<div class='card-body'>
										".$error."
									</div>
								</div>
							</div>
						</div>";
    }
}
if(isset($doneMsg))
{
    echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".USERSUPPORT."</h4>
									</div>
									<div class='card-body'>
										".$doneMsg."
									</div>
								</div>
							</div>
						</div>";
}
$select_stmt = $db->prepare("SELECT * FROM accounts  WHERE id = ".$_SESSION['xucp_uname']['secure_first']);
$select_stmt->execute();
$support=$select_stmt->fetch(PDO::FETCH_ASSOC);
if($select_stmt->rowCount() > 0){
    echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".USERSUPPORT."</h4>
										<p class='card-title-desc'>".SUPPORTADDTICKET1."</p>
									</div>
									<div class='card-body'>
										<form action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data'>
											<tr>				  
												<td>
													<h6 class='title'>
														".SUPPORTUSERNAME."
														<small class='text-muted'>".SUPPORTUSERINFO1."</small>
													</h6>
													<div class='input-group'>
														<input type='text' name='xucp_username' size='50' maxlength='60' class='form-control' value='".htmlentities($support['username'], ENT_QUOTES, 'UTF-8')."' required>
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
														<input type='text' name='xucp_bug' size='50' maxlength='60' class='form-control' required>
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
														textbbcode('xucp_msg', htmlspecialchars(stripslashes($support['msg'])));
												echo"
													</div>	
												</td>						
											</tr>
											<br />
											<tr>					  
												<td>						
													<button type='submit' name='xucp_submit' class='btn btn-primary w-100 waves-effect waves-light'>
														<i class='dripicons-checkmark'></i>&nbsp;".SUPPORTSAVE."
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
site_footer();