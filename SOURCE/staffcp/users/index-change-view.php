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

site_header(STAFF_USERCAHNEGED);
site_navi_logged();
site_content_logged();

$id = $_GET['id'];
$select_stmt = $db->prepare(query: "SELECT * FROM accounts WHERE id = ".$id);
$select_stmt->execute();
$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
if($select_stmt->rowCount() > 0){
    echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".STAFF_USERCAHNEGED."</h4>
                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/staffcp/users/index-change-view?id=".$row['id'].".php'>".$_SESSION['xucp_uname']['site_settings_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".STAFF_USERCAHNEGED.": " .$row['username']. "</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>";
    if(isset($_REQUEST['xucp_submit']))
    {
        $username = strip_tags($_REQUEST['xucp_username']);
        $email 	= strip_tags($_REQUEST['xucp_email']);
        $whitelisted 	= strip_tags($_REQUEST['xucp_whitelisted']);
        $user_dc_tag 	= strip_tags($_REQUEST['xucp_user_dc_tag']);
        $user_hp 	= strip_tags($_REQUEST['xucp_user_hp']);
        $user_banned 	= strip_tags($_REQUEST['xucp_banned']);

        if(empty($username)){
            $errorMsg[]=MSG_7;
        }
        else
        {
            try
            {
                if(!isset($errorMsg))
                {
                    $insert_stmt=$db->prepare("UPDATE `accounts` SET `username` = :xucp_username, `email` = :xucp_email, `whitelisted` = :xucp_whitelisted, `userdiscordtag` = :xucp_user_dc_tag, `userhp` = :xucp_user_hp, `ban` = :xucp_banned WHERE `id` = ".$id);

                    if($insert_stmt->execute(array(	':xucp_username'	=>$username,
                        ':xucp_email'	=>$email,
                        ':xucp_whitelisted'	=>$whitelisted,
                        ':xucp_user_dc_tag'	=>$user_dc_tag,
                        ':xucp_user_hp'	=>$user_hp,
                        ':xucp_banned'	=>$user_banned))){

                        $doneMsg=FRAGEDONE;
                        header("refresh:2; /staffcp/users/index-control.php");
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
										<h4 class='card-title'>".STAFF_USERCAHNEGED.": " .$row['username']. "</h4>
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
										<h4 class='card-title'>".STAFF_USERCAHNEGED.": " .$row['username']. "</h4>
									</div>
									<div class='card-body'>
										".$doneMsg."
									</div>
								</div>
							</div>
						</div>";
    }
    echo "
            <div class='row'>
              <div class='col-lg-12'>
                <div class='card'>
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
									".STAFF_BANNED_USER."
								</th>
								<th>
									".PROFILE_PORTFOLIO_DISCORDTAG."
								</th>																				  
								<th>
									".STAFF_USERCONTROLACCOUNTWHITELIST."
								</th>
								<th>
									".PROFILE_PORTFOLIO_WEBSITE."
								</th>
								
								<th>
									".STAFF_USERCONTROLOPTION."
								</th>								
							</thead>
							<tbody>
							<form name='form' method='post' action='/staffcp/users/index-change-view.php?id=".$id."'>
								<tr>
									<td>
										<p class='btn btn-*'>" . $row["id"]. "</p>
									</td>
									<td>			
										<input type='text' name='xucp_username' size='50' maxlength='60' class='form-control' value='" . $row["username"]. "' required>
									</td>						
									<td>						
										<input type='text' name='xucp_email' size='50' maxlength='60' class='form-control' value='" . $row["email"]. "' required>
									</td>
									<td>						
										<input type='text' name='xucp_banned' size='50' maxlength='60' class='form-control' value='" . $row["ban"]. "' required>
									</td>									
									<td>						
										<input type='text' name='xucp_user_dc_tag' size='50' maxlength='60' class='form-control' value='" . $row["userdiscordtag"]. "' required>
									</td>									
									<td>
										<select name='xucp_whitelisted' class='form-control show-tick' value='" . $row["whitelisted"]. "'required>
												<option value=''>-- ".STAFF_USERCONTROL_WL_STATUS." --</option>
												<option value='1'>".SITECONFIG_CLIENT_YES."</option>
												<option value='0'>".SITECONFIG_CLIENT_NO."</option>											
										</select>
									</td>
									<td>						
										<input type='text' name='xucp_user_hp' size='50' maxlength='60' class='form-control' value='" . $row["userhp"]. "' required>
									</td>									
									<td>
										<button type='submit' class='btn btn-dark' name='xucp_submit'>".STAFF_USERCONTROLSAVE."</button></submit>&nbsp;
									</td>													
								</tr>						
							</form>		  
							</tbody>
						</table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>";
}
site_footer();
