<?php

namespace SeGuiMo\CRMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LibroDiario
 *
 * @ORM\Table(name="libro_diario", indexes={@ORM\Index(name="fk_cuentas_modelos_cuenta1_idx", columns={"cuenta_id"}), @ORM\Index(name="fk_cuentas_documentos_cuenta1_idx", columns={"documentos_id"}), @ORM\Index(name="fk_libro_diario_personas_has_nodos1_idx", columns={"personas_has_nodos_id"})})
 * @ORM\Entity
 */
class LibroDiario
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
     * @ORM\Column(name="concepto", type="string", length=100, nullable=true)
     */
    private $concepto;

    /**
     * @var float
     *
     * @ORM\Column(name="cantidad", type="float", precision=10, scale=2, nullable=true)
     */
    private $cantidad;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=true)
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="text", nullable=true)
     */
    private $observaciones;

    /**
     * @var \SeGuiMo\CRMBundle\Entity\Cuentas
     *
     * @ORM\OneToOne(targetEntity="SeGuiMo\CRMBundle\Entity\Cuentas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cuentas_id", referencedColumnName="id", unique=true)
     * })
     */
    private $cuenta;

    /**
     * @var \SeGuiMo\CRMBundle\Entity\Documentos
     *
     * @ORM\ManyToOne(targetEntity="SeGuiMo\CRMBundle\Entity\Documentos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="documentos_id", referencedColumnName="id")
     * })
     */
    private $documentos;

    /**
     * @var \SeGuiMo\CRMBundle\Entity\PersonasHasNodos
     *
     * @ORM\ManyToOne(targetEntity="SeGuiMo\CRMBundle\Entity\PersonasHasNodos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="personas_has_nodos_id", referencedColumnName="id")
     * })
     */
    private $personasHasNodos;



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
     * Set concepto
     *
     * @param string $concepto
     * @return LibroDiario
     */
    public function setConcepto($concepto)
    {
        $this->concepto = $concepto;

        return $this;
    }

    /**
     * Get concepto
     *
     * @return string 
     */
    public function getConcepto()
    {
        return $this->concepto;
    }

    /**
     * Set cantidad
     *
     * @param float $cantidad
     * @return LibroDiario
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return float 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return LibroDiario
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return LibroDiario
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
     * Set cuenta
     *
     * @param \SeGuiMo\CRMBundle\Entity\Cuentas $cuenta
     * @return LibroDiario
     */
    public function setCuenta(\SeGuiMo\CRMBundle\Entity\Cuentas $cuenta = null)
    {
        $this->cuenta = $cuenta;

        return $this;
    }

    /**
     * Get cuenta
     *
     * @return \SeGuiMo\CRMBundle\Entity\Cuentas 
     */
    public function getCuenta()
    {
        return $this->cuenta;
    }

    /**
     * Set documentos
     *
     * @param \SeGuiMo\CRMBundle\Entity\Documentos $documentos
     * @return LibroDiario
     */
    public function setDocumentos(\SeGuiMo\CRMBundle\Entity\Documentos $documentos = null)
    {
        $this->documentos = $documentos;

        return $this;
    }

    /**
     * Get documentos
     *
     * @return \SeGuiMo\CRMBundle\Entity\Documentos 
     */
    public function getDocumentos()
    {
        return $this->documentos;
    }

    /**
     * Set personasHasNodos
     *
     * @param \SeGuiMo\CRMBundle\Entity\PersonasHasNodos $personasHasNodos
     * @return LibroDiario
     */
    public function setPersonasHasNodos(\SeGuiMo\CRMBundle\Entity\PersonasHasNodos $personasHasNodos = null)
    {
        $this->personasHasNodos = $personasHasNodos;

        return $this;
    }

    /**
     * Get personasHasNodos
     *
     * @return \SeGuiMo\CRMBundle\Entity\PersonasHasNodos 
     */
    public function getPersonasHasNodos()
    {
        return $this->personasHasNodos;
    }
}
