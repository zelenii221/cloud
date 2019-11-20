<?php
    function search_login($login){
		global $db;

		$search_query = 'SELECT Login FROM users WHERE Login = "'.$login.'"';

		$result = mysqli_query($db, $search_query);

		$result_1 = mysqli_fetch_assoc($result);

		return $result_1;
    }
    
    function insert_user($login /*,$email*/,$password){
		global $db;

		$insert_query = "INSERT INTO users (login, password) VALUES ('$login', '$password')";

		$result = mysqli_query($db, $insert_query);
    }
    
    function search_password_by_login($login){
		global $db;

		$search_query = "SELECT password FROM users WHERE login = '$login'";

		$result = implode (mysqli_fetch_assoc(mysqli_query($db, $search_query)));

		return $result;
    }
    
    function search_id_by_login($login){
		global $db;

		$search_query = 'SELECT id FROM users WHERE login = "'.$login.'"';

		$result = implode(mysqli_fetch_assoc(mysqli_query($db, $search_query)));

		return $result;
    }
    
    function prompt($prompt_msg){
        echo("<script type='text/javascript'> var answer = prompt('".$prompt_msg."'); </script>");

        echo("<script type='text/javascript'> document.write(\"<p id='answer' style='display: none;'>\" + answer + \"</p>\"); </script>");
        // return($answer);
	}
	
	function file_force_download($file) {
		if (file_exists($file)) {
		  if (ob_get_level()) {
			ob_end_clean();
		  }
		  header('Content-Description: File Transfer');
		  header('Content-Type: application/octet-stream');
		  header('Content-Disposition: attachment; filename=' . basename($file));
		  header('Content-Transfer-Encoding: binary');
		  header('Expires: 0');
		  header('Cache-Control: must-revalidate');
		  header('Pragma: public');
		  header('Content-Length: ' . filesize($file));
		  if ($fd = fopen($file, 'rb')) {
			while (!feof($fd)) {
			  print fread($fd, 1024);
			}
			fclose($fd);
		  }
		  exit;
		}
	  }


	  function Delete($path)
		{
			if (is_dir($path) === true)
			{
				$files = array_diff(scandir($path), array('.', '..'));

				foreach ($files as $file)
				{
					Delete(realpath($path) . '/' . $file);
				}

				return rmdir($path);
			}

			else if (is_file($path) === true)
			{
				return unlink($path);
			}

			return false;
		}
?>