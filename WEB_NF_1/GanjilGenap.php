<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  <form>
      <p>
          Masukkan Angka<br>
          <input type="number" name="nim" id="nim" class="from-control" placeholder="Masukkan Angka" required>
      </p>

      <p>
          <button type="button" class = "btn btn-info" onclick="tampilkan()">
            OK
          </button>
      </p>
  </form> 
  <script>
      function tampilkan(){
          var nim = document.getElementById('nim').value;
         if (nim == 0){
             alert ("NETRAL")
         }else if ((nim %2) == 0){
             alert ("GENAP")
         }else {
             alert ("GANJIL")
         }
      }
  </script> 
</body>
</html>