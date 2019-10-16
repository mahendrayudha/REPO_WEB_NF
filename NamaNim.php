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
          NIM<br>
          <input type="text" name="nim" id="nim" class="from-control" placeholder="Masukkan NIM" required>
      </p>

      <p>
          Nama<br>
          <input type="text" name="nama" id="nama" class="from-control" placeholder="Masukkan Nama" required>
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
          var nama = document.getElementById('nama').value;
          /* pake if */
          alert("NAMA "+nama+" NIM "+nim);
      }
  </script> 
</body>
</html>