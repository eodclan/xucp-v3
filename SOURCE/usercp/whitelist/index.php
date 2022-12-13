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

site_header(MYWHITELIST_HEADER);
site_navi_logged();
site_content_logged();

echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".MYWHITELIST_HEADER."</h4>
                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/usercp/whitelist/index.php?mywhitelist=addwl'>".$_SESSION['xucp_uname']['site_settings_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".MYWHITELIST_HEADER."</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>";

if(isset($_REQUEST['xucp_myaddwl']))
{
    $ucpname    = strip_tags($_REQUEST['xucp_ucpname']);
    $charname   = strip_tags($_REQUEST['xucp_charname']);
    $charstory  = strip_tags($_REQUEST['xucp_charstory']);
    $frage1     = strip_tags($_REQUEST['xucp_frage1']);
    $frage2     = strip_tags($_REQUEST['xucp_frage2']);
    $frage3     = strip_tags($_REQUEST['xucp_frage3']);
    $frage4     = strip_tags($_REQUEST['xucp_frage4']);
    $frage5     = strip_tags($_REQUEST['xucp_frage5']);
    $frage6     = strip_tags($_REQUEST['xucp_frage6']);
    $frage7     = strip_tags($_REQUEST['xucp_frage7']);
    $frage8     = strip_tags($_REQUEST['xucp_frage8']);
    $frage9     = strip_tags($_REQUEST['xucp_frage9']);
    $frage10    = strip_tags($_REQUEST['xucp_frage10']);
    $frage11    = strip_tags($_REQUEST['xucp_frage11']);
    $frage12    = strip_tags($_REQUEST['xucp_frage12']);

    if(empty($ucpname)){
        $errorMsg[]=MYWHITELIST_STATUS_4;
    }
    else if(empty($charname)){
        $errorMsg[]=MYWHITELIST_STATUS_4;
    }
    else if(empty($charstory)){
        $errorMsg[]=MYWHITELIST_STATUS_4;
    }
    else
    {
        try
        {
            if(!isset($errorMsg))
            {
                $insert_stmt=$db->prepare("INSERT INTO xucp_whitelist (ucpname, charname, charstory, frage1, frage2, frage3, frage4, frage5, frage6, frage7, frage8, frage9, frage10, frage11, frage12) VALUES
																(:xucp_ucpname,:xucp_charname,:xucp_charstory,:xucp_frage1,:xucp_frage2,:xucp_frage3,:xucp_frage4,:xucp_frage5,:xucp_frage6,:xucp_frage7,:xucp_frage8,:xucp_frage9,:xucp_frage10,:xucp_frage11,:xucp_frage12)");

                if($insert_stmt->execute(array(	':xucp_ucpname'	=>$ucpname,
                    ':xucp_charname'=>$charname,
                    ':xucp_charstory'=>$charstory,
                    ':xucp_frage1'=>$frage1,
                    ':xucp_frage2'=>$frage2,
                    ':xucp_frage3'=>$frage3,
                    ':xucp_frage4'=>$frage4,
                    ':xucp_frage5'=>$frage5,
                    ':xucp_frage6'=>$frage6,
                    ':xucp_frage7'=>$frage7,
                    ':xucp_frage8'=>$frage8,
                    ':xucp_frage9'=>$frage9,
                    ':xucp_frage10'=>$frage10,
                    ':xucp_frage11'=>$frage11,
                    ':xucp_frage12'=>$frage12))){

                    $registerMsg=MYWHITELIST_STATUS_3;
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
                                    <h4 class='card-title'>".MYWHITELIST_HEADER."</h4>
                                    <p class='card-title-desc'>".MYWHITELIST_STATUS_5."<br>".MYWHITELIST_STATUS_6."</p>
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
                                    <h4 class='card-title'>".MYWHITELIST_HEADER."</h4>
                                </div>
                                <div class='card-body'>	
									".$registerMsg."
                                </div>
                            </div>
                        </div>
                    </div>";
}

$select_stmt = $db->prepare("SELECT * FROM xucp_config WHERE `id` = 1");
$select_stmt->execute();
$wl_status=$select_stmt->fetch(PDO::FETCH_ASSOC);

if($select_stmt->rowCount() > 0){
    echo "
					<div class='row'>
                        <div class='col-xl-12'>
                            <div class='card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>".MYWHITELIST_HEADER."</h4>
                                    <p class='card-title-desc'>".MYWHITELIST_STATUS_5."<br>".MYWHITELIST_STATUS_6."</p>
                                </div>
                                <div class='card-body'>				  
									<form class='forms-sample' name='form' method='post' action='".$_SERVER['PHP_SELF']."'>
										<input type='hidden' name='new' value='1' />
											<div class='form-group'>
												<label class='col-sm-12 col-form-label'>".MYWHITELIST_USERNAME."</label>
												<div class='col-sm-12'>";
                                            $select_stmt = $db->prepare("SELECT * FROM accounts WHERE `id` = ".$_SESSION['xucp_uname']['secure_first']);
                                            $select_stmt->execute();
                                            $wl_username=$select_stmt->fetch(PDO::FETCH_ASSOC);

                                            if($select_stmt->rowCount() > 0){
                                                echo "	
												<input type='text' class='form-control' name='xucp_ucpname' value='".htmlentities($wl_username['username'], ENT_QUOTES, 'UTF-8')."'>";
                                            }
                                            echo "
												</div>
										</div>	
										<div class='form-group'>
											<label class='col-sm-12 col-form-label'>".MYWHITELIST_CHARNAME."</label>
											<div class='col-sm-12'>
												<input type='text' class='form-control' name='xucp_charname' required>
											</div>
										</div>
										<div class='form-group'>
											<label class='col-sm-12 col-form-label'>".MYWHITELIST_STORY."</label>
											<div class='col-sm-12'>
												<input type='text' class='form-control' name='xucp_charstory' required>
											</div>
										</div>
										<div class='form-group'>
											<label class='col-sm-12 col-form-label'>".htmlentities($wl_status['frage1'], ENT_QUOTES, 'UTF-8')."</label>
											<div class='col-sm-12'>
												<textarea id='frage1' name='xucp_frage1' class='form-control' rows='3' cols='100' required></textarea>
											</div>
										</div>
										<div class='form-group'>
											<label class='col-sm-12 col-form-label'>".htmlentities($wl_status['frage2'], ENT_QUOTES, 'UTF-8')."</label>
											<div class='col-sm-12'>
												<textarea id='frage2' name='xucp_frage2' class='form-control' rows='3' cols='100' required></textarea>
											</div>
										</div>
										<div class='form-group'>
											<label class='col-sm-12 col-form-label'>".htmlentities($wl_status['frage3'], ENT_QUOTES, 'UTF-8')."</label>
											<div class='col-sm-12'>
												<textarea id='frage3' name='xucp_frage3' class='form-control' rows='3' cols='100' required></textarea>
											</div>
										</div>
										<div class='form-group'>
											<label class='col-sm-12 col-form-label'>".htmlentities($wl_status['frage4'], ENT_QUOTES, 'UTF-8')."</label>
											<div class='col-sm-12'>
												<textarea id='frage4' name='xucp_frage4' class='form-control' rows='3' cols='100' required></textarea>
											</div>
										</div>
										<div class='form-group'>
											<label class='col-sm-12 col-form-label'>".htmlentities($wl_status['frage5'], ENT_QUOTES, 'UTF-8')."</label>
											<div class='col-sm-12'>
												<textarea id='frage5' name='xucp_frage5' class='form-control' rows='3' cols='100' required></textarea>
											</div>
										</div>
										<div class='form-group'>
											<label class='col-sm-12 col-form-label'>".htmlentities($wl_status['frage6'], ENT_QUOTES, 'UTF-8')."</label>
											<div class='col-sm-12'>
												<textarea id='frage6' name='xucp_frage6' class='form-control' rows='3' cols='100' required></textarea>
											</div>
										</div>
										<div class='form-group'>
											<label class='col-sm-12 col-form-label'>".htmlentities($wl_status['frage7'], ENT_QUOTES, 'UTF-8')."</label>
											<div class='col-sm-12'>
												<textarea id='frage7' name='xucp_frage7' class='form-control' rows='3' cols='100' required></textarea>
											</div>
										</div>
										<div class='form-group'>
											<label class='col-sm-12 col-form-label'>".htmlentities($wl_status['frage8'], ENT_QUOTES, 'UTF-8')."</label>
											<div class='col-sm-12'>
												<textarea id='frage8' name='xucp_frage8' class='form-control' rows='3' cols='100' required></textarea>
											</div>
										</div>
										<div class='form-group'>
											<label class='col-sm-12 col-form-label'>".htmlentities($wl_status['frage9'], ENT_QUOTES, 'UTF-8')."</label>
											<div class='col-sm-12'>
												<textarea id='frage9' name='xucp_frage9' class='form-control' rows='3' cols='100' required></textarea>
											</div>
										</div>
										<div class='form-group'>
											<label class='col-sm-12 col-form-label'>".htmlentities($wl_status['frage10'], ENT_QUOTES, 'UTF-8')."</label>
											<div class='col-sm-12'>
												<textarea id='frage10' name='xucp_frage10' class='form-control' rows='3' cols='100' required></textarea>
											</div>
										</div>
										<div class='form-group'>
											<label class='col-sm-12 col-form-label'>".htmlentities($wl_status['frage11'], ENT_QUOTES, 'UTF-8')."</label>
											<div class='col-sm-12'>
												<textarea id='frage11' name='xucp_frage11' class='form-control'rows='3' cols='100' required></textarea>
											</div>
										</div>
										<div class='form-group'>
											<label class='col-sm-12 col-form-label'>".htmlentities($wl_status['frage12'], ENT_QUOTES, 'UTF-8')."</label>
											<div class='col-sm-12'>
												<textarea id='frage12' name='xucp_frage12' class='form-control' rows='3' cols='100' required></textarea>
											</div>
										</div>			
										<input type='submit' name='xucp_myaddwl' value='".FRAGE_SEND."' class='btn btn-dark mr-2' />
									</form>
                                </div>
                            </div>
                        </div>
                    </div>";
}
site_footer();	
