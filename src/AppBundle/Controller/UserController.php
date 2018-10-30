<?php

namespace AppBundle\Controller;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends Controller
{
    /**
     * @Route("/perfil", name="perfil")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function PerfilAction(Request $request){
        return $this->render('/User/perfil.html.twig',[]);
    }
}
