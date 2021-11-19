<?php
// Страница авторизации 

// Соединяемся с БД

$link=mysqli_connect("localhost", "root", "", "db");
if(isset($_POST['submit']))
{
    // Вытаскиваем из БД запись, у которой логин равняется введенному
    $query = mysqli_query($link,"SELECT id, password FROM users WHERE login='".mysqli_real_escape_string($link,$_POST['username'])."' LIMIT 1");
    $data = mysqli_fetch_assoc($query); 
    // Сравниваем пароли
    if($data['password'] === md5(md5($_POST['pass'])))  
    {
        
        setcookie("id", $data['id'], time()+60*60*24*30, "/");
        setcookie("login", $data['login'], time()+60*60*24*30, "/");
        
        $_SESSION['login']=$_POST['username'];
        $_SESSION['id']=$data['id'];
        
        header("Location: / "); exit();
    }
    else
    {
        print "Вы ввели неправильный логин/пароль";
    }
}
?>