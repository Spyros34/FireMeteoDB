#!/bin/sh

DATABASE=db1u33
USERNAME=db1u33
HOSTNAME=hostname
export PGPASSWORD=PQGBWj2C

psql -h $HOSTNAME -U $USERNAME $DATABASE -c "DROP TABLE IF EXISTS  Μετεωρολογικοί_Σταθμοί CASCADE;"
psql -h $HOSTNAME -U $USERNAME $DATABASE -c "CREATE TABLE IF NOT EXISTS  Μετεωρολογικοί_Σταθμοί( ονομασία VARCHAR(255), γεωγραφικό_μήκος  DOUBLE PRECISION, γεωγραφικό_πλάτος DOUBLE PRECISION, υψόμετρο FLOAT, UNIQUE (ονομασία,γεωγραφικό_μήκος,γεωγραφικό_πλάτος,υψόμετρο), sid SERIAL PRIMARY KEY);"
psql -h $HOSTNAME -U $USERNAME $DATABASE -c "DROP TABLE IF EXISTS stations_tmp CASCADE;"
psql -h $HOSTNAME -U $USERNAME $DATABASE -c "CREATE TABLE IF NOT EXISTS stations_tmp ( ονομασία VARCHAR(255), γεωγραφικό_μήκος  DOUBLE PRECISION, γεωγραφικό_πλάτος DOUBLE PRECISION, υψόμετρο FLOAT, UNIQUE (ονομασία,γεωγραφικό_μήκος,γεωγραφικό_πλάτος,υψόμετρο), sid SERIAL PRIMARY KEY);"
psql -h $HOSTNAME -U $USERNAME $DATABASE -c "\COPY stations_tmp(ονομασία,γεωγραφικό_πλάτος,γεωγραφικό_μήκος,υψόμετρο) FROM '/home/Data/2022-23/stations_list.csv' DELIMITER ';' CSV HEADER;"
psql -h $HOSTNAME -U $USERNAME $DATABASE -c "INSERT INTO Μετεωρολογικοί_Σταθμοί(ονομασία,γεωγραφικό_μήκος,γεωγραφικό_πλάτος,υψόμετρο) SELECT ονομασία,γεωγραφικό_μήκος,γεωγραφικό_πλάτος,υψόμετρο FROM stations_tmp ORDER BY sid; "

