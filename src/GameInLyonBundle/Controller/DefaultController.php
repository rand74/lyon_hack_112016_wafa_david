<?php

namespace GameInLyonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GameInLyonBundle:Default:index.html.twig');
    }

    /*public function loadDataAction() {
        $string = file_get_contents($this->get('kernel')->getRootDir()."/../rdata.json");
        $data = json_decode($string, true);
        $em = $this->getDoctrine()->getManager();

        $sites = $data["features"];
        foreach ($sites as $site){
            $activitiesEntity = new Activities;
            $activitiesEntity->setName($site['properties']['nom']);
            $activitiesEntity->setCategory($site['properties']['type']);
            $activitiesEntity->setAddress($site['properties']['adresse']);
            $activitiesEntity->setPostcode($site['properties']['codepostal']);
            $activitiesEntity->setCity($site['properties']['commune']);
            $activitiesEntity->setPhone($site['properties']['telephone']);
            $activitiesEntity->setEmail($site['properties']['email']);
            $activitiesEntity->setWebsite($site['properties']['siteweb']);
            $activitiesEntity->setClassement($site['properties']['classement']);
            $activitiesEntity->setOuverture($site['properties']['ouverture']);
            $activitiesEntity->setPricemin($site['properties']['tarifsmin']);
            $activitiesEntity->setPricemax($site['properties']['tarifsmax']);
            $activitiesEntity->setLatitude($site['geometry']['coordinates'][1]);
            $activitiesEntity->setLongitude($site['geometry']['coordinates'][0]);
            $em->persist($activitiesEntity);
        }
        $em->flush();
        return $this->render('GameInLyonBundle:user:connexion.html.twig');
    }*/
}
