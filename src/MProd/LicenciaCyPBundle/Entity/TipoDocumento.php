<?php

namespace MProd\LicenciaCyPBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * TipoDocumento
 *
 * @ORM\Entity
 */
class TipoDocumento
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /*============================Variables ===============================*/

    /**
     *@var string
     *
     *@ORM\Column(name="tipo", type="string", length=100)
     */
    protected $tipo;



    /*============================Setter y getters ===============================
     *
     */
    /**
     * Set tipo
     *
     * @param string $tipo
     * @return TipoDocumento
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /*============================Constructor   ===============================
     */

    public function __toString() {
        return $this->getTipo();

    }

}
