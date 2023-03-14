<?php

require_once('./functions.php');

$data = getData($_GET['cities']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Forecasts</title>
</head>
<body>

    <div class= "container">

            <h2><?php echo ($data['name']." Weather Status") ?></h2>
            <p> <?php echo date("l g:i a",time()) ?> </p>
            <p><?php echo date("jS F, Y",time()); ?></p>
            <p><?php echo "Description : ".$data['weather'][0]['description'] ?></p>
            <img src="https://openweathermap.org/img/w/<?php echo $data['weather'][0]['icon'] ?>.png" class="weather-icon" />
            <p> <?php echo "Temp : ".$data['main']['temp']." C" ?></p>
            <p> <?php echo "Humidity : ".$data['main']['humidity']."%" ?></p>
            <p> <?php echo "Wind : ".$data['wind']['speed']."km/h" ?></p>

        <form action="./index.php">

                <label for="cities">Choose a City:</label>
                <select name="cities">

                    <?php
                    $cities = filterCities('EG'); 
                    foreach($cities as $city){?>
                    <option value="<?php echo($city['name'])?>"><?php echo($city['name']) ?></option>
                    <?php } ?>

                </select>

            <button type="submit">Get Weather</button>

        </form>
    
    </div>
    
</body>
</html>