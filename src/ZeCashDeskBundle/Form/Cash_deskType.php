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
            ->add('dateHeure')
            ->add('ticket', EntityType::class, array(
                'class' => 'ZeCashDeskBundle\Entity\Tickets',
                'choice_label' => 'id'
            ))
            ->add('especes')
            ->add('cheque')
            ->add('cb')
            ->add('typeTransaction')
            ->add('user', EntityType::class, array(
                'class' => 'UserBundle\Entity\User',
                'choice_label' => 'username'
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
