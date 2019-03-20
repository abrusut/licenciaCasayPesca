<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MProd\LicenciaCyPBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
class TipoLicencias implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $tipos = array(
            array(
                'descripcion'=>'Licencia Caza',
                'arancel'=> 750.00,
                'diasVigencia'=>365,
                'fechaTope'=>new \DateTime()
                ),
            array(
                'descripcion'=>'Licencia Pesca',
                'arancel'=> 500.00,
                'diasVigencia'=>365,
                'fechaTope'=>new \DateTime()
                ),
            array(
                'descripcion'=>'Licencia Caza y Pesca',
                'arancel'=> 1200.00,
                'diasVigencia'=>365,
                'fechaTope'=>new \DateTime()
                ),
            array(
                'descripcion'=>'Licencia Jubilados',
                'arancel'=> 0.00,
                'diasVigencia'=>365,
                'fechaTope'=>new \DateTime()
                ),

        );
        foreach ($tipos as $tipo) {
            $entidad = new \MProd\LicenciaCyPBundle\Entity\TipoLicencia();
            $entidad->setDescripcion($tipo['descripcion']);
            $entidad->setArancel($tipo['arancel']);
            $entidad->setDiasVigencia($tipo['diasVigencia']);
            $entidad->setFechaTope($tipo['fechaTope']);
            $manager->persist($entidad);
        }
        $manager->flush();
    }

}
