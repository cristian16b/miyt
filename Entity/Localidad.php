<?php

namespace Miyt\SymfonyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Miyt\SymfonyBundle\Entity
 *
 * @ORM\MappedSuperclass()
 */
class Localidad {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=7, nullable=true)
     *
     */
    protected $codigoPostal;

    /**
     * @ORM\Column(type="string", length=3, nullable=true)
     *
     */
    protected $subCodigoPostal;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()  
     *
     */
    protected $nombre;

    /**
     * @ORM\ManyToOne(targetEntity="Departamento")
     * @ORM\JoinColumn(name="departamento_id", referencedColumnName="id", nullable=false)     
     */
    protected $departamento;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\Date()
     */
    protected $fechaAlta;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\Date()
     */
    protected $fechaUltimaModificacion;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $usuarioUltimaModificacion;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\Date()
     */
    protected $fechaBaja;

    /**
     * Constructor
     */
    public function __construct() {
        
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set codigoPostal
     *
     * @param string $codigoPostal
     * @return Localidad
     */
    public function setCodigoPostal($codigoPostal) {
        $this->codigoPostal = $codigoPostal;

        return $this;
    }

    /**
     * Get codigoPostal
     *
     * @return string 
     */
    public function getCodigoPostal() {
        return $this->codigoPostal;
    }

    /**
     * Set subCodigoPostal
     *
     * @param string $subCodigoPostal
     * @return Localidad
     */
    public function setSubCodigoPostal($subCodigoPostal) {
        $this->subCodigoPostal = $subCodigoPostal;

        return $this;
    }

    /**
     * Get subCodigoPostal
     *
     * @return string 
     */
    public function getSubCodigoPostal() {
        return $this->subCodigoPostal;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Localidad
     */
    public function setNombre($nombre) {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre() {
        return $this->nombre;
    }

    /**
     * Set departamento
     *
     * @param Departamento $departamento
     * @return Localidad
     */
    public function setDepartamento(Departamento $departamento = null) {
        $this->departamento = $departamento;

        return $this;
    }

    /**
     * Get departamento
     *
     * @return Departamento 
     */
    public function getDepartamento() {
        return $this->departamento;
    }

    public function __toString() {
        return $this->getNombre();
    }

    /**
     * Set fechaUltimaModificacion
     *
     * @param \DateTime $fechaUltimaModificacion
     * @return Localidad
     */
    public function setFechaUltimaModificacion($fechaUltimaModificacion) {
        $this->fechaUltimaModificacion = $fechaUltimaModificacion;

        return $this;
    }

    /**
     * Get fechaUltimaModificacion
     *
     * @return \DateTime
     */
    public function getFechaUltimaModificacion() {
        return $this->fechaUltimaModificacion;
    }

    /**
     * Set usuarioUltimaModificacion
     *
     * @param string $usuarioUltimaModificacion
     * @return Localidad
     */
    public function setUsuarioUltimaModificacion($usuarioUltimaModificacion) {
        $this->usuarioUltimaModificacion = $usuarioUltimaModificacion;

        return $this;
    }

    /**
     * Get usuarioUltimaModificacion
     *
     * @return string 
     */
    public function getUsuarioUltimaModificacion() {
        return $this->usuarioUltimaModificacion;
    }

    /**
     * Set fechaAlta
     *
     * @param \DateTime $fechaAlta
     * @return Localidad
     */
    public function setFechaAlta($fechaAlta) {
        $this->fechaAlta = $fechaAlta;

        return $this;
    }

    /**
     * Get fechaAlta
     *
     * @return \DateTime 
     */
    public function getFechaAlta() {
        return $this->fechaAlta;
    }

    /**
     * Set fechaBaja
     *
     * @param \DateTime $fechaBaja
     * @return Comision
     */
    public function setFechaBaja($fechaBaja) {
        $this->fechaBaja = $fechaBaja;

        return $this;
    }

    /**
     * Get fechaBaja
     *
     * @return \DateTime 
     */
    public function getFechaBaja() {
        return $this->fechaBaja;
    }

}
