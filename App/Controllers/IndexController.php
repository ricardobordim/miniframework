<?php
namespace App\Controllers;

// os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;
// use App\Connection;

// os models
use App\Models\Produto;
use App\Models\Info;

class indexController extends Action{


    public function index(){
        // echo ('Chegamos ao IndexController e disparamos o index ');

        // Simulando para testes

        $this->view->dados = ['Sofá', 'Cadeira','Mesa'];

    

        // CUIDAR QUE O REQUIRE_ONCE VAI LEVAR EM CONTA O CAMINHO A PARTIR DO PUBLIC E NAO DESSE ARQUIVO
        require_once "../App/Views/index/index.phtml";

    }

    public function sobreNos(){

        // $this->view->dados = ['Ricardo','48 anos', 'branco'];
        // echo ('Chegamos ao IndexController e disparamos o sobreNos ');

            // Criar a instanciar o PDO criando a conexão
        // $conn = Connection::getDb();
        // $produto = new Produto($conn);

        $produto = Container::getModel('Produto');
        $produtos = $produto->getProdutos();
        $this->view->dados = $produtos;
        
        $this->render('sobreNos','layout2');

    }

    public function planejamento()
    {
        // $conn = Connection::getDb();
        // $info = new Info($conn);

        $info = Container::getModel('Info');
        
        $infos = $info->getInfo();
        $this->view->dados = $infos;

        $this->render('planejamento', 'layout2');

    }


}

?>
