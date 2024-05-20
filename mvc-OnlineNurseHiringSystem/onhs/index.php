<?php
require_once __DIR__ . '/controllers/HomeController.php';
require_once __DIR__ . '/controllers/TeamController.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {
    case 'home':
        $controller = new HomeController();
        $controller->index();
        break;
    case 'team':
        $controller = new TeamController();
        $controller->index();
        break;
    // Add more cases as needed for other pages
    default:
        // Default action if no valid page is specified
        $controller = new HomeController();
        $controller->index();
        break;
}
?>
