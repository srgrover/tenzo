<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Formacion;
use AppBundle\Form\Type\FormacionFormType;
use Doctrine\ORM\EntityManager;
use http\Exception;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class InfoController extends Controller
{
    /**
     * @Route("/formacion/añadir", name="add_formacion")
     */
    public function addFormacionAction(Request $request){
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $formacion = new Formacion();
        $usuario = $this->getUser();
        $formacion->setUsuario($usuario);
        $em->persist($formacion);

        $form = $this->createForm(FormacionFormType::class, $formacion);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $em->flush();
                $this->addFlash('estado', 'Su formación se ha guardado correctamente');
                return $this->redirectToRoute('homepage');
            }
            catch(Exception $e) {
                $this->addFlash('error', 'No se han podido guardar los cambios');
            }
        }
        return $this->render('forms/formacion.html.twig', [
            'formacion' => $formacion,
            'formulario' => $form->createView(),
        ]);
    }


}
