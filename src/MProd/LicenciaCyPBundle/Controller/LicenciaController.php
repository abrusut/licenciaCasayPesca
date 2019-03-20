<?php

namespace MProd\LicenciaCyPBundle\Controller;

use MProd\LicenciaCyPBundle\Entity\Licencia;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use MProd\LicenciaCyPBundle\Form\LicenciaType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class LicenciaController extends Controller
{
      public function addAction(Request $request,
                    UserInterface $user=null) 
        {        
        $entityManager = $this->getDoctrine()->getManager();   

        $licencia = new Licencia();
        $form =  $this->createForm(LicenciaType::class,$licencia);
        
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
        	$licencia->setAnio(2018);
        	$licencia->setFechaEmitida(new \DateTime());
        	$licencia->setFechaVencimiento(new \DateTime());

            try {
                $entityManager->persist($licencia);
                $entityManager->flush();
                $this->addFlash('home_mensaje', 'La Licencia ' . $licencia . ' ha sido creado correctamente.');
            } catch (\Doctrine\DBAL\DBALException $e) {
                $exception_number = $e->getPrevious()->getCode();
                $exception_message = $e->getMessage();

                return $this->render('@MProdLicenciaCyP/Exception/errorDB.html.twig', array('errorCode' => $exception_number, 'errorMessage' => $exception_message));
            }
            return $this->redirect($this->generateUrl("path_home"));
        }

        return $this->render('@MProdLicenciaCyP/Licencia/licencia.html.twig', 
                            array('form' => $form->createView()));
    }
}
