<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/styles_show.css">
</head>

<body>

<div class="header">
  <h1>Ερώτημα 4</h1>
</div>

<div class="content">

    <h2>Παρακαλώ επιλέξτε το ερώτημα που θέλετε δείξετε:</h2>


    <div class="btn-group"> 
    <div class="dropdown">
  <button class="dropbtn">Ερώτημα</button>
  <div class="dropdown-content">
    <form method="post">

        
        <input type="submit" name="button1" value="1"/>
        <input type="submit" name="button2" value="2"/>
       
        <div id="box">
        
            <form method="post" id="form">
              <input type="submit" name="button3" value="3" id="btn"/>
              <input type="text" placeholder="Δήμος" name="Δήμος_btn3"/>
            </form>
         </div>

         <div id="box">
        
            <form method="post" id="form">
            <input type="submit" name="button4" value="4" id="btn"/>
              
            </form>
         </div> 
         
         <div id="box">
        
            <form method="post" id="form">
              <input type="submit" name="button5" value="5" id="btn"/>
              <input type="text" placeholder="Χρονιά" name="Χρονιά"/>
            </form>
         </div>

         <div id="box">
        
            <form method="post" id="form">
            <input type="submit" name="button6" value="6" id="btn"/>
              
            </form>
         </div> 

         <div id="box">
        
            <form method="post" id="form">
            <input type="submit" name="button7" value="7" id="btn"/>
              
            </form>
         </div> 
        
         
         <div id="box">
        
            <form method="post" id="form">
              <input type="submit" name="button8" value="8"  id="btn"/>
              <input type="text" placeholder="Μέγιστη Θερμοκρασία" name="max_temp"/>
              <input type="text" placeholder="Μέση Υγρασία" name="avg_hum"/>
              <input type="text" placeholder="Μέγιστη Ριπή Ανέμου" name="max_wind_gust"/>
            </form>
         </div>
         
         <div id="box">
        
            <form method="post" id="form">
            <input type="submit" name="button9" value="9" id="btn"/>
              <input type="text" placeholder="Μετεωρολογικός Σταθμός" name="meteo_station"/>
              <input type="text" placeholder="Απο (ημ)" name="from_date"/>
              <input type="text" placeholder="Εως (ημ)" name="up_to_date"/>
              <input type="text" placeholder="Εκτος Απο (ημ)" name="except_from_date"/>
              <input type="text" placeholder="Εως (ημ)" name="except_up_to_date"/>
            </form>
         </div>

         <div id="box">
        
            <form method="post" id="form">
              <input type="submit" name="button10" value="10" id="btn"/>
              <input type="text" placeholder="Περιφέρεια" name="Δήμος_btn10"/>
              <input type="text" placeholder="Ημερομηνία" name="Ημερομηνία"/>
            </form>
         </div>

         <div id="box">
        
            <form method="post" id="form">
            <input type="submit" name="button11" value="11" id="btn"/>
              
            </form>
         </div> 
         
         

         <div id="box">
        
            <form method="post" id="form">
              <input type="submit" name="button12" value="12" id="btn"/>
              <input type="text" placeholder="Πόλη (Χ)" name="town(Χ)"/>
              <input type="text" placeholder="Πολη (Υ)" name="town(Υ)"/>
            </form>
         </div>
         
         <div id="box">
        
            <form method="post" id="form">
            <input type="submit" name="button13" value="13" id="btn"/>
            <input type="text" placeholder="Θερμοκρασία (Χ)" name="temp(Χ)"/>
            <input type="text" placeholder="Θερμοκρασία (Υ)" name="temp(Υ)"/>
            </form>
        </div>

        <div id="box">
        
            <form method="post" id="form">
            <input type="submit" name="button14" value="14" id="btn"/>
            <input type="text" placeholder="Πλήθος" name="Πλήθος"/>
            </form>
        </div>
        
        <div id="box">
        
            <form method="post" id="form">
            <input type="submit" name="button15" value="15" id="btn"/>
              
            </form>
         </div> 
         
         
    </form>

    
    </div>
