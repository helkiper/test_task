<?php
/**
 * Created by PhpStorm.
 * User: Hellkiper
 * Date: 11.02.2018
 * Time: 10:40
 */

namespace Helkiper\BlogBundle\Form\DataTransformer;


use Doctrine\ORM\EntityManagerInterface;
use Helkiper\BlogBundle\Entity\Category;
use Helkiper\BlogBundle\Entity\Post;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class PostToNumberTransformer extends EntityToNumberTransformer
{
	public function __construct(EntityManagerInterface $em)
	{
		parent::__construct($em);
		$this->repositoryClass = Post::class;
	}
}