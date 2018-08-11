
          <?php 
		$login = "email=admin&password=M@r@ny@n3";
		$url = "http://192.168.53.93:8082/api/session";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $login);

		$content = curl_exec($ch);

		// get cookies
		$cookies = array();
		preg_match_all('/Set-Cookie:(?<cookie>\s{0,}.*)$/im', $content, $cookies);

		$kk = $cookies['cookie'][0];
		header("Set-Cookie: ".$kk);
                header("Location: tracker_home.php");

	?>

