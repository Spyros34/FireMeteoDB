<?php
$query = "SELECT όνομα_περιφέρειας,όνομα_νομού,όνομα_δήμου,γεωγραφικό_μήκος,γεωγραφικό_πλάτος
            FROM Δήμοι
            ORDER BY όνομα_περιφέρειας ASC , όνομα_νομού ASC , όνομα_δήμου ASC;";
            show_first_query($query);

?>
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


                echo "\n\n";
                for ($ri1 = 0; $ri1 < $numrows; $ri1++) {
                   
                    $row = pg_fetch_array($result, $ri1);
                    $periferia = $row[0] ; 
                    
                    echo $row[0];
                    echo "\n";
                 
                    
                    for ($ri2 = 0; $ri2 < $numrows; $ri2++) {
                        $row = pg_fetch_array($result, $ri2);
                        if ( $row['όνομα_περιφέρειας'] == $periferia )
                        {   
                            $nomos = $row[1] ;
                            
                            echo "              ";
                            echo "$row[1] \n";
                            
                            //echo "<br>";
                            
                            for ($ri3 = 0; $ri3 < $numrows; $ri3++) {
                                $row = pg_fetch_array($result, $ri3);
                                if ( $row['όνομα_περιφέρειας'] == $periferia )
                                {
                                    if ( $row['όνομα_νομού']  == $nomos )
                                    {
                                        echo "                  ";
                                        $dimos = $row[2] ;
                                        
                                        
                                        echo "  ";
                                        echo "$row[2]";
                                    
                                    
                                        echo ":  $row[3]";
                                      
                                
                                   
                                        echo ", $row[4]\n";
                                        
                                        //echo "<br>";
                                        $ri2 = $ri2 + 1 ; 
                                        $ri1 = $ri1 + 1 ; 

                                    }
                                }
                            }   
                            $ri1 = $ri1 + 1 ; 
                        }
                    }
                    
                }

        }

        
    }