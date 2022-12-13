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
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {        
	header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
	setCookie("PHPSESSID", "", 0x7fffffff,  "/");
  	session_destroy();
	die( header( 'location: /404.php' ) );
}
/**
 * @return void
 */
function site_footer(): void
{
  secure_url();
  echo "
                    </div>
                </div>
                <footer class='footer'>
                    <div class='container-fluid'>
                        <div class='row'>
                            <div class='col-sm-6'>
                                &copy; ".$_SESSION['xucp_uname']['site_settings_site_name'].". All rights reserved.
                            </div>
                            <div class='col-sm-6'>
                                <div class='text-sm-end d-none d-sm-block'>
                                    xUCP Free V3.0.2
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src='/themes/default/assets/libs/jquery/jquery.min.js'></script>
        <script src='/themes/default/assets/libs/bootstrap/js/bootstrap.bundle.min.js'></script>
        <script src='/themes/default/assets/libs/metismenu/metisMenu.min.js'></script>
        <script src='/themes/default/assets/libs/simplebar/simplebar.min.js'></script>
        <script src='/themes/default/assets/libs/node-waves/waves.min.js'></script>
        <script src='/themes/default/assets/libs/feather-icons/feather.min.js'></script>
        <script src='/themes/default/assets/libs/pace-js/pace.min.js'></script>
        <script src='/themes/default/assets/libs/apexcharts/apexcharts.min.js'></script>
        <script src='/themes/default/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script src='/themes/default/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js'></script>
        <script src='/themes/default/assets/js/pages/dashboard.init.js'></script>
        <script src='/themes/default/assets/js/app.js'></script>
        <script src='/themes/default/assets/js/pages/bootstrap-toasts.init.js'></script>
    </body>
</html>";   
}