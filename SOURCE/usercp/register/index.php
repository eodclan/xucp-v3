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

secure_url();

site_header_nologged(REGISTER);
site_navi_nologged();
site_content_nologged();

echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".REGISTER."</h4>
                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/usercp/register/index.php'>".$_SESSION['xucp_uname']['site_settings_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".REGISTER."</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>";

if(isset($_REQUEST['xucp_signup']))
{
    $username	= strip_tags($_REQUEST['xucp_username']);
    $email		= strip_tags($_REQUEST['xucp_email']);
    $password	= strip_tags($_REQUEST['xucp_password']);

    if(empty($username)){
        $errorMsg[]=MSG_14;
    }
    else if(empty($email)){
        $errorMsg[]=MSG_13;
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errorMsg[]=MSG_13;
    }
    else if(empty($password)){
        $errorMsg[]=MSG_15;
    }
    else if(strlen($password) < 6){
        $errorMsg[] = MSG_13;
    }
    else
    {
        try
        {
            $select_stmt=$db->prepare("SELECT username, email FROM accounts 
										WHERE username=:xucp_username OR email=:xucp_email");

            $select_stmt->execute(array(':xucp_username'=>$username, ':xucp_email'=>$email));
            $row=$select_stmt->fetch(PDO::FETCH_ASSOC);

            if($row["username"]==$username){
                $errorMsg[]=MSG_16;
            }
            else if($row["email"]==$email){
                $errorMsg[]=MSG_13;
            }
            else if(!isset($errorMsg))
            {
                $new_password = password_hash($password, PASSWORD_BCRYPT);

                $insert_stmt=$db->prepare("INSERT INTO accounts (username,email,password) VALUES
																(:xucp_username,:xucp_email,:xucp_password)");

                if($insert_stmt->execute(array(	':xucp_username'	=>$username,
                    ':xucp_email'	=>$email,
                    ':xucp_password'=>$new_password))){

                    $registerMsg=MSG_9;
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
                        <h4 class='card-title'>".REGISTER."</h4>
                    </div>
                    <div class='card-body'>
                        ".$error."
                    </div>
                </div>
            </div>
        </div>";
    }
}
if(isset($registerMsg))
{
    echo"
    <div class='row'>
        <div class='col-xl-12'>
            <div class='card'>
                <div class='card-header'>
                    <h4 class='card-title'>".REGISTER."</h4>
                </div>
                <div class='card-body'>
                    ".$registerMsg."
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
                                    <h4 class='card-title'>".REGISTER."</h4>
                                    <p class='card-title-desc'>".NOTE."</p>
                                </div>
                                <div class='card-body'>
                                        <form class='needs-validation mt-4 pt-2' novalidate action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data' autocomplete='off'>
                                            <div class='mb-3'>
                                                <label for='useremail' class='form-label'>".EMAIL." *</label>
                                                <input type='email' name='xucp_email' class='form-control' id='useremail' placeholder='Enter email' required>  
                                                <div class='invalid-feedback'>
                                                    Please Enter Email
                                                </div>      
                                            </div>
                    
                                            <div class='mb-3'>
                                                <label for='username' class='form-label'>".USERNAME." *</label>
                                                <input  type='text' name='xucp_username' class='form-control' id='username' placeholder='".INFO1."' required>
                                                <div class='invalid-feedback'>
                                                    ".INFO1."
                                                </div>  
                                            </div>
                    
                                            <div class='mb-3'>
                                                <label for='userpassword' class='form-label'>Password</label>
                                                <input type='password' name='xucp_password' class='form-control' id='userpassword' placeholder='".INFO2."' required>
                                                <div class='invalid-feedback'>
                                                    ".INFO2."
                                                </div>       
                                            </div>
                                            <div class='mb-3'>
                                                <input type='submit'  name='xucp_signup' class='btn btn-primary w-100 waves-effect waves-light' value='".REGISTER."'>
                                            </div>
                                        </form>
									<div class='mt-5 text-center'>
										<p class='text-muted mb-0'>".NOTE4." <a href='/usercp/login/index.php' class='text-primary fw-semibold'> ".LOGIN." </a> </p>
									</div>					
                                </div>
                            </div>
                        </div>
                    </div>";
site_footer();	 	
