<?php 
// ************************************************************************************//
// * xUCP Free
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 3.0 alpha
// * 
// * Copyright (c) 2022 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//
// * Session Site Settings System
// ************************************************************************************//

$select_stmt = $db->prepare("SELECT site_dl_section, site_rage_section, site_altv_section, site_fivem_section, site_redm_section, site_online, site_name, site_themes, site_teamspeak, site_gserverport, site_gserverip, site_gservername, site_upgrade_note from xucp_config WHERE id=1");
$select_stmt->execute();
$row=$select_stmt->fetch(PDO::FETCH_ASSOC);

if($select_stmt->rowCount() > 0){
    $_SESSION['username']['site_settings_site_online'] = htmlentities($row["site_online"]);
    $_SESSION['username']['site_settings_site_name'] = htmlentities($row["site_name"]);
    $_SESSION['username']['site_settings_themes'] = htmlentities($row["site_themes"]);
    $_SESSION['username']['site_settings_dl_section'] = htmlentities($row["site_dl_section"]);
    $_SESSION['username']['site_settings_dl_section_ragemp'] = htmlentities($row["site_rage_section"]);
    $_SESSION['username']['site_settings_dl_section_altv'] = htmlentities($row["site_altv_section"]);
    $_SESSION['username']['site_settings_dl_section_fivem'] = htmlentities($row["site_fivem_section"]);
    $_SESSION['username']['site_settings_dl_section_redm'] = htmlentities($row["site_redm_section"]);
    $_SESSION['username']['site_settings_teamspeak'] = htmlentities($row["site_teamspeak"]);
    $_SESSION['username']['site_settings_gserverport'] = htmlentities($row["site_gserverport"]);
    $_SESSION['username']['site_settings_gserverip'] = htmlentities($row["site_gserverip"]);
    $_SESSION['username']['site_settings_gservername'] = htmlentities($row["site_gservername"]);
    $_SESSION['username']['site_settings_upgrade_note'] = htmlentities($row["site_upgrade_note"]);
}
?>