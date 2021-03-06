<?php

/**
 * Renders the website pages 
 * including those that are redirected from index.php.
 */

ini_set('display_errors', 'On');
require_once('includes/helpers.php');
 
// determine which page to render
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
else {
    $page = 'index';
}


$page = basename($page, ".php");

// show page
switch ($page)
{
    case 'index':
        render('templates/header', array('title' => 'Welcome to the Three Aces Pizza webpage!'));
        render('index');
        render('templates/footer');
        break;
 
    case 'food':
        render('templates/header', array('title' => 'Selection'));
        render('food');
        render('templates/footer');
        break;

    case 'cart':
        render('templates/header', array('title' => 'Shopping Cart'));
        render('cart');
        render('templates/footer');
        break;
}
 
?>
