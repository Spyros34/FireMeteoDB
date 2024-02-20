

CREATE TABLE Δασικές_Πυρκαγιές (ονομα_ΠΣ VARCHAR(255), ώρα_έναρξης TIME, ημερομηνία_έναρξης DATE, ώρα_κατάσβεσης TIME, ημερομηνία_κατάσβεσης DATE, εναέρια_μέσα INT, οχήματα INT, προσωπικό INT, καμμένη_έκταση FLOAT, UNIQUE (ονομα_ΠΣ,ώρα_έναρξης,ημερομηνία_έναρξης,ώρα_κατάσβεσης,ημερομηνία_κατάσβεσης,εναέρια_μέσα,οχήματα,προσωπικό,καμμένη_έκταση), fid SERIAL PRIMARY KEY );


CREATE TABLE Δήμοι (όνομα_περιφέρειας VARCHAR(255), όνομα_νομού VARCHAR(255), όνομα_δήμου VARCHAR(255), γεωγραφικό_μήκος DOUBLE PRECISION, γεωγραφικό_πλάτος DOUBLE PRECISION, UNIQUE (όνομα_περιφέρειας,όνομα_νομού,όνομα_δήμου,γεωγραφικό_μήκος,γεωγραφικό_πλάτος), pid SERIAL PRIMARY KEY );


CREATE TABLE Μετεωρολογικοί_Σταθμοί(
 ονομασία VARCHAR(255),
 γεωγραφικό_μήκος  DOUBLE PRECISION,
 γεωγραφικό_πλάτος DOUBLE PRECISION,
 υψόμετρο FLOAT,
 UNIQUE (ονομασία,γεωγραφικό_μήκος,γεωγραφικό_πλάτος,υψόμετρο),
 sid SERIAL PRIMARY KEY
);

CREATE TABLE stations_tmp(
 ονομασία VARCHAR(255),
 γεωγραφικό_μήκος  DOUBLE PRECISION,
 γεωγραφικό_πλάτος DOUBLE PRECISION,
 υψόμετρο FLOAT,
 UNIQUE (ονομασία,γεωγραφικό_μήκος,γεωγραφικό_πλάτος,υψόμετρο),
 sid SERIAL PRIMARY KEY
);




CREATE TABLE Μετεωρολογικά_Δεδομένα(
ημερομηνία DATE, μέση_θερμοκρασία FLOAT, μέγιστη_θερμοκρασία FLOAT, ελάχιστη_θερμοκρασία FLOAT, μέση_υγρασία FLOAT, μέγιστη_υγρασία	FLOAT, ελάχιστη_υγρασία FLOAT, μέση_ατμοσφαιρική_πίεση	FLOAT, μέγιστη_ατμοσφαιρική_πίεση FLOAT, ελάχιστη_ατμοσφαιρική_πίεση FLOAT, ημερήσια_βροχοπτωση	FLOAT, μέση_ταχύτητα_ανέμου FLOAT, διεύθυνση_ανέμου VARCHAR(255), μέγιστη_ριπή_ανέμου FLOAT, UNIQUE (ημερομηνία,μέση_θερμοκρασία,μέγιστη_θερμοκρασία,ελάχιστη_θερμοκρασία,μέση_υγρασία,μέγιστη_υγρασία,ελάχιστη_υγρασία,μέση_ατμοσφαιρική_πίεση,μέγιστη_ατμοσφαιρική_πίεση,ελάχιστη_ατμοσφαιρική_πίεση,ημερήσια_βροχοπτωση,μέση_ταχύτητα_ανέμου,διεύθυνση_ανέμου,μέγιστη_ριπή_ανέμου), mid SERIAL PRIMARY KEY );


CREATE TABLE Εκδήλωση(fid INT, pid INT, UNIQUE (fid), FOREIGN KEY(fid) REFERENCES Δασικές_Πυρκαγιές(fid), FOREIGN KEY(pid) REFERENCES Δήμοι(pid) );


CREATE TABLE Σταθμός_Αναφοράς(pid INT ,sid INT ,FOREIGN KEY(pid) REFERENCES Δήμοι(pid),FOREIGN KEY(sid) REFERENCES Μετεωρολογικοί_Σταθμοί(sid));


CREATE TABLE Καταγραφή( sid INT, mid INT, UNIQUE (mid), FOREIGN KEY(sid) REFERENCES Μετεωρολογικοί_Σταθμοί(sid), FOREIGN KEY(mid) REFERENCES Μετεωρολογικά_Δεδομένα(mid) );




