<?php

namespace SMMI\CoursBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class CoursType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre',    'text')
            ->add('module', ChoiceType::class, [
                    'choices' => [
                        'S1' => [
                            'M1101 | Anglais' => 'M1101 | Anglais',
                            'M1102 | Approfondissement du Projet Professionnel' => 'M1102 | Approfondissement du Projet Professionnel',
                            'M1110 | Projet tutoré' => 'M1110 | Projet tutoré',
                            'M1111 | Stage' => 'M1111 | Stage',
                            'M1103 | Global Marketing' => 'M1103 | Global Marketing',
                            'M1M103 | Scénarisation' => 'M1M103 | Scénarisation',
                            'M1S103 | Stratégie Créative' => 'M1S103 | Stratégie Créative',
                            'M1A103 | Référencement et optimisation' => 'M1A103 | Référencement et optimisation',
                            'M1B103 | Appli Mobile' => 'M1B103 | Appli Mobile',
                            'M1210 | Projet tutoré' => 'M1210 | Projet tutoré',
                            'M1212 | Stage' => 'M1212 | Stage',
                            'M1201 | Technologies JS' => 'M1201 | Technologies JS',
                            'M1204 | Hebergement Cryptographie' => 'M1204 | Hebergement Cryptographie',
                            'M1M203 | Audiovisuel / Motion Design' => 'M1M203 | Audiovisuel / Motion Design',
                            'M1S203 | Webdesign' => 'M1S203 | Webdesign',
                            'M1A203 | CSS Avancé' => 'M1A203 | CSS Avancé',
                            'M1B203 | POO Avancé' => 'M1B203 | POO Avancé',
                        ],
                        'S2' => [
                            'M2101 | Anglais' => 'M2101 | Anglais',
                            'M2102 | Approfondissement du Projet Professionnel' => 'M2102 | Approfondissement du Projet Professionnel',
                            'M2110 | Projet tutoré' => 'M2110 | Projet tutoré',
                            'M2111 | Stage' => 'M2111 | Stage',
                            'M2103 | Global Marketing' => 'M2103 | Global Marketing',
                            'M2M103 | Scénarisation' => 'M2M103 | Scénarisation',
                            'M2S103 | Stratégie Créative' => 'M2S103 | Stratégie Créative',
                            'M2A103 | Référencement et optimisation' => 'M2A103 | Référencement et optimisation',
                            'M2B103 | Appli Mobile' => 'M2B103 | Appli Mobile',
                            'M2210 | Projet tutoré' => 'M2210 | Projet tutoré',
                            'M2212 | Stage' => 'M2212 | Stage',
                            'M2201 | Technologies JS' => 'M2201 | Technologies JS',
                            'M2204 | Hebergement Cryptographie' => 'M2204 | Hebergement Cryptographie',
                            'M2M203 | Audiovisuel / Motion Design' => 'M2M203 | Audiovisuel / Motion Design',
                            'M2S203 | Webdesign' => 'M2S203 | Webdesign',
                            'M2A203 | CSS Avancé' => 'M2A203 | CSS Avancé',
                            'M2B203 | POO Avancé' => 'M2B203 | POO Avancé',
                        ],
                        'S3' => [
                            'M3101 | Anglais' => 'M3101 | Anglais',
                            'M3102 | Approfondissement du Projet Professionnel' => 'M3102 | Approfondissement du Projet Professionnel',
                            'M3110 | Projet tutoré' => 'M3110 | Projet tutoré',
                            'M3111 | Stage' => 'M3111 | Stage',
                            'M3103 | Global Marketing' => 'M3103 | Global Marketing',
                            'M3M103 | Scénarisation' => 'M3M103 | Scénarisation',
                            'M3S103 | Stratégie Créative' => 'M3S103 | Stratégie Créative',
                            'M3A103 | Référencement et optimisation' => 'M3A103 | Référencement et optimisation',
                            'M3B103 | Appli Mobile' => 'M3B103 | Appli Mobile',
                            'M3210 | Projet tutoré' => 'M3210 | Projet tutoré',
                            'M3212 | Stage' => 'M3212 | Stage',
                            'M3201 | Technologies JS' => 'M3201 | Technologies JS',
                            'M3204 | Hebergement Cryptographie' => 'M3204 | Hebergement Cryptographie',
                            'M3M203 | Audiovisuel / Motion Design' => 'M3M203 | Audiovisuel / Motion Design',
                            'M3S203 | Webdesign' => 'M3S203 | Webdesign',
                            'M3A203 | CSS Avancé' => 'M3A203 | CSS Avancé',
                            'M3B203 | POO Avancé' => 'M3B203 | POO Avancé',
                        ],
                        'S4' => [
                            'M4101 | Anglais' => 'M4101 | Anglais',
                            'M4102 | Approfondissement du Projet Professionnel' => 'M4102 | Approfondissement du Projet Professionnel',
                            'M4110 | Projet tutoré' => 'M4110 | Projet tutoré',
                            'M4111 | Stage' => 'M4111 | Stage',
                            'M4103 | Global Marketing' => 'M4103 | Global Marketing',
                            'M4M103 | Scénarisation' => 'M4M103 | Scénarisation',
                            'M4S103 | Stratégie Créative' => 'M4S103 | Stratégie Créative',
                            'M4A103 | Référencement et optimisation' => 'M4A103 | Référencement et optimisation',
                            'M4B103 | Appli Mobile' => 'M4B103 | Appli Mobile',
                            'M4210 | Projet tutoré' => 'M4210 | Projet tutoré',
                            'M4212 | Stage' => 'M4212 | Stage',
                            'M4201 | Technologies JS' => 'M4201 | Technologies JS',
                            'M4204 | Hebergement Cryptographie' => 'M4204 | Hebergement Cryptographie',
                            'M4M203 | Audiovisuel / Motion Design' => 'M4M203 | Audiovisuel / Motion Design',
                            'M4S203 | Webdesign' => 'M4S203 | Webdesign',
                            'M4A203 | CSS Avancé' => 'M4A203 | CSS Avancé',
                            'M4B203 | POO Avancé' => 'M4B203 | POO Avancé',
                        ],
                    ],
                ]
            )
            /*->add('promo', ChoiceType::class, [
                    'choices' => [
                        'Promotions' => [
                            'S1' => 'S1',
                            'S2' => 'S2',
                            'S3' => 'S3',
                            'S4' => 'S4',
                        ],
                    ],
                ]
            )*/
            ->add('chapitres', CollectionType::class, array(
                'type'     => new ChapitreType(),
                'allow_add'      => true,
                'allow_delete'   => true,
                'prototype'      => true
            ))
            ->add('online',   'checkbox', array('required' => false))
            ->add('save',     'submit')
            ->getForm()
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SMMI\CoursBundle\Entity\Cours'
        ));
    }

    public function getName()
    {
        return 'smmi_coursbundle_cours';
    }
}