psql -h $HOSTNAME -U $USERNAME $DATABASE -c "DROP TABLE IF EXISTS  Μετεωρολογικά_Δεδομένα CASCADE;"
psql -h $HOSTNAME -U $USERNAME $DATABASE -c "CREATE TABLE IF NOT EXISTS  Μετεωρολογικά_Δεδομένα( ημερομηνία DATE, μέση_θερμοκρασία FLOAT, μέγιστη_θερμοκρασία FLOAT, ελάχιστη_θερμοκρασία FLOAT, μέση_υγρασία FLOAT, μέγιστη_υγρασία FLOAT, ελάχιστη_υγρασία FLOAT, μέση_ατμοσφαιρική_πίεση	FLOAT, μέγιστη_ατμοσφαιρική_πίεση FLOAT, ελάχιστη_ατμοσφαιρική_πίεση FLOAT, ημερήσια_βροχοπτωση	FLOAT, μέση_ταχύτητα_ανέμου FLOAT, διεύθυνση_ανέμου VARCHAR(255), μέγιστη_ριπή_ανέμου FLOAT, UNIQUE (ημερομηνία,μέση_θερμοκρασία,μέγιστη_θερμοκρασία,ελάχιστη_θερμοκρασία,μέση_υγρασία,μέγιστη_υγρασία,ελάχιστη_υγρασία,μέση_ατμοσφαιρική_πίεση,μέγιστη_ατμοσφαιρική_πίεση,ελάχιστη_ατμοσφαιρική_πίεση,ημερήσια_βροχοπτωση,μέση_ταχύτητα_ανέμου,διεύθυνση_ανέμου,μέγιστη_ριπή_ανέμου), mid SERIAL PRIMARY KEY );"
psql -h $HOSTNAME -U $USERNAME $DATABASE -c "DROP TABLE IF EXISTS meteo_tmp CASCADE;"
psql -h $HOSTNAME -U $USERNAME $DATABASE -c "CREATE TABLE IF NOT EXISTS meteo_tmp (ονομασία VARCHAR(255), ημερομηνία DATE, μέση_θερμοκρασία FLOAT, μέγιστη_θερμοκρασία FLOAT, ελάχιστη_θερμοκρασία FLOAT, μέση_υγρασία FLOAT, μέγιστη_υγρασία FLOAT, ελάχιστη_υγρασία FLOAT, μέση_ατμοσφαιρική_πίεση	FLOAT, μέγιστη_ατμοσφαιρική_πίεση FLOAT, ελάχιστη_ατμοσφαιρική_πίεση FLOAT, ημερήσια_βροχοπτωση	FLOAT, μέση_ταχύτητα_ανέμου FLOAT, διεύθυνση_ανέμου VARCHAR(255), μέγιστη_ριπή_ανέμου FLOAT, UNIQUE (ονομασία,ημερομηνία,μέση_θερμοκρασία,μέγιστη_θερμοκρασία,ελάχιστη_θερμοκρασία,μέση_υγρασία,μέγιστη_υγρασία,ελάχιστη_υγρασία,μέση_ατμοσφαιρική_πίεση,μέγιστη_ατμοσφαιρική_πίεση,ελάχιστη_ατμοσφαιρική_πίεση,ημερήσια_βροχοπτωση,μέση_ταχύτητα_ανέμου,διεύθυνση_ανέμου,μέγιστη_ριπή_ανέμου), mid SERIAL PRIMARY KEY );"
psql -h $HOSTNAME -U $USERNAME $DATABASE -c "\COPY meteo_tmp(ονομασία, ημερομηνία, μέση_θερμοκρασία , μέγιστη_θερμοκρασία , ελάχιστη_θερμοκρασία , μέση_υγρασία , μέγιστη_υγρασία , ελάχιστη_υγρασία , μέση_ατμοσφαιρική_πίεση, μέγιστη_ατμοσφαιρική_πίεση , ελάχιστη_ατμοσφαιρική_πίεση , ημερήσια_βροχοπτωση, μέση_ταχύτητα_ανέμου , διεύθυνση_ανέμου , μέγιστη_ριπή_ανέμου) FROM '/home/Data/2022-23/meteo_data.csv' DELIMITER ';' CSV HEADER NULL AS 'NULL' ;"
psql -h $HOSTNAME -U $USERNAME $DATABASE -c "INSERT INTO Μετεωρολογικά_Δεδομένα( ημερομηνία, μέση_θερμοκρασία , μέγιστη_θερμοκρασία , ελάχιστη_θερμοκρασία , μέση_υγρασία , μέγιστη_υγρασία , ελάχιστη_υγρασία , μέση_ατμοσφαιρική_πίεση, μέγιστη_ατμοσφαιρική_πίεση , ελάχιστη_ατμοσφαιρική_πίεση , ημερήσια_βροχοπτωση, μέση_ταχύτητα_ανέμου , διεύθυνση_ανέμου , μέγιστη_ριπή_ανέμου) SELECT ημερομηνία, μέση_θερμοκρασία , μέγιστη_θερμοκρασία , ελάχιστη_θερμοκρασία , μέση_υγρασία , μέγιστη_υγρασία , ελάχιστη_υγρασία , μέση_ατμοσφαιρική_πίεση, μέγιστη_ατμοσφαιρική_πίεση , ελάχιστη_ατμοσφαιρική_πίεση , ημερήσια_βροχοπτωση, μέση_ταχύτητα_ανέμου , διεύθυνση_ανέμου , μέγιστη_ριπή_ανέμου FROM meteo_tmp ORDER BY mid; "

