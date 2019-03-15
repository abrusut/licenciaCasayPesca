<?php

namespace App\Controller;

use App\Entity\Licencia;
use App\Form\LicenciaType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class LicenciaController extends Controller
{
      public function addAction(Request $request) {
        $em = $this->container->get('doctrine')->getManager();
        $licencia = new Licencia();
        $form = $this
            ->container
            ->get('form.factory')
            ->create(new LicenciaType(), $licencia);

        $form->handleRequest($request);

        if ($form->isValid() and $form->isSubmitted()) {
        	$licencia->setAnio(2018);
        	$licencia->setFechaEmitida(new \DateTime());
        	$licencia->setFechaVencimiento(new \DateTime());

            try {
                $em->persist($licencia);
                $em->flush();
                $this->addFlash('home_mensaje', 'La Licencia ' . $licencia . ' ha sido creado correctamente.');
            } catch (\Doctrine\DBAL\DBALException $e) {
                $exception_number = $e->getPrevious()->getCode();
                $exception_message = $e->getMessage();

                return $this->render('MProdLicenciaCyPBundle:Exception:errorDB.html.twig', array('errorCode' => $exception_number, 'errorMessage' => $exception_message));
            }
            return $this->redirect($this->generateUrl("path_home"));
        }

        return $this->render('MProdLicenciaCyPBundle:Licencia:add.html.twig', array('form' => $form->createView()));
    }
}
