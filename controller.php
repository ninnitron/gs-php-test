<?php
session_start();
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['user']) && isset($_POST['pwd'])){
    if($_POST['user']==="root" && $_POST['pwd']==="password"){
        // $token=bin2hex(random_bytes(16));
        $token="2297464fb85e872966df3e851d427db0";
        $_SESSION['token']=$token;
        echo 1;
    }else{
        echo 2;
    }
}else{
    echo 0;
}
