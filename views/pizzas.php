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
	Quantity:<input type=text name=quantity maxlength=2 value=1 size=1></input>
	<input type="submit" name="action" value="Add to Cart">
    </form>
</div>

<?php
/*
if (isset($_POST["action"]))
{
    if (empty($_POST["pizza"]) || (empty($_POST["small"])
        && empty($_POST["large"])))
    { 
    ?>
	<p style="color: red"; text-align:="center">You must fill out the form completely!</p>
    <?
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
	?>
	The item has been added to the cart! <a href=cart.php>Proceed to Cart</a>
	<?
    }
}
*/
?>
