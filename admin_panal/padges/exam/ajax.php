<?php 
if(isset($_POST['lev'])){
    
    function getSubject(){
        $host = "localhost";
        $db ="hicmis_system";
        $user ="root";
        $pass ="";
       $conn = new PDO ("mysql:host=".$host.";dbname=".$db."","$user",$pass);
       $lev_id =$_POST['lev'];
       $sql = "SELECT * FROM `subjects` WHERE `lev_id` = '$lev_id'";
           $result = $conn->query($sql);
           $data['subject']= $result->fetchAll(PDO::FETCH_ASSOC);
           return json_encode($data);
           /** Structure Array In PHP
           *  [
           *    0 => [
           *          id => 75,
           *          name => 'saico'
           *          ],
           *    1 =>  [
           *           id => 76,
           *           name => 'ahmed'
           *          ]
           *  ],
           * */

           /** Structure Array In Json
           *  [
           *    0 : {
           *          id : 75,
           *          name : 'saico'
           *          },
           *    1 :  {
           *           id : 76,
           *           name : 'ahmed'
           *          }
           *  ],
           * */
    }
     
    echo getSubject();
        
    }
