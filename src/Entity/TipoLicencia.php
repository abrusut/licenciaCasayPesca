<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * TipoLicencia
 *
 * @ORM\Entity
 */
class TipoLicencia
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /*============================Variables ===============================*/



    /**
     *@var string
     *
     *@ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var float
     *
     * @ORM\Column(name="arancel", type="float", nullable=true)
     * @Assert\Range(
     *              min = 0,
     *              minMessage = "El arancel no pueden ser menor que cero"
     * )
     */
    private $arancel;

    /**
     * @var integer
     *
     * @ORM\Column(name="dias_vigencia", type="integer", nullable=true)
     * @Assert\Range(
     *              min = 0
     * )
     */
    private $diasVigencia;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_tope", type="datetime")
     * @Assert\NotNull()
     */
    private $fechaTope;

    /**
     * @var boolean
     * 
     * @ORM\Column(name="is_active", type="boolean")
     * 
     */
    protected $isActive;

    /*============================Setter y getters ===============================*/

    function __construct()
    {
        $this->setIsActive(true);
    }

    function __toString()
    {
        return $this->getDescripcion(). ' ';
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return float
     */
    public function getArancel()
    {
        return $this->arancel;
    }

    /**
     * @param float $arancel
     */
    public function setArancel($arancel)
    {
        $this->arancel = $arancel;
    }

    /**
     * @return int
     */
    public function getDiasVigencia()
    {
        return $this->diasVigencia;
    }

    /**
     * @param int $diasVigencia
     */
    public function setDiasVigencia($diasVigencia)
    {
        $this->diasVigencia = $diasVigencia;
    }

    /**
     * @return \DateTime
     */
    public function getFechaTope()
    {
        return $this->fechaTope;
    }

    /**
     * @param \DateTime $fechaTope
     */
    public function setFechaTope($fechaTope)
    {
        $this->fechaTope = $fechaTope;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive() {
        return $this->isActive;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return Persona
     */
    public function setIsActive($isActive) {
        $this->isActive = $isActive;

        return $this;
    }

    /*============================Constructor   ===============================
     */



}
