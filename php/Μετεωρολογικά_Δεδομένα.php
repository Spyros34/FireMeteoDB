<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/styles_weather_data.css">
</head>

<body>

<div class="header">
  <h1>Μετεωρολογικά Δεδομένα</h1>
</div>


<div class="content">

    <h2>Παρακαλώ συμπληρώστε τα ακόλουθα πεδία:</h2>

    <?php

        // define variables and set to empty values
        $data_date = $data_average_temperature = $data_max_temperature = $data_min_temperature = $data_average_humidity = $data_max_humidity = $data_min_humidity = $data_average_atmospheric_pressure = $data_max_atmospheric_pressure = $data_min_atmospheric_pressure = $data_daily_rainfall = $data_average_wind_speed = $data_wind_direction = $data_maximum_wind_gust = $data_name_weather_station= "" ;
        $data_date_Err = $data_average_temperature_Err = $data_max_temperature_Err = $data_min_temperature_Err = $data_average_humidity_Err = $data_max_humidity_Err = $data_min_humidity_Err = $data_average_atmospheric_pressure_Err = $data_max_atmospheric_pressure_Err = $data_min_atmospheric_pressure_Err = $data_daily_rainfall_Err = $data_average_wind_speed_Err = $data_wind_direction_Err = $data_maximum_wind_gust_Err = $data_name_weather_station_Err = "" ;
        $mid = "";    
        $Err = 0 ;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
           
            if (empty($_POST["data_date"])) {
                $data_date_Err = "Η ημερομηνία απαιτείται";
                $Err = 1 ;
            } else {
                $data_date = $_POST["data_date"];
            }

            if (empty($_POST["data_average_temperature"])) {
                $data_average_temperature_Err = "Η μέση θερμοκρασία απαιτείται";
                $Err = 1 ;
            } else {
                $data_average_temperature = $_POST["data_average_temperature"];
            }

            if (empty($_POST["data_max_temperature"])) {
                $data_max_temperature_Err = "Η μέγιστη θερμοκρασία απαιτείται";
                $Err = 1 ;
            } else {
                $data_max_temperature = $_POST["data_max_temperature"];
            }

            if (empty($_POST["data_min_temperature"])) {
                $data_min_temperature_Err = "Η ελάχιστη θερμοκρασία απαιτείται";
                $Err = 1 ;
            } else {
                $data_min_temperature = $_POST["data_min_temperature"];
            }

            if (empty($_POST["data_average_humidity"])) {
                $data_average_humidity_Err = "Η μέση υγρασία απαιτείται";
                $Err = 1 ;
            } else {
                $data_average_humidity = $_POST["data_average_humidity"];
            }

            if (empty($_POST["data_max_humidity"])) {
                $data_max_humidity_Err = "Η μέγιστη υγρασία απαιτείται";
                $Err = 1 ;
            } else {
                $data_max_humidity = $_POST["data_max_humidity"];
            }

            if (empty($_POST["data_min_humidity"])) {
                $data_min_humidity_Err = "Η ελάχιστη υγρασία απαιτείται";
                $Err = 1 ;
            } else {
                $data_min_humidity = $_POST["data_min_humidity"];
            }
  
            if (empty($_POST["data_average_atmospheric_pressure"])) {
                $data_average_atmospheric_pressure_Err = "Η μέση ατμοσφαιρική πίεση απαιτείται";
                $Err = 1 ;
            } else {
                $data_average_atmospheric_pressure = $_POST["data_average_atmospheric_pressure"];
            }

            if (empty($_POST["data_max_atmospheric_pressure"])) {
                $data_max_atmospheric_pressure_Err = "Η μέγιστη ατμοσφαιρική πίεση απαιτείται";
                $Err = 1 ;
            } else {
                $data_max_atmospheric_pressure = $_POST["data_max_atmospheric_pressure"];
            }

            if (empty($_POST["data_min_atmospheric_pressure"])) {
                $data_min_atmospheric_pressure_Err = "Η ελάχιστη ατμοσφαιρική πίεση απαιτείται";
                $Err = 1 ;
            } else {
                $data_min_atmospheric_pressure = $_POST["data_min_atmospheric_pressure"];
            }

            if (empty($_POST["data_daily_rainfall"])) {
                $data_daily_rainfall_Err = "Η ημερήσια βροχόπτωση απαιτείται";
                $Err = 1 ;
            } else {
                $data_daily_rainfall = $_POST["data_daily_rainfall"];
            }

            if (empty($_POST["data_average_wind_speed"])) {
                $data_average_wind_speed_Err = "Η μέση ταχύτητα του ανέμου απαιτείται";
                $Err = 1 ;
            } else {
                $data_average_wind_speed = $_POST["data_average_wind_speed"];
            }

            if (empty($_POST["data_wind_direction"])) {
                $data_wind_direction_Err = "Η διεύθυνση του ανέμου απαιτείται";
                $Err = 1 ;
            } else {
                $data_wind_direction = $_POST["data_wind_direction"];
            }

            if (empty($_POST["data_maximum_wind_gust"])) {
                $data_maximum_wind_gust_Err = "Η μέγιστη ριπή του ανέμου απαιτείται";
                $Err = 1 ;
            } else {
                $data_maximum_wind_gust = $_POST["data_maximum_wind_gust"];
            }

            if (empty($_POST["data_name_weather_station"])) {
                $data_name_weather_station_Err = "To όνομα του μετεωρολογικού σταθμού απαιτείται";
                $Err = 1 ;
            } else {
                $data_name_weather_station = $_POST["data_name_weather_station"];
            }

            
          
          function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
        }
    ?>

    <p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    Hμερομηνία: <input type="text" name="data_date">
    <span class="error">* <?php echo $data_date_Err;?></span>
    <br><br>
    Μέση θερμοκρασία: <input type="text" name="data_average_temperature">
    <span class="error">* <?php echo $data_average_temperature_Err;?></span>
    <br><br>
    Μέγιστη Θερμοκρασία: <input type="text" name="data_max_temperature">
    <span class="error">* <?php echo $data_max_temperature_Err;?></span>
    <br><br>
    Ελάχιστη Θερμοκρασία: <input type="text" name="data_min_temperature">
    <span class="error">* <?php echo $data_min_temperature_Err;?></span>
    <br><br>
    Μέση υγρασία: <input type="text" name="data_average_humidity">
    <span class="error">* <?php echo $data_average_humidity_Err;?></span>
    <br><br>
    Μέγιστη υγρασία: <input type="text" name="data_max_humidity">
    <span class="error">* <?php echo $data_max_humidity_Err;?></span>
    <br><br>
    Ελάχιστη υγρασία: <input type="text" name="data_min_humidity">
    <span class="error">* <?php echo $data_min_humidity_Err;?></span>
    <br><br>
    Μέση ατμοσφαιρική πίεση: <input type="text" name="data_average_atmospheric_pressure">
    <span class="error">* <?php echo $data_average_atmospheric_pressure_Err;?></span>
    <br><br>
    Μέγιστη ατμοσφαιρική πίεση: <input type="text" name="data_max_atmospheric_pressure">
    <span class="error">* <?php echo $data_max_atmospheric_pressure_Err;?></span>
    <br><br>
    Ελάχιστη ατμοσφαιρική πίεση: <input type="text" name="data_min_atmospheric_pressure">
    <span class="error">* <?php echo $data_min_atmospheric_pressure_Err;?></span>
    <br><br>
    Ημερήσια βροχόπτωση: <input type="text" name="data_daily_rainfall">
    <span class="error">* <?php echo $data_daily_rainfall_Err;?></span>
    <br><br>
    Μέση ταχύτητα του ανέμου: <input type="text" name="data_average_wind_speed">
    <span class="error">* <?php echo $data_average_wind_speed_Err;?></span>
    <br><br>
    Διεύθυνση του ανέμου: <input type="text" name="data_wind_direction">
    <span class="error">* <?php echo $data_wind_direction_Err;?></span>
    <br><br>
    Μέγιστη ριπή του ανέμου: <input type="text" name="data_maximum_wind_gust">
    <span class="error">* <?php echo $data_maximum_wind_gust_Err;?></span>
    <br><br>
    Όνομα του μετεωρολογικού σταθμού για καταγραφή των δεδομένων: <input type="text" name="data_name_weather_station" placeholder="Search..">
    <span class="error">* <?php echo $data_name_weather_station_Err;?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">  
    </form>

    <?php

        if(isset($_POST['submit']) && ($Err == 0 )) {
            // Connecting, selecting database
            $dbconn = pg_connect("host=hostname dbname=db1u33 user=db1u33 password=PQGBWj2C")
            or die('Could not connect: ' . pg_last_error());

            $query = "SELECT sid FROM Μετεωρολογικοί_Σταθμοί WHERE ονομασία = '$data_name_weather_station'; ";
           
            $result = pg_query($dbconn,$query) or die('<script type="text/JavaScript"> 
            alert("Δεν υπάρχει ο Μετεωρολογικός Σταθμός '.$data_name_weather_station.', παρακαλώ εισάγεται πρώτα τον Μετεωρολογικό Σταθμό");
            </script>');
          
            if (($row = pg_fetch_object($result)) == null )
            {
                echo '<script type="text/JavaScript"> 
                alert("Δεν υπάρχει ο Μετεωρολογικός Σταθμός '.$data_name_weather_station.', παρακαλώ εισάγεται πρώτα τον Μετεωρολογικό Σταθμό");
                </script>';


            }else
            {
            
                $sid = $row->sid ;
                

                $insert_query = "INSERT INTO Μετεωρολογικά_Δεδομένα VALUES ('$data_date','$data_average_temperature','$data_max_temperature','$data_min_temperature','$data_average_humidity', '$data_max_humidity', '$data_min_humidity', '$data_average_atmospheric_pressure', '$data_max_atmospheric_pressure', '$data_min_atmospheric_pressure', '$data_daily_rainfall' , '$data_average_wind_speed' , '$data_wind_direction' , '$data_maximum_wind_gust') RETURNING mid; "; 
                $result = pg_query($dbconn,$insert_query) or die('<script type="text/JavaScript"> 
                alert("Υπήρχε κάποιο πρόβλημα κατα την εισαγωγή των δεδομένων στην βάση. Παρακαλώ βεβαιωθείται οτι δεν βάζεται τιμές που υπάρχουν ήδη στην βάση");
                </script>');
                if (($row = pg_fetch_object($result)) == null ) 
                {
                    echo '<script type="text/JavaScript"> 
                    alert("Υπήρχε κάποιο πρόβλημα κατα την εισαγωγή των δεδομένων στην βάση. Παρακαλώ βεβαιωθείται οτι δεν βάζεται τιμές που υπάρχουν ήδη στην βάση");
                    </script>';
                }else{
                    
                    $mid = $row->mid ;
                    
                    $insert_query = "INSERT INTO Καταγραφή VALUES('$sid','$mid'); " ; 
                    $result = pg_query($dbconn,$insert_query) or die('<script type="text/JavaScript"> 
                    alert("Υπήρχε κάποιο πρόβλημα κατα την εισαγωγή των δεδομένων στην βάση. Παρακαλώ βεβαιωθείται οτι δεν βάζεται τιμές που υπάρχουν ήδη στην βάση");
                    </script>');

                    if (($row = pg_fetch_object($result)) != null ) 
                    {   
                        echo '<script type="text/JavaScript"> 
                        alert("Τα μετεωρολογικά δεδομένα καταγράφηκαν με επιτυχία στην στον μετεωρολογικό σταθμό '.$data_name_weather_station.'");
                        </script>';
                    }


                }
                
                

            }


        }
        
    ?>

</div>


</body>

</html>