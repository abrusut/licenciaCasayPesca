<?php

namespace MProd\LicenciaCyPBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MProdLicenciaCyPBundle:Page:home.html.twig');
    }
}
