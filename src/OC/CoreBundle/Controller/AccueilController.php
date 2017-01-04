<?php

namespace OC\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class AccueilController extends Controller
{
    public function indexAction(Request $request)
    {
        return $this->render('OCCoreBundle:Accueil:index.html.twig');
    }
    public function contactAction(Request $request)
    {
        //On selectionne FlashBag de Session - array(error => message flash ...)
        $request->getSession()->getFlashBag()->add('error', 'Message flash : La page contact n\'est pas encore disponible
        , merci de revenir plus tard');
        //redirection vers la page principale
        return $this->redirectToRoute('oc_core_homepage');
    }
}
