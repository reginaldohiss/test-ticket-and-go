<?php

class Empresa
{
    public $id;
    public $nome;
    public $funcionarios = [];

    /**
     * @param $id
     * Método ativado na instância da classe, recebendo o id da empresa
     */
    public function __construct($id)
    {
        $this->nome = 'Empresa número ' . $id;
        $this->funcionarios = [];
    }

    /**
     * @param Funcionario $funcionario
     * @return void
     * Método responsável por adicionar funcionário
     */
    public function addFuncionario(Funcionario $funcionario)
    {
        $this->funcionarios[] = $funcionario;
    }

    /**
     * @return array
     * Método responsável por retornar todos os funcionários
     */
    public function getFuncionarios()
    {
        return $this->funcionarios;
    }
}
