<?php

namespace GameInLyonBundle\Controller;

use GameInLyonBundle\Entity\Activities;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Activity controller.
 *
 */
class ActivitiesController extends Controller
{
    /**
     * Lists all activity entities.
     *
     */

    public function religiousAction()
    {
        $repository = $this->getDoctrine()->getRepository('GameInLyonBundle:Activities');
        $activities = $repository->getReligious();

        return $this->render('front/parcours-religieux.html.twig', array(
            'activities' => $activities

        ));
    }
    public function gourmetAction()
    {
        $repository = $this->getDoctrine()->getRepository('GameInLyonBundle:Activities');
        $activities = $repository->getGourmet();

        return $this->render('front/parcours-gourmet.html.twig', array(
            'activities' => $activities

        ));
    }
    public function culturelAction()
    {
        $repository = $this->getDoctrine()->getRepository('GameInLyonBundle:Activities');
        $activities = $repository->getCulturel();

        return $this->render('front/parcours-culturel.html.twig', array(
            'activities' => $activities

        ));
    }
    public function baladeAction()
    {
        $repository = $this->getDoctrine()->getRepository('GameInLyonBundle:Activities');
        $activities = $repository->getBalade();

        return $this->render('front/parcours-balade.html.twig', array(
            'activities' => $activities

        ));
    }


    public function aleatoireAction()
    {
        $repository = $this->getDoctrine()->getRepository('GameInLyonBundle:Activities');
        $activities = $repository->getRandom();

        return $this->render('front/parcours-aleatoire.html.twig', array(
            'activities' => $activities

        ));
    }



    /**
     * Creates a new activity entity.
     *
     */
    public function newAction(Request $request)
    {
        $activity = new Activity();
        $form = $this->createForm('GameInLyonBundle\Form\ActivitiesType', $activity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($activity);
            $em->flush($activity);

            return $this->redirectToRoute('activities_show', array('id' => $activity->getId()));
        }

        return $this->render('activities/new.html.twig', array(
            'activity' => $activity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a activity entity.
     *
     */
    public function showAction(Activities $activity)
    {
        $deleteForm = $this->createDeleteForm($activity);

        return $this->render('activities/show.html.twig', array(
            'activity' => $activity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing activity entity.
     *
     */
    public function editAction(Request $request, Activities $activity)
    {
        $deleteForm = $this->createDeleteForm($activity);
        $editForm = $this->createForm('GameInLyonBundle\Form\ActivitiesType', $activity);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('activities_edit', array('id' => $activity->getId()));
        }

        return $this->render('activities/edit.html.twig', array(
            'activity' => $activity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a activity entity.
     *
     */
    public function deleteAction(Request $request, Activities $activity)
    {
        $form = $this->createDeleteForm($activity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($activity);
            $em->flush($activity);
        }

        return $this->redirectToRoute('activities_index');
    }

    /**
     * Creates a form to delete a activity entity.
     *
     * @param Activities $activity The activity entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Activities $activity)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('activities_delete', array('id' => $activity->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