</div>

    </div>

    <?php
        
        $name_town = $year = $max_temp = $avg_humidity = $max_wind_gust = $station = $from = $until = $except_from = $except_until = $date = $name_town_btn10 = $city_x = $city_y = $temp_x = $temp_y = $num_btn14 = ""; 

        if(isset($_POST['button1'])) 
        {
            show(1);
        }
        if(isset($_POST['button2'])) 
        {
            show(2);
           
        }
        if(isset($_POST['button3'])) 
        {
            $name_town = $_POST["Δήμος_btn3"];
            show(3);
        }
        if(isset($_POST['button4'])) 
        {
            show(4);
           
        }
        if(isset($_POST['button5'])) 
        {
            $year = $_POST["Χρονιά"];
            show(5);
        }
        if(isset($_POST['button6'])) 
        {
            show(6);
        }
        if(isset($_POST['button7'])) 
        {
            show(7);
        }
        if(isset($_POST['button8'])) 
        {
            $max_temp = $_POST["max_temp"];
            $avg_humidity = $_POST["avg_hum"];
            $max_wind_gust = $_POST["max_wind_gust"];
            show(8);
        }
        if(isset($_POST['button9'])) 
        {
            $station = $_POST["meteo_station"];
            $from = $_POST["from_date"];
            $until = $_POST["up_to_date"];
            $except_from = $_POST["except_from_date"];
            $except_until = $_POST["except_up_to_date"];
            show(9);


        }
        if(isset($_POST['button10'])) 
        {
            $name_town_btn10 = $_POST["Δήμος_btn10"];
            $date = $_POST["Ημερομηνία"];
            show(10);
        }
        if(isset($_POST['button11'])) 
        {
            show(11);
        }
        if(isset($_POST['button12'])) 
        {
            $city_x = $_POST["town(Χ)"];
            $city_y = $_POST["town(Υ)"];
            show(12);
        }
        if(isset($_POST['button13'])) 
        {
            $temp_x = $_POST["temp(Χ)"];
            $temp_y = $_POST["temp(Υ)"];
            show(13);
        }
        if(isset($_POST['button14'])) 
        {
            $num_btn14 = $_POST["Πλήθος"];
            show(14);
        }
        if(isset($_POST['button15'])) 
        {
            show(15);
        }
        


    ?>  
  


    <?php
    function show(int $num) {
        global $name_town , $year , $max_temp , $avg_humidity, $max_wind_gust , $station , $from , $until , $except_from , $except_until , $date , $name_town_btn10 , $city_x , $city_y , $temp_x , $temp_y , $num_btn14 ;

        if ( $num == 1 )
        {
            $query = "SELECT όνομα_περιφέρειας,όνομα_νομού,όνομα_δήμου,γεωγραφικό_μήκος,γεωγραφικό_πλάτος
            FROM Δήμοι
            ORDER BY όνομα_περιφέρειας ASC , όνομα_νομού ASC , όνομα_δήμου ASC;";
            show_first_query($query);

        }else if ( $num == 2)
        {
            $query = "SELECT  s.ονομασία ,MIN(ελάχιστη_θερμοκρασία) AS \"Ελάχιστη θερμοκρασία (min)\",MAX(ελάχιστη_θερμοκρασία) AS \"Ελάχιστη θερμοκρασία (max)\" , MIN(μέγιστη_θερμοκρασία) AS \"Mέγιστη θερμοκρασία (min)\", MAX(μέγιστη_θερμοκρασία)  AS \"Mέγιστη θερμοκρασία (max)\",  MIN(μέγιστη_υγρασία) AS \"Μέγιστη υγρασία (min)\", MAX(μέγιστη_υγρασία) AS \"Μέγιστη υγρασία (max)\", MIN(ελάχιστη_υγρασία) AS \"Ελάχιστη υγρασία (min)\" , MAX(ελάχιστη_υγρασία) AS \"Ελάχιστη υγρασία (max)\", MIN(ημερήσια_βροχοπτωση) AS \"Ημερήσια βροχόπτωση (min)\",MAX(ημερήσια_βροχοπτωση) AS \"Ημερήσια βροχόπτωση (max)\", MIN(μέση_ταχύτητα_ανέμου) AS \"Μέση ταχύτητα ανέμου (min)\" , MAX(μέση_ταχύτητα_ανέμου) AS \"Μέση ταχύτητα ανέμου (max)\" , MIN(μέγιστη_ριπή_ανέμου) AS \"Μέγιστη ριπή ανέμου (min)\", MAX(μέγιστη_ριπή_ανέμου) AS \"Μέγιστη ριπή ανέμου (max)\" FROM Μετεωρολογικοί_Σταθμοί s ,Καταγραφή k ,Μετεωρολογικά_Δεδομένα m WHERE s.sid = k.sid AND m.mid = k.mid GROUP BY ονομασία ; ";
            table($query);

        }else if ( $num == 3)
        {
            $query = "SELECT ονομα_ΠΣ,ώρα_έναρξης,ημερομηνία_έναρξης,ημερομηνία_κατάσβεσης,εναέρια_μέσα,οχήματα,προσωπικό,καμμένη_έκταση
            FROM Εκδήλωση,Δήμοι,Δασικές_Πυρκαγιές
            WHERE Δασικές_Πυρκαγιές.fid = Εκδήλωση.fid
            AND Δήμοι.pid = Εκδήλωση.pid
            AND Δήμοι.όνομα_δήμου='$name_town'
            ORDER BY καμμένη_έκταση DESC;";
            table($query);

        }else if ( $num == 4)
        {
            $query = "SELECT  SUM(καμμένη_έκταση),όνομα_περιφέρειας
            FROM Εκδήλωση,Δήμοι,Δασικές_Πυρκαγιές
            WHERE Δασικές_Πυρκαγιές.fid = Εκδήλωση.fid
            AND Δήμοι.pid = Εκδήλωση.pid
            GROUP BY(καμμένη_έκταση,όνομα_περιφέρειας)
            ORDER BY καμμένη_έκταση DESC;";
            table($query);

        }else if ( $num == 5)
        {
            $query = "SELECT DISTINCT  ονομασία
            FROM Μετεωρολογικοί_Σταθμοί,Καταγραφή,Μετεωρολογικά_Δεδομένα
            WHERE Μετεωρολογικά_Δεδομένα.mid=Καταγραφή.mid
            AND Μετεωρολογικοί_Σταθμοί.sid=Καταγραφή.sid
            AND EXTRACT(YEAR FROM ημερομηνία )= '$year'
            AND (μέση_θερμοκρασία is NULL
            OR μέγιστη_θερμοκρασία is NULL
            OR ελάχιστη_θερμοκρασία is NULL  
            OR μέση_υγρασία is NULL 
            OR μέγιστη_υγρασία is NULL 
            OR ελάχιστη_υγρασία is NULL 
            OR μέση_ατμοσφαιρική_πίεση is NULL 
            OR ελάχιστη_ατμοσφαιρική_πίεση is NULL 
            OR μέγιστη_ατμοσφαιρική_πίεση is NULL 
            OR μέση_ταχύτητα_ανέμου is NULL 
            OR ημερήσια_βροχοπτωση is NULL 
            OR μέγιστη_ριπή_ανέμου is NULL);";
            table($query);
            
        }else if ( $num == 6)
        {
            $query = "SELECT όνομα_περιφέρειας,όνομα_νομού,όνομα_δήμου,COUNT(όνομα_δήμου),SUM(καμμένη_έκταση)
            FROM Δήμοι,Εκδήλωση,Δασικές_Πυρκαγιές
            WHERE Δασικές_Πυρκαγιές.fid = Εκδήλωση.fid
            AND Εκδήλωση.pid=Δήμοι.pid
            GROUP BY(όνομα_περιφέρειας,όνομα_νομού,όνομα_δήμου,καμμένη_έκταση)
            ORDER BY (καμμένη_έκταση)DESC 
            LIMIT 1;";
            table($query);

        }else if ( $num == 7)
        {
            $query = "SELECT όνομα_νομού,εναέρια_μέσα,COUNT(εναέρια_μέσα),ημερομηνία_έναρξης
            FROM Δήμοι,Εκδήλωση,Δασικές_Πυρκαγιές
            WHERE Δασικές_Πυρκαγιές.fid = Εκδήλωση.fid
            AND Εκδήλωση.pid=Δήμοι.pid
            AND ημερομηνία_έναρξης>='2021-06-01'
            AND ημερομηνία_έναρξης<='2021-08-31'
            GROUP BY(όνομα_νομού,εναέρια_μέσα,ημερομηνία_έναρξης)
            HAVING(εναέρια_μέσα>30);";
            table($query);

        }
        else if ( $num == 8)
        {
            $query = "SELECT  ονομασία,ημερομηνία,μέγιστη_θερμοκρασία,μέση_υγρασία,μέγιστη_ριπή_ανέμου
            FROM Μετεωρολογικοί_Σταθμοί,Καταγραφή,Μετεωρολογικά_Δεδομένα
            WHERE Μετεωρολογικά_Δεδομένα.mid=Καταγραφή.mid
            AND Μετεωρολογικοί_Σταθμοί.sid=Καταγραφή.sid
            AND μέγιστη_θερμοκρασία >= '$max_temp'
            AND μέση_υγρασία < '$avg_humidity'
            AND μέγιστη_ριπή_ανέμου >= '$max_wind_gust'
            ORDER BY(ονομασία) ASC;";
            table($query);

        }else if ( $num== 9)
        {
            $query = "(SELECT  ημερομηνία,ονομασία,ελάχιστη_θερμοκρασία, μέγιστη_θερμοκρασία,μέγιστη_υγρασία,ελάχιστη_υγρασία,ημερήσια_βροχοπτωση , μέση_ταχύτητα_ανέμου , μέγιστη_ριπή_ανέμου
            FROM Μετεωρολογικά_Δεδομένα,Μετεωρολογικοί_Σταθμοί,Καταγραφή
            WHERE Μετεωρολογικά_Δεδομένα.mid=Καταγραφή.mid
            AND Μετεωρολογικοί_Σταθμοί.sid=Καταγραφή.sid
            AND ονομασία='$station'
            AND ημερομηνία>='$from')

            INTERSECT

            (SELECT  ημερομηνία,ονομασία,ελάχιστη_θερμοκρασία, μέγιστη_θερμοκρασία,μέγιστη_υγρασία,ελάχιστη_υγρασία,ημερήσια_βροχοπτωση , μέση_ταχύτητα_ανέμου , μέγιστη_ριπή_ανέμου
            FROM Μετεωρολογικά_Δεδομένα,Μετεωρολογικοί_Σταθμοί,Καταγραφή
            WHERE Μετεωρολογικά_Δεδομένα.mid=Καταγραφή.mid
            AND Μετεωρολογικοί_Σταθμοί.sid=Καταγραφή.sid
            AND ονομασία='$station'
            AND ημερομηνία<='$until')

            
            EXCEPT
            
            ((SELECT ημερομηνία, ονομασία,ελάχιστη_θερμοκρασία, μέγιστη_θερμοκρασία,μέγιστη_υγρασία,ελάχιστη_υγρασία,ημερήσια_βροχοπτωση , μέση_ταχύτητα_ανέμου , μέγιστη_ριπή_ανέμου 
            FROM Μετεωρολογικά_Δεδομένα,Μετεωρολογικοί_Σταθμοί,Καταγραφή
            WHERE Μετεωρολογικά_Δεδομένα.mid=Καταγραφή.mid
            AND Μετεωρολογικοί_Σταθμοί.sid=Καταγραφή.sid
            AND ημερομηνία>='$except_from')

            INTERSECT

            (SELECT ημερομηνία, ονομασία,ελάχιστη_θερμοκρασία, μέγιστη_θερμοκρασία,μέγιστη_υγρασία,ελάχιστη_υγρασία,ημερήσια_βροχοπτωση , μέση_ταχύτητα_ανέμου , μέγιστη_ριπή_ανέμου 
            FROM Μετεωρολογικά_Δεδομένα,Μετεωρολογικοί_Σταθμοί,Καταγραφή
            WHERE Μετεωρολογικά_Δεδομένα.mid=Καταγραφή.mid
            AND Μετεωρολογικοί_Σταθμοί.sid=Καταγραφή.sid
            AND ημερομηνία<='$except_until'));";
            
            table($query);

        }else if ( $num== 10)
        {
            $query = "SELECT μέση_υγρασία,μέση_ταχύτητα_ανέμου,διεύθυνση_ανέμου,μέση_θερμοκρασία
            FROM Μετεωρολογικά_Δεδομένα,Καταγραφή,Σταθμός_Αναφοράς,Μετεωρολογικοί_Σταθμοί,Δήμοι
            WHERE Μετεωρολογικά_Δεδομένα.mid=Καταγραφή.mid
            AND  Καταγραφή.sid=Μετεωρολογικοί_Σταθμοί.sid
            AND  Μετεωρολογικοί_Σταθμοί.sid=Σταθμός_Αναφοράς.sid
            AND  Σταθμός_Αναφοράς.pid=Δήμοι.pid
            AND ημερομηνία='$date'
            AND όνομα_περιφέρειας='$name_town_btn10';";
            table($query); 

        }else if ( $num == 11)
        {
            $query = "SELECT όνομα_περιφέρειας,όνομα_νομού,AVG(COALESCE(μέση_υγρασία,0)) AS μέση_υγρ
            FROM Μετεωρολογικά_Δεδομένα,Καταγραφή,Σταθμός_Αναφοράς,Μετεωρολογικοί_Σταθμοί,Δήμοι
            WHERE Μετεωρολογικά_Δεδομένα.mid=Καταγραφή.mid
            AND  Καταγραφή.sid=Μετεωρολογικοί_Σταθμοί.sid
            AND  Μετεωρολογικοί_Σταθμοί.sid=Σταθμός_Αναφοράς.sid
            AND  Σταθμός_Αναφοράς.pid=Δήμοι.pid
            GROUP BY (όνομα_περιφέρειας,όνομα_νομού,μέση_υγρασία)
            ORDER BY (μέση_υγρ) DESC
            LIMIT 5;";
            table($query);

        }else if ( $num == 12)
        {
            $query = "(SELECT ονομα_ΠΣ, ώρα_έναρξης, ημερομηνία_έναρξης, ώρα_κατάσβεσης, ημερομηνία_κατάσβεσης , εναέρια_μέσα , οχήματα, προσωπικό , καμμένη_έκταση
            FROM Δήμοι δημ1,Δασικές_Πυρκαγιές,Εκδήλωση
            WHERE Δασικές_Πυρκαγιές.fid=Εκδήλωση.fid
            AND  Εκδήλωση.pid=δημ1.pid
            AND δημ1.όνομα_δήμου = '$city_x'
            GROUP BY (ονομα_ΠΣ, ώρα_έναρξης, ημερομηνία_έναρξης, ώρα_κατάσβεσης, ημερομηνία_κατάσβεσης , εναέρια_μέσα , οχήματα, προσωπικό , καμμένη_έκταση)
            )
            
            UNION
            
            (SELECT ονομα_ΠΣ, ώρα_έναρξης, ημερομηνία_έναρξης, ώρα_κατάσβεσης, ημερομηνία_κατάσβεσης , εναέρια_μέσα , οχήματα, προσωπικό , καμμένη_έκταση
            FROM Δήμοι δημ1,Δασικές_Πυρκαγιές,Εκδήλωση
            WHERE Δασικές_Πυρκαγιές.fid=Εκδήλωση.fid
            AND  Εκδήλωση.pid=δημ1.pid
            AND δημ1.όνομα_δήμου = '$city_y'
            GROUP BY (ονομα_ΠΣ, ώρα_έναρξης, ημερομηνία_έναρξης, ώρα_κατάσβεσης, ημερομηνία_κατάσβεσης , εναέρια_μέσα , οχήματα, προσωπικό , καμμένη_έκταση)
            )
            
            INTERSECT
            
            (SELECT ονομα_ΠΣ, ώρα_έναρξης, ημερομηνία_έναρξης, ώρα_κατάσβεσης, ημερομηνία_κατάσβεσης , εναέρια_μέσα , οχήματα, προσωπικό , καμμένη_έκταση
            FROM Δήμοι δημ1,Δήμοι δημ2,Δήμοι δημ3, Δασικές_Πυρκαγιές,Εκδήλωση
            WHERE Δασικές_Πυρκαγιές.fid=Εκδήλωση.fid
            AND  Εκδήλωση.pid=δημ1.pid
            AND δημ1.όνομα_δήμου = '$city_x'
            AND δημ2.όνομα_δήμου = '$city_y'
            AND καμμένη_έκταση <= ( (ABS(δημ1.γεωγραφικό_μήκος - δημ2.γεωγραφικό_μήκος) * ABS(δημ1.γεωγραφικό_πλάτος - δημ2.γεωγραφικό_πλάτος) * 1000) ) 
            GROUP BY (ονομα_ΠΣ, ώρα_έναρξης, ημερομηνία_έναρξης, ώρα_κατάσβεσης, ημερομηνία_κατάσβεσης , εναέρια_μέσα , οχήματα, προσωπικό , καμμένη_έκταση)
            )ORDER BY καμμένη_έκταση DESC;";
            table($query);

        }else if ( $num == 13)
        {
            $query = "SELECT όνομα_περιφέρειας
            FROM Δήμοι,Σταθμός_Αναφοράς,Μετεωρολογικοί_Σταθμοί,Καταγραφή,Μετεωρολογικά_Δεδομένα
            WHERE Μετεωρολογικά_Δεδομένα.mid=Καταγραφή.mid
            AND  Καταγραφή.sid=Μετεωρολογικοί_Σταθμοί.sid
            AND  Μετεωρολογικοί_Σταθμοί.sid=Σταθμός_Αναφοράς.sid
            AND  Σταθμός_Αναφοράς.pid=Δήμοι.pid
            AND  μέγιστη_θερμοκρασία>$temp_x
            AND ελάχιστη_θερμοκρασία>$temp_x
            AND μέση_θερμοκρασία>$temp_x 
            INTERSECT
            SELECT όνομα_περιφέρειας
            FROM Δήμοι,Σταθμός_Αναφοράς,Μετεωρολογικοί_Σταθμοί,Καταγραφή,Μετεωρολογικά_Δεδομένα
            WHERE Μετεωρολογικά_Δεδομένα.mid=Καταγραφή.mid
            AND  Καταγραφή.sid=Μετεωρολογικοί_Σταθμοί.sid
            AND  Μετεωρολογικοί_Σταθμοί.sid=Σταθμός_Αναφοράς.sid
            AND  Σταθμός_Αναφοράς.pid=Δήμοι.pid
            AND  μέγιστη_θερμοκρασία<$temp_y
            AND ελάχιστη_θερμοκρασία<$temp_y
            AND μέση_θερμοκρασία<$temp_y ;";
            table($query);

        }else if ( $num == 14)
        {
            $query = "SELECT MAX(καμμένη_έκταση),ημερομηνία_έναρξης,ώρα_έναρξης,όνομα_νομού,όνομα_δήμου,καμμένη_έκταση,μέγιστη_θερμοκρασία,μέση_υγρασία,μέση_ταχύτητα_ανέμου,μέγιστη_ριπή_ανέμου
            FROM Δήμοι,Σταθμός_Αναφοράς,Μετεωρολογικοί_Σταθμοί,Καταγραφή,Μετεωρολογικά_Δεδομένα,Δασικές_Πυρκαγιές,Εκδήλωση
            WHERE Μετεωρολογικά_Δεδομένα.mid=Καταγραφή.mid
            AND  Καταγραφή.sid=Μετεωρολογικοί_Σταθμοί.sid
            AND  Μετεωρολογικοί_Σταθμοί.sid=Σταθμός_Αναφοράς.sid
            AND  Σταθμός_Αναφοράς.pid=Δήμοι.pid
            AND Δασικές_Πυρκαγιές.fid=Εκδήλωση.fid
            AND  Εκδήλωση.pid=Δήμοι.pid
            AND ημερομηνία_κατάσβεσης <= '2020-12-31'
            GROUP BY(καμμένη_έκταση,ημερομηνία_έναρξης,ώρα_έναρξης,όνομα_νομού,όνομα_δήμου,καμμένη_έκταση,μέγιστη_θερμοκρασία,μέση_υγρασία,μέση_ταχύτητα_ανέμου,μέγιστη_ριπή_ανέμου)
            ORDER BY (καμμένη_έκταση) DESC
            LIMIT $num_btn14;";
            table($query);
        }else if ( $num == 15)
        {
            $query = "(SELECT όνομα_νομού,
            MAX(μέγιστη_θερμοκρασία) AS max_temperature,
            MIN(ελάχιστη_θερμοκρασία) AS min_temperature
            FROM Δήμοι, Σταθμός_Αναφοράς, Μετεωρολογικοί_Σταθμοί, Καταγραφή ,Μετεωρολογικά_Δεδομένα
            WHERE Μετεωρολογικά_Δεδομένα.mid = Καταγραφή.mid
            AND Καταγραφή.sid = Μετεωρολογικοί_Σταθμοί.sid
            AND Μετεωρολογικοί_Σταθμοί.sid = Σταθμός_Αναφοράς.sid
            AND Σταθμός_Αναφοράς.pid = Δήμοι.pid
            GROUP BY όνομα_νομού 
            ORDER BY AVG(μέση_θερμοκρασία) DESC
            LIMIT 1)
            UNION
            (SELECT όνομα_νομού,
            MAX(μέγιστη_θερμοκρασία) AS max_temperature,
            MIN(ελάχιστη_θερμοκρασία) AS min_temperature
            FROM Δήμοι, Σταθμός_Αναφοράς, Μετεωρολογικοί_Σταθμοί, Καταγραφή ,Μετεωρολογικά_Δεδομένα
            WHERE Μετεωρολογικά_Δεδομένα.mid = Καταγραφή.mid
            AND Καταγραφή.sid = Μετεωρολογικοί_Σταθμοί.sid
            AND Μετεωρολογικοί_Σταθμοί.sid = Σταθμός_Αναφοράς.sid
            AND Σταθμός_Αναφοράς.pid = Δήμοι.pid
            GROUP BY όνομα_νομού 
            ORDER BY AVG(μέση_θερμοκρασία) ASC
            LIMIT 1);";
            table($query);

        }
        
    }
    ?>

