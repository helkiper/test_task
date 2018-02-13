<?php
/**
 * Created by PhpStorm.
 * User: Hellkiper
 * Date: 11.02.2018
 * Time: 21:58
 */

namespace Helkiper\StatisticBundle\EventListener;


use Doctrine\ORM\EntityManagerInterface;
use Helkiper\StatisticBundle\Entity\Visit;
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

		if($request->hasSession() && $request->getSession()->getId()) {
			$session = $request->getSession();
			$userAgent = $request->headers->get('User-Agent');

			$visit = $this->em->getRepository('HelkiperStatisticBundle:Visit')->findBy(array(
				'sessionId' => $session->getId()
			));
			if (!$visit){

				$visit = new Visit();
				$visit
					->setSessionId($session->getId())
					->setIp($request->getClientIp())
					->setUserAgent($userAgent)
					->setBrowser($this->guessBrowser($userAgent));

				$this->em->persist($visit);
				$this->em->flush();
			}
		}
	}

	private function guessBrowser($userAgent){
		$browsers = ['Firefox', 'Opera', 'Chrome', 'Safary'];
		for ($i = 0; $i < count($browsers); $i++){
			if(strpos($userAgent, $browsers[$i])){
				return $browsers[$i];
			}
		}
		return 'Другой';
	}

}