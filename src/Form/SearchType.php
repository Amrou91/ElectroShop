<?php

namespace App\Form;

use App\Data\SearchData;

use App\Entity\CarteGraphique;
use App\Entity\DisqueDur;
use App\Entity\Marques;
use App\Entity\Memoires;
use App\Entity\Processeur;
use App\Entity\SousCategories;
use App\Entity\SystemeExploitation;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
 
class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('q', TextType::class,[ 
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Rechercher'
                ] 
            ])
            ->add('sousCategories', EntityType::class,[
                'label' => false,
                'required' => false,
                'class' => SousCategories::class,
                'expanded' => true,
                'multiple' => true
            ])
            ->add('marques', EntityType::class,[
                'label' => false,
                'required' => false,
                'class' => Marques::class,
                'expanded' => true,
                'multiple' => true
            ])
            ->add('processeur', EntityType::class,[
                'label' => false,
                'required' => false,
                'class' => Processeur::class,
                'expanded' => true,
                'multiple' => true
            ])
            ->add('memoires', EntityType::class,[
                'label' => false,
                'required' => false,
                'class' => Memoires::class,
                'expanded' => true,
                'multiple' => true
            ])
            ->add('disqueDur', EntityType::class,[
                'label' => false,
                'required' => false,
                'class' => DisqueDur::class,
                'expanded' => true,
                'multiple' => true
            ])
            ->add('carteGraphique', EntityType::class,[
                'label' => false,
                'required' => false,
                'class' => CarteGraphique::class,
                'expanded' => true,
                'multiple' => true
            ])
            ->add('systemeExploitation', EntityType::class,[
                'label' => false,
                'required' => false,
                'class' => SystemeExploitation::class,
                'expanded' => true,
                'multiple' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SearchData::class,
            'method' => 'GET',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
