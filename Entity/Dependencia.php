<?php

namespace Miyt\SymfonyBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Miyt\SymfonyBundle\Entity
 *
* @ORM\MappedSuperclass()
 */
class Dependencia {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank() 
     */
    protected $descripcion;

    /**
     * @ORM\Column(type="smallint")
     * @Assert\NotBlank()  
     */
    protected $categoriaProgramatica;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\Date()
     */
    protected $fechaBaja;

    /**
     * @ORM\ManyToOne(targetEntity="Persona")
     * @ORM\JoinColumn(name="personaResponsable_id", referencedColumnName="id", nullable=false)     
     * @Assert\NotBlank()  
     */
    protected $personaResponsable;

    /**
     * @ORM\ManyToOne(targetEntity="Dependencia", inversedBy="dependenciasHijas")
     * @ORM\JoinColumn(name="dependenciaPadre_id", referencedColumnName="id", nullable=false)     
     * @Assert\NotBlank()  
     */
    protected $dependenciaPadre;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\Date()
     */
    protected $fechaAlta;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\Date()
     */
    protected $fechaUltimaModificacion;

    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $usuarioUltimaModificacion;

    /**
     * @ORM\OneToMany(targetEntity="Dependencia", mappedBy="dependenciaPadre")
     */
    protected $dependenciasHijas;

    /**
     * Constructor
     */
    public function __construct() {
        $this->dependenciasHijas = new ArrayCollection();
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Dependencia
     */
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion() {
        return $this->descripcion;
    }

    /**
     * Set categoriaProgramatica
     *
     * @param string $categoriaProgramatica
     * @return Dependencia
     */
    public function setCategoriaProgramatica($categoriaProgramatica) {
        $this->categoriaProgramatica = $categoriaProgramatica;
        return $this;
    }

    /**
     * Get categoriaProgramatica
     *
     * @return string 
     */
    public function getCategoriaProgramatica() {
        return $this->categoriaProgramatica;
    }

    /**
     * Set fechaBaja
     *
     * @param \DateTime $fechaBaja
     * @return Dependencia
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

    /**
     * Set personaResponsable
     *
     * @param Persona $personaResponsable
     * @return Dependencia
     */
    public function setPersonaResponsable(Persona $personaResponsable = null) {
        $this->personaResponsable = $personaResponsable;
        return $this;
    }

    /**
     * Get personaResponsable
     *
     * @return Persona 
     */
    public function getPersonaResponsable() {
        return $this->personaResponsable;
    }

    /**
     * Set dependenciaPadre
     *
     * @param Dependencia $dependenciaPadre
     * @return Dependencia
     */
    public function setDependenciaPadre(Dependencia $dependenciaPadre = null) {
        $this->dependenciaPadre = $dependenciaPadre;
        return $this;
    }

    /**
     * Get dependenciaPadre
     *
     * @return Dependencia 
     */
    public function getDependenciaPadre() {
        return $this->dependenciaPadre;
    }

    public function __toString() {
        return $this->descripcion;
    }

    /**
     * Set fechaUltimaModificacion
     *
     * @param \DateTime $fechaUltimaModificacion
     * @return Dependencia
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
     * @return Dependencia
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
     * @return Dependencia
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
     * Add dependenciasHijas
     *
     * @param Dependencia $dependenciasHijas
     * @return Dependencia
     */
    public function addDependenciasHija(Dependencia $dependenciasHijas) {
        $this->dependenciasHijas[] = $dependenciasHijas;
        return $this;
    }

    /**
     * Remove dependenciasHijas
     *
     * @param Dependencia $dependenciasHijas
     */
    public function removeDependenciasHija(Dependencia $dependenciasHijas) {
        $this->dependenciasHijas->removeElement($dependenciasHijas);
    }

    /**
     * Get dependenciasHijas
     *
     * @return Collection 
     */
    public function getDependenciasHijas() {
        $dependenciasHijas = new ArrayCollection();
        foreach ($this->dependenciasHijas as $dependenciaHija) {
            if ($dependenciaHija->getFechaBaja() === NULL) {
                $dependenciasHijas[] = $dependenciaHija;
            }
        }
        return $dependenciasHijas;
    }

    /**
     * Get personasResponsables
     *
     * @return array
     */
    public function getPersonasResponsables() {
//        /**
//         * Alternativa 1 - Toda la carga en la entidad
//         */
//        $personasResponsablesDependenciaPadre = array();
//        $dependencia = $this;
//        while (!empty($dependencia->getDependenciaPadre()) && mb_strtoupper($dependencia->getDescripcion(), 'UTF-8') != 'GOBERNADOR') {
//            $personasResponsablesDependenciaPadre[] = $dependencia->getPersonaResponsable();
//            $dependencia = $dependencia->getDependenciaPadre();
//        }
//        return $personasResponsablesDependenciaPadre;
        /**
         * Alternativa 2 - Recursiva php 5.5
         */
//        $personasResponsablesDependenciaPadre = ((!empty($this->getDependenciaPadre()) && mb_strtoupper($this->getDescripcion(), 'UTF-8') != 'GOBERNADOR') ? $this->getDependenciaPadre()->getPersonasResponsables() : array());
        /**
         * Alternativa 3 - Recursiva php 5.4
         */
        $personasResponsablesDependenciaPadre = (($this->getDependenciaPadre() && mb_strtoupper($this->getDescripcion(), 'UTF-8') != 'GOBERNADOR') ? $this->getDependenciaPadre()->getPersonasResponsables() : array());
        return array_merge(array($this->personaResponsable), $personasResponsablesDependenciaPadre);
    }

    /**
     * Get funcionario
     *
     * @return Persona
     */
    public function getFuncionario() {
        foreach ($this->getPersonasResponsables() as $personaResponsable) {
            if (true == in_array('ROLE_FUNCIONARIO', $personaResponsable->getUsuario()->getRoles())) {
                return $personaResponsable;
            }
        }
        return null;
    }

    /**
     * Get politicoInmediato
     *
     * @return Persona
     */
    public function getPoliticoInmediato() {
        foreach ($this->getPersonasResponsables() as $personaResponsable) {
            if (true == in_array('ROLE_POLITICO', $personaResponsable->getUsuario()->getRoles())) {
                return $personaResponsable;
            }
        }
        return null;
    }

    /**
     * Get politicos
     *
     * @return array
     */
    public function getPoliticos() {
        $politicos = array();
        foreach ($this->getPersonasResponsables() as $personaResponsable) {
            if (true == in_array('ROLE_POLITICO', $personaResponsable->getUsuario()->getRoles())) {
                $politicos[] = $personaResponsable;
            }
        }
        return $politicos;
    }

}
