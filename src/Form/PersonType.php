<?php

namespace App\Form;

use App\Entity\ExternalCompany;
use App\Entity\Partner;
use App\Entity\Person;
use App\Entity\StartUp;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('FirstName')
            ->add('LastName')
            ->add('Image')
            ->add('startup', EntityType::class, array(
                'class' => StartUp::class,
                'choice_label' => 'name',
                'required' => false,
                'empty_data' => null,
            ))
            ->add('partner', EntityType::class, array(
                'class' => Partner::class,
                'choice_label' => 'name',
                'required' => false,
                'empty_data' => null,
            ))
            ->add('externalCompany', EntityType::class, array(
                'class' => ExternalCompany::class,
                'choice_label' => 'name',
                'required' => false,
                'empty_data' => null,
            ))
            ->add('linkedin');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Person::class,
        ]);
    }
}
