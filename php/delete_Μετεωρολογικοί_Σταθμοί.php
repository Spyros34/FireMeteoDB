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
    <input type="submit" name="submit" value="Submit">  
    </form>

    <?php

        if(isset($_POST['submit']) && ($Err == 0 )) {
            // Connecting, selecting database
            $dbconn = pg_connect("host=hostname dbname=db1u33 user=db1u33 password=PQGBWj2C")
            or die('Could not connect: ' . pg_last_error());

            $query = "SELECT sid FROM Μετεωρολογικοί_Σταθμοί WHERE ονομασία = '$name';";
            
            $result = pg_query($dbconn,$query) or die('<script type="text/JavaScript"> 
            alert("Δεν υπάρχει ο μετεωρολογικός σταθμός στην βάση");
            </script>');
            
            if (($row = pg_fetch_object($result)) == null )
            {
                echo '<script type="text/JavaScript"> 
                alert("Δεν υπάρχει ο μετεωρολογικός σταθμός στην βάση");
                </script>';
                


            }else
            {
                $sid = $row->sid ;
                

                $query = "SELECT mid FROM Καταγραφή WHERE sid = '$sid' ;";
               
                $result = pg_query($dbconn,$query) or die('<script type="text/JavaScript"> 
                alert("Δεν υπάρχει ο μετεωρολογικός σταθμός στην βάση");
                </script>');
                

                $delete_query = "DELETE FROM Καταγραφή WHERE sid = '$sid' RETURNING mid;"; 
                $result = pg_query($dbconn,$delete_query) or die('<script type="text/JavaScript"> 
                alert("Υπήρχε κάποιο πρόβλημα κατα την διαγραφή της καταγραφής των δεδομένων.");
                </script>');

                while (($row = pg_fetch_object($result)) != null )
                {
                    $mid = $row->mid ;

                    $delete_query = "DELETE FROM Μετεωρολογικά_Δεδομένα WHERE mid = '$mid' ;"; 
                    $result = pg_query($dbconn,$delete_query) or die('<script type="text/JavaScript"> 
                    alert("Υπήρχε κάποιο πρόβλημα κατα την διαγραφή των Μετεωρολογικών δεδομένων.");
                    </script>');

                }

                $query = "DELETE FROM Μετεωρολογικοί_Σταθμοί WHERE ονομασία = '$name';";
            
                $result = pg_query($dbconn,$query) or die('<script type="text/JavaScript"> 
                alert("Δεν υπάρχει ο Μετεωρολογικός σταθμός στην βάση");
                </script>');
              

    
                echo '<script type="text/JavaScript"> 
                alert("Ο Μετεωρολογικός σταθμός και τα μετεωρολογικά του δεδομένα διαγράφθηκαν με επιτυχία απο την βάση");
                </script>';
                


            }


        }
        
    ?>

</div>


</body>

</html>