<?php
/**
 * Created by PhpStorm.
 * User: Hellkiper
 * Date: 09.02.2018
 * Time: 18:47
 */

namespace Helkiper\BlogBundle\DataFixtures;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Helkiper\BlogBundle\Entity\Post;

class PostFixtures extends Fixture implements DependentFixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$scorpPost = new Post();
		$scorpPost->setName('Scorpions снова в Киеве.');
		$scorpPost->setContent("Легендарная немецкая рок-группа Scorpions в субботу, 11 ноября, отыграла концерт во Дворце спорта в Киеве.\nВосхищенные пользователи сетей делятся снимками и видео с концерта.\nРокеры выступили в рамках своего тура, который носит название альбома Crazy World, изданного Scorpions в 1990-м году.");
		$scorpPost->setFile('');
		$scorpPost->setCategory($this->getReference('news-category'));
		$manager->persist($scorpPost);
		$this->addReference('scorp-post', $scorpPost);

		$symfonyPost = new Post();
		$symfonyPost->setName('Создание блога на Symfony 2.8');
		$symfonyPost->setContent("В этой серии статей мы рассмотрим создание блога на Symfony 2. За основу взят и переведён проект http://tutorial.symblog.co.uk/ разработчика Даррена Риса ( Darren Rees ). Перед написанием данной статьи я обратился к нему, и он дал своё согласие на перевод с поправками под версию Symfony 2.8 lts, за что я ему очень благодарен.\nТакже хочется отметить, что эти статьи сделаны для начинающих, я не хочу выступать в роли учителя и у меня нет опыта коммерческой разработки на данном фреймворке. Так что, если это прочтёт человек, который хорошо разбирается в Symfony2 и заметит какие-то недочёты, буду рад критике и замечаниям. Хотелось бы, чтобы каждый, кто имеет возможность и желание, внёс свой вклад в эти статьи и по возможности при обнаружении каких-либо ошибок, багов и т.д. на них указал.\nТакже вы знаете, что по Symfony2 есть куча документации и статей, в том числе на Хабре, видео на youtube и т.д., так что этот проект не является чем-то новым.\nМне бы очень хотелось, чтобы мы разработали этот проект вместе с вами, очень надеюсь, что все, кто прикоснётся к этому руководству, извлечёт для себя какую-то пользу.");
		$symfonyPost->setFile('');
		$symfonyPost->setCategory($this->getReference('useful-category'));
		$manager->persist($symfonyPost);
		$this->addReference('symfony-post', $symfonyPost);

		$mongoPost = new Post();
		$mongoPost->setName('Установка MongoDB на Windows');
		$mongoPost->setContent("Для установки MongoDB загрузим один распространяемых пакетов с официального сайта https://www.mongodb.com/download-center#community.\nОфициальный сайт предоставляет пакеты дистрибутивов для различных платформ: Windows, Linux, MacOS, Solaris. И каждой платформы доступно несколько дистрибутивов.\nНа момент написания данного материала последней версией платформы была версия 3.4.4. Использование конкретной версии может несколько отличаться от применения иных версий платформы MongoDB.");
		$mongoPost->setFile('');
		$mongoPost->setCategory($this->getReference('useful-category'));
		$manager->persist($mongoPost);
		$this->addReference('mongo-post', $mongoPost);

		$olimpPost = new Post();
		$olimpPost->setName('Церемония открытия олимпиады 2018');
		$olimpPost->setContent("Сегодня в Пхенчхане официально стартуют XXIII Зимние олимпийские Игры. На олимпийском стадионе пройдет церемония открытия Белых игр, в которой примут участие спортсмены из 92 стран. Они разыграют 102 комплекта мелдалей.\nДетали церемонии, которая продлится около двух часов держались в секрете, а журналистов, которые выложили в открытый доступ фото и видео репетиции зажжения олимпийского огня, лишили аккредитации.\nФлаг Украины на церемонии понесет олимпийская чемпионка Сочи-2014 в биатлонной эстафете Елена Пидгрушна. Кстати, еще двое бывших украинцев возглавят парад своих новых команд. Фристайлистка Анна Цупер будет флагоносцем Беларуси, а фигурист Алексей Быченко воглавит команду Израиля.\nТекстовый онлайн церемонии смотрите на нашем сайте.");
		$olimpPost->setFile('');
		$olimpPost->setCategory($this->getReference('news-category'));
		$manager->persist($olimpPost);
		$this->addReference('olimp-post', $olimpPost);

		$psrPost = new Post();
		$psrPost->setName('Перевод стандартов PSR');
		$psrPost->setContent("Этот (да-да, очередной) перевод был сделан потому, что существующие переводы (при всём глубоком уважении к их авторам) либо не покрывают все PSR-стандарты, либо частично устарели, либо по каким-то иным причинам меня не устроили. Итак…\nПеревод стандартов PSR-0, PSR-1, PSR-2, PSR-3, PSR-4\nОригинал: http://www.php-fig.org/psr/\n(перевод от 15.09.2014)\nАльтернативные переводы PSR на русский язык можно найти здесь:");
		$psrPost->setFile('');
		$psrPost->setCategory($this->getReference('useful-category'));
		$manager->persist($psrPost);
		$this->addReference('psr-post', $psrPost);

		$loremPost = new Post();
		$loremPost->setName('');$loremPost->setContent("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.");
		$loremPost->setFile('');
		$loremPost->setCategory($this->getReference('other-category'));
		$manager->persist($loremPost);
		$this->addReference('lorem-post', $loremPost);

		$manager->flush();
	}

	function getDependencies()
	{
		return array(
			CategoryFixtures::class
		);
	}
}