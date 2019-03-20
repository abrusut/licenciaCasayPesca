<?php

namespace MProd\LicenciaCyPBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MProd\LicenciaCyPBundle\Entity\Administrador;

class Tecnico implements FixtureInterface {

    public function load(ObjectManager $manager) {

        $tecnicos = array(
            array(
                'nombre'   => 'rene',
                'apellido' => 'Recalde',
                'dni'      => '29555666',
                'email'    => 'rrene@santafe.gov.ar',
                'password' => 'rene',
                'role'     => 'ROLE_TECNICO',
                'discr'    => 'tecnico',
                'especialidad'    => 'Tecnico de caza',
                'isActive' => true,
                'salt'     =>''
            ),
            array(
                'nombre'   => 'ernesto',
                'apellido' => 'Abrigo',
                'dni'      => '29566566',
                'email'    => 'eabrigo@santafe.gov.ar',
                'password' => 'ernesto',
                'role'     => 'ROLE_TECNICO',
                'discr'    => 'tecnico',
                'especialidad'    => 'Tecnico de pesca',
                'isActive' => true,
                'salt'     =>''

            ),

        );
        foreach ($tecnicos as $tecnico) {
            $entidad = new \MProd\LicenciaCyPBundle\Entity\Tecnico();
            $entidad->setNombre($tecnico['nombre']);
            $entidad->setApellido($tecnico['apellido']);
            $entidad->setDni($tecnico['dni']);
            $entidad->setEmail($tecnico['email']);

            $entidad->setPassword('$2a$12$ASEmW.jr12YKh.26XA1Z7urhZ0Fs.03fctD0FEUeUBVJwg1PVWnoG'); //gustavo

            $entidad->setRole($tecnico['role']);
            $entidad->setEspecialidad($tecnico['especialidad']);
            $entidad->setIsActive($tecnico['isActive']);
            $entidad->setSalt($tecnico['salt']);


            $manager->persist($entidad);
        }
        $manager->flush();
    }

}
