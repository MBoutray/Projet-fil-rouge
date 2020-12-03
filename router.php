<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && array_key_exists("action", $_POST)) {
    switch ($_POST['action']) {
        case 'value':
            break;
        
        default:
            
            break;
    }
} else if (array_key_exists("page", $_GET)) {
    switch ($_GET["page"]) {
        case 'value':
                
            break;
            
        default:
            
            break;
    }
} else {

}