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
function sitehash($var,$addtext="",$addsecure="02fb9ff482dfb6d9baf1a56b6d1f17zufr67r45403f643eeb1204b3012391f8ee63bfe4f4e"): string
{
    return hash('sha512','This xUCP Free V3 ".$addtext.$var.$addtext."".$addsecure." is the new user control panel system for all roleplay projects!');
}
