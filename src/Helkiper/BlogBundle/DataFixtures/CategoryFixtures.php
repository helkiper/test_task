<?php
/**
 * Created by PhpStorm.
 * User: Hellkiper
 * Date: 09.02.2018
 * Time: 16:33
 */

namespace Helkiper\BlogBundle\DataFixtures;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Helkiper\BlogBundle\Entity\Category;

class CategoryFixtures extends Fixture
{
	public function load(ObjectManager $manager)
	{
		$newsCategory = new Category();
		$newsCategory->setName('Новости');
		$newsCategory->setDescription('');
		$manager->persist($newsCategory);
		$this->addReference('news-category', $newsCategory);

		$usefulCategory = new Category();
		$usefulCategory->setName('Полезное');
		$usefulCategory->setDescription('Здесь содержатся всякие познавательные и обучающие посты');
		$manager->persist($usefulCategory);
		$this->addReference('useful-category', $usefulCategory);

		$reviewCategory = new Category();
		$reviewCategory->setName('Обзоры');
		$reviewCategory->setDescription('Обзоры последних событий');
		$manager->persist($reviewCategory);
		$this->addReference('review-category', $reviewCategory);

		$otherCategory = new Category();
		$otherCategory->setName('Прочее');
		$otherCategory->setDescription('Здесь содержатся посты, не попавшие в другие категории');
		$manager->persist($otherCategory);
		$this->addReference('other-category', $otherCategory);

		$manager->flush();
	}
}