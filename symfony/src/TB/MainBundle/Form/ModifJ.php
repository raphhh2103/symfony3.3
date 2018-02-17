<?php

namespace TB\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModifJ extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('jeuxName', TextType::class, array(
                "label" => "Nom du jeu",
                "attr" => array(
                    "class" => "inputNom"
                ),
                "label_attr" => array(
                    "class" => "label-control",
                    "required" => true
                )

            ))
            ->add('submit', SubmitType::class, array(
                "attr" => array(
                    "class" => "btn btn-danger"
                )
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TB\MainBundle\Entity\Jeux'
        ));
    }

    public function getBlockPrefix()
    {
        return 'tb_mainbundle_jeux';
    }
}
