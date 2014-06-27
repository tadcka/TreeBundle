<?php

/*
 * This file is part of the Tadcka package.
 *
 * (c) Tadcka <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\Bundle\TreeBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Tadcka\Bundle\TreeBundle\Validator\Constraints\NodeType;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 5/19/14 10:50 PM
 */
class NodeFormType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if (0 < count($options['node_types']) && (null !== $builder->getData()->getParent())) {
            $builder->add(
                'type',
                'choice',
                array(
                    'choices' => $options['node_types'],
                    'empty_value' => 'form.select',
                    'empty_data' => null,
                    'constraints' => array(new NotBlank()),
                    'label' => 'form.node.type',
                )
            );
        }

        $builder->add(
            'translations',
            'translations',
            array(
                'label' => false,
                'type' => new NodeTranslationFormType(),
                'options' => array(
                    'data_class' => $options['translation_class']
                ),
            )
        );

        $builder->add('submit', 'submit', array('label' => 'button.save'));
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setOptional(array('translation_class', 'node_types'));

        $resolver->setDefaults(
            array(
                'translation_domain' => 'TadckaTreeBundle',
                'attr' => array('class' => 'tadcka_node'),
                'constraints' => function (Options $options) {
                    if (0 < count($options['node_types'])) {
                        return array(new NodeType());
                    }

                    return array();
                },
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'tadcka_node';
    }
}
