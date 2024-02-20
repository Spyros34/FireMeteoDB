<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/styles_weather_station.css">
</head>

<body>

<div class="header">
  <h1>Μετεωρολογικός Σταθμός</h1>
</div>

<div class="content">

    <h2>Παρακαλώ συμπληρώστε τα ακόλουθα πεδία:</h2>

    <?php

        // define variables and set to empty values
        $name_Err = $longitude_Err = $latitude_Err  = $altitude_Err = "";
        $data_date = $data_average_temperature = $data_max_temperature = $data_min_temperature = $data_average_humidity = $data_max_humidity = $data_min_humidity = $data_average_atmospheric_pressure = $data_max_atmospheric_pressure = $data_min_atmospheric_pressure = $data_daily_rainfall = $data_average_wind_speed = $data_wind_direction = $data_maximum_wind_gust = "" ;
        $data_date_Err = $data_average_temperature_Err = $data_max_temperature_Err = $data_min_temperature_Err = $data_average_humidity_Err = $data_max_humidity_Err = $data_min_humidity_Err = $data_average_atmospheric_pressure_Err = $data_max_atmospheric_pressure_Err = $data_min_atmospheric_pressure_Err = $data_daily_rainfall_Err = $data_average_wind_speed_Err = $data_wind_direction_Err = $data_maximum_wind_gust_Err = "" ;
        $sid = $mid = $name = $longitude = $latitude = $altitude = "";    
        $Err = 0 ;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
                $name_Err = "Tο όνομα του μετεωρολογικού σταθμού απαιτείται";
                $Err = 1 ;
            } else {
                $name = $_POST["name"];
            }

            if (empty($_POST["longitude"])) {
                $longitude_Err = "Tο γεωγραφικό μήκος απαιτείται";
                $Err = 1 ;
            } else {
                $longitude = $_POST["longitude"];
            }

            if (empty($_POST["latitude"])) {
                $latitude_Err = "Tο γεωγραφικό πλάτος απαιτείται";
                $Err = 1 ;
            } else {
                $latitude = $_POST["latitude"];
            }  

            if (empty($_POST["altitude"])) {
                $altitude_Err = "Το υψόμετρο απαιτείται";
                $Err = 1 ;
            } else {
                $altitude = $_POST["altitude"];
            }
            
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
    Όνομα του μετεωρολογικού σταθμού: <input type="text" name="name">
    <span class="error">* <?php echo $name_Err;?></span>
    <br><br>
    Γεωγραφικό μήκος: <input type="text" name="longitude">
    <span class="error">* <?php echo $longitude_Err;?></span>
    <br><br>
    Γεωγραφικό πλάτος: <input type="text" name="latitude">
    <span class="error">* <?php echo $latitude_Err;?></span>
    <br><br>
    Υψόμετρο: <input type="text" name="altitude" >
    <span class="error">* <?php echo $altitude_Err;?></span>
    <br><br>
    <h3>Παρακαλώ συμπληρώστε τα μετεωρολογικά δεδομένα του μετεωρολογικού σταθμού:</h3>
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
    <input type="submit" name="submit" value="Submit">  
    </form>

    <?php

        if(isset($_POST['submit']) && ($Err == 0 )) {
            // Connecting, selecting database
            $dbconn = pg_connect("host=hostname dbname=db1u33 user=db1u33 password=PQGBWj2C")
            or die('Could not connect: ' . pg_last_error());

            $insert_query = "INSERT INTO Μετεωρολογικοί_Σταθμοί VALUES ('$name','$longitude','$latitude','$altitude') RETURNING sid; "; 
            $result = pg_query($dbconn,$insert_query) or die('<script type="text/JavaScript"> 
            alert("Υπήρχε κάποιο πρόβλημα κατα την εισαγωγή των δεδομένων στην βάση. Παρακαλώ βεβαιωθείται οτι δεν βάζεται τιμές που υπάρχουν ήδη στην βάση");
            </script>');
         
            if (($row = pg_fetch_object($result)) == null ) 
            {
                    echo '<script type="text/JavaScript"> 
                    alert("Υπήρχε κάποιο πρόβλημα κατα την εισαγωγή των δεδομένων στην βάση. Παρακαλώ βεβαιωθείται οτι δεν βάζεται τιμές που υπάρχουν ήδη στην βάση");
                    </script>';
            }else{
            
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
                        alert("Ο Mετεωρολογικός σταθμός και τα δεδομένα του εισήχθησαν με επιτυχία στην βάση.");
                        </script>';
                    }


                }
                
                

            }


        }
        
    ?>

</div>


</body>

</html>