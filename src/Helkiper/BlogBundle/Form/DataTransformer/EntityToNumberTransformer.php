<?php
/**
 * Created by PhpStorm.
 * User: Hellkiper
 * Date: 13.02.2018
 * Time: 18:32
 */

namespace Helkiper\BlogBundle\Form\DataTransformer;


use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class EntityToNumberTransformer implements DataTransformerInterface
{
	private $em;
	protected $repositoryClass;

	public function __construct( EntityManagerInterface $em)
	{
//		$this->repositoryClass = $repositoryClass;
		$this->em = $em;
	}

	/**
	 * @param mixed $entity The value in the original representation
	 *
	 * @return mixed The value in the transformed representation
	 *
	 * @throws TransformationFailedException when the transformation fails
	 */
	public function transform($entity)
	{
		if($entity === null){
			return '';
		}

		return $entity->getId();
	}

	/**
	 * @param mixed $entityId The value in the transformed representation
	 *
	 * @return mixed The value in the original representation
	 *
	 * @throws TransformationFailedException when the transformation fails
	 */
	public function reverseTransform($entityId)
	{
		if(!$entityId){
			return;
		}

		$entity = $this->em->getRepository($this->repositoryClass)->find($entityId);

		if($entity === null){
			throw  new TransformationFailedException(sprintf(
				'Категория с Id %s не существует',
				$entityId
			));
		}

		return $entity;
	}
}