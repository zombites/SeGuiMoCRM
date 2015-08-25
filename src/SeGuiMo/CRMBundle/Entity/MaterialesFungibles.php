<?php

namespace SeGuiMo\CRMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MaterialesFungibles
 *
 * @ORM\Table(name="materiales_fungibles")
 * @ORM\Entity
 */
class MaterialesFungibles
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
     * @ORM\Column(name="nombre", type="string", length=100, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="marca", type="string", length=100, nullable=true)
     */
    private $marca;

    /**
     * @var string
     *
     * @ORM\Column(name="modelo", type="string", length=100, nullable=true)
     */
    private $modelo;

    /**
     * @var float
     *
     * @ORM\Column(name="pvd", type="float", precision=10, scale=2, nullable=true)
     */
    private $pvd;

    /**
     * @var float
     *
     * @ORM\Column(name="pvp", type="float", precision=10, scale=2, nullable=true)
     */
    private $pvp;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="text", nullable=true)
     */
    private $observaciones;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="SeGuiMo\CRMBundle\Entity\Nodos", mappedBy="materiales")
     */
    private $nodos;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->nodos = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return MaterialesFungibles
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
     * Set marca
     *
     * @param string $marca
     * @return MaterialesFungibles
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return string 
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set modelo
     *
     * @param string $modelo
     * @return MaterialesFungibles
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return string 
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set pvd
     *
     * @param float $pvd
     * @return MaterialesFungibles
     */
    public function setPvd($pvd)
    {
        $this->pvd = $pvd;

        return $this;
    }

    /**
     * Get pvd
     *
     * @return float 
     */
    public function getPvd()
    {
        return $this->pvd;
    }

    /**
     * Set pvp
     *
     * @param float $pvp
     * @return MaterialesFungibles
     */
    public function setPvp($pvp)
    {
        $this->pvp = $pvp;

        return $this;
    }

    /**
     * Get pvp
     *
     * @return float 
     */
    public function getPvp()
    {
        return $this->pvp;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return MaterialesFungibles
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
     * Add nodos
     *
     * @param \SeGuiMo\CRMBundle\Entity\Nodos $nodos
     * @return MaterialesFungibles
     */
    public function addNodo(\SeGuiMo\CRMBundle\Entity\Nodos $nodos)
    {
        $this->nodos[] = $nodos;

        return $this;
    }

    /**
     * Remove nodos
     *
     * @param \SeGuiMo\CRMBundle\Entity\Nodos $nodos
     */
    public function removeNodo(\SeGuiMo\CRMBundle\Entity\Nodos $nodos)
    {
        $this->nodos->removeElement($nodos);
    }

    /**
     * Get nodos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNodos()
    {
        return $this->nodos;
    }
}
