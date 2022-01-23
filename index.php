<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">
	<style>
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}
		body{
			background: #00A8E6;
			display: grid;
			justify-content: center;
			color:rgba(255,215,0);
			border-top: 30px solid #fff;
		}
		header{
			display: flex;
			justify-content: space-around;
			max-width: 530px;
			width: 100%;
			margin: auto;
		}
		header img{
			width: 100px;
		}
		h1{
			font-size: 50px;
			font-family: 'Luckiest Guy', cursive;
			color: #ffff;
			margin-top: 30px;
		}
		p{
			color: rgba(255,215,0);
			font-family: 'Trebuchet MS';
		}
		#div-form{
			margin: auto;
		}
		textarea{
			max-width: 800px;
			width: 100%;
			background: #F0F8FF;
			margin-top: 10px;
			border: none;
			border-radius: 5px;
		}
		#progress{
			width: 530px;
		}
		.painel{
			display: flex;
			justify-content: center;
		}
		p{
			color: #2F4F4F;
			font-weight: bold;
		}
		.p{
			margin-right: 10px;
		}
		#ap{
			color: lime;
		}
		#rp{
			color: red;
		}
		span{
			color: #fff;
		}
		select{
			background: rgba(240,230,140);
			border: none;
			width: 80px;
			height: 25px;
			border-radius: 5px;
			font-size: 16px;
			margin-left: 5px;
			margin-bottom: 10px;
		}
		.btn{
			display: flex;
			align-items: center;
		}
		.btn p{
			margin-top: 20px;
			margin-left: 20px;
			color: #292929;
		}
		input[type='text']{
			background: #F0F8FF;
			border: none;
			width: 300px;
			height: 25px;
			border-radius: 5px;
		}
		#btn,#btnCopy{
			width: 100px;
			height: 25px;
			background: #fff;
			color: #696969;
			font-weight: bold;
			border: none;
			border-radius: 5px;
			margin-top: 10px;
		}
		input[type='submit']:hover{
			cursor: pointer;
		}
		input[type='submit']+input[type='submit']{
			margin-left: 20px;
		}
		.result{
			max-width: 1280px;
			width: 100%;
			display: flex;
			margin-top: 30px;
			padding: 20px;
		}
		ul{
	       list-style: none;
	    }
	    .ap{
	    	color: green;
	    }
	    .rp{
	    	color: red;
	    }
	    .plive{
	    	color: #ffff;
	    }

	    .pdie{
	    	color: red;
	    }
	    strong.timegreen{
	    	color: green;
	    }
	    strong.timered{
	    	color: red;
	    }
	    #copyLive{
	    	display: grid;
	    	display: none;
	    }
	    @media(max-width: 680px){
	    	header{
	    		width: 360px;
	    		margin: auto;
	    	}
	    	textarea{
	    		width: 300px;
	    	}
	    	header img{
	    		width: 80px;
	    		height: 80px;
	    	}
	    	h1{
	    		font-size: 20px;
	    	}
	    	#form{
	    		display: grid;
	    		width: 300px;
	    		justify-content: center;
	    	}
	    	#form div{
	    		width: 300px;
	    	}
	    	#progress{
	    		width: 300px;
	    	}
	    	input[type='text']{
	    		width: 300px;
	    	}
	    	.painel{
	    		display: grid;
	    		justify-content: center;
	    		width: 480px;
	    	}
	    	.btn{
	    		display:flex;
	    		justify-content: center;
	    	}
	    	.btn input{
	    		width: 100px;
	    	}
	    	.result{
	    		width: 300px;
	    		display: grid;
	    		padding: 10px;
	    	}

	    }
	</style>
	<title>Proxy Checker</title>
</head>
<body>
	<header>
		<h1>Proxy Checker</h1>
		<img src="logo.jpg" alt="">
	</header>
	<div id="div-form">
		<form id="form" method="post">
			<div>
				<textarea name="lista" id="lista" cols="70" rows="10"></textarea>
			</div>
			<div>
				<progress value="0" max="100" id="progress"></progress>
			</div>


			<div class="painel">
				<span>URL
				    <input type="Checkbox"id="chkbox">
				    <input type="text" id="urlPer">
			    </span>
			    <select name="proxytype" id="type">
					<option value="http">HTTP/s</option>
					<option value="socks4">SOCKS4</option>
					<option value="socks4a">SOCKS4a</option>
                    <option value="socks5">SOCKS5</option>
				</select>
			    <select name="url" id="url">
					<option value="https://www.google.com/">Google</option>
					<option value="https://br.yahoo.com/">Yahoo</option>
                    <option value="https://www.bing.com/">Bing</option>
				</select>
			</div>
			<div class="painel">
				<div><p>Caregadas: <span class="p" id="car"> 0 </span></P></div>
				<div><p> Testadas: <span class="p" id='te'> 0 </span></P></div>
				<div><p> Live: <span class="p" id='ap'> 0 </span></P></div>
				<div><p>Die:  <span class="p" id='rp'>0 </span></P></div>
			</div>
			<div class="btn">
				<input type="submit" from="form" id='btn'  name='btn' value="Checkar">
				<input type="submit" id='btnCopy' class="copy" value="Copiar">
				<p></p>
			</div>
		</form>
	</div>
	<div class="result">
		<ul id="proxylist">
			
		</ul>
		<div id="copyLive">
			
		</div>
	</div>
	<div>
		<link rel="stylesheet" href="https://cdn.positus.global/production/resources/robbu/whatsapp-button/whatsapp-button.css"> <a id="robbu-whatsapp-button" target="_blank" href="https://api.whatsapp.com/send?phone=5516996023254&text=%3C?%20=%22Ol%C3%A1%20gostaria%20de%20saber%20sobre%22%20?%3E"> <img src="https://cdn.positus.global/production/resources/robbu/whatsapp-button/whatsapp-icon.svg"> </a>
	</div>
	<script src="jquery-3.6.0.min.js"></script>
	<script src="script.js"></script>

</body>
</html>