</div>

<?php

    function show_first_query(string $query)
    {
        //connect to the database
        $dbconn = pg_connect("host=hostname dbname=db1u33 user=db1u33 password=PQGBWj2C")    or die('Could not connect: ' . pg_last_error());
        
        $result = pg_exec($dbconn, $query)
        or die("Cannot execute query: $query\n");

        if ($result)
        {
            
            $numrows = pg_numrows($result);

            $i = pg_num_fields($result);



                for ($ri1 = 0; $ri1 < $numrows; $ri1++) {
                    echo "<div>";
                    echo "<p>";
                    $row = pg_fetch_array($result, $ri1);
                    $periferia = $row[0] ; 
                    
                    echo $row[0];
                    echo "</p>";
                    echo "<br>";
                    for ($ri2 = 0; $ri2 < $numrows; $ri2++) {
                        $row = pg_fetch_array($result, $ri2);
                        if ( $row['όνομα_περιφέρειας'] == $periferia )
                        {   
                            $nomos = $row[1] ;
                            echo "<p>";
                            echo "<span class=\"tab\"></span>";
                            echo "  $row[1] ";
                            echo "</p>";
                            echo "<br>";
                            for ($ri3 = 0; $ri3 < $numrows; $ri3++) {
                                $row = pg_fetch_array($result, $ri3);
                                if ( $row['όνομα_περιφέρειας'] == $periferia )
                                {
                                    if ( $row['όνομα_νομού']  == $nomos )
                                    {
                                        
                                        $dimos = $row[2] ;
                                        
                                        echo "<p>";
                                        echo "<span class=\"tab1\"></span>";
                                        echo "     $row[2]";
                                    
                                    
                                        echo ": <span class=\"tab2\"></span> $row[3]";
                                      
                                
                                   
                                        echo ", $row[4]";
                                        echo "</p>";
                                        echo "<br>";
                                        $ri2 = $ri2 + 1 ; 
                                        $ri1 = $ri1 + 1 ; 

                                    }
                                }
                            }   
                            $ri1 = $ri1 + 1 ; 
                        }
                    }
                    echo "</div>";
                }

        }

        
    }

    function table(string $query)
    {
        //connect to the database
        $dbconn = pg_connect("host=hostname dbname=db1u33 user=db1u33 password=PQGBWj2C")    or die('Could not connect: ' . pg_last_error());
        
       
        echo "<table border=\"1\" class=\"tb\">

        <tr>";
        
        $result = pg_exec($dbconn, $query)
        or die("Cannot execute query: $query\n");

        $numrows = pg_numrows($result);

        $i = pg_num_fields($result);

        for ($j = 0; $j < $i; $j++) {

            $fieldname = pg_field_name($result, $j);
            echo "<th>$fieldname</th>";
        }

        echo "</tr>";

        // Loop on rows in the result set.

        for ($ri = 0; $ri < $numrows; $ri++) {
            echo "<tr>\n";
            $row = pg_fetch_array($result, $ri);
            for ($j = 0; $j < $i; $j++) {
                echo "<td>", $row[$j], "</td>";
            }
            echo "</tr>";
        }

        pg_close($dbconn);

        echo "</table>";
        
    }

?>

</body>



</html>