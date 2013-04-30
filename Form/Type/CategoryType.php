<?php

/*
 * This file is part of the Blackengine package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Black\Bundle\LinkBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CategoryType extends AbstractType
{
    private $class;

    /**
     * @param string $class The Category class name
     */
    public function __construct($class)
    {
        $this->class = $class;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array(
                    'label'         => 'link.admin.form.name'
                ))
            ->add('slug', 'text', array(
                    'label'         => 'link.admin.form.slug',
                    'required'      => false
                ))
            ->add('description', 'textarea', array(
                    'label'         => 'link.admin.form.description',
                    'required'      => false
                ))
            ->add('url', 'url', array(
                    'required'      => false,
                    'label'         => 'link.admin.form.url'
                ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
                'data_class'    => $this->class,
                'intention'     => 'category_form'
            ));
    }

    public function getName()
    {
        return 'black_link_category';
    }
}