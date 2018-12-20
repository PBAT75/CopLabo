<?php
/**
 * Created by PhpStorm.
 * User: amadrocky
 * Date: 20/12/18
 * Time: 22:08
 */

namespace App\Form;


use App\Entity\Evenements;
use App\Entity\StartUp;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AttributionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('startups', EntityType::class, [
                'class' => StartUp::class,
                'choice_label' => 'name',
                'by_reference' => false,
                'multiple' => true,
                'expanded' => true
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Evenements::class,
        ]);
    }
}
