<!DOCTYPE html>
 
<html>
    <head>
        <title>Shopping Cart</title>
    </head>
	<h1 style="text-align: center"><b>Shopping Cart</b></h1>
    <body>
	<div style="text-align: center">
	    </br>
	    </br>

<?php

require_once('../includes/helpers.php');

if (isset($_POST["action"]))
{

    if (empty($_POST["quantity"]) || (strlen($_POST["quantity"]) > 1)
        || ($_POST["quantity"] == 0))
    {
	$error = true;
    }
    else 
    {
        if(!isset($_SESSION)) {
            session_start();
        }


        // Parent array of all items, initialized if not already...
        if (!isset($_SESSION['items'])) {
            $_SESSION['items'] = array();
        }

	// Get the referring page.
	$url = $_SERVER['HTTP_REFERER'];
        preg_match('/[\w-]+.php/', $url, $match);
        $page = array_shift($match);

	// Get variables to place into $_SESSION['items'].
	$full_description = $_POST["pizza"];
	list($description, $price_per_item) = explode("$", $full_description);
	$quantity = $_POST["quantity"];
	$total_price = $quantity * $price_per_item;

	// Add items to the cart.
        switch ($page)
	{
    	    case 'pizzas.php':
		$_SESSION['items']['pizzas'][$description] 
		    = array('Description' => $description, 
			'Quantity' => $quantity,
			    'Price per Pizza' => $price_per_item, 
			        'Total' => $total_price);

		foreach ($_SESSION['items']['pizzas'] as $pizza) {
		    print $pizza['Description'];
		    print str_repeat('&nbsp;', 20);
		    print "<input type=text name=";
		    print $pizza['Description'];
		    print " maxlength=1 size=1 value=";
		    print $pizza['Quantity'];
		    print ">";
		    print str_repeat('&nbsp;', 5); 
		    print "$" . number_format($pizza['Total'], 2);
		   
		}
                break;
	}
	
        // Add items based on item ID
        $_SESSION['items'][$item] = array('Quantity' => $_POST['quantity'], 'Total' => $total);

    }
}

?>
	    </br>
	    </br>
            <? if ($error): ?>
                <p style="color: red">You must fill out the form 
		    with a valid number of quantitites!</p>
		Go <a href=pizzas.php>back</a>

            <? else: ?>
                The item has been added to the cart!
            <? endif ?>
	    </br>
	    </br>
	    <input type="submit" name="action" value="Change Quantities">
	    <input type="submit" name="action" value="Submit Order">
        </div>
    </body>
</html>
