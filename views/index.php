<!--
    Displays drop-down menu of items to be ordered.
-->
<div class='index'>
    <form action="food.php" method="post">
        <p>Please choose the type of food you would like to order from the
            list of items listed below:</p>
        <select name="type_of_food">
            <option value="pizzas">Pizzas</option>
	    <option value="salads">Salads</option>
	    <option value="grinders">Grinders</option>
	    <option value="side_orders">Side Orders</option>
	    <option value="pastas">Pasta</option>
	    <option value="dinners">Special Dinners</option>
	    <option value="calzones">Calzones</option>
	    <option value="wraps">Wraps</option>
        </select>
	<input type="submit" name="action" value="Choose">
    </form>
</div>


