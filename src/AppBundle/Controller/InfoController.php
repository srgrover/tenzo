<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Complementaria;
use AppBundle\Entity\Formacion;
use AppBundle\Entity\Idioma;
use AppBundle\Entity\Laboral;
use AppBundle\Form\Type\ComplementariaFormType;
use AppBundle\Form\Type\FormacionFormType;
use AppBundle\Form\Type\IdiomaFormType;
use AppBundle\Form\Type\LaboralFormType;
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
                return $this->redirectToRoute('inicio');
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

    /**
     * @Route("/complementaria/añadir", name="add_complementaria")
     */
    public function addComplementariaAction(Request $request){
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $complementaria = new Complementaria();
        $usuario = $this->getUser();
        $complementaria->setUsuario($usuario);
        $em->persist($complementaria);

        $form = $this->createForm(ComplementariaFormType::class, $complementaria);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $em->flush();
                $this->addFlash('estado', 'Su formación complementaria se ha guardado correctamente');
                return $this->redirectToRoute('inicio');
            }
            catch(Exception $e) {
                $this->addFlash('error', 'No se han podido guardar los cambios');
            }
        }
        return $this->render('forms/complementaria.html.twig', [
            'complementaria' => $complementaria,
            'formulario' => $form->createView(),
        ]);
    }

    /**
     * @Route("/experiencia/añadir", name="add_laboral")
     */
    public function addLaboralAction(Request $request){
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $laboral = new Laboral();
        $usuario = $this->getUser();
        $laboral->setUsuario($usuario);
        $em->persist($laboral);

        $form = $this->createForm(LaboralFormType::class, $laboral);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $em->flush();
                $this->addFlash('estado', 'Su experiencia laboral se ha guardado correctamente');
                return $this->redirectToRoute('inicio');
            }
            catch(Exception $e) {
                $this->addFlash('error', 'No se han podido guardar los cambios');
            }
        }
        return $this->render('forms/laboral.html.twig', [
            'laboral' => $laboral,
            'formulario' => $form->createView(),
        ]);
    }

    /**
     * @Route("/idioma/añadir", name="add_idioma")
     */
    public function addIdiomaAction(Request $request){
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $idioma = new Idioma();
        $usuario = $this->getUser();
        $idioma->setUsuario($usuario);
        $em->persist($idioma);

        $form = $this->createForm(IdiomaFormType::class, $idioma);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $em->flush();
                $this->addFlash('estado', 'Su formación complementaria se ha guardado correctamente');
                return $this->redirectToRoute('inicio');
            }
            catch(Exception $e) {
                $this->addFlash('error', 'No se han podido guardar los cambios');
            }
        }
        return $this->render('forms/idioma.html.twig', [
            'idioma' => $idioma,
            'formulario' => $form->createView(),
        ]);
    }

}
