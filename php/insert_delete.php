<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/styles_index.css">
</head>

<body>

<div class="header">
  <h1>Welcome !</h1>
</div>

<div class="content">
  <h2>Παρακαλώ επιλέξτε μία απο τις παρακάτω επιλογές:</h2>
  
    <div class="btn-group">   
        <button onclick="insert()" class="button1">Εισαγωγή</button>
        <button onclick="delete_func()" class="button2">Διαγραφή</button>
    </div>


    <script>
    function insert() {
      window.location.href="insert.php";
    }
    </script>

    <script>
    function delete_func() {
      window.location.href="delete.php";
    }
    </script>

</div>


</body>



</html>