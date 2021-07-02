<?php  include 'header.php';

if( $_SESSION["loggedin"] == false){
  header("Location: login.php");
  exit;
}
?>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="jquery-ui-1.9.0.custom.min.js"></script>





    <div class="container">

    <section id="product" class="product">
    <ul class="clear">

    <?php


include 'db.php';


$sql = "SELECT * FROM CARS";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>



            <li data-id="<?php echo $row["car_id"] ?>">
                <a href="#">
                    <img src="img/<?php echo $row["img"] ?>" alt="" height="90px" width="175px">
                    <h3><?php echo $row["model"] ?></h3>
                    <p><?php echo $row["price"] ?> $</p>
                </a>
            </li>


        <?php


}
} else {
  echo "0 results";
}
$conn->close();
?>

</ul>

  </section>




</div>


<script>
    $(function () {

		// jQuery UI Draggable
		$("#product li").draggable({

			// brings the item back to its place when dragging is over
			revert:true,

			// once the dragging starts, we decrease the opactiy of other items
			// Appending a class as we do that with CSS
			drag:function () {
				$(this).addClass("active");
				$(this).closest("#product").addClass("active");
			},

			// removing the CSS classes once dragging is over.
			stop:function () {
				$(this).removeClass("active").closest("#product").removeClass("active");
			}

		});

        // jQuery Ui Droppable
		$(".basket").droppable({

			// The class that will be appended to the to-be-dropped-element (basket)
			activeClass:"active",

			// The class that will be appended once we are hovering the to-be-dropped-element (basket)
			hoverClass:"hover",

			// The acceptance of the item once it touches the to-be-dropped-element basket
			// For different values http://api.jqueryui.com/droppable/#option-tolerance
			tolerance:"touch",
			drop:function (event, ui) {

				var basket = $(this),
						move = ui.draggable,
						itemId = basket.find("ul li[data-id='" + move.attr("data-id") + "']");

				// To increase the value by +1 if the same item is already in the basket
				if (itemId.html() != null) {
					itemId.find("input").val(parseInt(itemId.find("input").val()) + 1);
				}
				else {
					// Add the dragged item to the basket
					addBasket(basket, move);

					// Updating the quantity by +1" rather than adding it to the basket
					move.find("input").val(parseInt(move.find("input").val()) + 1);
				}
			}

		});

        // This function runs onc ean item is added to the basket
        function addBasket(basket, move) {
			basket.find("ul").append('<li data-id="' + move.attr("data-id") + '">'
					+ '<span class="name">' + move.find("h3").html() + '</span>'
					+ '<input class="count" value="1" type="text">'
                    + '<input class="id" value="' + move.attr("data-id") + '" type="text" name="id">'


					+ '<button class="delete">&#10005;</button>');

                    $('#ss').css('display', '')


		}


        // The function that is triggered once delete button is pressed
        $(".basket ul li button.delete").live("click", function () {
			$(this).closest("li").remove();
            $('#ss').css('display', 'none')


		});

    });
</script>




</body>
</html>
