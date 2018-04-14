<?php
require_once 'header.php';
require_once 'baglan.php';

if(!isset($_GET['id']) || empty($_GET['id'])){
    header('Location:index.php');
    exit;
}
$sorgu = $db->prepare('SELECT * FROM just
WHERE id = ?');
$sorgu->execute([
$_GET['id']
]);
$update = $sorgu->fetch(PDO::FETCH_ASSOC);
if(!$update){
    header('Location:index.php');
    exit;
}

if (isset($_POST['submit'])){
    $username = $_POST['username'] ?? $update['username'];
    $password = $_POST['password'] ?? $update['password'];
    $email = $_POST['email'] ?? $update['email'];
    
    if(!$username){
        echo 'Add username';
    }elseif(!$password){
        echo 'Add password';
    }elseif(!$email){
        echo 'Add email';
    }else{
        $sorgu = $db->prepare('UPDATE just SET
username = ?,
password = ?,
email = ?
WHERE id = ?');
$guncelle = $sorgu->execute([
$username,$password,$email,$update['id']
]);
if($guncelle){
    header('Location:index.php?sayfa=read&id='.$update['id']);
}else{
    echo 'Güncelleme işlemi başarısız';
}
    }
    }
    ?>

<form action = "" method="POST">
Ad: 
<input type="text" value = "<?php echo isset($_POST['username']) ? $_POST['username'] :  $update['username'];?>"name = "username"><br><br>
Soyad:
<input type="text" value = "<?php echo isset($_POST['password']) ? $_POST['password'] :  $update['password'];?>" name ="password"><br><br>
Eposta:
<input type="email" value ="<?php echo isset($_POST['email']) ? $_POST['email']: $update['email'];?>" name = "email"><br><br>
<button type="submit" name="submit">Güncelle</button>
<form>


<style>
button{
    background-color: #e7e7e7; 
    border: none;
    color: black;
    padding: 10px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

form{
    margin:0 auto;
    width:300px;
    height:270px;
    border:1px solid black;
}
input {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
}
</style>