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
    <input type="submit" name="submit" value="Submit">  
    </form>

    <?php

        if(isset($_POST['submit']) && ($Err == 0 )) {
            // Connecting, selecting database
            $dbconn = pg_connect("host=hostname dbname=db1u33 user=db1u33 password=PQGBWj2C")
            or die('Could not connect: ' . pg_last_error());

            $query = "SELECT mid FROM Μετεωρολογικά_Δεδομένα WHERE ημερομηνία = '$data_date';";
           
            $result = pg_query($dbconn,$query) or die('<script type="text/JavaScript"> 
            alert("Δεν έχει γίνει καταγραφή σε μετεωρολογικό σταθμό στην βάση");
            </script>');
            
            if (($row = pg_fetch_object($result)) == null )
            {
                echo '<script type="text/JavaScript"> 
                alert("Δεν έχει γίνει καταγραφή σε μετεωρολογικό σταθμό στην βάση");
                </script>';
                


            }else
            {
                $mid = $row->mid ;
                

                $delete_query = "DELETE FROM Καταγραφή WHERE mid = '$mid';"; 
                $result = pg_query($dbconn,$delete_query) or die('<script type="text/JavaScript"> 
                alert("Υπήρχε κάποιο πρόβλημα κατα την διαγραφή της καταγραφής των δεδομένων.");
                </script>');

                $delete_query = "DELETE FROM Μετεωρολογικά_Δεδομένα WHERE mid = '$mid' ;"; 
                $result = pg_query($dbconn,$delete_query) or die('<script type="text/JavaScript"> 
                alert("Υπήρχε κάποιο πρόβλημα κατα την διαγραφή των Μετεωρολογικών δεδομένων.");
                </script>');

            }    

        }
        
    ?>

</div>


</body>

</html>