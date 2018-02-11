<?php
/**
 * Created by PhpStorm.
 * User: Hellkiper
 * Date: 11.02.2018
 * Time: 21:58
 */

namespace Helkiper\BlogBundle\EventListener;


use Doctrine\ORM\EntityManagerInterface;
use Helkiper\BlogBundle\Entity\Visit;
use http\Env\Request;
use Symfony\Component\HttpKernel\Event\PostResponseEvent;

class StatisticTerminateListener
{
	private $em;

	public function __construct(EntityManagerInterface $em)
	{
		$this->em = $em;
	}

	public function onKernelTerminate(PostResponseEvent $event){
		$request = $event->getRequest();

		if($request->hasSession()) {
			$session = $request->getSession();

			$visit = $this->em->getRepository('HelkiperBlogBundle:Visit')->findBy(array('sessionId' => $session->getId()));
			if (!$visit){
				$visit = new Visit();
				$visit
					->setSessionId($session->getId())
					->setIp($request->getClientIp())
					->setUserAgent($request->headers->get('User-Agent'));

				$this->em->persist($visit);
				$this->em->flush();
			}
		}
	}

//	private function addNewVisit(Request $request)
}