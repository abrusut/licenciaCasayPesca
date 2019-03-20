<?php

namespace MProd\LicenciaCyPBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MProd\LicenciaCyPBundle\Entity\Administrador;

class Super_administradores implements FixtureInterface {

    public function load(ObjectManager $manager) {

        $super_administradores = array(
            array(
                'nombre'   => 'Gustavo',
                'apellido' => 'Espinosa',
                'dni'      => '29409557',
                'email'    => 'agespinosa@santafe.gov.ar',
                'password' => '$2a$12$ASEmW.jr12YKh.26XA1Z7urhZ0Fs.03fctD0FEUeUBVJwg1PVWnoG',
                'role'     => 'ROLE_SUPER_ADMIN',
                'discr'    => 'administrador',
                'cargo'    => 'Desarrollador',
                'isActive' => true,
                'salt'     =>''
            ),
            array(
                'nombre' => 'Sonia',
                'apellido' => 'Lavandaio',
                'dni' => '00000000',
                'email' => 'sonial@santafe.gov.ar',
                'password' => '$2a$12$ASEmW.jr12YKh.26XA1Z7urhZ0Fs.03fctD0FEUeUBVJwg1PVWnoG',
                'role' => 'ROLE_SUPER_ADMIN',
                'discr' => 'administrador',
                'cargo' => 'Project Manager',
                'isActive' => true,
                'salt'     =>''

            ),


            // ...
        );
        foreach ($super_administradores as $administrador) {
            $entidad = new Administrador();
            $entidad->setNombre($administrador['nombre']);
            $entidad->setApellido($administrador['apellido']);
            $entidad->setDni($administrador['dni']);
            $entidad->setEmail($administrador['email']);
            $entidad->setPassword($administrador['password']);


            $entidad->setRole($administrador['role']);
            $entidad->setCargo($administrador['cargo']);
            $entidad->setIsActive($administrador['isActive']);
            $entidad->setSalt($administrador['salt']);


            $manager->persist($entidad);
        }
        $manager->flush();
    }

}
