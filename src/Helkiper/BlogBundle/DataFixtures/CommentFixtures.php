<?php
/**
 * Created by PhpStorm.
 * User: Hellkiper
 * Date: 10.02.2018
 * Time: 18:53
 */

namespace Helkiper\BlogBundle\DataFixtures;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Helkiper\BlogBundle\Entity\Comment;

class CommentFixtures extends Fixture implements DependentFixtureInterface
{

	/**
	 * Load data fixtures with the passed EntityManager
	 *
	 * @param ObjectManager $manager
	 */
	public function load(ObjectManager $manager)
	{
		$comment1 = new Comment();
		$comment1->setAuthor('Иван Иванов');
		$comment1->setContent("Выкладываются Скорпы на все 100%, несмотря на свой возраст. Многие часто им вспоминают заявление о завершении карьеры и уходе со сцены, но как по мне им еще играть и играть.");
//		$comment->setCategory($this->getReference('-category'));
		$comment1->setPost($this->getReference('scorp-post'));
		$manager->persist($comment1);

		$comment2 = new Comment();
		$comment2->setAuthor('Frodo Baggins');
		$comment2->setContent("Неплохое руководство, продолжайте свое начинание.");
//		$comment->setCategory($this->getReference('-category'));
		$comment2->setPost($this->getReference('symfony-post'));
		$manager->persist($comment2);

		$comment3 = new Comment();
		$comment3->setAuthor('Master Yodo');
		$comment3->setContent("Было видео на Youtube, ссылку, к сожалению, не могу найти, в котором говорилось что «best practices» написано с прицелом на начинающих разработчиков, что бы не грузить их академичностью подхода фреймворка.\nВ тех же практиках рекомендуется использовать YAML для задания сервисов, мол, так проще читать и в дальнейшем поддерживать. Однако более продвинутый подход предполагает всё таки XML для этих целей. Как минимум потому что благодаря IDE можно проверять корректность и валидность документа.");
//		$comment->setCategory($this->getReference('-category'));
		$comment3->setPost($this->getReference('symfony-post'));
		$manager->persist($comment3);

		$comment4 = new Comment();
		$comment4->setAuthor('Jack London');
		$comment4->setContent("Спасибо!");
//		$comment->setCategory($this->getReference('-category'));
		$comment4->setPost($this->getReference('symfony-post'));
		$manager->persist($comment4);

		$comment5 = new Comment();
		$comment5->setAuthor('Вася Пупкин');
		$comment5->setContent("Добавте к этой категории объяснение, наконец!");
		$comment5->setCategory($this->getReference('news-category'));
//		$comment->setPost($this->getReference('-post'));
		$manager->persist($comment5);

		$comment6 = new Comment();
		$comment6->setAuthor('Дядя Фёдор');
		$comment6->setContent("Старые новости");
		$comment6->setCategory($this->getReference('news-category'));
//		$comment->setPost($this->getReference('-post'));
		$manager->persist($comment6);

		$comment7 = new Comment();
		$comment7->setAuthor('Барон Мюнхаузен');
		$comment7->setContent("Побольше бы постов с полезной информацией.");
		$comment7->setCategory($this->getReference('useful-category'));
//		$comment->setPost($this->getReference('-post'));
		$manager->persist($comment7);

		$manager->flush();
	}

	/**
	 * This method must return an array of fixtures classes
	 * on which the implementing class depends on
	 *
	 * @return array
	 */
	function getDependencies()
	{
		return array(
			CategoryFixtures::class,
			PostFixtures::class
		);
	}
}