psql -h $HOSTNAME -U $USERNAME $DATABASE -c "DROP TABLE IF EXISTS Καταγραφή CASCADE; "
psql -h $HOSTNAME -U $USERNAME $DATABASE -c "CREATE TABLE IF NOT EXISTS Καταγραφή( sid INT, mid INT, UNIQUE (mid), FOREIGN KEY(sid) REFERENCES Μετεωρολογικοί_Σταθμοί(sid), FOREIGN KEY(mid) REFERENCES Μετεωρολογικά_Δεδομένα(mid) ); "
psql -h $HOSTNAME -U $USERNAME $DATABASE -c "INSERT INTO Καταγραφή (sid,mid)SELECT DISTINCT Μετεωρολογικοί_Σταθμοί.sid,meteo_tmp.mid from Μετεωρολογικοί_Σταθμοί,meteo_tmp WHERE meteo_tmp.ονομασία = Μετεωρολογικοί_Σταθμοί.ονομασία ;"
psql -h $HOSTNAME -U $USERNAME $DATABASE -c "DROP TABLE IF EXISTS  Δήμοι CASCADE;"
psql -h $HOSTNAME -U $USERNAME $DATABASE -c "CREATE TABLE IF NOT EXISTS Δήμοι (όνομα_περιφέρειας VARCHAR(255), όνομα_νομού VARCHAR(255), όνομα_δήμου VARCHAR(255), γεωγραφικό_μήκος DOUBLE PRECISION, γεωγραφικό_πλάτος DOUBLE PRECISION, UNIQUE (όνομα_περιφέρειας,όνομα_νομού,όνομα_δήμου,γεωγραφικό_μήκος,γεωγραφικό_πλάτος), pid SERIAL PRIMARY KEY );"
psql -h $HOSTNAME -U $USERNAME $DATABASE -c "DROP TABLE IF EXISTS locations_tmp CASCADE;"
psql -h $HOSTNAME -U $USERNAME $DATABASE -c "CREATE TABLE IF NOT EXISTS locations_tmp (όνομα_περιφέρειας VARCHAR(255), όνομα_νομού VARCHAR(255), όνομα_δήμου VARCHAR(255), γεωγραφικό_μήκος DOUBLE PRECISION, γεωγραφικό_πλάτος DOUBLE PRECISION,ονομασία VARCHAR(255), UNIQUE (όνομα_περιφέρειας,όνομα_νομού,όνομα_δήμου,γεωγραφικό_μήκος,γεωγραφικό_πλάτος), pid SERIAL PRIMARY KEY );"
psql -h $HOSTNAME -U $USERNAME $DATABASE -c "\COPY locations_tmp(όνομα_περιφέρειας, όνομα_νομού , όνομα_δήμου , γεωγραφικό_πλάτος , γεωγραφικό_μήκος ,ονομασία ) FROM '/home/Data/2022-23/locations_data.csv' DELIMITER ';' CSV HEADER NULL AS 'NULL' ;"
psql -h $HOSTNAME -U $USERNAME $DATABASE -c "INSERT INTO Δήμοι(όνομα_περιφέρειας , όνομα_νομού , όνομα_δήμου , γεωγραφικό_μήκος , γεωγραφικό_πλάτος)SELECT όνομα_περιφέρειας , όνομα_νομού , όνομα_δήμου , γεωγραφικό_μήκος , γεωγραφικό_πλάτος FROM locations_tmp ORDER BY pid; "
psql -h $HOSTNAME -U $USERNAME $DATABASE -c "DROP TABLE IF EXISTS Σταθμός_Αναφοράς CASCADE;"
psql -h $HOSTNAME -U $USERNAME $DATABASE -c "CREATE TABLE IF NOT EXISTS Σταθμός_Αναφοράς(pid INT ,sid INT ,FOREIGN KEY(pid) REFERENCES Δήμοι(pid),FOREIGN KEY(sid) REFERENCES Μετεωρολογικοί_Σταθμοί(sid));"
psql -h $HOSTNAME -U $USERNAME $DATABASE -c "INSERT INTO Σταθμός_Αναφοράς (pid,sid)SELECT DISTINCT  locations_tmp.pid,Μετεωρολογικοί_Σταθμοί.sid from locations_tmp,Μετεωρολογικοί_Σταθμοί WHERE locations_tmp.ονομασία = Μετεωρολογικοί_Σταθμοί.ονομασία ;"

