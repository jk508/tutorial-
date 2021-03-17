<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto</title>
    <link rel="stylesheet" href="../public/css/tarea.css">
</head>
<body>
    
<form id="formulario_tarea">
  <label> Tarea </label> <br>
 

  <input type="textarea" name="tarea" id="tarea" onkeyup="countChars(this);"></input>
  <p id="charNum">128 characters remaining</p>
  <label> Instrucciones </label> <br>
  <input type="textarea" name="instrucciones" id="instrucciones" onkeyup="countCharsIns(this);"></input>
  <p id="charNumIns">500 characters remaining</p>
<br>
<button> Submit </button>
</form>
<script src="../public/js/jquery.min.js"></script>
<script src="scripts/escritorio.js"></script>
</body>
</html>