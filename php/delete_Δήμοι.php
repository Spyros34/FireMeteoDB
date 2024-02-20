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

            if (empty($_POST["name_town"])) {
                $name_town_Err = "Tο όνομα του δήμου απαιτείται";
                $Err = 1 ;
            } else {
                $name_town = $_POST["name_town"];
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
    Όνομα του δήμου: <input type="text" name="name_town">
    <span class="error">* <?php echo $name_town_Err;?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">  
    </form>

    <?php

        if(isset($_POST['submit']) && ($Err == 0 )) {
            // Connecting, selecting database
            $dbconn = pg_connect("host=hostname dbname=db1u33 user=db1u33 password=PQGBWj2C")
            or die('Could not connect: ' . pg_last_error());

            $query = "SELECT pid FROM Δήμοι WHERE όνομα_δήμου = '$name_town';";
           
            $result = pg_query($dbconn,$query) or die('<script type="text/JavaScript"> 
            alert("Δεν υπάρχει ο Δήμος στην βάση");
            </script>');
            
            if (($row = pg_fetch_object($result)) == null )
            {
                echo '<script type="text/JavaScript"> 
                alert("Δεν υπάρχει ο Δήμος στην βάση");
                </script>';
                


            }else
            {
                $pid = $row->pid ;
                

                $delete_query = "DELETE FROM Σταθμός_Αναφοράς WHERE pid = '$pid' ;"; 
                $result = pg_query($dbconn,$delete_query) or die('<script type="text/JavaScript"> 
                alert("Υπήρχε κάποιο πρόβλημα κατα την διαγραφή του σταθμού αναφοράς.");
                </script>');
                

                $query = "DELETE FROM Δήμοι WHERE όνομα_δήμου = '$name_town';";
                
                $result = pg_query($dbconn,$query) or die('<script type="text/JavaScript"> 
                alert("Δεν υπάρχει ο Δήμος στην βάση");
                </script>');
               
                
                echo '<script type="text/JavaScript"> 
                alert("Ο δήμος και ο σταθμός αναφοράς του διαγράφθηκαν με επιτυχία απο την βάση");
                </script>';
                


            }


        }
        
    ?>

</div>


</body>

</html>