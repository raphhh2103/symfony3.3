<?php

namespace TB\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('userLastName')
            ->add('userFirstName')
            ->add('userBirthDate')
            ->add('userAddress')
            ->add('userEmail')
            ->add('userPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'invalid_message' => "les mot de passe ne correspondent pas ",
                'first_options' => array(
                    'label' => 'mot de passe'
                ),
                'second_options' => array(
                    'label' => "confirmer mot de passe"

                )
            ))
            ->add('submit',SubmitType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TB\MainBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'tb_mainbundle_user';
    }


}
