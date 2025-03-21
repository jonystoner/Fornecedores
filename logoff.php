<?php
    session_start(); //inicia a sessão 
    session_unset(); //remove todas as  variaveies da sessão    
    session_destroy(); // destroi a sessão 

    // remove o cookie da sessão     
    if(ini_get("session.user_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(),' ',time() -42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]       
    );
   }
    header("location: login.php");
    exit();
?>