<?php

namespace App\Controller;

use App\Entity\Persona;
use App\Form\PersonaType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PersonaController extends Controller
{
        public function addAction(Request $request) {
        $em = $this->container->get('doctrine')->getManager();
        $persona = new Persona();
        $form = $this
            ->container
            ->get('form.factory')
            ->create(new PersonaType(), $persona);

        $form->handleRequest($request);

        if ($form->isValid() and $form->isSubmitted()) {
        	//$licencia->setAnio(2018);
        	//$licencia->setFechaEmitida(new \DateTime());
        	//$licencia->setFechaVencimiento(new \DateTime());

            try {
                $em->persist($persona);
                $em->flush();
                $this->addFlash('home_mensaje', 'La Licencia ' . $persona . ' ha sido creado correctamente.');
            } catch (\Doctrine\DBAL\DBALException $e) {
                $exception_number = $e->getPrevious()->getCode();
                $exception_message = $e->getMessage();

                return $this->render('MProdLicenciaCyPBundle:Exception:errorDB.html.twig', array('errorCode' => $exception_number, 'errorMessage' => $exception_message));
            }
            return $this->redirect($this->generateUrl("path_home"));
        }

        return $this->render('MProdLicenciaCyPBundle:Persona:add.html.twig', array('form' => $form->createView()));
    }
}
