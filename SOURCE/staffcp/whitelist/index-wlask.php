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

site_header(FRAGE_HEADER);
site_navi_logged();
site_content_logged();

echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".FRAGE_HEADER."</h4>
                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/staffcp/whitelist/index-wlask.php'>".$_SESSION['xucp_uname']['site_settings_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".FRAGE_HEADER."</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>";
if(isset($_REQUEST['xucp_submit']))
{
    $xucp_uid 	= 1;
    $key1 	= strip_tags($_REQUEST['xucp_key1']);
    $key2 	= strip_tags($_REQUEST['xucp_key2']);
    $key3  	= strip_tags($_REQUEST['xucp_key3']);
    $key4 	= strip_tags($_REQUEST['xucp_key4']);
    $key5 	= strip_tags($_REQUEST['xucp_key5']);
    $key6 	= strip_tags($_REQUEST['xucp_key6']);
    $key7 	= strip_tags($_REQUEST['xucp_key7']);
    $key8 	= strip_tags($_REQUEST['xucp_key8']);
    $key9 	= strip_tags($_REQUEST['xucp_key9']);
    $key10 	= strip_tags($_REQUEST['xucp_key10']);
    $key11 	= strip_tags($_REQUEST['xucp_key11']);
    $key12 	= strip_tags($_REQUEST['xucp_key12']);

    if(empty($key1)){
        $errorMsg[]=MSG_19;
    }
    else if(empty($key2)){
        $errorMsg[]=MSG_19;
    }
    else if(empty($key3)){
        $errorMsg[]=MSG_19;
    }
    else if(empty($key4)){
        $errorMsg[]=MSG_19;
    }
    else if(empty($key5)){
        $errorMsg[]=MSG_19;
    }
    else if(empty($key6)){
        $errorMsg[]=MSG_19;
    }
    else if(empty($key7)){
        $errorMsg[]=MSG_19;
    }
    else if(empty($key8)){
        $errorMsg[]=MSG_19;
    }
    else if(empty($key9)){
        $errorMsg[]=MSG_19;
    }
    else if(empty($key10)){
        $errorMsg[]=MSG_19;
    }
    else if(empty($key11)){
        $errorMsg[]=MSG_19;
    }
    else if(empty($key12)){
        $errorMsg[]=MSG_19;
    }
    else
    {
        try
        {
            if(!isset($errorMsg))
            {
                $insert_stmt=$db->prepare("UPDATE `xucp_config` SET `frage1` = :xucp_key1, `frage2` = :xucp_key2, `frage3` = :xucp_key3, `frage4` = :xucp_key4, `frage5` = :xucp_key5, `frage6` = :xucp_key6, `frage7` = :xucp_key7, `frage8` = :xucp_key8, `frage9` = :xucp_key9, `frage10` = :xucp_key10, `frage11` = :xucp_key11, `frage12` = :xucp_key12 WHERE `id` = ".$xucp_uid);

                if($insert_stmt->execute(array(	':xucp_key1'	=>$key1,
                    ':xucp_key2'=>$key2,
                    ':xucp_key3'=>$key3,
                    ':xucp_key4'=>$key4,
                    ':xucp_key5'=>$key5,
                    ':xucp_key6'=>$key6,
                    ':xucp_key7'=>$key7,
                    ':xucp_key8'=>$key8,
                    ':xucp_key9'=>$key9,
                    ':xucp_key10'=>$key10,
                    ':xucp_key11'=>$key11,
                    ':xucp_key12'=>$key12))){

                    $doneMsg=FRAGEDONE;
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
										<h4 class='card-title'>".FRAGE_HEADER."</h4>
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
										<h4 class='card-title'>".FRAGE_HEADER."</h4>
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
                        <div class='col-xl-12'>
                            <div class='card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>".FRAGE_HEADER."</h4>
                                    <p class='card-title-desc'>".FRAGENOTE."</p>
                                </div>
                                <div class='card-body'>";
                $select_stmt = $db->prepare("SELECT frage1, frage2, frage3, frage4, frage5, frage6, frage7, frage8, frage9, frage10, frage11, frage12 FROM xucp_config WHERE id = 1");
                $select_stmt->execute();
                $conf_set=$select_stmt->fetch(PDO::FETCH_ASSOC);
                if($select_stmt->rowCount() > 0){
					echo"
				<form action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data'>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".FRAGE1."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key1' size='50' maxlength='256' class='form-control' value='".$conf_set["frage1"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".FRAGE2."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key2' size='50' maxlength='256' class='form-control' value='".$conf_set["frage2"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".FRAGE3."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key3' size='50' maxlength='256' class='form-control' value='".$conf_set["frage3"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".FRAGE4."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key4' size='50' maxlength='256' class='form-control' value='".$conf_set["frage4"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".FRAGE5."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key5' size='50' maxlength='256' class='form-control' value='".$conf_set["frage5"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".FRAGE6."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key6' size='50' maxlength='256' class='form-control' value='".$conf_set["frage6"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".FRAGE7."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key7' size='50' maxlength='256' class='form-control' value='".$conf_set["frage7"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".FRAGE8."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key8' size='50' maxlength='256' class='form-control' value='".$conf_set["frage8"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".FRAGE9."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key9' size='50' maxlength='256' class='form-control' value='".$conf_set["frage9"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".FRAGE10."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key10' size='50' maxlength='256' class='form-control' value='".$conf_set["frage10"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".FRAGE11."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key11' size='50' maxlength='256' class='form-control' value='".$conf_set["frage11"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".FRAGE12."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key12' size='50' maxlength='256' class='form-control' value='".$conf_set["frage12"]."' required>
							</div>	
						</div>
					</div><br />					  						
					<button type='submit' name='xucp_submit' class='btn btn-primary w-100 waves-effect waves-light'>
						".FRAGEDONEBTN."
					</button>
					</submit>						
				</form>";
			    }
echo "
                                </div>
                            </div>
                        </div>
                    </div>";
site_footer();
