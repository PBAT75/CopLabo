<?php

namespace App\Form;

use App\Entity\Evenements;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvenementsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class, array(
                'label' => 'Nom de l\'évenement',))
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'invalid_message' => 'La date doit être 
                de la forme AAAA-MM-JJ',
                'format' => 'yyyy-MM-dd',

            ])
            ->add('hour', TimeType::class, array(
                'label' => 'Heure',
                'input'  => 'datetime',
                'widget' => 'choice',))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Evenements::class,
        ]);
    }
}
