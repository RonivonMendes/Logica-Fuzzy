<!DOCTYPE html>
<html>
<head>
	<title>Análise de Risco</title>
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
	<center>
		<div class="corpo">
			<h3>Análise de Risco</h3>
			<p>Análise de risco para um novo projeto com base na quantidade de dinheiro e pessoas envolvidas no projeto, Insira os valores para análise!</p>
			<form action="codFuzzy.php" method="post">
				<p>Informe o capital disponivel para insvestimento em milhões:<input class="direita" type="text" name="capital" size="2" required>.000.000</p>
				<p>Informe a quantidade de pessoas envolvidas no projeto:<input type="text" name="pessoas" size="2" required></p>
				<input type="submit" value="Análisar">
				<input type="reset" value="Limpar">
			</form>
		</div>

		<center>
		<img src='./img/graficoDinheiro.png' alt='' width='400' height='264'>
		<img src='./img/graficoPessoal.png' alt='' width='400' height='264'>
		<img src='./img/graficoRisco.png' alt='' width='400' height='264'>
		</center>";

</body>
</html>