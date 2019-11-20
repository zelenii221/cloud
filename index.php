<?php 
	require 'include/connection.php';
    require 'include/function.php';
    if (empty(!$_GET['user']) && !($_GET['user'] == $_SESSION['logged_user']) && file_exists){
        echo("Файл недоступен");
        exit();
    }


    
    $dir = "files/upload/" . $_SESSION['logged_user'];
    $newpath = $_GET['path'];
    $dir = $dir . $_GET['path'];
    if (!file_exists($dir)){
        echo("Файл недоступен");
        exit();
    }
    $files = array_diff(scandir($dir), array('..', '.'));

    
    
    // require 'include/login.php';
    // require 'include/registration.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Облако</title>
	<meta http-equiv="Cache-Control" content="private">
	<!-- Styles -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa|Open+Sans+Condensed:300&display=swap" rel="stylesheet">
	<script type="text/javascript" src="js/hide-seek.js"></script>
</head>
<body>
    <?php if (isset($_SESSION['logged_user'])) : ?>
        <header>
            <div id="header_content">
                <div class="sign">
                    <center>
                        <p>Вы авторизированы как: <?php echo $_SESSION['logged_user']?></p>
                        <p><a href="include/logout.php">Выйти</a></p>
                        
                        
                        <form name="form1" action="" enctype="multipart/form-data" method="post">
                        <input type="file" name="path" title="Выберите файл"/> </br>
                        </br>
                        <input type="submit" name="upload" value="Загрузить"/> </br>
                        </form>

                        <?php
                            // var_dump($dir."/".$_FILES['path']['name']);
                            $file = $_FILES['path']['name'];
                            move_uploaded_file($_FILES['path']['tmp_name'], $dir."/".$_FILES['path']['name']) ;
                            if(isset($_FILES['path']['name'])){
                                echo '<meta http-equiv="refresh" content="0">';
                            }
                        ?>
                        <form method="POST">
                            <div>
                                <span class="edit"><button type="submit" name="addcat" value="add">Добавить каталог</button></span>
                            </div>
                        </form>
                        <?php 
                            if($_POST['addcat'] == "add"){
                                echo('<form method="POST">
                                    <p>Имя каталога</p>
                                    <input required type="text" name="newcatalog" class="form-control" value="'.$_POST['newcatalog'].'">
                                    <button type="submit" name="catalog" value="1">Добавить</button> 
                                </form>');
                            }  
                            // var_dump($dir."/".$_POST['newcatalog']);
                            if($_POST["catalog"] == "1"){
                                if (!file_exists($dir."/".$_POST['newcatalog'])) {
                                    mkdir($dir."/".$_POST['newcatalog'], 0700);
                                }
                                echo '<meta http-equiv="refresh" content="0">';
                            }
                        ?>

                        
                        
                            <button OnClick="history.back()">Назад</button>
                        

                    </center>
                    <?php 
                    if (empty($_GET['path'])){
                        echo ("/");
                    } else {
                        echo ($_GET['path']);
                    }
                    ?>  
                    <hr>
                    <?php foreach($files as $file):?>
                        <div class="file">
                            <form method="POST">
                                <div>
                                    <span class="name">
                                    <?php
                                        if (is_dir($dir."/".$file)){
                                            echo("<a href='index.php?user=".$_SESSION['logged_user']."&path=".$newpath."/".$file."'>Перейти в каталог</a>".$file);
                                        } else {
                                            echo("Файл ".$file);
                                        }
                                    ?>

                                    </span>
                                    <span class="actions">
                                        
                                        
                                        <span class="edit"><button type="submit" name="edit" value="<?=$file?>">Переименовать</button></span>
                                        <span class="delete"><button type="submit" name="delete" value="<?=$file?>">Удалить</button></span>
                                        <?php
                                        if (!   is_dir($dir."/".$file)){
                                            echo("<span class='download'><button type='submit name='download value=".$file.">Скачать</button></span>");
                                        }
                                        ?>
                                    </span>
                                </div>
                            </form>
                        </div>

                        <?php



                            // $t = str_ireplace(".", "_", $file); 
                            // var_dump($_POST );
                            // var_dump ($_POST);
                            if($_POST['edit'] == $file){  
                                echo('<form method="POST">
                                    <p>Новое имя</p>
                                    <input required type="text" name="newname" class="form-control" value="' . @$_POST['newname'] . '">
                                    <button type="submit" name="rename" value="'.$file.'">Переименовать</button> 
                                </form>');
                                
                            }
                            
                            if($_POST["rename"] == $file){
                                rename($dir."/".$file, $dir."/".trim($_POST['newname']));
                                echo '<meta http-equiv="refresh" content="0">';
                            }

                            if($_POST["delete"] == $file){
                                Delete($dir."/".$file);
                                echo '<meta http-equiv="refresh" content="0">';
                            }

                            if($_POST["download"] == $file){    
                                echo ("<script>document.location.replace('include/download.php?user=".$_SESSION['logged_user']."&file=". $dir."/".$file."');</script>");
                                file_force_download($dir."/".$file);
                                // echo '<meta http-equiv="refresh" content="0">';
                            }
                        ?>

                    <?php endforeach; ?>
                            <!-- <li><a href="/orders.php?user_id= $_SESSION['logged_user']">Заказы</a></li> -->

                </div>
            </div>
        </header>
        
        <?php else: ?>
            <?php require 'include/login.php'; ?>
            <!-- <div class="background_registration" onclick="show('none', 'reg'), show('none', 'login')"></div>
            <div class="sign">
                <a onclick="show('block', 'login')" id="signin">ВХОД</a>
                <a onclick="show('block', 'reg')">Регистрация</a>
            </div> -->
    <?php endif; ?>
