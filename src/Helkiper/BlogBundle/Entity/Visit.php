<?php

namespace Helkiper\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Visit
 *
 * @ORM\Table(name="visit")
 * @ORM\Entity(repositoryClass="Helkiper\BlogBundle\Repository\VisitRepository")
 */
class Visit
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="sessionId", type="integer", unique=true)
     */
    private $sessionId;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=15)
     */
    private $ip;

    /**
     * @var string
     *
     * @ORM\Column(name="userAgent", type="string", length=50)
     */
    private $userAgent;

    /**
     * @var string|null
     *
     * @ORM\Column(name="userAgentType", type="string", length=20, nullable=true)
     */
    private $userAgentType;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set sessionId.
     *
     * @param int $sessionId
     *
     * @return Visit
     */
    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;

        return $this;
    }

    /**
     * Get sessionId.
     *
     * @return int
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * Set ip.
     *
     * @param string $ip
     *
     * @return Visit
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip.
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set userAgent.
     *
     * @param string $userAgent
     *
     * @return Visit
     */
    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;

        return $this;
    }

    /**
     * Get userAgent.
     *
     * @return string
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }

    /**
     * Set userAgentType.
     *
     * @param string|null $userAgentType
     *
     * @return Visit
     */
    public function setUserAgentType($userAgentType = null)
    {
        $this->userAgentType = $userAgentType;

        return $this;
    }

    /**
     * Get userAgentType.
     *
     * @return string|null
     */
    public function getUserAgentType()
    {
        return $this->userAgentType;
    }
}
