<?php

namespace ZeCashDeskBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SalesType extends AbstractType {
	/**
	 * {@inheritdoc}
	 */
	public function buildForm( FormBuilderInterface $builder, array $options ) {
		$builder
			->add( 'salesQty' )
			->add( 'items', EntityType::class, array(
				'class'        => 'ZeCashDeskBundle\Entity\Items',
				'choice_label' => 'id'
			) )
			->add( 'tickets', EntityType::class, array(
				'class'        => 'ZeCashDeskBundle\Entity\Tickets',
				'choice_label' => 'num_ticket'
			) );
	}

	/**
	 * {@inheritdoc}
	 */
	public function configureOptions( OptionsResolver $resolver ) {
		$resolver->setDefaults( array(
			'data_class' => 'ZeCashDeskBundle\Entity\Sales'
		) );
	}

	/**
	 * {@inheritdoc}
	 */
	public function getBlockPrefix() {
		return 'zecashdeskbundle_sales';
	}


}
