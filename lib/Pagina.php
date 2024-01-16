<?php

class Pagina
{
    public $nomeUsuario = '???';
    public $tituloPagina;
    public $conteudo;


    /**
     * @param $tituloPagina
     * Método ativado na instância da classe, recebendo o título para renderização da página
     */
    public function __construct($tituloPagina)
    {
        $this->tituloPagina = $tituloPagina;
    }

    /**
     * @param $nomeUsuario
     * @return void
     * Método acoplado ao conceito de encapsulamento para setar o nomeUsuario id
     */
    public function setNomeUsuario($nomeUsuario)
    {
        $this->nomeUsuario = $nomeUsuario;
    }

    /**
     * @param $conteudo
     * @return void
     * Método acoplado ao conceito de encapsulamento para setar o atributo conteudo
     */
    public function setConteudo($conteudo)
    {
        $this->conteudo = $conteudo;
    }

    /**
     * @return void
     * Método responsável pela renderização do cabeçalho da página
     */
    public function mostrar()
    {
        $stHtml = "<body style='margin: 0;'></body><div style='background-color:eeeeff; width:100%; text-align:center; height:40px;'> 
				TESTE DE ADMISSÃO DE " . $this->nomeUsuario . '<br>' . $this->tituloPagina . '
			</div>';
        $stHtml .= $this->conteudo;
        $stHtml .= "<footer style='background-color:eeeeff; width:100%; text-align:center; height:25px; position: fixed; bottom: 0;'> ".date('d/m/y H:i:s')."</footer>";
        echo $stHtml;
    }
}
