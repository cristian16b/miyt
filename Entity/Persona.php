<?php

namespace Miyt\SymfonyBundle\Entity;

use Miyt\SymfonyBundle\Validator\Constraints as CustomAssert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Miyt\SymfonyBundle\Entity
 *
 * @ORM\MappedSuperclass()
 * @UniqueEntity(fields={"numeroDocumento", "cuil", "fechaBaja"}, ignoreNull = false)
 */
class Persona {

    /**
     * @todo revisar
     */
    CONST ROLES = '';

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=35)
     * @Assert\NotBlank()    
     * @Assert\Length(min="2", max="35")
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Este valor no debería incluir números."
     * )
     */
    protected $nombre;

    /**
     * @ORM\Column(type="string", length=35)
     * @Assert\NotBlank()
     * @Assert\Length(min="2", max="35")
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="Este valor no debería incluir números."
     * )
     */
    protected $apellido;

    /**
     * @ORM\Column(type="string", length=6)
     * @Assert\NotBlank()  
     * @Assert\Choice(
     * choices = { "DNI", "LC", "LE"},
     * message = "Seleccione el tipo de documento",
     * )
     */
    protected $tipoDocumento;

    /**
     * @ORM\Column(type="string", length=8)
     * @Assert\NotBlank()
     * @Assert\Length(max="8")
     * @Assert\Regex(
     *     pattern="/\d/",
     *     message="Este valor debería incluir sólo números."
     * )
     */
    protected $numeroDocumento;

    /**
     * @ORM\Column(type="string", length=11)
     * @Assert\NotBlank()    
     * @Assert\Length(max="11")
     * @CustomAssert\CuitCuil()
     */
    protected $cuil;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Length(max="25")
     * 
     */
    protected $telefono;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Email(
     *     message = "El mail '{{ value }}' ingresado no tiene el formato correcto.",
     * )
     */
    protected $email;   
    
    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\Date()
     */
    protected $fechaBaja;        

    /**
     * @ORM\ManyToOne(targetEntity="Dependencia", cascade={"persist"})
     * @ORM\JoinColumn(name="dependencia_id", referencedColumnName="id")     
     */
    protected $dependencia;

    /**
     * @ORM\OneToOne(targetEntity="\Maspyma\UsuariosBundle\Entity\Usuario", cascade={"persist"})
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")     
     * 
     */
    protected $usuario;
    
    /**
     * @ORM\Column(type="string", length=2, nullable=true, options={"default":"NO"})
     * @Assert\Choice(
     * choices = { "SI", "NO"},
     * message = "Seleccione si o no",
     * groups={"empleado"})
     * )
     */
    protected $autoridadSuperior;

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
     * @ORM\Column(type="string", length=20, nullable=true)
     * @Assert\Length(max="20", groups={"empleado"})
     */
    protected $nivel;

    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $usuarioUltimaModificacion;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     * @Assert\Choice(
     * choices = { "Planta Permanente", "Planta Temporaria", "Contrato", "Personal Superior", "Personal de Gabinete", "Jubilacion", "Pasantia"},
     * message = "Seleccione tipo",
     * groups={"empleado"})
     * 
     */
    protected $situacionDeRevista;

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
     * Set nombre
     *
     * @param string $nombre
     * @return Persona
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
     * Set apellido
     *
     * @param string $apellido
     * @return Persona
     */
    public function setApellido($apellido) {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido() {
        return $this->apellido;
    }

    /**
     * Set tipoDocumento
     *
     * @param string $tipoDocumento
     * @return Persona
     */
    public function setTipoDocumento($tipoDocumento) {
        $this->tipoDocumento = $tipoDocumento;

        return $this;
    }

    /**
     * Get tipoDocumento
     *
     * @return string 
     */
    public function getTipoDocumento() {
        return $this->tipoDocumento;
    }

    /**
     * Set numeroDocumento
     *
     * @param string $numeroDocumento
     * @return Persona
     */
    public function setNumeroDocumento($numeroDocumento) {
        $this->numeroDocumento = $numeroDocumento;

        return $this;
    }

    /**
     * Get numeroDocumento
     *
     * @return string 
     */
    public function getNumeroDocumento() {
        return $this->numeroDocumento;
    }

    /**
     * Set cuil
     *
     * @param string $cuil
     * @return Persona
     */
    public function setCuil($cuil) {
        $this->cuil = $cuil;

        return $this;
    }

    /**
     * Get cuil
     *
     * @return string 
     */
    public function getCuil() {
        return $this->cuil;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Persona
     */
    public function setTelefono($telefono) {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono() {
        return $this->telefono;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Persona
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail() {
        return $this->email;
    }
   
    /**
     * Set fechaBaja
     *
     * @param \DateTime $fechaBaja
     * @return Persona
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
     * Set usuario
     *
     * @param \Maspyma\UsuariosBundle\Entity\Usuario $usuario
     * @return Persona
     */
    public function setUsuario(\Maspyma\UsuariosBundle\Entity\Usuario $usuario = null) {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \Maspyma\UsuariosBundle\Entity\Usuario
     */
    public function getUsuario() {
        return $this->usuario;
    }

    public function __toString() {
        return $this->getApellido() . ', ' . $this->getNombre();
    }

    public function getApellidoYnombre() {
        return $this->getApellido() . ' ' . $this->getNombre();
    }

    /**
     * Get rolPrincipal
     *
     * @return string 
     */
    public function getRolPrincipal(array $role_hierarchy) {
        /**
         * @todo La jerarquía de roles se encuentra ordenada descendentemente,
         * de manera que la primer ocurrencia dispara el rol principal.
         */
        $roles = $this->usuario->getRoles();

        foreach ($role_hierarchy as $role => $hierarchy) {
            if (in_array($role, $roles)) {
                return $role;
            }
        }

        return 'ROLE_AGENTE';
    }
   
    /**
     * Set dependencia
     *
     * @param Dependencia $dependencia
     * @return Persona
     */
    public function setDependencia(Dependencia $dependencia = null) {
        $this->dependencia = $dependencia;

        return $this;
    }

    /**
     * Get dependencia
     *
     * @return Dependencia 
     */
    public function getDependencia() {
        return $this->dependencia;
    }

    /**
     * Set fechaUltimaModificacion
     *
     * @param \DateTime $fechaUltimaModificacion
     * @return Persona
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
     * @return Persona
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
     * @return Persona
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
     * Set nivel
     *
     * @param string $nivel
     * @return Persona
     */
    public function setNivel($nivel) {
        $this->nivel = $nivel;

        return $this;
    }

    /**
     * Get nivel
     *
     * @return string 
     */
    public function getNivel() {
        return $this->nivel;
    }
    /**
     * Set situacionDeRevista
     *
     * @param string $situacionDeRevista
     * @return Persona
     */
    public function setSituacionDeRevista($situacionDeRevista) {
        $this->situacionDeRevista = $situacionDeRevista;

        return $this;
    }

    /**
     * Get situacionDeRevista
     *
     * @return string 
     */
    public function getSituacionDeRevista() {
        return $this->situacionDeRevista;
    }
    
        /**
     * Set autoridadSuperior
     *
     * @param string $autoridadSuperior
     * @return Persona
     */
    public function setAutoridadSuperior($autoridadSuperior) {
        $this->autoridadSuperior = $autoridadSuperior;

        return $this;
    }

    /**
     * Get autoridadSuperior
     *
     * @return string 
     */
    public function getAutoridadSuperior() {
        return $this->autoridadSuperior;
    }
    
    /**
     * @Assert\True(message="Este valor no debería estar vacío.")
     */
    public function getValidarNivel() {
        $situacionDeRevista = $this->situacionDeRevista;
        $nivel = $this->nivel;
        switch ($situacionDeRevista) {
            case 'Planta Permanente':
            case 'Planta Temporaria':
                return !empty($nivel);
            default:
                return true;
        }
    }
}
