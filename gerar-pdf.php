<?php
	session_start();
	include_once 'acoes/verifica-logado.php';
	require_once "acoes/conexao.php";
    $id_logado = $_SESSION['idusuario'];

    $sql = "SELECT * FROM usuarios WHERE idusuario = '$id_logado'";
    // echo "$sql";

    $resultado = mysqli_query($con, $sql);
    $dados     = mysqli_fetch_assoc($resultado); // nao precisa do while pq e so um usuario

    // criar variaveis para cada dado do array associativo
    $idusuario     = $dados['idusuario'];
    $nome          = $dados['nome'];
    $nacionalidade = $dados['nacionalidade'];
    $estado_civil  = $dados['estado_civil'];
    $idade         = $dados['idade'];
    $endereco      = $dados['endereco'];
    $celular       = $dados['celular'];
    $email         = $dados['email'];
    $foto          = $dados['foto'];
	$caminho	   = __DIR__."\\fotos\\$foto";
	$css 		   = __DIR__."\\assets\\css\\bootstrap.min.css";
	$css2 		   = __DIR__."\\assets\\css\\tema-curriculo.css";

	// ESCREVER DADOS PESSOAIS
	$html = "";
	$html .= "<html>";
	$html .= "<head>";
	$html .= "<link type='text/css' href='$css' rel='stylesheet' />";
	$html .= "<style>
	* { font-family: Roboto, 1rem; }
	@page { margin-left: 75px; }
	div { font-size: 1rem; line-height: 1.1rem; }
	.titulos { margin-top: 2rem; margin-bottom: 1rem; }
	.lista::before { content: '»'; }
	</style>";
	$html .= "<link rel='preconnect' href='https://fonts.gstatic.com'>
	<link href='https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap' rel='stylesheet'>";
	$html .= "</head>";
	$html .= "<body><div class='corpo'><br>";
	$html .= "<p class='text-center titulos'><strong>Currículo</strong></p>";
	$html .= "<div class='text-center'><img class='img-thumbnail rounded' src='$caminho' width='100px' /></div><br></r>";
	$html .= "<p class='text-center'>$nome</p>";
	$html .= "<p class='text-center'>$nacionalidade, $estado_civil, $idade anos.</p>";
	$html .= "<p class='text-center'>$endereco</p>";
	$html .= "<p class='text-center'>$celular</p> <br>";

	$html .= "<p class='text-center'><strong>Formações</strong></p>";

	// CONSULTAR FORMACOES
	$sql_formacoes = "SELECT * FROM formacoes WHERE idusuario = '$id_logado'";
	$resultado_formacoes = mysqli_query($con, $sql_formacoes);
	
	while($dados_formacoes = mysqli_fetch_array($resultado_formacoes)) {
		// variaveis de formacao
		$nivel		 = $dados_formacoes['nivel'];
		$nome_curso  = $dados_formacoes['nome_curso'];
		$instituicao = $dados_formacoes['instituicao'];
		$ano_inicio  = $dados_formacoes['ano_inicio'];
		$ano_termino = $dados_formacoes['ano_termino'];
		$situacao 	 = $dados_formacoes['situacao'];
	
		$html .= "<p class='lista'> $nivel - $nome_curso - $instituicao - $ano_inicio-$ano_termino</p>";
	} // fim while formacoes

	$html .= "<br> <p class='text-center'><strong>Cursos</strong></p>";

	// CONSULTAR CURSOS
	$sql_cursos = "SELECT * FROM cursos WHERE idusuario = '$id_logado'";
	$resultado_cursos = mysqli_query($con, $sql_cursos);
	
	while($dados_cursos = mysqli_fetch_array($resultado_cursos)) {
		$nome_curso  = $dados_cursos['nome_curso'];
		$instituicao = $dados_cursos['instituicao'];
		$ano_curso   = $dados_cursos['ano_curso'];
	
		$html .= "<p class='lista'> $nome_curso - $instituicao - $ano_curso</p>";
	} // fim while cursos

	// Conteúdo escrivo que vai formar de fato o html
	$html .= "</div>";
	$html .= "</body>";
	$html .= "</html>";

// CRIAÇÃO DO PDF DE FATO

	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;
	use Dompdf\Options; // para usar imagens

	// include autoloader
	require_once("acoes/dompdf/autoload.inc.php");

	// criar opcoes para permitir imagens	
	$options = new Options();
	$options->set('isHtml5ParserEnabled', true);
	$options->set('isRemoteEnabled', true);

	//Criando a Instancia
	$dompdf = new Dompdf($options);

	// caminho do CSS
	$dompdf->set_base_path("/assets/css/");

	$dompdf->load_html($html);

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"CV.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);

?>