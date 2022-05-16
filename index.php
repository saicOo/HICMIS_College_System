<?php 
if(isset($_POST['create'])){
$dirXampp= "C:/xampp/apache/conf/extra/httpd-vhosts.conf";
$creatHostX = '<VirtualHost *:80>
DocumentRoot "C:/xampp/htdocs/HICMIS"
ServerName hicmis
</VirtualHost>';

$dirAppServ= "C:/AppServ/Apache24/conf/extra/httpd-vhosts.conf";
$creatHostS = '<VirtualHost *:80>
DocumentRoot "C:/AppServ/www/HICMIS"
ServerName hicmis
</VirtualHost>';

$fileHost= "C:/Windows/System32/drivers/etc/hosts";
$creatDomain= "127.0.0.1       hicmis";

if(file_exists($dirXampp)){

    file_put_contents($dirXampp,"\n".$creatHostX,FILE_APPEND);
    setcookie("domain","test");

}elseif(file_exists($dirAppServ)){

    file_put_contents($dirAppServ,"\n".$creatHostS,FILE_APPEND);
    setcookie("domain","test");
    
}else{
    echo "not found path";
}

if(file_exists($fileHost) && is_writable($fileHost)){

    file_put_contents($fileHost,"\n".$creatDomain,FILE_APPEND);
    
}else{
    setcookie("notFound","test");
}
header('location:/HICMIS/#doc');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Config</title>
    <link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
    <style>
        html{
            scroll-behavior: smooth;
        }
        section{
            height: 100vh;
        }
        section.home{
            background-color: #F2F2F2;

        }
        section.doc{
            background-color: #F2F2F2;
            background-image: linear-gradient(rgb(0 0 0 / 88%),rgb(0 0 0 / 64%)), url(./image/bk.jpg);
            background-size: 100% 100%;
            background-attachment: fixed;

        }
        section.started{
            background-color: #F2F2F2;

        }
        section.finish{
            background-color: #F2F2F2;

        }
        h1{
            text-align: center;
            font-weight: bold;
            color: #5488b4;
        
        }
        .btn-create{
            background-color: rgb(84, 136, 180);
            color: #ffff;
            padding: 20px 60px;
        }
        .head-area{
            min-height: 10vh;
        }
        .center-area{
            min-height: 70vh;
        }
        .bottom-area{
            position: relative;
            bottom: 100px;
            width: 100%;
            

        }
        .bottom-area a.next{
            
            font-size: 30px;
            color: rgb(64, 136, 184);;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translateX(-50%);
            z-index: 100;
            animation: moveLink 1.5s ease-in-out infinite;
        }
        @keyframes moveLink{
        0%{
        margin-bottom: 15px;
        color: rgb(26, 123, 207);
        }

        50%{
            margin-top: 15px;
            color: #5488b4;
            font-size: 27px;
        }
        100%{
            margin-bottom: 15px;
            color: rgb(81, 211, 216);
        }
        }
    </style>
</head>
<body>
    <section class="home py-5">
        <div class="container">
            
            <div class="row head-area">
                <div class="col">
                    <h1>WELCOME TO HICMIS SYSTEM</h1>
                </div>
            </div>
            <div class="row center-area">
                <div class="col-md-6">
                    <img src="./image/admin.png" alt="" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <img src="./image/student.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="row text-center bottom-area">
                <div class="col">
                    <a href="#doc" class="btn next">Cilck Here</a>
                </div>
            </div>
        </div>
    </section>
    <section class="doc py-5" id="doc">
        <div class="container">
            
            <div class="row head-area">
                <div class="col">
                    <h1>HOW GET STARTED SYSTEM</h1>
                </div>
            </div>
            <div class="row center-area">
                <div class="col">
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                          <h2 class="display-4">Get Started</h2>
                          <p class="lead">1- Create a database named hicmis_system.</p>
                          <p class="lead">2- Import a file named (hicmis_system.sql) into your database.</p>
                          <p class="lead">3- Open the Connect.php file in the \admin_panal\controllers path and also the student_panal\controllers path and see the connection commands.</p>
                          <p class="lead">4- Go to the next section and press the Create Domain button.</p>
                          <p class="lead">5- Refresh apathe</p>
                          <p class="lead">6- Open this link <a href="http://hicmis/admin_panal/" target="_blank" rel="noopener noreferrer">http://hicmis/admin_panal/</a> and enter email: admin@gmail.com password: 123456789 .</p>
                          <p class="lead">7- Open this link <a href="http://hicmis/student_panal/" target="_blank" rel="noopener noreferrer">http://hicmis/student_panal/</a></p>
                        </div>
                      </div>
                </div>
            </div>
            <div class="row text-center bottom-area">
                <div class="col">
                    <a href="#end" class="btn next">Cilck Here</a>
                </div>
            </div>
        </div>
    </section>
    <section class="started py-5" id="end">
        <div class="container">
            
            <div class="row head-area">
                <div class="col">
                    <h1>GET SETTING</h1>
                </div>
            </div>
            <div class="row center-area text-center">
                <div class="col">
                    <?php if(isset($_COOKIE['domain'])): ?>
                        <h2 class="text-success">The domain has been created successfully</h2>
                        <?php else: ?>
                            <form method="post" class="text-center">
                                <button name="create" class="btn btn-create">Create Domain</button>
                            </form>
                            <?php endif ?>
                        <?php if(isset($_COOKIE['notFound'])): ?>
                            <h2 class="text-center text-danger">لم تكتمل العملية برجاء الذهاب الي هذا المسار
                                <br>
                            C:\Windows\System32\drivers\etc\
                            <br>
                            hostsوفتح ملف
                            <br>
                            notepadعن طريق
                            <br>
                            " 127.0.0.1       hicmis "ووضع هذا النص في النهاية
                            </h2>
                            <?php endif ?>
                        </div>
            </div>
    </section>
</body>
</html>