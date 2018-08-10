<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/homepage", name="homepage")
     */
    public function indexAction(Request $request){
        return $this->render('index/homepage.html.twig',[

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
}
