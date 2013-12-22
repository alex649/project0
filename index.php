<?php
ini_set('display_errors', 'On');
require_once('includes/helpers.php');
 
// determine which page to render
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
else {
    $page = 'index';
}

// show page
switch ($page)
{
    case 'index':
        render('templates/header', array('title' => 'Welcome to the Three Aces Pizza webpage!'));
        render('index');
        render('templates/footer');
        break;
 
    case 'pizzas':
        render('views/templates/header', array('title' => 'Pizzas'));
        render('views/pizzas');
        render('views/templates/footer');
        break;
 
    case 'cart':
        render('views/templates/header', array('title' => 'Shopping Cart'));
        render('views/cart');
        render('views/templates/footer');
        break;
}
 
?>