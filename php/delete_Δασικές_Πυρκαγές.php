<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/styles_delete_forest_fires.css">
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
            

            if (empty($_POST["start_date"])) {
                $start_date_Err = "Η ημερομηνία έναρξης απαιτείται";
                $Err = 1 ;
            } else {
                $start_date = $_POST["start_date"];
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
    Ημερομηνία έναρξης: <input type="text" name="start_date">
    <span class="error">* <?php echo $start_date_Err;?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">  
    </form>

    <?php

        if(isset($_POST['submit']) && ($Err == 0 )) {
            // Connecting, selecting database
            $dbconn = pg_connect("host=hostname dbname=db1u33 user=db1u33 password=PQGBWj2C")
            or die('Could not connect: ' . pg_last_error());

            $query = "SELECT fid FROM Δασικές_Πυρκαγιές WHERE ονομα_ΠΣ = '$namePS' AND ημερομηνία_έναρξης = '$start_date';";
            
            $result = pg_query($dbconn,$query) or die('<script type="text/JavaScript"> 
            alert("Δεν υπάρχει εκδήλωση της Δασικής Πυρκαγιάς στην βάση");
            </script>');
         
            if (($row = pg_fetch_object($result)) == null )
            {
                echo '<script type="text/JavaScript"> 
                alert("Δεν υπάρχει εκδήλωση της Δασικής Πυρκαγιάς στην βάση");
                </script>';


            }else
            {
                $fid = $row->fid ;
                

                $delete_query = "DELETE FROM Εκδήλωση WHERE fid = '$fid' ;"; 
                $result = pg_query($dbconn,$delete_query) or die('<script type="text/JavaScript"> 
                alert("Υπήρχε κάποιο πρόβλημα κατα την διαγραφή της εκδήλωσης στον δήμο.");
                </script>');
                

                $query = "DELETE FROM Δασικές_Πυρκαγιές WHERE ονομα_ΠΣ = '$namePS' AND ημερομηνία_έναρξης = '$start_date';";
             
                $result = pg_query($dbconn,$query) or die('<script type="text/JavaScript"> 
                alert("Δεν υπάρχει η Δασική Πυρκαγιά στην βάση");
                </script>');
             
                
                echo '<script type="text/JavaScript"> 
                alert("Η Δασική Πυρκαγία και η εκδήλωση της στον δήμο διαγράφθηκαν με επιτυχία απο την βάση");
                </script>';
                

                  
                
                

            }


        }
        
    ?>

</div>


</body>

</html>