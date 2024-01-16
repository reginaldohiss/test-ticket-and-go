<?php
    session_start();

    $_SESSION['nome'] = 'Reginaldo';

    include 'lib/Funcionarios.php';
    include 'lib/Empresa.php';
    include 'lib/TicketAndGo.php';
    include 'lib/Funcionario.php';
    include 'lib/Pagina.php';

    $funcionarios = new Funcionarios('candidatos.dump');
    $empresa = new Empresa(1);
    $ticket = new TicketAndGo(2);
    $conteudo = '';
    $tiposPorcentagem = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0];

    /*
     * adiciona funcionários a empresa.
     */
    while ($funcionario = $funcionarios->pegarFuncionario()) {
        $empresa->addFuncionario($funcionario);
        $ticket->addFuncionario($funcionario);

        if(array_key_exists($funcionario->tipo, $tiposPorcentagem)){
            $tiposPorcentagem[$funcionario->tipo] += 1;
        }
    }

    $arFuncionarios = $empresa->getFuncionarios();
    $ticketFuncionarios = $ticket->getFuncionarios();

    /*
     * gera a listagem, bom gerar função/método específico.
     */
    $htmlConteudo = '';
    foreach ($arFuncionarios as $funcionario) {
        $htmlConteudo .= "<a href='funcionario.php?id=" . $funcionario->getId() . "'>" . $funcionario->getNome() . '</a><br>';
    }

    $pagina = new Pagina('Página 1 - Lista de Funcionários Disponíveis');
    $pagina->setConteudo($htmlConteudo);
    $pagina->mostrar();

    /*
     * gera a listagem, com gerar função/método específico.
     */
    $htmlConteudoTicket = '';
    foreach ($ticketFuncionarios as $ticketFuncionario) {
        $htmlConteudoTicket .= "<a href='funcionario.php?id=" . $ticketFuncionario->getId() . "'>" . $ticketFuncionario->getNome() . '</a><br>';
    }

    $pagina = new Pagina('Página 1 - Lista de Funcionários Ticker And Go');
    $pagina->setConteudo($htmlConteudoTicket);
    $pagina->mostrar();

    /*
     * gera a listagem, com de Porcentagem.
     */
    $htmlConteudoPorcentagem = '';
    foreach ($tiposPorcentagem as $key => $porcetagem){
        $nomeTipo = substr($funcionarios->getNomeTipo($key), 2);
        $porcetagemValor = (1 / $porcetagem) * 100;
        $htmlConteudoPorcentagem .= '<p>'.$nomeTipo.' -> '.number_format($porcetagemValor, 0).' %</p>';
    }
    $htmlConteudoPorcentagem .= '<br>';

    $pagina = new Pagina('Página 1 - Lista de Porcentagem por Tipo');
    $pagina->setConteudo($htmlConteudoPorcentagem);
    $pagina->mostrar();


