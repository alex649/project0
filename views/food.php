<!--
    Parses the xml file and displays items, sizes, and prices.
-->
<div class='items'>
    <form action="cart.php" method="post">
	</br>
	</br>
	<?php

	    if (isset($_POST["action"]))
	    {
		$name=$_POST["type_of_food"];
	    }

	    $trimmed_name = rtrim($name, "s");

	    print "<p>";
	        print "Please select the type of "; 
		    print $trimmed_name; 
	        print " you would like to order:";
	    print "</p>";

	    print "<select name='item'>";

	    $trimmed_name = rtrim($name, "s");
            $dom = simplexml_load_file("views/menu.xml");

	    $item = "";

            foreach ($dom->xpath("/menu/$name/$trimmed_name") as $food)
            {

		// Check that $food->price is a price. (which indicates
		// that this food has only one size)
		// Display the result.
		if (substr($food->price, 0, 1) == "$")
		{
		    $item = $food->description
			    . " " . $food->price;

		    print "<option value='";
		    print $item;
		    print "'>";
		    print $item;
		    print "</option>";
		}
		else
		{
		    // Loop through each type of size for
		    // each of the items and display the results.
		    foreach ($food->size as $size)
		    {
		        $item = $food->description 
			    . " " . $size->description 
			        . " " . $size->price;

		    print "<option value='";
		    print $item;
		    print "'>";
		    print $item;
		    print "</option>";
		    
		    }
		}
       	    }

	    print "</select>";

	?>
	Quantity:<input type=text name=quantity maxlength=1 value=1 size=1></input>
	<input type="submit" name="action" value="Add to Cart">
    </form>
</div>

