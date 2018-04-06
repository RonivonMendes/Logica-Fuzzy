<?php
	echo "<link rel='stylesheet' type='text/css' href='estilo.css'>";
	$capital = $_POST['capital'];
	$pessoas = $_POST['pessoas'];
	$mdpouco;
	$mdrazoavel;
	$mdadequado;
	$mpinsuficiente;
	$mpsatisfatorio;

	//CALCULANDO MD POUCO
	if ($capital <=30) {
		$mdpouco = 1; 
	}

	if ($capital >30 && $capital <= 50) {
		$mdpouco = (((50-$capital)/(50-30)));
	}


	if ($capital > 50) {
		$mdpouco = '0';
	}

	//echo $mdpouco;

	//CALCULANDO MD RAZOAVEL
	if ($capital <30) {
		$mdrazoavel = 0; 
	}

	if ($capital >30 && $capital <= 50) {
		$mdrazoavel = ((($capital-30)/(50-30)));
	}

	if ($capital >50 && $capital <= 70) {
		$mdrazoavel = (((70-$capital)/(70-50)));
	}

	if ($capital > 70) {
		$mdrazoavel = 0;
	}

	//CALCULANDO MD ADEQUADO
	if ($capital <50) {
		$mdadequado = 0; 
	}

	if ($capital > 50 && $capital <= 70) {
		$mdadequado = (($capital-50)/(70-50));
	}

	if ($capital > 70) {
		$mdadequado = 1;
	}

	##################################################################################
	//CALCULANDO MP INSUFICIENTE
	if ($pessoas <=30) {
		$mpinsuficiente = 1; 
	}

	if ($pessoas >30 && $pessoas <= 70) {
		$mpinsuficiente = (((70-$pessoas)/(70-30)));
	}

	if ($pessoas > 70) {
		$mpinsuficiente = 0;
	}

	//CALCULANDO MP SATISFATORIO
	if ($pessoas <30) {
		$mpsatisfatorio = 0; 
	}

	if ($pessoas >30 && $pessoas <= 70) {
		$mpsatisfatorio = ((($pessoas-30)/(70-30)));
	}

	if ($pessoas > 70) {
		$mpsatisfatorio = 1;
	}

	echo "<center>";
	echo "<img src='./img/graficoDinheiro.png' alt='' width='400' height='264'>";
	echo "<img src='./img/graficoPessoal.png' alt='' width='400' height='264'>";
	echo "<img src='./img/graficoRisco.png' alt='' width='400' height='264'>";

	echo "<br>";

	##################################################################################
	//REGRAS DE INFÊRENCIA

	//Se Mdpouco(x) OU Mpinsuficiente(x) ENTÃO Mralto(x)$
	$mralto1;
	if($mdpouco<$mpinsuficiente){
		$mralto1 = $mpinsuficiente;
	} elseif ($mdpouco>$mpinsuficiente) {
		$mralto1 = $mdpouco;
	}elseif ($mdpouco==$mpinsuficiente) {
		$mralto1 = $mdpouco;
	}
	else
		$mralto1=0;

	//Se Mdpouco(x) E Mpsatisfatorio(x) ENTÃO Mralto(x)
	$mralto2;
	if($mdpouco<$mpsatisfatorio){
		$mralto2 = $mdpouco;
	} elseif ($mdpouco>$mpsatisfatorio) {
		$mralto2 = $mpsatisfatorio;
	}elseif ($mdpouco==$mpsatisfatorio) {
		$mralto2 = $mdpouco;
	}
	else
		$mralto2=0;

	//Se Mdrazoavel(x) E Mpsatisfatorio(x) ENTÃO Mrmedio(x)
	$mrmedio;
	if($mdrazoavel<$mpsatisfatorio){
		$mrmedio = $mdrazoavel;
	} elseif ($mdrazoavel>$mpsatisfatorio) {
		$mrmedio = $mpsatisfatorio;
	}elseif ($mdrazoavel==$mpinsuficiente) {
		$mrmedio = $mdrazoavel;
	}
	else
		$mrmedio=0;

	//Se Mdadequado(x) E Mpsatisfatorio(x) ENTÃO Mrbaixo(x)
	$mrbaixo;
	if($mdadequado<$mpsatisfatorio){
		$mrbaixo = $mdadequado;
	} elseif ($mdadequado>$mpsatisfatorio) {
		$mrbaixo = $mpsatisfatorio;
	}elseif ($mdadequado==$mpsatisfatorio) {
		$mrbaixo = $mdadequado;
	}
	else
		$mrbaixo=0;

	echo "<br><table>";
		echo "<tr>";
			echo "<td class='pag2'>SE Md pouco(".$capital.")= ". number_format($mdpouco,2)."</td> <td class='pag2'>OU</td> <td class='pag2'>Mp insuficiente(".$pessoas.")= ".$mpinsuficiente."</td><td class='pag2'>ENTÃO</td> <td class='pag2'>Mr alto(".number_format($mralto1,2).")</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td class='pag2'>SE Md pouco(".$capital.")= ".number_format($mdpouco,2)."</td> <td class='pag2'>E</td> <td class='pag2'>Mp satisfatorio(".$pessoas.")= ".$mpsatisfatorio."</td><td class='pag2'>ENTÃO</td> <td class='pag2'>Mr alto(".number_format($mralto2,2).")</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td class='pag2'>SE Md razoavel(".$capital.")= ".number_format($mdrazoavel,2)."</td> <td class='pag2'>E</td> <td class='pag2'>Mp satisfatorio(".$pessoas.")= ".$mpsatisfatorio."</td><td class='pag2'>ENTÃO</td> <td class='pag2'>Mr médio(".number_format($mrmedio,2).")</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td class='pag2'>SE Md adequado(".$capital.")= ".number_format($mdadequado, 2)."</td> <td class='pag2'>E</td> <td class='pag2'>Mp satisfatorio(". $pessoas.")= ".$mpsatisfatorio."</td> <td class='pag2'>ENTÃO</td> <td class='pag2'>Mr baixo(".number_format($mrbaixo,2).")</td>";
		echo "</tr>";
	echo "</table>";

	#pegando o maior valor de Mralto
	$mraltomax = max($mralto1, $mralto2);
	//echo "<br> MR Alto Max = ". $mraltomax . "<br>";

	$cog = ((((10+20+30)*$mrbaixo)+((40+50+60)*$mrmedio)+((70+80+90)*$mraltomax))/((3*$mrbaixo)+(3*$mrmedio)+(3*$mraltomax)));
	echo "<br>";
	echo "<br> C-O-G: ". number_format($cog , 2);

	if($cog>$mrbaixo)
		$difMrbaixo= $cog - $mrbaixo;
	else
		$difMrbaixo = $mrbaixo - $cog;

	if($cog>$mrmedio)
		$difMrmedio = $cog - $mrmedio;
	else
		$difMrmedio = $mrmedio - $cog;

	if($cog>$mraltomax)
		$difMralto = $cog - $mraltomax;
	else
		$difMralto = $mraltomax - $cog;

	#Arrai para armazenar onde o resultado do cog tem maior grau de pertinencia!
	$risco = array(
		'baixo' => $difMrbaixo,
		'médio' => $difMrmedio,
		'alto' => $difMralto,
	);

	echo "<h3><strong><br>A categoria de risco que o projeto se encaixa é ".array_search(min($risco), $risco). ", uma vez que o valor ". number_format($cog , 2)." tem o maior grau de pertinência nessa saída! </strong></h3>";

	echo "<br><br>";

	echo "<p>Para realizar uma nova análise, clique <a href='index.php'>aqui</a>!</p><br><br>";

	echo "<div class='footer'>";
		echo "<p class='rodape'>IFTM - ADS_V - IA - Ronivon Mendes</p>";
	echo "</div>";
?>