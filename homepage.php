
<?php
require_once 'baglan.php';
require_once 'header.php';
$myfirstproject = $db->query('SELECT * FROM just')->fetchAll(PDO::FETCH_ASSOC);
?>

<?php if ($myfirstproject): ?>
<ul>
<?php foreach($myfirstproject as $project): ?>
<div class="css">
    <li>
    <?php echo $project ['username'] ?>
   
    <a href="index.php?sayfa=read&id=<?php echo $project['id'] ?>">[READ]</a>
    <a href="index.php?sayfa=update&id=<?php echo $project['id'] ?>">[UPDATE]</a>
    <a href="index.php?sayfa=delete&id=<?php echo $project['id'] ?>">[DELETE]</a>
    </li>
    </div>
<?php endforeach; ?>
<div>
<?php else:?>
Henüz Eklenmiş ders bulunmuyor
</div>
<?php endif;?>
</ul>
<style>
li{
    list-style-type:none;
}
</style>