<?php

use Doctrine\ORM\EntityManager,
    Doctrine\ORM\Configuration;
use API\Entity\Categorias;
use \PHPUnit_Framework_TestCase;
// ...



class ClienteTest extends PHPUnit_Framework_TestCase
{    
    private $_object;
    
    public function setUp() {
        $applicationMode = "development";
        if ($applicationMode == "development") {
            $cache = new \Doctrine\Common\Cache\ArrayCache;
        } else {
            $cache = new \Doctrine\Common\Cache\ApcCache;
        }

        $config = new Configuration;
        $config->setMetadataCacheImpl($cache);
        $driverImpl = $config->newDefaultAnnotationDriver('../module/API/src/API/Entity');
        $config->setMetadataDriverImpl($driverImpl);
        $config->setQueryCacheImpl($cache);
        $config->setProxyDir('/path/to/myproject/lib/MyProject/Proxies');
        $config->setProxyNamespace('MyProject\Proxies');

        if ($applicationMode == "development") {
            $config->setAutoGenerateProxyClasses(true);
        } else {
            $config->setAutoGenerateProxyClasses(false);
        }

        $connectionOptions = array(
            'driver' => 'pdo_mysql',
            'host' => 'localhost',
            'port' => '3306',
            'user' => 'root',
            'password' => '',
            'dbname' => 'myapphome'
        );

        $entityManager = EntityManager::create($connectionOptions, $config);
        $this->_object = new Categorias($entityManager);
    }
    
    public function testSetGetCategoryName()
    {
        $this->_object->setCategoria('Massas');
        $this->assertEquals('Massas', $this->_object->getCategoria());
    }
    public function testSetGetCategoryId()
    {
        $this->_object->setIdcategorias(1);
        $this->assertEquals(1, $this->_object->getIdcategorias());
    }
    public function testSetGetGetTypeCategoryName()
    {
        $this->_object->setCategoria('Massas');
        $this->assertEquals('string', gettype($this->_object->getCategoria()));
    }
    public function testSetGetGetTypeCategoryId()
    {
        $this->_object->setIdcategorias(1);
        $this->assertEquals(
            'integer', 
            gettype($this->_object->getIdcategorias())
        );
    }
     

}

?>
