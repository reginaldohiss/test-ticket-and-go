# TicketAndGo: Teste admissional de php

### Orientações
Temos um cadastro de funcionários da TicketAndGo e um arquivo de importação. O cadastro da TicketAndGo está representado pela classe funcionários e o arquivo de importação é o arquivo candidatos.dump. Precisamos terminar de gerar duas telas para facilitar ao departamento de RH a visualização e triagem dos candidatos.

A primeira tela é a listagem de todos os funcionários disponíveis. A segunda a tela com todos os dados do funcionário. Para isso estão sendo utilizados quatro classes que já estão semi-implementadas: Empresa, Funcionario, Funcionarios e Pagina.

Você pode utilizar qualquer forma de consulta que for necessária, menos chats e formas de comunicação com outros usuários. A solução será avaliada pela complexidade dos itens resolvidos, clareza e simplicidade do código gerado, e boa prática de orientação a objetos. Boa Sorte !

### CLASSES
- A classe **Empresa**, como o nome já diz, representa uma empresa. Cada empresa possui um nome, id e uma lista de funcionários.
- A classe **Funcionario** tem id, nome e tipo. Sendo o tipo um valor que define a característica predominante do funcionário. Este valor corresponde a uma das constantes definidas no arquivo com a declaração da classe.
- A classe **Funcionarios** representa a coleção de todos os funcionários disponíveis para serem contratados. Uma vez instanciada ela deve retornar todos os funcionários, um por um, através do método pegarFuncionario().
- A classe **Pagina** representa uma página de html e é utilizada para gerar páginas padronizadas em html.

### SCRIPTS
- **index.php** - A página que mostra a listagem com os nomes dos funcionários disponíveis.
- **funcionario.php** - A página que mostra o funcionário com os dados do funcionário selecionado.

## TESTE

1. Estudar as classes, disponíveis na pasta /lib, e documentar cada método, no próprio código, com um texto claro dizendo o que ele faz. (texto simples, sem demorar muito) -> FEITO 
2. Corrigir um erro que existe no método pegarFuncionario da classe Funcionários, pois este não está retornando todos os funcionários disponíveis. -> FEITO
3. Implementar nesta mesma classe o método pegarFuncionarioPorId($id) que retorna apenas o funcionário com o id solicitado. -> FEITO
4. Registrar o seu nome em uma variável na sessão, no arquivo de listagem, e passar ele para a página nos dois arquivos. Para a página do funcionário, deve se utilizar o valor da sessão. -> FEITO
5. Gerar um rodapé na página com a data e hora atual. -> FEITO
6. Tirar a margem que fica visível ao redor do título da página. -> FEITO
7. Terminar de implementar a listagem, para mostrar o nome de todos os funcionarios. -> FEITO
8. Implementar a página do funcionário, mostrando todos os seus dados, inclusive o tipo. -> FEITO
9. Gerar uma classe chamada TicketAndGo, que extenda da classe Empresa, e sobrescrever o método addFuncionario, de forma que este adicione apenas funcionários dos tipos: honesto , cooperativo , esperto ou motivado. -> FEITO
10. Na tela de listagem, adicionar os funcionários à empresa TicketAndGo e mostrar uma listagem com apenas estes funcionários. -> FEITO
11. Gerar na classe Funcionarios um método que importa os funcionários do arquivo "candidatos.dump" e chamar este método a partir do contrutor da classe. -> FEITO
12. Criar uma nova listagem abaixo da existente, contendo a porcentagem por tipo de funcionário. -> FEITO