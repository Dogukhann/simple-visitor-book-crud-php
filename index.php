<?php


require_once 'baglan.php';

if (!isset($_GET['sayfa'])){
    $_GET['sayfa'] = 'index';
}
Switch($_GET['sayfa']){
    case 'index':
    require_once 'homepage.php';
    break;

    case 'update':
    require_once 'update.php';
    break;

    case 'insert':
    require_once 'insert.php';
    break;

    case 'delete':
    require_once 'delete.php';
    break;

    case 'read':
    require_once 'read.php';
    break;

    case 'seeall':
    require_once 'seeall.php';
    break;
    
}
?>
