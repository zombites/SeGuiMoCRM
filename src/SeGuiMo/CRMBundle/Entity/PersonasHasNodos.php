<?php

namespace SeGuiMo\CRMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PersonasHasNodos
 *
 * @ORM\Table(name="personas_has_nodos", indexes={@ORM\Index(name="fk_personas_has_nodos_nodos1_idx", columns={"nodos_id"}), @ORM\Index(name="fk_personas_has_nodos_personas1_idx", columns={"personas_id"})})
 * @ORM\Entity
 */
class PersonasHasNodos
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
     * @var \SeGuiMo\CRMBundle\Entity\Personas
     *
     * @ORM\OneToOne(targetEntity="SeGuiMo\CRMBundle\Entity\Personas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="personas_id", referencedColumnName="id", unique=true)
     * })
     */
    private $personas;

    /**
     * @var \SeGuiMo\CRMBundle\Entity\Nodos
     *
     * @ORM\OneToOne(targetEntity="SeGuiMo\CRMBundle\Entity\Nodos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nodos_id", referencedColumnName="id", unique=true)
     * })
     */
    private $nodos;



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
     * Set personas
     *
     * @param \SeGuiMo\CRMBundle\Entity\Personas $personas
     * @return PersonasHasNodos
     */
    public function setPersonas(\SeGuiMo\CRMBundle\Entity\Personas $personas = null)
    {
        $this->personas = $personas;

        return $this;
    }

    /**
     * Get personas
     *
     * @return \SeGuiMo\CRMBundle\Entity\Personas 
     */
    public function getPersonas()
    {
        return $this->personas;
    }

    /**
     * Set nodos
     *
     * @param \SeGuiMo\CRMBundle\Entity\Nodos $nodos
     * @return PersonasHasNodos
     */
    public function setNodos(\SeGuiMo\CRMBundle\Entity\Nodos $nodos = null)
    {
        $this->nodos = $nodos;

        return $this;
    }

    /**
     * Get nodos
     *
     * @return \SeGuiMo\CRMBundle\Entity\Nodos 
     */
    public function getNodos()
    {
        return $this->nodos;
    }
}
