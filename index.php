<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/styles_index.css">
</head>

<body>

<div class="header">
  <h1>Welcome !</h1>
</div>

<div class="content">
  <h2>Παρακαλώ επιλέξτε μία απο τις παρακάτω επιλογές:</h2>
  
    <div class="btn-group">   
        <button onclick="insert_delete()" class="button1">Εισαγωγή/Διαγραφή</button>
        <button onclick="load_func()" class="button2">Εισαγωγή από αρχείο κειμένου</button>
        <button onclick="show_func()" class="button3">Ερώτημα 4</button>
    </div>


    <script>
    function insert_delete() {
      window.location.href="php/insert_delete.php";
    }
    </script>

    <script>
    function load_func() {
      window.location.href="php/load_from_file.php";
    }
    </script>

    <script>
    function show_func() {
      window.location.href="php/show.php";
    }
    </script>

</div>


</body>



</html>