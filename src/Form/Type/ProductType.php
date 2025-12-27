<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Range;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        parent::buildForm($builder, $options);
        // Here we are working with builder pattern design, so each add return the fluent object
        // $this, we have a class named BuilderForm who implements FormBuilderInterface, this
        // class contain children array attribut, so each add he return a field and fill it in
        // this array, like that $children [
        //  'Email' => {type: EmailType, options:[]},
        //  'Pass' => {type: PasswordType, options:[]}
        // ]
        // so like that we doesnt need to configure each field in the constructor
        $builder->add('Quantity', IntegerType::class, [
            'required' => true,
            'label_attr' => ['class'=> 'form-label'],
            'label' => 'Quantity',
            'constraints' => [
                new Range([
                    'min' => 1,
                    'minMessage' => 'La valeur min est 1'
                ]),
                new Range([
                    'max' => 10,
                    'maxMessage' => 'La valeur max est 10'
                ])
            ],
            'attr' => ['class' => 'form-control', 'min' => 1, 'max' => 10, 'style' => 'max-width: 100px;']
        ])
                ->add('Color', ChoiceType::class, [
                    'required' => true,
                    'choices' => [
                        'Matte Black' => 'black',
                        'Pearl White' => 'white',
                        'Silver' => 'silver'
                    ],
                    'label' => "Color",
                    'label_attr' => ['class' => 'form-label'],
                    'attr' => ['class' => 'form-select', 'style' => 'max-width: 200px;']
                ]
            )->add('Submit', SubmitType::class, [
                'attr' => ['class' => 'btn btn-primary btn-lg']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'attr' => ['novalidate' => true]
        ]);
    }
}
