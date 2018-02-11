<?php

namespace Helkiper\BlogBundle\Form;

use Doctrine\DBAL\Types\TextType;
use Helkiper\BlogBundle\Form\DataTransformer\CategoryToNumberTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentType extends AbstractType
{
	private $categoryTransformer;

	public function __construct(CategoryToNumberTransformer $categoryTransformer)
	{
		$this->categoryTransformer = $categoryTransformer;
	}

	/**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
	        ->add('author')
	        ->add('content')
	        ->add('category', HiddenType::class)
	        ->add('post', HiddenType::class);

        $builder->get('category')->addModelTransformer($this->categoryTransformer);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Helkiper\BlogBundle\Entity\Comment'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'helkiper_blogbundle_comment';
    }


}
