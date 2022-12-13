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
require_once(dirname(__FILE__) . "/../../include/features.php");
secure_url();

site_header_nologged(LOGIN);
site_navi_nologged();
site_content_nologged();

echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".LOGIN."</h4>
                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/usercp/login/index.php'>".$_SESSION['xucp_uname']['site_settings_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".LOGIN."</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>";

if('POST' == $_SERVER['REQUEST_METHOD'] && isset($_POST['xucp_login'])){
    $username	=strip_tags($_REQUEST["xucp_username"]);
    $password	=strip_tags($_REQUEST["xucp_password"]);

    if(empty($username)){
        $errorMsg[]=MSG_10;
    }
    else if(empty($password)){
        $errorMsg[]=MSG_11;
    }
    else
    {
        try
        {
            $select_stmt=$db->prepare("SELECT * FROM accounts WHERE username=:xucp_username");
            $select_stmt->execute(array(':xucp_username'=>$username));
            $row=$select_stmt->fetch(PDO::FETCH_ASSOC);

            if($select_stmt->rowCount() > 0)
            {
                if($username==$row["username"])
                {
                    if(password_verify($password, $row["password"]))
                    {
                        $_SESSION['xucp_uname'] = [
                            'secure_first' => $row["id"],
                            'secure_granted' => "granted",
                            'secure_staff' => $row["adminlevel"],
                            'secure_lang' => $row["language"],
                            'secure_key' => sitehash($username)
                        ];
                        $loginMsg = MSG_27;
                        header("refresh:1; /usercp/dashboard/index.php");
                    }
                    else
                    {
                        $errorMsg[]=MSG_11;
                    }
                }
                else
                {
                    $errorMsg[]=MSG_10;
                }
            }
            else
            {
                $errorMsg[]=MSG_11;
            }
        }
        catch(PDOException $e)
        {
            $e->getMessage();
        }
	}	
}

		if(isset($errorMsg))
		{
			foreach($errorMsg as $error)
			{
                echo "
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".LOGIN."</h4>
									</div>
									<div class='card-body'>
				                        <strong>".$error."</strong>
									</div>
								</div>
							</div>
						</div>";
			}
		}
		if(isset($loginMsg))
		{
        echo "
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".LOGIN."</h4>
									</div>
									<div class='card-body'>
				                        <strong>".$loginMsg."</strong>
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
                                    <h4 class='card-title'>".LOGIN."</h4>
                                    <p class='card-title-desc'>".NOTE."</p>
                                </div>
                                <div class='card-body'>
									<form class='mt-4 pt-2' action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data' autocomplete='off'>
										<div class='mb-3'>
											<label class='form-label'>".USERNAME." *</label>
											<input type='text' name='xucp_username' class='form-control' id='username' placeholder='".INFO1."'>
										</div>
										<div class='mb-3'>
											<div class='d-flex align-items-start'>
												<div class='flex-grow-1'>
													<label class='form-label'>".PASSWORD." *</label>
												</div>
											</div>
											<div class='input-group auth-pass-inputgroup'>
												<input type='password' name='xucp_password' class='form-control' placeholder='".INFO2."' aria-label='".PASSWORD."' aria-describedby='password-addon'>
											</div>
										</div>
										<div class='mb-3'>
										    <input type='submit' name='xucp_login' class='btn btn-primary w-100 waves-effect waves-light' value='Login'>
										</div>
									</form>
									<div class='mt-5 text-center'>
										<p class='text-muted mb-0'>".NOTE3." <a href='/usercp/register/index.php' class='text-primary fw-semibold'> ".REGISTER." </a> </p>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>";
site_footer();