<?php

/**
  * Displays items with price in the shopping cart.
  */
function display_contents()
{
    $total = 0;
    $element_name = "element";
    $i = 1;

    // Display items and calculate total.
    foreach ($_SESSION['items'] as $item)
    {
        print "<div class='items'>";
	    print "<div class='description'>";
	        print $item['Description'];
	    print "</div>";
	    print "<div class='input'>";
	        print str_repeat('&nbsp;', 10);
	        print "<input type=text name=";
                    print $element_name . "$i";
		    print " maxlength=1 size=1 value=";
		    print $item['Quantity'];
		    print ">";
	        print "</input>";
	    print "</div>";
	    print "<div class='cost'>";
	    print str_repeat('&nbsp;', 5);
	        print "$" . number_format($item['Total'], 2);
	    print "</div>";
	print "</div>";
	print "</br>";
	print "</br>";
	print "</br>";
	$total = $total + $item['Total'];
	$i++;
    }

    displayTotal($total);
}

/**
  * Displays total.
  */
function displayTotal($cost)
{

    global $total_error;

    print "<div class='total'>";
        print "<div class='total_text'>";
	    print "Total";
	print "</div>";
	print "<div class='total_number'>";
	    print "$" . number_format($cost, 2);
	print "</div>";
    print "</div>";
	    
    if ($cost > 500.00)
	{
	    $total_error = true;
	}
}

/**
 * Recalculates quantities in the shopping cart.
 */
function recalculate()
{
    $total = 0;
    $element_name = "element";
    $i = 1;

    foreach ($_SESSION['items'] as $item)
    {
	$name = $element_name . $i;
	$i++;
	$new_quantity = $_POST[$name];

	if ($new_quantity == 0)
	{
	    unset($_SESSION['items'][$item['Description']]);
	    continue;
	}

	$new_cost = $item['Price'] * $new_quantity;

	if ($item['Quantity'] != $new_quantity)
	{
	    $_SESSION['items'][$item['Description']]['Quantity'] = $new_quantity;
	    $_SESSION['items'][$item['Description']]['Total'] = $new_cost;
	}
    }
}

?>
