<div style="text-align: center">
    <form action="cart.php" method="post">
	</br>
	</br>
	<p>Please select the type of pizza you would like to order:</p>
	<select name="pizza">
            <?php

                $dom = simplexml_load_file("../views/menu.xml");
                foreach ($dom->xpath("/menu/pizzas/pizza") as $pizza)
                {
		    foreach ($pizza->size as $size)
		    {			
			$item = $size->description 
			    . " " . $pizza->description 
				. " " . $size->price;
			print "<option value='";
			print $item;
			print "'>";
		        print $item;
		        print "</option>";
		    }
       		}

            ?>
	</select>
	Quantity:<input type=text name=quantity maxlength=1 value=1 size=1></input>
	<input type="submit" name="action" value="Add to Cart">
    </form>
</div>

