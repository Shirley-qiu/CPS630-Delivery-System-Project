<?php
 include 'header.php';

define("API_KEY", "AIzaSyCkdyai5-p_kXTroX-gSz_mz-xeQ8Ht1iY");
?>
<html>
<head>
<style>
#map-layer {
    max-width: 900px;
    min-height: 550px;
}
.lbl-locations {
    font-weight: bold;
    margin-bottom: 15px;
}
.locations-option {
    display:inline-block;
    margin-right: 15px;
}
.btn-draw {
    background: green;
    color: #ffffff;
}
</style>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
</head>
<body>
    

<div>
        <input type="radio" name="travel_mode" class="travel_mode" value="WALKING"> WALKING

        <input type="radio" name="travel_mode" class="travel_mode" value="DRIVING" checked> DRIVING
    </div>
    <div>&nbsp;</div>
    <div class="lbl-locations">Way Points</div>
    <div>
        
    
      <div class="locations-option"><input type="text" id="origin" name="way_start" class="way_points" placeholder="Start from" value="<?php echo $_SESSION["src"];?>"> </div>
      <br>
       <br>
      
   <div class="locations-option"><input type="text" id="destination" name="way_end" class="way_points" placeholder="Destination" value="<?php echo $_SESSION["des"];?>"> </div>
    <input type="button" id="drawPath" value="Draw Path" class="btn-draw" />
     <br>
      <br>
    </div>
    
    <div id="map-layer"></div>
    <script>
      	var map;
      	var waypoints;
      	function initMap() {
        	  	var mapLayer = document.getElementById("map-layer"); 
            	var centerCoordinates = new google.maps.LatLng(0.0, 0.0);
        		var defaultOptions = { center: centerCoordinates, zoom: 1 }
        		map = new google.maps.Map(mapLayer, defaultOptions);
	
            var directionsService = new google.maps.DirectionsService;
            var directionsDisplay = new google.maps.DirectionsRenderer;
            directionsDisplay.setMap(map);

            $("#drawPath").on("click",function() {
                    var start =$("#origin").val();
                    var end = $("#destination").val();
                    drawPath(directionsService, directionsDisplay,start,end);
              
            });
            
      	}
        	function drawPath(directionsService, directionsDisplay,start,end) {
            directionsService.route({
              origin: start,
              destination: end,
              optimizeWaypoints: true,
              travelMode: $("input[name='travel_mode']:checked"). val()
            }, function(response, status) {
                if (status === 'OK') {
                directionsDisplay.setDirections(response);
                } else {
                window.alert('Problem in showing direction due to ' + status);
                }
            });
      }
	</script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=<?php echo API_KEY; ?>&callback=initMap">
    </script>
</body>
</html>