<?php
// ************************************************************************************//
// * xUCP Free
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 3.0 Beta 3
// *
// * Copyright (c) 2022 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//
function is_image($src): int
{
    if(@getimagesize($src) !== false) {
        return(1);
    } else {
        return(0);
    }
}
?>