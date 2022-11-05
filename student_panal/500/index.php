
<?php 
$host = "localhost";
$db ="hicmis_system";
$user ="root";
$pass ="";
$conn;
    try{
        $conn = new PDO ("mysql:host=".$host.";dbname=".$db."","$user",$pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        header('location:/student_panal/');
    }catch(PDOException $e){
      echo '<!DOCTYPE html>
      <html lang="en">
      <head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>500 Internal Server Error</title>
      <style>
        *{
          margin: 0;
          padding: 0;
          box-sizing: border-box;
        }
        .interval{
          max-width: 100%;
          height: 100vh;
          background-image: url("../assets/img/500.jpg");
          background-size: contain;
          background-repeat: no-repeat;
          background-position: center;
        }
      
      </style>
      </head>
      <body>
      <section class="interval">
      '.$e->getMessage().'
      </section>
      </body>
      </html>';
    }
?>
