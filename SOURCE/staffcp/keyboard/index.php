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

site_header(KEY_HEADER);
site_navi_logged();
site_content_logged();

echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".KEY_HEADER."</h4>
                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/staffcp/keyboard/index.php'>".$_SESSION['xucp_uname']['site_settings_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".KEY_HEADER."</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>";

if(isset($_REQUEST['xucp_submit']))
{
    $key_config_uid 	= 1;
    $key1 	= strip_tags($_REQUEST['xucp_key1']);
    $key2 	= strip_tags($_REQUEST['xucp_key2']);
    $key3 	= strip_tags($_REQUEST['xucp_key3']);
    $key4 	= strip_tags($_REQUEST['xucp_key4']);
    $key5 	= strip_tags($_REQUEST['xucp_key5']);
    $key6 	= strip_tags($_REQUEST['xucp_key6']);
    $key7 	= strip_tags($_REQUEST['xucp_key7']);
    $key8 	= strip_tags($_REQUEST['xucp_key8']);
    $key9 	= strip_tags($_REQUEST['xucp_key9']);
    $key10 	= strip_tags($_REQUEST['xucp_key10']);
    $key11 	= strip_tags($_REQUEST['xucp_key11']);
    $key12 	= strip_tags($_REQUEST['xucp_key12']);
    $key13 	= strip_tags($_REQUEST['xucp_key13']);
    $key14 	= strip_tags($_REQUEST['xucp_key14']);
    $key15 	= strip_tags($_REQUEST['xucp_key15']);
    $key16 	= strip_tags($_REQUEST['xucp_key16']);
    $key17 	= strip_tags($_REQUEST['xucp_key17']);
    $key18 	= strip_tags($_REQUEST['xucp_key18']);
    $key19 	= strip_tags($_REQUEST['xucp_key19']);

    if(empty($key1)){
        $errorMsg[]=KEYNOTE;
    }
    else if(empty($key2)){
        $errorMsg[]=KEYNOTE;
    }
    else if(empty($key3)){
        $errorMsg[]=KEYNOTE;
    }
    else if(empty($key4)){
        $errorMsg[]=KEYNOTE;
    }
    else if(empty($key5)){
        $errorMsg[]=KEYNOTE;
    }
    else if(empty($key6)){
        $errorMsg[]=KEYNOTE;
    }
    else if(empty($key7)){
        $errorMsg[]=KEYNOTE;
    }
    else if(empty($key8)){
        $errorMsg[]=KEYNOTE;
    }
    else if(empty($key9)){
        $errorMsg[]=KEYNOTE;
    }
    else if(empty($key10)){
        $errorMsg[]=KEYNOTE;
    }
    else if(empty($key11)){
        $errorMsg[]=KEYNOTE;
    }
    else if(empty($key12)){
        $errorMsg[]=KEYNOTE;
    }
    else if(empty($key13)){
        $errorMsg[]=KEYNOTE;
    }
    else if(empty($key14)){
        $errorMsg[]=KEYNOTE;
    }
    else if(empty($key15)){
        $errorMsg[]=KEYNOTE;
    }
    else if(empty($key16)){
        $errorMsg[]=KEYNOTE;
    }
    else if(empty($key17)){
        $errorMsg[]=KEYNOTE;
    }
    else if(empty($key18)){
        $errorMsg[]=KEYNOTE;
    }
    else if(empty($key19)){
        $errorMsg[]=KEYNOTE;
    }
    else
    {
        try
        {
            if(!isset($errorMsg))
            {
                $insert_stmt=$db->prepare("UPDATE `xucp_keys` SET `key1` = :xucp_key1, `key2` = :xucp_key2, `key3` = :xucp_key3, `key4` = :xucp_key4, `key5` = :xucp_key5, `key6` = :xucp_key6, `key7` = :xucp_key7, `key8` = :xucp_key8, `key9` = :xucp_key9, `key10` = :xucp_key10, `key11` = :xucp_key11, `key12` = :xucp_key12, `key13` = :xucp_key13, `key14` = :xucp_key14, `key15` = :xucp_key15, `key16` = :xucp_key16, `key17` = :xucp_key17, `key18` = :xucp_key18, `key19` = :xucp_key19 WHERE `id` = ".$key_config_uid);

                if($insert_stmt->execute(array(	':xucp_key1'	=>$key1,
                    ':xucp_key2'	=>$key2,
                    ':xucp_key3'	=>$key3,
                    ':xucp_key4'	=>$key4,
                    ':xucp_key5'	=>$key5,
                    ':xucp_key6'	=>$key6,
                    ':xucp_key7'	=>$key7,
                    ':xucp_key8'	=>$key8,
                    ':xucp_key9'	=>$key9,
                    ':xucp_key10'	=>$key10,
                    ':xucp_key11'	=>$key11,
                    ':xucp_key12'	=>$key12,
                    ':xucp_key13'	=>$key13,
                    ':xucp_key14'	=>$key14,
                    ':xucp_key15'	=>$key15,
                    ':xucp_key16'	=>$key16,
                    ':xucp_key17'	=>$key17,
                    ':xucp_key18'	=>$key18,
                    ':xucp_key19'	=>$key19))){

                    $doneMsg=KEYDONE;
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
										<h4 class='card-title'>".KEY_HEADER."</h4>
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
										<h4 class='card-title'>".KEY_HEADER."</h4>
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
                  <div class='card-header'>
                	<h4 class='mb-0'>".KEY_HEADER."</h4>
					<p class='card-title-desc'>".KEYNOTE."</p>
                  </div>
                  <div class='card-body'>";
                $select_stmt = $db->prepare("SELECT key1, key2, key3, key4, key5, key6, key7, key8, key9, key10, key11, key12, key13, key14, key15, key16, key17, key18, key19 FROM xucp_keys WHERE id = 1");
                $select_stmt->execute();
                $key_set=$select_stmt->fetch(PDO::FETCH_ASSOC);
                if($select_stmt->rowCount() > 0){
					echo"
				<form action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data'>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".KEY1."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key1' size='50' maxlength='256' class='form-control' value='".$key_set["key1"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".KEY2."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key2' size='50' maxlength='256' class='form-control' value='".$key_set["key2"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".KEY3."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key3' size='50' maxlength='256' class='form-control' value='".$key_set["key3"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".KEY4."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key4' size='50' maxlength='256' class='form-control' value='".$key_set["key4"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".KEY5."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key5' size='50' maxlength='256' class='form-control' value='".$key_set["key5"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".KEY6."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key6' size='50' maxlength='256' class='form-control' value='".$key_set["key6"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".KEY7."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key7' size='50' maxlength='256' class='form-control' value='".$key_set["key7"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".KEY8."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key8' size='50' maxlength='256' class='form-control' value='".$key_set["key8"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".KEY9."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key9' size='50' maxlength='256' class='form-control' value='".$key_set["key9"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".KEY10."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key10' size='50' maxlength='256' class='form-control' value='".$key_set["key10"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".KEY11."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key11' size='50' maxlength='256' class='form-control' value='".$key_set["key11"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".KEY12."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key12' size='50' maxlength='256' class='form-control' value='".$key_set["key12"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".KEY13."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key13' size='50' maxlength='256' class='form-control' value='".$key_set["key13"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".KEY14."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key14' size='50' maxlength='256' class='form-control' value='".$key_set["key14"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".KEY15."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key15' size='50' maxlength='256' class='form-control' value='".$key_set["key15"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".KEY16."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key16' size='50' maxlength='256' class='form-control' value='".$key_set["key16"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".KEY17."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key17' size='50' maxlength='256' class='form-control' value='".$key_set["key17"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".KEY18."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key18' size='50' maxlength='256' class='form-control' value='".$key_set["key18"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".KEY19."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='xucp_key19' size='50' maxlength='256' class='form-control' value='".$key_set["key19"]."' required>
							</div>	
						</div>
					</div><br />					  						
					<button type='submit' name='xucp_submit' class='btn btn-primary w-100 waves-effect waves-light'>
						<i class='dripicons-checkmark'></i>&nbsp;".KEYDONEBTN."
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
