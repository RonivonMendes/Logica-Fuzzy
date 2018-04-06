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
				<table>
					<form action="codFuzzy.php" method="post">
					<tr>
						<td style="text-align: right">
							Informe o capital disponivel para insvestimento em milhões:
						</td>
						<td>
							<input class="direita" type="text" name="capital" size="2" required>.000.000.
						</td>
					</tr>
					<tr>
						<td class="direita">
							Informe a quantidade de pessoas envolvidas no projeto:
						</td>
						<td>
							<input class="direita" type="text" name="pessoas" size="2" required>
						</td>
					</tr>
					<tr>
						<td class="cent" colspan="2">
							<input type="submit" value="Análisar">
							<input type="reset" value="Limpar">
						</td>
					</tr>
				</form>
			</table>
		</div>
		<br>

		<center>
			<img src='./img/graficoDinheiro.png' alt='' width='400' height='264'>
			<img src='./img/graficoPessoal.png' alt='' width='400' height='264'>
			<img src='./img/graficoRisco.png' alt='' width='400' height='264'>
		</center>

		<div class='footer'>
			<p class='rodape'>IFTM - ADS_V - IA - Ronivon Mendes</p>
		</div>
</body>
</html>