<?php

namespace App\Form;

use App\Entity\ExternalCompany;
use App\Entity\Partner;
use App\Entity\StartUpRelation;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StartUpRelationType extends AbstractType
{
    const ACTIONS=[
        'Formations'=>'Formations',
        'Ateliers'=>'Ateliers',
        'Conférences inspirantes'=>'Conférences inspirantes',
        'Lunch&Learn'=>'Lunch&Learn',
        'Evenements de networking'=>'Evenements de networking',
        'Permanences experts'=>'Permanences experts'
        ];

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('action', ChoiceType::class, array(
                'choices'  => self::ACTIONS,
                'label'=>'Action'
                ))
            ->add('partner', EntityType::class, array(
                'class'=>Partner::class,
                'label'=>'Partenaire',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('p')
                        ->orderBy('p.name', 'ASC');
                },
                'choice_label'=>'name'
            ))
            ->add('externalCompany', EntityType::class, array(
                'class'=>ExternalCompany::class,
                'label'=>'Entreprise exterieure',
                'choice_label'=>'name'))
            ->add('date', DateTimeType::class, array('label' => 'Date'))
            ->add('other',TextType::class, array('label' => 'Remarques'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => StartUpRelation::class,
        ]);
    }
}

