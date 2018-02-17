<?php

namespace TB\MainBundle\Form;


use function Sodium\add;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use TB\MainBundle\MainBundle;

class JeuxType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
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
            ->add('category', EntityType::class, array(
                    "class" => "TB\MainBundle\Entity\Category",
                    "choice_label" => "categoryName",
                    "expanded" => false,
                    "multiple" => false,
                    "label" => "Categorie",
                    "attr" => array("class" => "form-control intputCat")
                )
            )
            ->add('gamePlatforms', CollectionType::class, array(
                "allow_add" => true,
                "entry_type" => Game_platformType::class
            ))
            ->add('pictures', CollectionType::class, array(
                "allow_add" =>true,
                "entry_type" => PictureType::class

            ))
            ->add('submit', SubmitType::class, array(
                "attr" => array(
                    "class" => "btn btn-danger"
                )
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TB\MainBundle\Entity\Jeux'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'tb_mainbundle_jeux';
    }


}
