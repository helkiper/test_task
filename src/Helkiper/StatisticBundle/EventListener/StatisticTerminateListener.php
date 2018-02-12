<?php
/**
 * Created by PhpStorm.
 * User: Hellkiper
 * Date: 11.02.2018
 * Time: 21:58
 */

namespace Helkiper\StatisticBundle\EventListener;


use Doctrine\ORM\EntityManagerInterface;
use Helkiper\BlogBundle\Entity\Visit;
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

		if($request->hasSession() /* && $request->getSession()->getId() */) {
			$session = $request->getSession();
			$userAgent = $request->headers->get('User-Agent');

			$visit = $this->em->getRepository('HelkiperStatisticBundle:Visit')->findBy(array(
				'sessionId' => $session->getId()/*,
				'userAgent' => $userAgent,
				'ip' => $request->getClientIp()*/
			));
			if (!$visit){

				$visit = new Visit();
				$visit
					->setSessionId($session->getId())
					->setIp($request->getClientIp())
					->setUserAgent($userAgent)
					->setBrowser($this->guessBrowser($userAgent));

				$this->em->persist($visit);
//				$this->em->flush();
			}
		}
	}

	private function guessBrowser($userAgent){
		if(strpos($userAgent, 'MSIE')) return 'Internet Explorer';
		if(strpos($userAgent, 'Edge')) return 'Microsoft Edge';
		if(strpos($userAgent, 'Firefox')) return 'Firefox';
		if(strpos($userAgent, 'Opera') || strpos($userAgent, 'OPR')) return 'Opera';
		if(strpos($userAgent, 'Chrome')) return 'Chrome';
		if(strpos($userAgent, 'Safary')) return 'Safary';
		return 'Другой';
	}

//	private function addNewVisit(Request $request)
}