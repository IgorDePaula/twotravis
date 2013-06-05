<?php

namespace API\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation;
use Doctrine\ORM\EntityManager;

/**
 * Categorias
 *
 * @ORM\Table(name="categorias")
 * @ORM\Entity
 */
class Categorias {

    /**
     * @var integer
     *
     * @ORM\Column(name="idCategorias", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $idcategorias;

    /**
     * @var string
     *
     * @ORM\Column(name="categoria", type="string", length=45, nullable=true)
     */
    public $categoria;

    /**
     * @var \API\Entity\Clientes
     *
     * @ORM\ManyToOne(targetEntity="API\Entity\Clientes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cliente", referencedColumnName="idClientes")
     * })
     */
    public $cliente;
    private $entityManager = null;

    function __construct(EntityManager $entityManager) {
        $this->setEntityManager($entityManager);
    }

    public function getEntityManager() {
        return $this->entityManager;
    }

    public function setEntityManager($entityManager) {
        $this->entityManager = $entityManager;
    }

    public function getIdcategorias() {
        return $this->idcategorias;
    }

    public function setIdcategorias($idcategorias) {
        $this->idcategorias = $idcategorias;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function setCliente(\API\Entity\Clientes $cliente) {
        $this->cliente = $cliente;
    }

    public function getAll() {
        return $this->getEntityManager()->getRepository(get_class($this))->findAll();
    }

    public function store() {
        if (!$this->getIdcategorias()) {
            $this->getEntityManager()->persist($this);
        } else {
            $this->getEntityManager()->merge($this);
        }
        $this->getEntityManager()->flush();
    }

    public function getById($id) {
        return $this->getEntityManager()->getRepository(get_class($this))->find($id);
    }
    
    public function populate(array $data)
    {
        $c = new Clientes($this->getEntityManager());
        $this->setCategoria($data['categoria']);
        $this->setCliente($c->getById($data['cliente']));
        $this->setIdcategorias($data['idcategorias']);
    }

}
