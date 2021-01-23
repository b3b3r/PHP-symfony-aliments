<?php

namespace App\Form;

use App\Entity\Aliment;
use App\Entity\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AlimentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('type', EntityType::class, [
                'class' => Type::class,
                'choice_label' => 'label'
            ])
            ->add('price')
            ->add('pictureFile', FileType::class, ['required'=> false])
            ->add('calories')
            ->add('proteines')
            ->add('glucides')
            ->add('lipides')
            ->add('saveMessage', SubmitType::class, [
                'label' => 'Envoyer'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Aliment::class,
        ]);
    }
}
