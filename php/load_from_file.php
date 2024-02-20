<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/styles_load.css">
</head>

<body>

<div class="header">
  <h1>Initialization</h1>
</div>

<div class="content">

    <h2>Παρακαλώ πατήστε το ακόλουθο κουμπί για να αρχικοποιηθεί η βάση από το αρχείο κειμένου:</h2>

    <?php
     
        if(isset($_POST['load'])) {
            


            // Connecting, selecting database
            $dbconn = pg_connect("host=hostname dbname=db1u33 user=db1u33 password=PQGBWj2C")
            or die('Could not connect: ' . pg_last_error());

            $command = '/home/db1u33/public_html/php/load_file.sh';
            $result = shell_exec($command);

            if ( $result == NULL )
            {
                die('<script type="text/JavaScript"> 
                alert("Υπήρχε κάποιο πρόβλημα");
                </script>');

            }else 
            {
                
                echo '<script type="text/JavaScript"> 
                    alert("Η βάση αρχικοποιήθηκε με επιτυχία!");
                    </script>';
            }
            

        }
              
    ?>

    <div class="btn-group">   
    
    <form method="post">
        <input type="submit" name="load" class="load_button"
        value="Initialize"/>
        
    </form>
    </div>


</div>


</body>

</html>