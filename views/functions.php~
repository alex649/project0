<?php

// Display items and total in the cart.
function display_contents()
{
    $total = 0;

    // Display items and calculate total.
    foreach ($_SESSION['items'] as $type_of_food)
    {
	foreach ($type_of_food as $item)
	{ 
            print "<div class='items'>";
	        print "<div class='description'>";
	            print $item['Description'];
	        print "</div>";
	        print "<div class='input'>";
	            print str_repeat('&nbsp;', 10);
	            print "<input type=text name=";
                        print $item['Description'];
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
	    $total = $total + $page['Total'];
	}
    }

    displayTotal($total);
}

// Change quantities and display.
function change_and_display()
{
    $total = 0;

    // Display items and calculate total.
    foreach ($_SESSION['items'] as $items) {
        print "<div class='items'>";
	    print "<div class='description'>";
	        print $page['Description'];
	    print "</div>";
	    print "<div class='input'>";
	        print str_repeat('&nbsp;', 10);
	        print "<input type=text name=";
                    print $page['Description'];
		    print " maxlength=1 size=1 value=";
		    print $page['Quantity'];
		    print ">";
	        print "</input>";
	    print "</div>";
	    print str_repeat('&nbsp;', 5);
	    print "<div class='cost'>";
	        print "$" . number_format($page['Total'], 2);
	    print "</div>";
	print "</div>";
	print "</br>";
	print "</br>";
	$total = $total + $page['Total'];
    }

    displayTotal($total);
}

// Display total.
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

?>
