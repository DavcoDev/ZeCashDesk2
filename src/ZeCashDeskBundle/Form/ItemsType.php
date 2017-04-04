<?php

namespace ZeCashDeskBundle\Form;

use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ItemsType extends AbstractType {
	/**
	 * {@inheritdoc}
	 */
	public function buildForm( FormBuilderInterface $builder, array $options ) {
		$builder->add( 'nameItem', null, array( "label" => "Nom de L'article" ) )
		        ->add( 'gencode' )
		        ->add( 'category', null, array( "label" => "Rayon" ) )
		        ->add( 'description', null, array( "label" => "Description" ) )
		        ->add( 'tva', null, array( "label" => "Taux de TVA" ) )
		        ->add( 'sellPrice', null, array( "label" => "Prix de vente HT" ) )
		        ->add( 'buyPrice', null, array( "label" => "Prix d'achat HT" ) )
		        ->add( 'itemQty', null, array( "label" => "Quantité reçue" ) );
	}

	/**
	 * {@inheritdoc}
	 */
	public function configureOptions( OptionsResolver $resolver ) {
		$resolver->setDefaults( array(
			'data_class' => 'ZeCashDeskBundle\Entity\Items'
		) );
	}

	/**
	 * {@inheritdoc}
	 */
	public function getBlockPrefix() {
		return 'zecashdeskbundle_items';
	}


}
