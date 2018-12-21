<?php

namespace App\Form;

use App\Entity\ChampsSoumis;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChampsSoumisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('satisfaction', ChoiceType::class, ['label'=>"Avez-vous apprécié cet événement ?", 'required'=>false, 'choices' => array(
        'Oui' => true,
        'Non' => false,
        )])
            ->add('upgrade', TextType::class, ['label'=>"Quelles améliorations suggéreriez-vous ?", 'required'=>false])
            ->add('growth', ChoiceType::class, ['label'=>"Cet événement vous a-t'il permis d'élargir votre réseau ?", 'required'=>false, 'choices' => array(
        'Oui' => true,
        'Non' => false,
            )])
            ->add('contacts', IntegerType::class, ['label'=>"Combien de contact avez-vous pu établir lors de cet événement ? ", 'required'=>false])
            ->add('source', TextType::class, ['label'=>"Comment avez-vous connu l'existence de cet événement ? ", 'required'=>false])
            ->add('comment', TextType::class, ['label'=>"Avez-vous un autre commentaire?", 'required'=>false])
            ->add('option1', TextType::class, ['required'=>false])
            ->add('option2', TextType::class, ['required'=>false])
            ->add('option3', TextType::class, ['required'=>false])
            ->add('option4', TextType::class, ['required'=>false])
            ->add('option5', TextType::class, ['required'=>false])
            ->add('option6', TextType::class, ['required'=>false])
            ->add('option7', TextType::class, ['required'=>false])
            ->add('option8', TextType::class, ['required'=>false])
            ->add('option9', TextType::class, ['required'=>false]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ChampsSoumis::class,
        ]);
    }
}
