<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/styles_forest_fires.css">
</head>

<body>

<div class="header">
  <h1>Δασική Πυρκαγιά</h1>
</div>

<div class="content">

    <h2>Παρακαλώ συμπληρώστε τα ακόλουθα πεδία:</h2>

    <?php

        // define variables and set to empty values
        $namePS_Err = $start_time_Err = $start_date_Err = $putting_out_time_Err = $putting_out_date_Err = $air_forces_Err = $vehicles_Err = $staff_Err = $burned_area_Err = $town_name_Err ="";
        $fid = $pid = $namePS = $start_time = $start_date = $putting_out_time = $putting_out_date = $air_forces = $vehicles = $staff = $burned_area = $town_name = "";    
        $Err = 0 ;
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["namePS"])) {
                $namePS_Err = "Tο όνομα του πυροσβεστικού τμήματος που επενέβη απαιτείται";
                $Err = 1 ;
            } else {
                $namePS = $_POST["namePS"];
            }
            
            if (empty($_POST["start_time"])) {
                $start_time_Err = "Η ώρα έναρξης απαιτείται";
                $Err = 1 ;
            } else {
                $start_time = $_POST["start_time"];
            }

            if (empty($_POST["start_date"])) {
                $start_date_Err = "Η ημερομηνία έναρξης απαιτείται";
                $Err = 1 ;
            } else {
                $start_date = $_POST["start_date"];
            }

            if (empty($_POST["putting_out_time"])) {
                $putting_out_time_Err = "Η ώρα κατάσβεσης απαιτείται";
                $Err = 1 ;
            } else {
                $putting_out_time = $_POST["putting_out_time"];
            }

            if (empty($_POST["putting_out_date"])) {
                $putting_out_date_Err = "Η ημερομηνία κατάσβεσης απαιτείται";
                $Err = 1 ;
            } else {
                $putting_out_date = $_POST["putting_out_date"];
            }

            if (empty($_POST["air_forces"])) {
                $air_forces_Err = "Το πλήθος των εναέριων μέσων που χρησιμοποιήθηκαν απαιτείται";
                $Err = 1 ;
            } else {
                $air_forces = $_POST["air_forces"];
            }

            if (empty($_POST["vehicles"])) {
                $vehicles_Err = "Το πλήθος των οχημάτων απαιτείται";
                $Err = 1 ;
            } else {
                $vehicles = $_POST["vehicles"];
            }

            if (empty($_POST["staff"])) {
                $staff_Err = "Το πλήθος του προσωπικού που επενέβη απαιτείται";
                $Err = 1 ;
            } else {
                $staff = $_POST["staff"];
            }

            if (empty($_POST["burned_area"])) {
                $burned_area_Err = "Η καμμένη έκταση απαιτείται";
                $Err = 1 ;
            } else {
                $burned_area = $_POST["burned_area"];
            }

            if (empty($_POST["town_name"])) {
                $town_name_Err = "Το όνομα του Δήμου απαιτείται";
                $Err = 1 ;
            } else {
                $town_name = $_POST["town_name"];
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
    Όνομα του πυροσβεστικού τμήματος που επενέβη: <input type="text" name="namePS">
    <span class="error">* <?php echo $namePS_Err;?></span>
    <br><br>
    Ώρα έναρξης: <input type="text" name="start_time">
    <span class="error">* <?php echo $start_time_Err;?></span>
    <br><br>
    Ημερομηνία έναρξης: <input type="text" name="start_date">
    <span class="error">* <?php echo $start_date_Err;?></span>
    <br><br>
    Ώρα κατάσβεσης: <input type="text" name="putting_out_time">
    <span class="error">* <?php echo $putting_out_time_Err;?></span>
    <br><br>
    Ήμερομηνία κατάσβεσης: <input type="text" name="putting_out_date">
    <span class="error">* <?php echo $putting_out_date_Err;?></span>
    <br><br>
    Πλήθος των εναέριων μέσων που χρησιμοποιήθηκαν: <input type="text" name="air_forces">
    <span class="error">* <?php echo $air_forces_Err;?></span>
    <br><br>
    Πλήθος των οχημάτων: <input type="text" name="vehicles">
    <span class="error">* <?php echo $vehicles_Err;?></span>
    <br><br>
    Πλήθος του προσωπικού που επενέβη: <input type="text" name="staff">
    <span class="error">* <?php echo $staff_Err;?></span>
    <br><br>
    Καμμένη έκταση: <input type="text" name="burned_area">
    <span class="error">* <?php echo $burned_area_Err;?></span>
    <br><br>
    Όνομα Δήμου που εκδηλώθηκε η πυρκαγιά: <input type="text" name="town_name" placeholder="Search..">
    <span class="error">* <?php echo $town_name_Err;?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">  
    </form>

    <?php

        if(isset($_POST['submit']) && ($Err == 0 )) {
            // Connecting, selecting database
            $dbconn = pg_connect("host=hostname dbname=db1u33 user=db1u33 password=PQGBWj2C")
            or die('Could not connect: ' . pg_last_error());

            $query = "SELECT pid FROM Δήμοι WHERE όνομα_δήμου = '$town_name'; ";
            
            $result = pg_query($dbconn,$query) or die('<script type="text/JavaScript"> 
            alert("Δεν υπάρχει ο Δήμος '.$town_name.', παρακαλώ εισάγεται πρώτα τον Δήμο");
            </script>');
            
            if (($row = pg_fetch_object($result)) == null )
            {
                echo '<script type="text/JavaScript"> 
                alert("Δεν υπάρχει ο Δήμος '.$town_name.', παρακαλώ εισάγεται πρώτα τον Δήμο");
                </script>';


            }else
            {
                $pid = $row->pid ;
                

                $insert_query = "INSERT INTO Δασικές_Πυρκαγιές VALUES ('$namePS','$start_time','$start_date','$putting_out_time','$putting_out_date','$air_forces','$vehicles','$staff','$burned_area')RETURNING fid; "; 
                $result = pg_query($dbconn,$insert_query) or die('<script type="text/JavaScript"> 
                alert("Υπήρχε κάποιο πρόβλημα κατα την εισαγωγή των δεδομένων στην βάση. Παρακαλώ βεβαιωθείται οτι δεν βάζεται τιμές που υπάρχουν ήδη στην βάση");
                </script>');
                if (($row = pg_fetch_object($result)) == null ) 
                {
                    echo '<script type="text/JavaScript"> 
                    alert("Υπήρχε κάποιο πρόβλημα κατα την εισαγωγή των δεδομένων στην βάση. Παρακαλώ βεβαιωθείται οτι δεν βάζεται τιμές που υπάρχουν ήδη στην βάση");
                    </script>';
                }else{
                    
                    $fid = $row->fid ;
                    
                    $insert_query = "INSERT INTO Εκδήλωση VALUES('$fid','$pid'); " ; 
                    $result = pg_query($dbconn,$insert_query) or die('<script type="text/JavaScript"> 
                    alert("Υπήρχε κάποιο πρόβλημα κατα την εισαγωγή των δεδομένων στην βάση");
                    </script>');

                    if (($row = pg_fetch_object($result)) != null ) 
                    {   
                        echo '<script type="text/JavaScript"> 
                        alert("Η Δασική Πυρκαγία και η εκδήλωση της στον δήμο '.$town_name.' εισήχθη με επιτυχία στην βάση");
                        </script>';
                    }


                }
                
                

            }


        }
        
    ?>

</div>


</body>

</html>