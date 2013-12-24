<!DOCTYPE html>
 
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../views/cart.css">
        <title>Shopping Cart</title>
    </head>
	<h1 style="text-align: center"><b>Shopping Cart</b></h1>
    <body>
	<div class='cart'>
	    <form action="cart.php" method="post">
	        </br>
	        </br>

<?php

require_once('../includes/helpers.php');
require_once('../views/functions.php');

$total_error = false;

if (isset($_POST["change"]))
{
    //change_and_display();
}
elseif (isset($_POST["submit"]))
{
    $submit = true;
}
elseif (isset($_POST["action"]))
{

    if (empty($_POST["quantity"]) || (strlen($_POST["quantity"]) > 1)
        || ($_POST["quantity"] < 1))
    {
        $error = true;
    }
    else {

        if(!isset($_SESSION)) {
            session_start();
        }

        // Parent array of all items, initialized if not already...
        if (!isset($_SESSION['items'])) {
            $_SESSION['items'] = array();
        }

        // Get the referring page.
        $url = $_SERVER['HTTP_REFERER'];
        $referring_page = basename($url, ".php");

        // Get variables to place into $_SESSION['items'].
        $referring_element = rtrim($referring_page, "s");
        $full_description = $_POST[$referring_element];
        list($description, $price_per_item) = explode("$", $full_description);
        $quantity = $_POST["quantity"];
        $total_price = $quantity * $price_per_item;

        // Fill $_SESSION.
        $_SESSION['items'][$referring_page][$description] 
	    = array('Description' => $description, 
	        'Quantity' => $quantity,
	            'Price per Pizza' => $price_per_item, 
		        'Total' => $total_price);

        display_contents();
    }
}

?>
	        </br>
	        </br>
                <? if ($error): ?>
                    <p style="color: red">You must fill out the form 
		        with a valid number of quantitites!</p>
		    <?
			// Get the referring page.
    			$url = $_SERVER['HTTP_REFERER'];
    			$referring_page = basename($url, ".php");

		        print "Go ";
		        print "<a href="; 
			    print $referring_page . ".php";
			print ">back</a>";
		        break;
		    ?>
	        <? elseif ($total_error): ?>
		    <p style="color: red">The total cost for online orders 
		        cannot acceed $500.  Please change quantities.</p>
	        <? elseif ($submit): ?>
		    <p>Thank you for your order!</p>
		    <? 
			/* send_confirmation_email(); */
 
			// Unset all of the session variables.
                        $_SESSION = array();

			// Delete the session cookie.
			if (ini_get("session.use_cookies")) {
    			    $params = session_get_cookie_params();
    			    setcookie(session_name(), '', time() - 42000,
        		        $params["path"], $params["domain"],
        		        $params["secure"], $params["httponly"]
			    );
			}

			// Destroy the session.
			session_destroy(); 

			break; ?>
                <? else: ?>
                    <p>The item has been added to the cart!</p>
                <? endif ?>
	        </br>
	        </br>
	        <input type="submit" name="change" value="Change Quantities"/>
	        <input type="submit" name="submit" value="Submit Order"/>
	    </form>
	</div>
    </body>
</html>
