<?php

// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AdvertController extends Controller
{
    public  function indexAction($page)
    {
        if($page < 1) {
            throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
        }

        return $this->render('OCPlatformBundle:Advert:index.html.twig');
    }

    public function viewAction($id)
    {
        return $this->render('OCPlatformBundle:Advert:view.html.twig', array(
            'id' => $id
        ));
    }

    public function addAction(Request $request)
    {
        if($request->isMethod($_POST)){
            // il a soumis le formulaire et est soumis à l'annonce temporaire
            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée');
            return $this->redirectToRoute('oc_platform_view', array('id' => 5));
        }
        return $this->render('OCPlatformBundle:Advert:edit.html.twig');
    }

    public function deleteAction($id)
    {
        return $this->render('OCPlatformBundle:Advert:delete.html.twig');
    }
}
