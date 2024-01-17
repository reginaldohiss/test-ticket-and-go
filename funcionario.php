<?php
    session_start();

    /**
    *Mostra todos os dados do funcionário de acordo com o id recebido por get.
    *Deve mostrar o nome do usuário que está fazendo o teste, como registrado na sessão.
    *Deve conter um link que volta para a listagem.
    */

    include 'lib/Funcionarios.php';
    include 'lib/Funcionario.php';
    include 'lib/Empresa.php';
    include 'lib/Pagina.php';


    $funcionarios = new Funcionarios('candidatos.dump');
    $detalhes = $funcionarios->pegarFuncionarioPorId($_GET['id']);
    $nomeTipo = $funcionarios->getNomeTipo($detalhes->tipo);
    $pagina = new Pagina('página 2 - Funcionário');
    $htmlConteudo = '<table>';
    $htmlConteudo .= '<tr>';
    $htmlConteudo .= '<th>Nome</th>';
    $htmlConteudo .= '<th>Tipo</th>';
    $htmlConteudo .= '<tr>';
    $htmlConteudo .= '<tr>';
    $htmlConteudo .= '<td>'.$detalhes->nome.'</td>';
    $htmlConteudo .= '<td>'.$nomeTipo.'</td>';
    $htmlConteudo .= '</tr>';
    $htmlConteudo .= '</table>';
    $pagina->setNomeUsuario(strtoupper($_SESSION['nome']));
    $pagina->setConteudo($htmlConteudo);
    $pagina->mostrar();
