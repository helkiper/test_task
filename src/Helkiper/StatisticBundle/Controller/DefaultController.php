<?php

namespace Helkiper\StatisticBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();
    	$browsers = $em->getRepository('HelkiperStatisticBundle:Visit')->getVisitedBrowserCount();
        return $this->render('visit/list.html.twig', array(
//        return $this->render('@HelkiperStatistic/Default/list.html.twig', array(
        	'browsers' => $browsers
        ));
    }
}
