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
include(dirname(__FILE__) . "/include/features.php");
secure_url();
site_header_nologged(HOME_NOLOGGED);
site_navi_nologged();
site_content_nologged();
echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".HOME_NOLOGGED."</h4>
                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/index.php'>".$_SESSION['xucp_uname']['site_settings_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".HOME_NOLOGGED."</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class='row'>
                        <div class='col-xl-12'>
                            <div class='card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>".HOME_NOLOGGED."</h4>
                                    <p class='card-title-desc'>".WELCOMETO." ".$_SESSION['xucp_uname']['site_settings_site_name']."</p>
                                </div>
                                <div class='card-body'>
									".INDEXTEXT."
                                </div>
                            </div>
                        </div>
                    </div>";			
site_footer();
