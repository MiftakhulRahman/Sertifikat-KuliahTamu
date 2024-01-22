<?php
// Deklarasi variabel
$nim = "";

// Validasi input
if (isset($_POST['nim'])) {
  $nim = $_POST['nim'];

  $file = scandir("sertifikat");
  $found = false;
  foreach ($file as $f) {
    if ($f == "$nim.pdf") {
      $found = true;
      break;
    }
  }

  if ($found) {
    $file_path = "sertifikat/$nim.pdf";
    header("Content-type: application/pdf");
    header("Content-Disposition: attachment; filename=\"$nim.pdf\"");
    readfile($file_path);
    exit; // Penting: keluar dari skrip setelah mengirim file
  } else {
    echo "<div class='error'>Sertifikat dengan NIM $nim tidak ditemukan</div>";
  }
}
?>


<!DOCTYPE html>
<html>

<head>
  <title>Unduh Sertifikat Kuliah Tamu Informatika 2024</title>
  <link rel="icon" type="image/x-icon" href="favicon.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Changa+One:ital@0;1&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: "Changa One", sans-serif;
      font-family: 'Roboto', sans-serif;
      background-image: url(bg.jpg);
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
    }

    .container {
      max-width: 500px;
      margin: 50px auto;
      padding: 20px;
      border: 2px solid rgba(255, 255, 255, .2);
      backdrop-filter: blur(3px);
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
      background: transparent;
      padding: 2rem;
      margin: 0 auto;
      position: relative;
      overflow: hidden;
      /* Tambahkan efek glass blur dan border-radius */
      border-radius: 15px;
    }

    .container:before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
      pointer-events: none;
    }

    h1 {
      font-family: "Changa One", sans-serif;
      font-weight: 400;
      text-align: center;
      color: #fff;
    }

    .form-control {
      width: 95%;
      padding: 0.75rem;
      margin-bottom: 1rem;
      border: none;
      border-radius: 0;
      box-shadow: none;
      background-color: transparent;
      border-bottom: 2px solid #ccc;
      transition: border-color 0.2s ease-in-out;
      color: white;
      /* Teks jadi putih */
    }

    .form-control:focus {
      outline: none;
      /* Hilangkan outline yang muncul saat fokus */
    }

    .form-control::placeholder {
      color: white;
      /* Warna teks placeholder menjadi putih */
      opacity: 0.7;
      /* Opacity placeholder (sesuaikan sesuai kebutuhan) */
    }

    input[type="submit"] {
      /* Modifikasi tombol untuk tidak full width dan sudut yang lebih membulat */
      font-family: "Changa One", sans-serif;
      font-weight: 300;
      font-size: 15px;
      width: 20%;
      height: 40px;
      background-color: #FCDA00;
      color: white;
      padding: 0.75rem;
      margin-bottom: 1rem;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      transition: background-color 0.2s ease-in-out;
      color: #03636F;
    }

    input[type="submit"]:hover {
      background-color: #FCDA00;
    }

    input[type="submit"]:hover,
    input[type="submit"]:focus {
      background-color: #fff;
      color: #03636F;
    }

    .error {
      border-radius: 20px;
      margin: auto auto;
      width: 80%;
      color: red;
      padding: 10px;
      background: white;
      font-weight: bold;
      text-align: center;
      margin-top: 10px;
    }

    .sukses {
      color: green;
      font-weight: bold;
      text-align: center;
    }

    .image-container {
      width: 100%;
      padding-top: 44%;
      position: relative;
    }

    .image-container img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    /* Additional CSS */

    .note {
      font-size: 14px;
      text-align: center;
      margin-top: 20px;
      padding: 10px;
      background: #eee;
      border-radius: 4px;
    }

    .note p {
      margin: 0;
    }

    .logo {
      width: 30px;
      vertical-align: middle;
    }

    .download-link {
      color: #FCDA00;
      font-weight: bold;
    }

    .credit {
      font-size: 12px;
      color: #03636F;
    }

    .credit a {
      text-decoration: none;
      color: inherit;
    }

    @media only screen and (max-width: 500px) {
      .container {
        margin: 30px auto;
        padding: 1rem;
      }

      .form-control {
        padding: 0.5rem;
        margin-bottom: 0.5rem;
      }

      input[type="submit"] {
        padding: 0.5rem;
        margin-bottom: 0.5rem;
      }

      .image-container {
        padding-top: 60%;
      }

      .container {
        margin-bottom: 60px;
      }

      .image-container img {
        max-width: 100%;
        object-fit: contain;
      }

      .error {
        border-radius: 20px;
        font-size: 12px;
        margin: auto auto;
        width: 80%;
        color: red;
        padding: 10px;
        background: white;
        font-weight: bold;
        text-align: center;
        margin-top: 10px;
      }
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="image-container">
      <img src="Banner.jpg" alt="Banner Kuliah Tamu Informatika 2024">
    </div>
    <h1>Unduh Sertifikat</h1>
    <form action="" method="post">
      <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM">
      <input type="submit" value="Unduh">
    </form>
    <div class="note">
      <p>
        <b>Note:</b>
        <br>
        Jika anda sudah memasukan NIM dengan benar tetapi sertifikat tetap tidak ditemukan silahkan download secara mandiri pada link di bawah ini
        <br><br>
        <a href="https://drive.google.com/drive/folders/1QvXeQbORUKJYie496fDC6j48vhNYxb3f?usp=drive_link" class="download-link">Download Sertifikat</a>
        <br><br>
      </p>

      <p class="credit">
        Built With <img src="php.png" class="logo"> By <a href="https://wa.me/+6285768959398">Miftakhul Rahman</a>
      </p>
    </div>
  </div>
  <!-- Additional HTML -->
</body>

</html>