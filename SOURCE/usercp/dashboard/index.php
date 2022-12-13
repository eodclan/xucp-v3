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

site_header(DASHBOARD);
site_navi_logged();
site_content_logged();

$select_stmt = $db->prepare("SELECT * FROM accounts WHERE `id` = ".$_SESSION['xucp_uname']['secure_first']);
$select_stmt->execute();
$wl_status=$select_stmt->fetch(PDO::FETCH_ASSOC);

if($select_stmt->rowCount() > 0){

    if (htmlentities($wl_status['whitelisted'], ENT_QUOTES, 'UTF-8') == 1) {
        echo "	
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".MYWHITELIST_STATUS."</h4>
                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/usercp/dashboard/index.php'>".$_SESSION['xucp_uname']['site_settings_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".DASHBOARD."</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>";
    } else {
        echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".MYWHITELIST_STATUS_2."</h4>
                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/usercp/dashboard/index.php'>".$_SESSION['xucp_uname']['site_settings_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".DASHBOARD."</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>";
    }
    if(intval($_SESSION['xucp_uname']['secure_staff']) >= UC_CLASS_SUPPORTER) {
        $select_stmt = $db->prepare("SELECT * FROM accounts ORDER by id DESC LIMIT 1");
        $select_stmt->execute();
        $max_users_status=$select_stmt->fetch(PDO::FETCH_ASSOC);

        if($select_stmt->rowCount() > 0){
            echo "
                        <div class='row'>
                            <div class='col-xl-6 col-md-6'>
                                <div class='card card-h-100'>
                                    <div class='card-body'>
                                        <div class='row align-items-center'>
                                            <div class='col-6'>
                                                <span class='text-muted mb-3 lh-1 d-block text-truncate'>".DASHBOARDUSERS."</span>
                                                <h4 class='mb-3'>
                                                    <span class='counter-value' data-target='".htmlentities($max_users_status['id'], ENT_QUOTES, 'UTF-8')."'>".htmlentities($max_users_status['id'], ENT_QUOTES, 'UTF-8')."</span> ".DASHBOARDUSERS."
                                                </h4>
                                            </div>
                                        </div>
										<div class='progress' style='height: 3px'>
											<div class='progress-bar bg-dash-color-1' role='progressbar' style='width: ".htmlentities($max_users_status['id'], ENT_QUOTES, 'UTF-8')."%' aria-valuenow='".htmlentities($max_users_status['id'], ENT_QUOTES, 'UTF-8')."' aria-valuemin='0' aria-valuemax='10000'></div>
										</div>
                                    </div>
                                </div>
                            </div>";
        }

        $select_stmt = $db->prepare("SELECT id FROM xucp_support ORDER by id DESC LIMIT 1");
        $select_stmt->execute();
        $row=$select_stmt->fetch(PDO::FETCH_ASSOC);

        if($select_stmt->rowCount() > 0){
            echo "
                            <div class='col-xl-6 col-md-6'>
                                <div class='card card-h-100'>
                                    <div class='card-body'>
                                        <div class='row align-items-center'>
                                            <div class='col-6'>
                                                <span class='text-muted mb-3 lh-1 d-block text-truncate'>".DASHBOARDSUPPORT."</span>
                                                <h4 class='mb-3'>
                                                    <span class='counter-value' data-target='".htmlentities($row['id'], ENT_QUOTES, 'UTF-8')."'>".htmlentities($row['id'], ENT_QUOTES, 'UTF-8')."</span> ".DASHBOARDSUPPORT."
                                                </h4>
                                            </div>
                                        </div>
										<div class='progress' style='height: 3px'>
											<div class='progress-bar bg-dash-color-1' role='progressbar' style='width: ".htmlentities($row['id'], ENT_QUOTES, 'UTF-8')."%' aria-valuenow='".htmlentities($row['id'], ENT_QUOTES, 'UTF-8')."' aria-valuemin='0' aria-valuemax='10000'></div>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>";
        }
    }
}

$select_stmt = $db->prepare("SELECT * FROM xucp_news");
$select_stmt->execute();
$row=$select_stmt->fetch(PDO::FETCH_ASSOC);

if($select_stmt->rowCount() > 0){
    $title_field = "title";
    $content_field = "content";
    if(isset($_SESSION['xucp_uname']['secure_lang']) && $_SESSION['xucp_uname']['secure_lang'] == 'de'){
        $title_field = "title_de";
        $content_field = "content_de";
    }
    $id = $row['id'];
    $title = $row[$title_field];
    $content = $row[$content_field];
    $short_content = substr($content, 0, 600);

    echo "
                    <div class='row'>
                        <div class='col-xl-12'>
                            <div class='card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>".NEWS."</h4>
                                    <p class='card-title-desc'>".$title."</p>
                                </div>
                                <div class='card-body'>
									".format_comment($short_content)."
                                </div>
                            </div>
                        </div>
                    </div>";
}
site_footer();