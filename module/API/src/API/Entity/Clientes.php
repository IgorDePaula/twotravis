<?php

namespace API\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation;
use Doctrine\ORM\EntityManager;

/**
 * Clientes
 *
 * @ORM\Table(name="clientes")
 * @ORM\Entity
 */
class Clientes {

    /**
     * @var integer
     *
     * @ORM\Column(name="idClientes", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $idclientes;

    /**
     * @var string
     *
     * @ORM\Column(name="cliente", type="string", length=145, nullable=true)
     */
    public $cliente;

    /**
     * @var string
     *
     * @ORM\Column(name="cnpj", type="string", length=45, nullable=true)
     */
    public $cnpj;

    /**
     * @var string
     *
     * @ORM\Column(name="endereco", type="string", length=145, nullable=true)
     */
    public $endereco;

    /**
     * @var string
     *
     * @ORM\Column(name="bairro", type="string", length=45, nullable=true)
     */
    public $bairro;

    /**
     * @var string
     *
     * @ORM\Column(name="numero", type="string", length=45, nullable=true)
     */
    public $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=145, nullable=true)
     */
    public $email;

    /**
     * @var string
     *
     * @ORM\Column(name="telefone", type="string", length=45, nullable=true)
     */
    public $telefone;

    /**
     * @var string
     *
     * @ORM\Column(name="senha", type="string", length=45, nullable=true)
     */
    public $senha;

    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=45, nullable=true)
     */
    public $token;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=45, nullable=true)
     */
    public $estado;
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

    public function getIdclientes() {
        return $this->idclientes;
    }

    public function setIdclientes($idclientes) {
        $this->idclientes = $idclientes;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    public function getCnpj() {
        return $this->cnpj;
    }

    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function getBairro() {
        return $this->bairro;
    }

    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getToken() {
        return $this->token;
    }

    public function setToken($token) {
        $this->token = $token;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getAll() {
        return $this->getEntityManager()->getRepository(get_class($this))->findAll();
    }

    public function store() {
        if (!$this->getIdclientes()) {
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
