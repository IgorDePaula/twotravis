<?php

use Doctrine\ORM\EntityManager,
    Doctrine\ORM\Configuration;
use API\Entity\Categorias;
use \PHPUnit_Framework_TestCase;
// ...



class ClienteTest extends PHPUnit_Framework_TestCase{

    private $entityManager = null;
    private $object;
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

        $this->entityManager = EntityManager::create($connectionOptions, $config);
        $this->object = new Categorias($this->entityManager);
    }
    
    public function testSetGetCategoryName()
    {
        $this->object->setCategoria('Massas');
        $this->assertEquals('Massas',$this->object->getCategoria());
    }
    public function testSetGetCategoryId()
    {
        $this->object->setIdcategorias(1);
        $this->assertEquals(1,$this->object->getIdcategorias());
    }
    public function testSetGetGetTypeCategoryName()
    {
        $this->object->setCategoria('Massas');
        $this->assertEquals('string',gettype($this->object->getCategoria()));
    }
    public function testSetGetGetTypeCategoryId()
    {
        $this->object->setIdcategorias(1);
        $this->assertEquals('integer',gettype($this->object->getIdcategorias()));
    }
     

}

?>
