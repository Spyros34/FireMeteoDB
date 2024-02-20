<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/styles_township.css">
</head>

<body>

<div class="header">
  <h1>Δήμος</h1>
</div>

<div class="content">

    <h2>Παρακαλώ συμπληρώστε τα ακόλουθα πεδία:</h2>

    <?php

        // define variables and set to empty values
        $name_district_Err = $name_country_Err = $name_town_Err = $longitude_Err = $latitude_Err  = $name_weather_station_Err = "";
        $pid = $sid = $name_district = $name_country = $name_town = $longitude = $latitude = $name_weather_station = "";    
        $Err = 0 ;
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name_district"])) {
                $name_district_Err = "Tο όνομα της περιφέρειας απαιτείται";
                $Err = 1 ;
            } else {
                $name_district = $_POST["name_district"];
            }
            
            if (empty($_POST["name_country"])) {
                $name_country_Err = "Tο όνομα του νομού στα οποία υπάγεται απαιτείται";
                $Err = 1 ;
            } else {
                $name_country = $_POST["name_country"];
            }

            if (empty($_POST["name_town"])) {
                $name_town_Err = "Tο όνομα του δήμου απαιτείται";
                $Err = 1 ;
            } else {
                $name_town = $_POST["name_town"];
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

            

            if (empty($_POST["name_weather_station"])) {
                $name_weather_station_Err = "Το όνομα του μετεωρολογικού σταθμού απαιτείται";
                $Err = 1 ;
            } else {
                $name_weather_station = $_POST["name_weather_station"];
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
    Όνομα της περιφέρειας: <input type="text" name="name_district">
    <span class="error">* <?php echo $name_district_Err;?></span>
    <br><br>
    Όνομα του νομού στα οποία υπάγεται: <input type="text" name="name_country">
    <span class="error">* <?php echo $name_country_Err;?></span>
    <br><br>
    Όνομα του δήμου: <input type="text" name="name_town">
    <span class="error">* <?php echo $name_town_Err;?></span>
    <br><br>
    Γεωγραφικό μήκος: <input type="text" name="longitude">
    <span class="error">* <?php echo $longitude_Err;?></span>
    <br><br>
    Γεωγραφικό πλάτος: <input type="text" name="latitude">
    <span class="error">* <?php echo $latitude_Err;?></span>
    <br><br>
    Όνομα του μετεωρολογικού σταθμού ως σταθμό αναφοράς: <input type="text" name="name_weather_station" placeholder="Search..">
    <span class="error">* <?php echo $name_weather_station_Err;?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">  
    </form>

    <?php

        if(isset($_POST['submit']) && ($Err == 0 )) {
            // Connecting, selecting database
            $dbconn = pg_connect("host=hostname dbname=db1u33 user=db1u33 password=PQGBWj2C")
            or die('Could not connect: ' . pg_last_error());

            $query = "SELECT sid FROM Μετεωρολογικοί_Σταθμοί WHERE ονομασία = '$name_weather_station'; ";
          
            $result = pg_query($dbconn,$query) or die('<script type="text/JavaScript"> 
            alert("Δεν υπάρχει ο Μετεωρολογικός Σταθμός '.$name_weather_station.', παρακαλώ εισάγεται πρώτα τον Μετεωρολογικό Σταθμό");
            </script>');
      
            if (($row = pg_fetch_object($result)) == null )
            {
                echo '<script type="text/JavaScript"> 
                alert("Δεν υπάρχει ο Μετεωρολογικός Σταθμός '.$name_weather_station.', παρακαλώ εισάγεται πρώτα τον Μετεωρολογικό Σταθμό");
                </script>';


            }else
            {
                $sid = $row->sid ;
                

                $insert_query = "INSERT INTO Δήμοι VALUES ('$name_district','$name_country','$name_town','$longitude','$latitude') RETURNING pid; "; 
                $result = pg_query($dbconn,$insert_query) or die('<script type="text/JavaScript"> 
                alert("Υπήρχε κάποιο πρόβλημα κατα την εισαγωγή των δεδομένων στην βάση. Παρακαλώ βεβαιωθείται οτι δεν βάζεται τιμές που υπάρχουν ήδη στην βάση");
                </script>');
                if (($row = pg_fetch_object($result)) == null ) 
                {
                    echo '<script type="text/JavaScript"> 
                    alert("Υπήρχε κάποιο πρόβλημα κατα την εισαγωγή των δεδομένων στην βάση. Παρακαλώ βεβαιωθείται οτι δεν βάζεται τιμές που υπάρχουν ήδη στην βάση");
                    </script>';
                }else{
                    
                    $pid = $row->pid ;
                    
                    $insert_query = "INSERT INTO Σταθμός_Αναφοράς VALUES('$pid','$sid'); " ; 
                    $result = pg_query($dbconn,$insert_query) or die('<script type="text/JavaScript"> 
                    alert("Υπήρχε κάποιο πρόβλημα κατα την εισαγωγή των δεδομένων στην βάση");
                    </script>');

                    if (($row = pg_fetch_object($result)) != null ) 
                    {   
                        echo '<script type="text/JavaScript"> 
                        alert("Ο Δήμος και ο μετεωρολογικός σταθμός '.$name_weather_station.' ως σταθμός αναφοράς σε αυτόν εισήχθη με επιτυχία στην βάση");
                        </script>';
                    }


                }
                
                

            }


        }
        
    ?>

</div>


</body>

</html>