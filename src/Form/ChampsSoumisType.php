<?php

namespace App\Form;

use App\Entity\ChampsSoumis;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChampsSoumisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('satisfaction')
            ->add('upgrade')
            ->add('growth')
            ->add('contacts')
            ->add('comment')
            ->add('source')
            ->add('option1')
            ->add('option2')
            ->add('option3')
            ->add('option4')
            ->add('option5')
            ->add('option6')
            ->add('option7')
            ->add('option8')
            ->add('option9')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ChampsSoumis::class,
        ]);
    }
}
