<?php

namespace SeGuiMo\CRMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nodos
 *
 * @ORM\Table(name="nodos", uniqueConstraints={@ORM\UniqueConstraint(name="nombre_UNIQUE", columns={"nombre"}), @ORM\UniqueConstraint(name="ip_UNIQUE", columns={"ip"})}, indexes={@ORM\Index(name="fk_nodos_nodos1_idx", columns={"supernodo"}), @ORM\Index(name="fk_nodos_materiales_red1_idx", columns={"materiales_red_id"})})
 * @ORM\Entity
 */
class Nodos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=100, nullable=true)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=15, nullable=true)
     */
    private $ip;

    /**
     * @var string
     *
     * @ORM\Column(name="user", type="string", length=100, nullable=true)
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="pass", type="string", length=100, nullable=true)
     */
    private $pass;

    /**
     * @var string
     *
     * @ORM\Column(name="url_guifi", type="string", length=100, nullable=true)
     */
    private $urlGuifi;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_alta", type="datetime", nullable=true)
     */
    private $fechaAlta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_baja", type="datetime", nullable=true)
     */
    private $fechaBaja;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="text", nullable=true)
     */
    private $observaciones;

    /**
     * @var \SeGuiMo\CRMBundle\Entity\Nodos
     *
     * @ORM\ManyToOne(targetEntity="SeGuiMo\CRMBundle\Entity\Nodos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="supernodo", referencedColumnName="id")
     * })
     */
    private $supernodo;

    /**
     * @var \SeGuiMo\CRMBundle\Entity\MaterialesRed
     *
     * @ORM\ManyToOne(targetEntity="SeGuiMo\CRMBundle\Entity\MaterialesRed")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="materiales_red_id", referencedColumnName="id")
     * })
     */
    private $materialesRed;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="SeGuiMo\CRMBundle\Entity\MaterialesFungibles", inversedBy="nodos")
     * @ORM\JoinTable(name="nodos_has_materiales",
     *   joinColumns={
     *     @ORM\JoinColumn(name="nodos_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="materiales_id", referencedColumnName="id")
     *   }
     * )
     */
    private $materiales;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->materiales = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Nodos
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Nodos
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return Nodos
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set user
     *
     * @param string $user
     * @return Nodos
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set pass
     *
     * @param string $pass
     * @return Nodos
     */
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * Get pass
     *
     * @return string 
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set urlGuifi
     *
     * @param string $urlGuifi
     * @return Nodos
     */
    public function setUrlGuifi($urlGuifi)
    {
        $this->urlGuifi = $urlGuifi;

        return $this;
    }

    /**
     * Get urlGuifi
     *
     * @return string 
     */
    public function getUrlGuifi()
    {
        return $this->urlGuifi;
    }

    /**
     * Set fechaAlta
     *
     * @param \DateTime $fechaAlta
     * @return Nodos
     */
    public function setFechaAlta($fechaAlta)
    {
        $this->fechaAlta = $fechaAlta;

        return $this;
    }

    /**
     * Get fechaAlta
     *
     * @return \DateTime 
     */
    public function getFechaAlta()
    {
        return $this->fechaAlta;
    }

    /**
     * Set fechaBaja
     *
     * @param \DateTime $fechaBaja
     * @return Nodos
     */
    public function setFechaBaja($fechaBaja)
    {
        $this->fechaBaja = $fechaBaja;

        return $this;
    }

    /**
     * Get fechaBaja
     *
     * @return \DateTime 
     */
    public function getFechaBaja()
    {
        return $this->fechaBaja;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return Nodos
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string 
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set supernodo
     *
     * @param \SeGuiMo\CRMBundle\Entity\Nodos $supernodo
     * @return Nodos
     */
    public function setSupernodo(\SeGuiMo\CRMBundle\Entity\Nodos $supernodo = null)
    {
        $this->supernodo = $supernodo;

        return $this;
    }

    /**
     * Get supernodo
     *
     * @return \SeGuiMo\CRMBundle\Entity\Nodos 
     */
    public function getSupernodo()
    {
        return $this->supernodo;
    }

    /**
     * Set materialesRed
     *
     * @param \SeGuiMo\CRMBundle\Entity\MaterialesRed $materialesRed
     * @return Nodos
     */
    public function setMaterialesRed(\SeGuiMo\CRMBundle\Entity\MaterialesRed $materialesRed = null)
    {
        $this->materialesRed = $materialesRed;

        return $this;
    }

    /**
     * Get materialesRed
     *
     * @return \SeGuiMo\CRMBundle\Entity\MaterialesRed 
     */
    public function getMaterialesRed()
    {
        return $this->materialesRed;
    }

    /**
     * Add materiales
     *
     * @param \SeGuiMo\CRMBundle\Entity\MaterialesFungibles $materiales
     * @return Nodos
     */
    public function addMateriale(\SeGuiMo\CRMBundle\Entity\MaterialesFungibles $materiales)
    {
        $this->materiales[] = $materiales;

        return $this;
    }

    /**
     * Remove materiales
     *
     * @param \SeGuiMo\CRMBundle\Entity\MaterialesFungibles $materiales
     */
    public function removeMateriale(\SeGuiMo\CRMBundle\Entity\MaterialesFungibles $materiales)
    {
        $this->materiales->removeElement($materiales);
    }

    /**
     * Get materiales
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMateriales()
    {
        return $this->materiales;
    }
	
}
