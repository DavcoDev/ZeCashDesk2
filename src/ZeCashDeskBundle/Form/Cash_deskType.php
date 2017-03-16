<?php

namespace ZeCashDeskBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Cash_deskType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateTime')
            ->add('ticket', EntityType::class, array(
                'class' => 'ZeCashDeskBundle\Entity\Tickets',
                'choice_label' => 'id'
            ))
            ->add('cashMvt')
            ->add('chequeMvt')
            ->add('cbMvt')
            ->add('typeMvt')
            ->add('user', EntityType::class, array(
                'class' => 'UserBundle\Entity\User',
                'choice_label' => 'firstName'
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ZeCashDeskBundle\Entity\Cash_desk'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'zecashdeskbundle_cash_desk';
    }


}
