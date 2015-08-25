<?php

namespace SeGuiMo\CRMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MaterialesRed
 *
 * @ORM\Table(name="materiales_red", indexes={@ORM\Index(name="fk_materiales_red_cuentas1_idx", columns={"libro_diario_id"})})
 * @ORM\Entity
 */
class MaterialesRed
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
     * @ORM\Column(name="numero_serie", type="string", length=45, nullable=true)
     */
    private $numeroSerie;

    /**
     * @var string
     *
     * @ORM\Column(name="mac", type="string", length=45, nullable=true)
     */
    private $mac;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="text", nullable=true)
     */
    private $observaciones;

    /**
     * @var \SeGuiMo\CRMBundle\Entity\LibroDiario
     *
     * @ORM\OneToOne(targetEntity="SeGuiMo\CRMBundle\Entity\LibroDiario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="libro_diario_id", referencedColumnName="id", unique=true)
     * })
     */
    private $libroDiario;



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
     * Set marca
     *
     * @param string $marca
     * @return MaterialesRed
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
     * @return MaterialesRed
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
     * @return MaterialesRed
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
     * @return MaterialesRed
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
     * Set numeroSerie
     *
     * @param string $numeroSerie
     * @return MaterialesRed
     */
    public function setNumeroSerie($numeroSerie)
    {
        $this->numeroSerie = $numeroSerie;

        return $this;
    }

    /**
     * Get numeroSerie
     *
     * @return string 
     */
    public function getNumeroSerie()
    {
        return $this->numeroSerie;
    }

    /**
     * Set mac
     *
     * @param string $mac
     * @return MaterialesRed
     */
    public function setMac($mac)
    {
        $this->mac = $mac;

        return $this;
    }

    /**
     * Get mac
     *
     * @return string 
     */
    public function getMac()
    {
        return $this->mac;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return MaterialesRed
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
     * Set libroDiario
     *
     * @param \SeGuiMo\CRMBundle\Entity\LibroDiario $libroDiario
     * @return MaterialesRed
     */
    public function setLibroDiario(\SeGuiMo\CRMBundle\Entity\LibroDiario $libroDiario = null)
    {
        $this->libroDiario = $libroDiario;

        return $this;
    }

    /**
     * Get libroDiario
     *
     * @return \SeGuiMo\CRMBundle\Entity\LibroDiario 
     */
    public function getLibroDiario()
    {
        return $this->libroDiario;
    }
}
