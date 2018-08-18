<?php

namespace AppBundle\Controller;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/homepage", name="homepage")
     */
    public function indexAction(Request $request){
        $formacion = $this->getFormacion($request);
        $complementaria = $this->getComplementaria($request);
        $laboral = $this->getLaboral($request);
        $idioma = $this->getIdioma($request);
        return $this->render('index/homepage.html.twig',[
        'formacion' => $formacion,
        'complementaria' => $complementaria,
        'laboral' => $laboral,
        'idioma' => $idioma
        ]);
    }

    /**
     * @Route("/", name="index")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function entrarAction(Request $request){
        //Si el usuario está logueado se redirecciona a la página principal
        if(is_object($this->getUser())){
            return $this->redirect('index');
        }else{
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }
    }

    public function getFormacion($request){
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $formacion_repo = $em->getRepository('AppBundle:Formacion');
        $formaciones = $formacion_repo->findBy(['usuario' => $user]);

        return $formaciones;
    }

    public function getComplementaria($request){
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $complementaria_repo = $em->getRepository('AppBundle:Complementaria');
        $complementarias = $complementaria_repo->findBy(['usuario' => $user]);

        return $complementarias;
    }

    public function getLaboral($request){
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $laboral_repo = $em->getRepository('AppBundle:Laboral');
        $laborales = $laboral_repo->findBy(['usuario' => $user]);

        return $laborales;
    }

    public function getIdioma($request){
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $idioma_repo = $em->getRepository('AppBundle:Idioma');
        $idiomas = $idioma_repo->findBy(['usuario' => $user]);

        return $idiomas;
    }
}
