<?php
session_start();
require_once 'models/db.php';
require_once 'models/OwnerModel.php';
require_once 'controllers/OwnerController.php';


if (!isset($_SESSION['owner_id'])) {
    $_SESSION['owner_id'] = 'po1'; 
    $_SESSION['owner_name'] = 'Nijhum';
}

$controller = new OwnerController($conn);
$action = $_GET['action'] ?? 'dashboard';

switch ($action) {
    case 'dashboard': $controller->dashboard(); break;
    
    
    case 'edit_profile': $controller->editProfile(); break;
    case 'update_profile_submit': $controller->updateProfileSubmit(); break; // New POST route
  

    case 'add_property': $controller->addProperty(); break;
    case 'store_property': $controller->storeProperty(); break;
    case 'my_properties': $controller->myProperties(); break;
    
  
    case 'edit_property': $controller->editProperty(); break;
    case 'update_property_submit': $controller->updatePropertySubmit(); break;
    

    case 'delete_property': $controller->deleteProperty(); break;
    case 'booking_requests': $controller->bookingRequests(); break;
    case 'history': $controller->history(); break;
    default: $controller->dashboard(); break;
}
?>