psql -h $HOSTNAME -U $USERNAME $DATABASE -c "DROP TABLE IF EXISTS Δασικές_Πυρκαγιές CASCADE;"
psql -h $HOSTNAME -U $USERNAME $DATABASE -c "CREATE TABLE IF NOT EXISTS Δασικές_Πυρκαγιές (ονομα_ΠΣ VARCHAR(255), ώρα_έναρξης TIME, ημερομηνία_έναρξης DATE, ώρα_κατάσβεσης TIME, ημερομηνία_κατάσβεσης DATE, εναέρια_μέσα INT, οχήματα INT, προσωπικό INT, καμμένη_έκταση FLOAT, fid SERIAL PRIMARY KEY );"
psql -h $HOSTNAME -U $USERNAME $DATABASE -c "DROP TABLE IF EXISTS fire_tmp CASCADE;"
psql -h $HOSTNAME -U $USERNAME $DATABASE -c "CREATE TABLE IF NOT EXISTS fire_tmp (ονομα_ΠΣ VARCHAR(255),όνομα_νομού VARCHAR(255), όνομα_δήμου VARCHAR(255),ημερομηνία_έναρξης DATE, ώρα_έναρξης TIME, ημερομηνία_κατάσβεσης DATE, ώρα_κατάσβεσης TIME, καμμένη_έκταση FLOAT, προσωπικό INT, οχήματα INT, εναέρια_μέσα INT, fid SERIAL PRIMARY KEY );"
psql -h $HOSTNAME -U $USERNAME $DATABASE -c "\COPY fire_tmp(ονομα_ΠΣ ,όνομα_νομού, όνομα_δήμου ,ημερομηνία_έναρξης , ώρα_έναρξης , ημερομηνία_κατάσβεσης , ώρα_κατάσβεσης , καμμένη_έκταση , προσωπικό , οχήματα , εναέρια_μέσα ) FROM '/home/Data/2022-23/fire_data.csv' DELIMITER ';' CSV HEADER NULL AS 'NULL' ;"
psql -h $HOSTNAME -U $USERNAME $DATABASE -c "INSERT INTO Δασικές_Πυρκαγιές(ονομα_ΠΣ , ώρα_έναρξης, ημερομηνία_έναρξης , ώρα_κατάσβεσης, ημερομηνία_κατάσβεσης , εναέρια_μέσα , οχήματα , προσωπικό , καμμένη_έκταση )SELECT ονομα_ΠΣ , ώρα_έναρξης, ημερομηνία_έναρξης , ώρα_κατάσβεσης, ημερομηνία_κατάσβεσης , εναέρια_μέσα , οχήματα , προσωπικό , καμμένη_έκταση FROM fire_tmp ORDER BY fid; "
psql -h $HOSTNAME -U $USERNAME $DATABASE -c "DROP TABLE IF EXISTS Εκδήλωση CASCADE; "
psql -h $HOSTNAME -U $USERNAME $DATABASE -c "CREATE TABLE IF NOT EXISTS Εκδήλωση(fid INT, pid INT, UNIQUE (fid), FOREIGN KEY(fid) REFERENCES Δασικές_Πυρκαγιές(fid), FOREIGN KEY(pid) REFERENCES Δήμοι(pid) ); "
psql -h $HOSTNAME -U $USERNAME $DATABASE -c "INSERT INTO Εκδήλωση (fid,pid)SELECT fire_tmp.fid,Δήμοι.pid from fire_tmp,Δήμοι WHERE fire_tmp.όνομα_νομού = Δήμοι.όνομα_νομού AND fire_tmp.όνομα_δήμου = Δήμοι.όνομα_δήμου;"
psql -h $HOSTNAME -U $USERNAME $DATABASE -c "DROP TABLE IF EXISTS stations_tmp CASCADE;"
psql -h $HOSTNAME -U $USERNAME $DATABASE -c "DROP TABLE IF EXISTS meteo_tmp CASCADE;"
psql -h $HOSTNAME -U $USERNAME $DATABASE -c "DROP TABLE IF EXISTS locations_tmp CASCADE;"
psql -h $HOSTNAME -U $USERNAME $DATABASE -c "DROP TABLE IF EXISTS  fire_tmp CASCADE;"




