<?php 
if(!session_status()){
    session_start();
}
// require "src/controller/cart_ctl.php";

ob_start();












$content = ob_get_clean();
require "src/view/template.php";