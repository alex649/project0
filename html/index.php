<?php
ini_set('display_errors', 'On');
require_once('../includes/helpers.php');
 
// determine which page to render
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
else
    $page = 'index';

// show page
switch ($page)
{
    case 'index':
        render('templates/header', array('title' => 'Welcome to the Three Aces Pizza webpage!'));
        render('index');
        render('templates/footer');
        break;
 
    case 'pizzas':
        render('templates/header', array('title' => 'Pizzas'));
        render('pizzas');
        render('templates/footer');
        break;
 
    case 'lecture':
        if (isset($_GET['n']))
        {
            render('templates/header', array('title' => 'Lecture ' . $_GET['n']));
            render('lecture', array('n' => $_GET['n']));
            render('templates/footer');
        }
        break;
}
 
?>
