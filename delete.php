<?php 
$sorgu = $db->prepare('DELETE FROM just 
WHERE id =?');
//DELETE FROM tablo_adi WHERE id = 5
if (!isset($_GET['id']) || empty($_GET['id']))
{   
    header('Location:index.php');
    exit;
}
$sorgu->execute([
    $_GET['id']
]);
header('Location:index.php');
?>

