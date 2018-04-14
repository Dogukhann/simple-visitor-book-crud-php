<?php 

$sorgu = $db->prepare('INSERT INTO just SET
username = ?,
password = ?,
email = ?

');

if(isset($_POST['submit'])){
    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;
    $email = $_POST['email'] ?? null;

    if(!$username){
        echo 'Please enter your username';
    }
    elseif(!$password){
        echo 'Please enter your password';
    }
    elseif(!$email){
        echo 'Please enter your email';
    }else{
        $sorgu = $db->prepare('INSERT INTO just SET
        username = ?,
        password = ?,
        email = ?
        ');

        $ekle = $sorgu->execute([
            $username,$password,$email
        ]);

        if($ekle){
            header('Location:index.php');
        }else{
            $hata = $sorgu->errorInfo();
            echo 'MySQL Hatası'.$hata[2];
        }
    }
}
?>

<form action="" method="POST">
<div class="jss">
Username:
<input type="text" value="<?php echo $_POST['username'] ?? null;?>" name="username"><br>
Password:
<input type="password" value="<?php echo $_POST['password'] ?? null;?>" name="password"><br>
Email:
<input type="email" value="<?php echo $_POST['email'] ?? null;?>"name="email">
<button type="submit" name='submit' class="submit">Ekle</button>
</div>
</form>


<style>
button{
    background-color: #e7e7e7; /* Green */
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