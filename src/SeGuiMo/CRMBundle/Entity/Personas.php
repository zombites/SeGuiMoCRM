<?php

namespace SeGuiMo\CRMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Personas
 *
 * @ORM\Table(name="personas", uniqueConstraints={@ORM\UniqueConstraint(name="mail_1_UNIQUE", columns={"mail_1"}), @ORM\UniqueConstraint(name="telefono_1_UNIQUE", columns={"telefono_1"})})
 * @ORM\Entity
 */
class Personas
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
     * @ORM\Column(name="nombre", type="string", length=45, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=100, nullable=true)
     */
    private $apellidos;

    /**
     * @var string
     *
     * @ORM\Column(name="mail_1", type="string", length=45, nullable=true)
     */
    private $mail1;

    /**
     * @var string
     *
     * @ORM\Column(name="mail_2", type="string", length=45, nullable=true)
     */
    private $mail2;

    /**
     * @var integer
     *
     * @ORM\Column(name="telefono_1", type="integer", nullable=true)
     */
    private $telefono1;

    /**
     * @var integer
     *
     * @ORM\Column(name="telefono_2", type="integer", nullable=true)
     */
    private $telefono2;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="text", nullable=true)
     */
    private $observaciones;



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
     * @return Personas
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
     * Set apellidos
     *
     * @param string $apellidos
     * @return Personas
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string 
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set mail1
     *
     * @param string $mail1
     * @return Personas
     */
    public function setMail1($mail1)
    {
        $this->mail1 = $mail1;

        return $this;
    }

    /**
     * Get mail1
     *
     * @return string 
     */
    public function getMail1()
    {
        return $this->mail1;
    }

    /**
     * Set mail2
     *
     * @param string $mail2
     * @return Personas
     */
    public function setMail2($mail2)
    {
        $this->mail2 = $mail2;

        return $this;
    }

    /**
     * Get mail2
     *
     * @return string 
     */
    public function getMail2()
    {
        return $this->mail2;
    }

    /**
     * Set telefono1
     *
     * @param integer $telefono1
     * @return Personas
     */
    public function setTelefono1($telefono1)
    {
        $this->telefono1 = $telefono1;

        return $this;
    }

    /**
     * Get telefono1
     *
     * @return integer 
     */
    public function getTelefono1()
    {
        return $this->telefono1;
    }

    /**
     * Set telefono2
     *
     * @param integer $telefono2
     * @return Personas
     */
    public function setTelefono2($telefono2)
    {
        $this->telefono2 = $telefono2;

        return $this;
    }

    /**
     * Get telefono2
     *
     * @return integer 
     */
    public function getTelefono2()
    {
        return $this->telefono2;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return Personas
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
}
