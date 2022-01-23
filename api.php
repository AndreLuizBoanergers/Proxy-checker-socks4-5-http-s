		<?php
			extract($_GET);
			$log = explode("|",$api);
			$proxy = $log[0];
			$ip = explode(":", $proxy)[0];
			$porta = explode(":", $proxy)[1];
			$btn = $log[1];
			$url = $log[2];
			$type = $log[3];
			$findIp = 'https://ipwhois.app/json/'.$proxy;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $findIp);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$responseIp = curl_exec($ch);
			curl_close($ch);
			$find = json_decode($responseIp);
			$pais = $find -> country;
			$city = $find -> city;
			$org = $find -> org;
			$isp = $find -> isp;
			if($type == 'http'){
				$proxyType = 'CURLPROXY_HTTP';
			}elseif($type == 'socks4'){
				$proxyType = '7';
			}elseif($type == 'socks4a'){
				$proxyType = '7';
			}else{
				$proxyType = '7';
			}
				if($btn === "ckbox"){
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_PROXY, $proxy);
					curl_setopt($ch, CURLOPT_PROXYTYPE, $proxyType);
					curl_setopt($ch, CURLOPT_HEADER, true);
					curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_COOKIESESSION,true);
					curl_setopt($ch, CURLOPT_COOKIEJAR, '');
					curl_setopt($ch, CURLOPT_COOKIEFILE, '');
					$info = curl_getinfo($ch);
					$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
					$bing = curl_exec($ch);
					curl_close($ch);
					if($http_status==200){
					    $file = 'proxy.txt';
						$texto = $proxy."\n";
						//file_put_contents($file, $texto, FILE_APPEND | LOCK_EX);
						echo json_encode( array("status" => 1, "Proxy" => $ip, "Porta" => $porta, "Time" => $info['connect_time'], "Cidade" => $city, "Pais" => $pais, "org" => $org, "ISP" => $isp,  "retorno" =>"APROVADA"));
					    flush();
					    ob_flush();
					}else{ 
						echo json_encode( array("status" => 0, "Proxy" => $ip, "Porta" => $porta, "Time" => $info['connect_time'], "Cidade" => $city, "Pais" => $pais, "org" => $org, "ISP" => $isp,  "retorno"=>"REPROVADA"));
						flush();
					    ob_flush();

					}
				}else{
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL, $url);
						curl_setopt($ch, CURLOPT_PROXY, $proxy);
						curl_setopt($ch, CURLOPT_PROXYTYPE, $proxyType);
						curl_setopt($ch, CURLOPT_HEADER, true);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
						curl_setopt($ch, CURLOPT_COOKIESESSION,true);
						curl_setopt($ch, CURLOPT_COOKIEJAR, '');
						curl_setopt($ch, CURLOPT_COOKIEFILE, '');
						$bing = curl_exec($ch);
					    $info = curl_getinfo($ch);

					    $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
						curl_close($ch);
						if($http_status==200){
							echo json_encode( array("status" => 1, "Proxy" => $ip,"Porta" => $porta,"Time" => $info['connect_time'], "Cidade" => $city, "Pais" => $pais, "org" => $org, "ISP" => $isp,  "retorno"=>" APROVADA"));
							$file = 'proxy.txt';
							$texto = $proxy."\n";
							//file_put_contents($file, $texto, FILE_APPEND | LOCK_EX);
							flush();
					        ob_flush();

						}else{
							echo json_encode( array("status" => 0, "Proxy" => $ip,"Porta" => $porta,"Time" => $info['connect_time'], "Cidade" => $city, "Pais" => $pais, "org" => $org, "ISP" => $isp,  "retorno" =>"REPROVADA"));
						   flush();
					       ob_flush();

						}
				}
				flush();
				ob_flush();
		?>