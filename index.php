
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/style.css">

	<title>AdminHub</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">S.G.P.V</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="#" onclick="page2()" id="page2">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Utente</span>
				</a>
			</li>
			<li>
				<a href="#" onclick="page3()">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Pagamento</span>
				</a>
			</li>
			
			<li >
				<a href="#" onclick="page5()">
					<i class='bx bxs-group' ></i>
					<span class="text">Funcionarios</span>
				</a>
			</li>
			<li>
				<a href="relatorio/relatorio/relatorio.php" onclick=" " id="page2">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Relatorio</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			
			<li>
				<a href="http://localhost/ES/SGPV%20-%20versao2/MenuInicial.html" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			
			<form action="#" onsubmit="searchData()" method="post">
				<div class="form-input">
					<input type="search" placeholder="Search..." id="search">
					<button onclick="searchData()" type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
		
			<a href="#" class="profile">
				<img src="img/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
				<a href="gerar_pdf.php" class="btn-download"  >
					<i class='bx bxs-cloud-download' ></i>
					<span onclick=" " id="gerarPdf()">Imprimir Listagem dos Utentes PDF</span>
				</a>
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<?php
							// Conecte-se ao banco de dados (ajuste as configurações de conexão)
							$db = new mysqli('localhost', 'root', 'root', 'sgpv');

							if ($db->connect_error) {
							    die('Erro na conexão com o banco de dados: ' . $db->connect_error);
							}

							$sql = "SELECT COUNT(*) AS lugares_ocupados FROM entrada_saida WHERE activo = 1";
							$result = $db->query($sql);

							if($result->num_rows > 0){
								$row = $result->fetch_assoc();
								$lugares_ocupados=$row['lugares_ocupados'];
							} else{
								$lugares_ocupados = 0;
							}
							$db->close();
						?>
						<h3><?php echo $lugares_ocupados; ?></h3>
						<p>Lugares Ocupados</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<?php
							// Conecte-se ao banco de dados (ajuste as configurações de conexão)
							$db = new mysqli('localhost', 'root', 'root', 'sgpv');

							if ($db->connect_error) {
							    die('Erro na conexão com o banco de dados: ' . $db->connect_error);
							}

							$sql = "SELECT COUNT(*) AS lugares_disponiveis FROM entrada_saida WHERE activo = 1";
							$result = $db->query($sql);

							if($result->num_rows > 0){
								$row = $result->fetch_assoc();
								$lugares_disponiveis=100-$row['lugares_disponiveis'];
							} else{
								$lugares_disponiveis = 1;
							}
							$db->close();
						?>
						<h3><?php echo $lugares_disponiveis; ?></h3>
						<p>Lugares disponíveis</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<?php
							// Conecte-se ao banco de dados (ajuste as configurações de conexão)
							$db = new mysqli('localhost', 'root', 'root', 'sgpv');

							if ($db->connect_error) {
							    die('Erro na conexão com o banco de dados: ' . $db->connect_error);
							}

							$sql = "SELECT SUM(Valor_pagar) AS ValorTotal FROM Pagamento";
							$result = $db->query($sql);

							if($result->num_rows > 0){
								$row = $result->fetch_assoc();
								$saldo=$row['ValorTotal'];
							} else{
								$saldo = 0;
							}
							$db->close();
						?>
						<h3><?php echo $saldo."Mts"; ?></h3>
						<p>Saldo</p>
					</span>
				</li>
			</ul>


			<div id="conteudo">
				
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
	<script src="https://unpkg.com/jspdf-invoice-template@1.4.0/dist/index.js"></script>
	<script src="script.js" defer>
		
	</script>

	<script type="text/javascript" defer>

		


		const switchMode = document.getElementById('switch-mode');

		switchMode.addEventListener('change', function () {
			if(this.checked) {
				document.body.classList.add('dark');
			} else {
				document.body.classList.remove('dark');
			}
		})

		const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

	allSideMenu.forEach(item=> {
		const li = item.parentElement;

		item.addEventListener('click', function () {
			allSideMenu.forEach(i=> {
				i.parentElement.classList.remove('active');
			})
			li.classList.add('active');
		})
	});

			const menuBar = document.querySelector('#content nav .bx.bx-menu');
	const sidebar = document.getElementById('sidebar');

	menuBar.addEventListener('click', function () {
		sidebar.classList.toggle('hide');
	})







const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
	if(window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');
		if(searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bx-search', 'bx-x');
		} else {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
		}
	}
})





if(window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x', 'bx-search');
	searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
	if(this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search');
		searchForm.classList.remove('show');
	}
})

		const page_container = document.getElementById('conteudo');

		function page1() {

	

		}
		function page2() {
		   
		    page_container.innerHTML = '<object width="100%" height="100%" type="text/html" data="Utente.php"</object>';
		    if (darkModeEnabled === '1') {
		        page_container.innerHTML.add('dark');
		    }
		}
		function page3() {
			page_container.innerHTML = '<object width="100%" height="100%" type="text/html" data="PagamentoM.php"</object>';
		}
		function page4() {
			page_container.innerHTML = '<object width="100%" height="100%" type="text/html" data="Talao.php"</object>';
		}
		function page5() {
			page_container.innerHTML = '<object width="100%" height="100%" type="text/html" data="Funcionarios.php"</object>';
		}
  
	</script>
</body>
</html>