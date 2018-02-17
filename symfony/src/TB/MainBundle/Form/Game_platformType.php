<?php

namespace TB\MainBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Game_platformType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('platform', EntityType::class, array(
                "class" => 'TB\MainBundle\Entity\Platform',
                "choice_label" => 'PlatformName',
                "expanded" => false,
                "multiple" => false
            ))
            ->add('dateSortie', DateType::class)
            ->add('prix', MoneyType::class, array(
                "attr" => array(
                    "class" => "inputPrix"
                )
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TB\MainBundle\Entity\Game_platform'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'tb_mainbundle_game_platform';
    }


}
