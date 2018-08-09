<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tela Home</title>
	<link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">

</head>
<body>
	<section id="conteudo-view" class="login">

		<div align="center"><embed quality="high" src="http://www.cryd.com.br/relogios-feitos-em-flash/swf/08-13/977.swf" type="application/x-shockwave-flash" width="165" height="165" wmode="transparent"></embed></div>
		<div align="center"><embed quality="high" src="http://www.cryd.com.br/relogios-feitos-em-flash/swf/08-11/884.swf" type="application/x-shockwave-flash" width="120" height="40" wmode="transparent"></embed></div>
		
		

		<h1>Controle de Ponto</h1>		
		{!! Form::open(['route' => 'uses.login', 'method' => 'post', 'name'=>"formName"]) !!}		

		<label>			
				<input type="text" name="visor" readonly placeholder="Olá, insira sua senha!">
		</label>
			
		<script>
			function botao(value){
				if(value == "limpar"){
					document.formName.visor.value = null;
				} else {
					var salvo = document.formName.visor.value;
					document.formName.visor.value = salvo + value;
				}				
			}
		</script>
		
		{!! Form::button('7', ['id' => 'b7', 'value' => '7', 'onclick' => 'botao(value)']) !!}
		{!! Form::button('8', ['id' => 'b8', 'value' => '8', 'onclick' => 'botao(value)']) !!}
		{!! Form::button('9', ['id' => 'b9', 'value' => '9', 'onclick' => 'botao(value)']) !!}
		{!! Form::button('4', ['id' => 'b4', 'value' => '4', 'onclick' => 'botao(value)']) !!}
		{!! Form::button('5', ['id' => 'b5', 'value' => '5', 'onclick' => 'botao(value)']) !!}
		{!! Form::button('6', ['id' => 'b6', 'value' => '6', 'onclick' => 'botao(value)']) !!}
		{!! Form::button('1', ['id' => 'b1', 'value' => '1', 'onclick' => 'botao(value)']) !!}
		{!! Form::button('2', ['id' => 'b2', 'value' => '2', 'onclick' => 'botao(value)']) !!}
		{!! Form::button('3', ['id' => 'b3', 'value' => '3', 'onclick' => 'botao(value)']) !!}
		{!! Form::button('Limpar', ['id' => 'limpar', 'value' => 'limpar', 'onclick' => 'botao(value)']) !!}
		{!! Form::button('0', ['id' => 'b0', 'value' => '0', 'onclick' => 'botao(value)']) !!}
		{!! Form::submit('Confirmar') !!}
		
		{!! Form::close() !!}
					
	</section>
	
</body>
</html>
