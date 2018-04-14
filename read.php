<?php require 'header.php';?>

<?php
if(!isset($_GET['id']) || empty($_GET['id'])){
    header('Location:index.php');
    exit;
}
$sorgu = $db->prepare('SELECT * FROM just
WHERE id = ?');
$sorgu->execute([
$_GET['id']
]);
$ders = $sorgu->fetch(PDO::FETCH_ASSOC);

if(!$ders){
    header('Location:index.php');
    exit;
}


?>
<hr>
<h3>
<?php echo $ders['username']?>
<?php echo $ders['password']?>
<?php echo $ders['email']?>
</h3>