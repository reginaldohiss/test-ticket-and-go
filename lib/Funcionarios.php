<?php

class Funcionarios
{
    public $funcionarios = [];
    public $indice = 0;

    /**
     * Método ativado na instância da classe, recebendo recebendo os funcionários como objeto
     */
    public function __construct($camimho = null)
    {
        $x = 0;
        $this->funcionarios[] = new Funcionario($x++, 'Zé', K_FUNCIONARIO_MOTIVADO);
        $this->funcionarios[] = new Funcionario($x++, 'Mario Prata', K_FUNCIONARIO_ESPERTO);
        $this->funcionarios[] = new Funcionario($x++, 'João Souza', K_FUNCIONARIO_HONESTO);
        $this->funcionarios[] = new Funcionario($x++, 'Maria Ambrosia', K_FUNCIONARIO_MOTIVADO);
        $this->funcionarios[] = new Funcionario($x++, 'Carlos Santos', K_FUNCIONARIO_MOTIVADO);
        $this->funcionarios[] = new Funcionario($x++, 'Francisco da Cunha', K_FUNCIONARIO_PREGUICOSO);
        $this->funcionarios[] = new Funcionario($x++, 'Godofredo Ansdruval', K_FUNCIONARIO_PREGUICOSO);
        $this->funcionarios[] = new Funcionario($x++, 'Marcoleidson Froga', K_FUNCIONARIO_PREGUICOSO);
        $this->funcionarios[] = new Funcionario($x++, 'Carmem de Sá', K_FUNCIONARIO_MOTIVADO);
        $this->funcionarios[] = new Funcionario($x++, 'Chica da Silva', K_FUNCIONARIO_MOTIVADO);
        $this->funcionarios[] = new Funcionario($x++, 'Francinaldo Andrades de Ló', K_FUNCIONARIO_DESONESTO);
        $this->funcionarios[] = new Funcionario($x++, 'Carmiro José', K_FUNCIONARIO_DESONESTO);
        $this->funcionarios[] = new Funcionario($x++, 'José Maria', K_FUNCIONARIO_HONESTO);
        $this->funcionarios[] = new Funcionario($x++, 'Dinho', K_FUNCIONARIO_DESONESTO);
        $this->importarCandidatos($camimho, $x);
    }

    /**
     * @return mixed|void
     * Método responsável por retornar todos os funcionários
     */
    public function pegarFuncionario()
    {
        if (isset($this->funcionarios[$this->indice])) {
            return $this->funcionarios[$this->indice++];
        }
    }

    /**
     * @return mixed|void
     * Método responsável por retornar um funcioários específico pelo id
     */
    public function pegarFuncionarioPorId($id)
    {
        if (isset($this->funcionarios[$id])){
            return $this->funcionarios[$id];
        }
    }

    /**
     * @return mixed
     * Método responsável por receber o id do tipo e retornar o nome por extenso
     */
    public function getNomeTipo($tipo)
    {
        switch ($tipo) {
            case 1:
                return "K_FUNCIONARIO_MOTIVADO";
                break;
            case 2:
                return "K_FUNCIONARIO_ESPERTO";
                break;
            case 3:
                return "K_FUNCIONARIO_HONESTO";
                break;
            case 4:
                return "K_FUNCIONARIO_DESONESTO";
                break;
            case 5:
                return "K_FUNCIONARIO_PREGUICOSO";
                break;
            case 6:
                return "K_FUNCIONARIO_COOPERATIVO";
                break;
            default:
                return "Este tipo de funcionário não é aceito";
        }
    }


    /**
     * @return void
     * Método responsável por receber o caminho do arquivo e realizar a importação dos funcionários
     */
    public function importarCandidatos($caminho, $x = 0)
    {
        $file = dirname(__DIR__) . DIRECTORY_SEPARATOR . $caminho;

        $tipos = [];
        $funcionarios = [];
        if(file_exists($file) && is_file($file)){
            $open = fopen($file, 'r');
            $posicao = 0;
            while (!feof($open)){
                $posicao++;
                $nomeTipo = str_replace('#', '', fgets($open));
                if(strpos($nomeTipo, '->')) {
                    $combine = explode('->', trim($nomeTipo));
                    $tipos[trim($combine[1])] = 'K_'.$combine[0];
                }

                if($posicao > 11){
                    $funcionario = trim(str_replace(['1', '2', '3', '4', '5', '6'], '', $nomeTipo));
                    $funcionarios[] = $funcionario;
                }
            }
        }

        if(count($funcionarios) > 0) {
            foreach ($funcionarios as $funcionario) {
                $this->funcionarios[] = new Funcionario($x++, trim(substr($funcionario, 0, -1)), constant(trim($tipos[substr($funcionario, -1)])));
            }
        }
    }

}
