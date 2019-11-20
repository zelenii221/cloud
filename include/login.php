<?php
    require 'include/registration.php';
	$data = $_POST;
	if(isset($data['do_login'])){
		$errors = array();

		$login = $data['login'];
		if(search_login($login)){
			{
				if(password_verify($data['password'], search_password_by_login($login))){
					$_SESSION['logged_user'] = $login;
					$_SESSION['id_users'] = search_id_by_login($login);
					echo "<script>document.location.replace('index.php');</script>";
				}
				else{
					$errors[] = 'Пароль введен неверно!';
				}
			}
		}
		else{
			$errors[] = 'Пользователя с таким логином не существует!';
		}

		if(empty($errors)){

		}
		else{
			echo '<div style="color: red">'.array_shift($errors).'</div><hr>';
		}
	}
?>
<div class="registration" id="login">
	<p>Для использования личного/n хранилища аваризируйтесь:</p>
	<form action="/" method="POST">
		<p>Логин: <input required type="text" name="login" class="form-control" value="<?php echo @$data['login']; ?>"></p>
		<p>Пароль: <input required type="password" name="password" class="form-control" value="<?php echo @$data['password']; ?>"></p>
		<p><button type="submit" name="do_login" class="btn btn-success">Войти</button></p>
        
	</form>
    <a onclick="show('block', 'reg')">Регистрация</a>
    
</div>