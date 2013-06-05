<?php

namespace Menir\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use PHPUnit_Framework_TestCase;

class IndexControllerTest extends PHPUnit_Framework_TestCase {

    const API_VERSION = '0.0.1';

    public function indexAction() {
        $this->layout('/layout/pagina.phtml');
        return new ViewModel();
    }

    public function demoAction() {
        return new ViewModel();
    }

    public function testApiVersion() {
        $data = array();

        $data['version'] = self::API_VERSION;
        $jm = new JsonModel($data);
        $this->assertEquals('{"version":"0.0.1"}', $jm->serialize());
    }

    public function testApiData() {
        $data = array();

        $data[] = array('titulo' => 'Caçarolla', 'descricao' => 'carolla', 'preco' => '12');
        $data[] = array('titulo' => 'Spaghetti', 'descricao' => 'Macarrão', 'preco' => '24');
        $data[] = array('titulo' => 'Raviolli', 'descricao' => 'Macarrão recheado', 'preco' => '36');
        $jm = new JsonModel($data);
        ;
        $this->assertEquals(json_encode($data), $jm->serialize());
    }

}

?>
