<?php

define('K_FUNCIONARIO_MOTIVADO', 1);
define('K_FUNCIONARIO_ESPERTO', 2);
define('K_FUNCIONARIO_HONESTO', 3);
define('K_FUNCIONARIO_DESONESTO', 4);
define('K_FUNCIONARIO_PREGUICOSO', 5);
define('K_FUNCIONARIO_COOPERATIVO', 6);

class Funcionario
{
    public $id;
    public $nome;
    public $tipo;

    /**
    * Método ativado na instância da classe, recebendo parametros para validar o tipo de funcionário
    */
    public function __construct($id, $nome, $tipo)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->tipo = $tipo;
        if ($tipo != K_FUNCIONARIO_MOTIVADO
           and $tipo != K_FUNCIONARIO_ESPERTO
           and $tipo != K_FUNCIONARIO_HONESTO
           and $tipo != K_FUNCIONARIO_HONESTO
           and $tipo != K_FUNCIONARIO_PREGUICOSO
           and $tipo != K_FUNCIONARIO_DESONESTO
           and $tipo != K_FUNCIONARIO_COOPERATIVO
        ) {
            trigger_error('Este tipo de funcionário não é aceito', E_USER_ERROR);
        }
    }

    /**
     * @return mixed
     *  Método acoplado ao conceito de encapsulamento para pegar o atributo id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     *  Método acoplado ao conceito de encapsulamento para pegar o atributo nome
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return mixed
     * Método acoplado ao conceito de encapsulamento para pegar o atributo tipo
     */
    public function getTipo()
    {
        return $this->tipo;
    }

}
