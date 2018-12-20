<?php

namespace App\Form;

use App\Entity\Formulaires;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MailingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('satisfaction', CheckBoxType::class, ['label'=>"Avez-vous appréciez cet événement ?", 'required'=>false])
            ->add('upgrade', CheckBoxType::class, ['label'=>"Quelles améliorations suggéreriez-vous ?", 'required'=>false])
            ->add('growth', CheckBoxType::class, ['label'=>"Cet événement vous a-t'il permis d'élargir votre réseau ?", 'required'=>false])
            ->add('contacts', CheckBoxType::class, ['label'=>"Combien de contact avez-vous pu établir lors de cet événement ? ", 'required'=>false])
            ->add('source', CheckBoxType::class, ['label'=>"Comment avez-vous connu l'existence de cet événement ? ", 'required'=>false])
            ->add('comment', CheckBoxType::class, ['label'=>"Avez-vous un autre commentaire?", 'required'=>false])
            ->add('option1', TextType::class, ['label'=>"Champ personnalisé #1", 'required'=>false])
            ->add('option2', TextType::class, ['label'=>"Champ personnalisé #2", 'required'=>false])
            ->add('option3', TextType::class, ['label'=>"Champ personnalisé #3", 'required'=>false])
            ->add('option4', TextType::class, ['label'=>"Champ personnalisé #4", 'required'=>false])
            ->add('option5', TextType::class, ['label'=>"Champ personnalisé #5", 'required'=>false])
            ->add('option6', TextType::class, ['label'=>"Champ personnalisé #6", 'required'=>false])
            ->add('option7', TextType::class, ['label'=>"Champ personnalisé #7", 'required'=>false])
            ->add('option8', TextType::class, ['label'=>"Champ personnalisé #8", 'required'=>false])
            ->add('option9', TextType::class, ['label'=>"Champ personnalisé #9", 'required'=>false]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Formulaires::class,
        ]);
    }
}
