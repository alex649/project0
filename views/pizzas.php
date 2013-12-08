<div style="text-align: center">
    <form action="cart.php" method="post">
	<p>Please select the type of pizza you would like to order:</p>
	</br>
	<!--
	<input type=checkbox value=small>Small:</input>
	<input type=checkbox value=large>Large:</input>
	-->
	<select name="pizza">
            <?php
                $dom = simplexml_load_file("../views/menu.xml");
                foreach ($dom->xpath("/menu/pizzas/pizza") as $pizza)
                {

		    print "<option value=";
		        $pizza->description; 
		    print ">";
		    print $pizza->description;
		    print "</option>";

       		}
            ?>
	</select>
	Small:<input type=checkbox value=small></input>
	Large:<input type=checkbox value=large></input>
	<input type="submit" value="Add to Cart">
    </form>
</div>


