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

site_header(NEWS_HEADER);
site_navi_logged();
site_content_logged();

echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".NEWS_HEADER."</h4>
                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/staffcp/news/index.php'>".$_SESSION['username']['site_settings_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".NEWS_HEADER."</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>";

if(isset($_REQUEST['xucp_submit']))
{
    $title_config_uid 	= 1;
    $title = strip_tags($_REQUEST['xucp_title']);
    $title_de 	= strip_tags($_REQUEST['xucp_title_de']);
    $title_content 	= strip_tags($_REQUEST['xucp_content']);
    $title_content_de 	= strip_tags($_REQUEST['xucp_content_de']);

    if(empty($title)){
        $errorMsg[]=MSG_19;
    }
    else if(empty($title_de)){
        $errorMsg[]=MSG_19;
    }
    else if(empty($title_content)){
        $errorMsg[]=MSG_20;
    }
    else if(empty($title_content_de)){
        $errorMsg[]=MSG_20;
    }
    else
    {
        try
        {
            if(!isset($errorMsg))
            {
                $insert_stmt=$db->prepare("UPDATE `xucp_news` SET `title` = :xucp_title, `title_de` = :xucp_title_de, `content` = :xucp_content, `content_de` = :xucp_content_de WHERE `id` = ".$title_config_uid);

                if($insert_stmt->execute(array(	':xucp_title'	=>$title,
                    ':xucp_title_de'=>$title_de,
                    ':xucp_content'=>$title_content,
                    ':xucp_content_de'=>$title_content_de))){

                    $doneMsg=MSG_21;
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
										<h4 class='card-title'>".NEWS_HEADER."</h4>
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
										<h4 class='card-title'>".NEWS_HEADER."</h4>
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
                                    <h4 class='card-title'>".NEWS_HEADER."</h4>
									<p class='card-title-desc'>".NEWS_INFO."</p>
                                </div>
                                <div class='card-body'>";
                $select_stmt = $db->prepare("SELECT title, title_de, content, content_de FROM xucp_news WHERE id = 1");
                $select_stmt->execute();
                $news_set=$select_stmt->fetch(PDO::FETCH_ASSOC);
                if($select_stmt->rowCount() > 0){
					echo "
					<form action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data'>
                      <tr>				  
                        <td>
							<h6>
								".NEWS_TITLE_EN."
								<small class='text-muted'>".NEWS_TITLE_EN_TEXT."</small>
							</h6>
							<div class='input-group'>
								<input type='text' name='xucp_title' size='50' maxlength='100' class='form-control' value='".$news_set["title"]."' required>
							</div>	
                        </td>
					  </tr>
                      <tr>				  
                        <td>
							<h6>
								".NEWS_TITLE_DE."
								<small class='text-muted'>".NEWS_TITLE_DE_TEXT."</small>
							</h6>
							<div class='input-group'>
								<input type='text' name='xucp_title_de' size='50' maxlength='100' class='form-control' value='".$news_set["title_de"]."' required>
							</div>	
                        </td>
					  </tr>
                      <tr>					  
                        <td>
							<h6>
								".NEWS_CONTENT_EN."
								<small class='text-muted'>".NEWS_CONTENT_EN_TEXT."</small>
							</h6>
							<div class='input-group'>";
								textbbcode('xucp_content', htmlspecialchars(stripslashes($news_set['content'])));
							echo"
							</div>	
                        </td>						
                      </tr>
                      <tr>					  
                        <td>
							<h6>
								".NEWS_CONTENT_DE."
								<small class='text-muted'>".NEWS_CONTENT_DE_TEXT."</small>
							</h6>
							<div class='input-group'>";
								textbbcode('xucp_content_de', htmlspecialchars(stripslashes($news_set['content_de'])));
							echo"
							</div>	
                        </td>						
                      </tr>                      					  
                      <tr>					  
						<td>
							<br>
							<button type='submit' name='xucp_submit' class='btn btn-primary btn-round'>
								<i class='dripicons-checkmark'></i>&nbsp;".NEWS_SAVE."
							</button>
							</submit>
                        </td>							
                      </tr>						
					</form>";

				}
echo "					
                                </div>
                            </div>
                        </div>
                    </div>";
site_footer();
