<?php

namespace API\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation;
use Doctrine\ORM\EntityManager;

/**
 * Pratos
 *
 * @ORM\Table(name="pratos")
 * @ORM\Entity
 */
class Pratos {

    /**
     * @var integer
     *
     * @ORM\Column(name="idPratos", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $idpratos;

    /**
     * @var string
     *
     * @ORM\Column(name="prato", type="string", length=45, nullable=true)
     */
    public $prato;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="text", nullable=true)
     */
    public $descricao;

    /**
     * @var string
     *
     * @ORM\Column(name="valor", type="string", length=45, nullable=true)
     */
    public $valor;

    /**
     * @var string
     *
     * @ORM\Column(name="foto", type="string", length=45, nullable=true)
     */
    public $foto;

    /**
     * @var string
     *
     * @ORM\Column(name="video", type="string", length=45, nullable=true)
     */
    public $video;

    /**
     * @var \API\Entity\Categorias
     *
     * @ORM\ManyToOne(targetEntity="API\Entity\Categorias")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categoria", referencedColumnName="idCategorias")
     * })
     */
    public $categoria;
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

    public function getIdpratos() {
        return $this->idpratos;
    }

    public function setIdpratos($idpratos) {
        $this->idpratos = $idpratos;
    }

    public function getPrato() {
        return $this->prato;
    }

    public function setPrato($prato) {
        $this->prato = $prato;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function getVideo() {
        return $this->video;
    }

    public function setVideo($video) {
        $this->video = $video;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function setCategoria(\API\Entity\Categorias $categoria) {
        $this->categoria = $categoria;
    }

    public function getAll() {
        return $this->getEntityManager()->getRepository(get_class($this))->findAll();
    }

    public function store() {
        if (!$this->getIdpratos()) {
            $this->getEntityManager()->persist($this);
        } else {
            $this->getEntityManager()->merge($this);
        }
        $this->getEntityManager()->flush();
    }

    public function getById($id) {
        return $this->getEntityManager()->getRepository(get_class($this))->find($id);
    }

}
