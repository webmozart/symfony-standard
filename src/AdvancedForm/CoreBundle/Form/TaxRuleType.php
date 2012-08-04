<?php

namespace AdvancedForm\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;

class TaxRuleType extends AbstractType {

    /** @var \Doctrine\ORM\EntityManager */
    private $em;

    function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }

    public function getName() {
        return 'tax_rule';
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->add('country', 'entity', array(
            'class' => 'AdvancedForm\CoreBundle\Entity\Country',
            'required' => false,
            'label' => _("Country"),
            'empty_value' => _("Any"),
            'attr' => array(
                'style' => 'width: 12em',
                'class' => 'b-input b-input_text input-country',
            ),
        ));

        $builder->add('state', 'entity', array(
            'class' => 'AdvancedForm\CoreBundle\Entity\CountryState',
            'required' => false,
            'label' => _("State"),
            'empty_value' => _("Any"),
            'attr' => array(
                'style' => 'width: 12em',
                'class' => 'input-state',
            ),
        ));

        $builder->add('zipCodes', 'text', array(
            'required' => false,
            'label' => _("Zip code(coma separated)"),
            'attr' => array(
                'class' => 'b-input_text input-zip-codes',
            ),
        ));

        $builder->add('customerType', 'entity', array(
            'class' => 'AdvancedForm\CoreBundle\Entity\CustomerType',
            'required' => false,
            'label' => _("Customer Type"),
            'empty_value' => _("Any"),
            'attr' => array(
                'class' => 'input-customer-type',
            ),
        ));

        $builder->add('title1', 'text', array(
            'required' => false,
            'label' => _("Tax Title"),
            'attr' => array(
                'class' => 'b-input_text input-title1',
            ),
        ));

        $builder->add('title2', 'text', array(
            'required' => false,
            'label' => _("Additional Title"),
            'attr' => array(
                'class' => 'b-input_text input-title2',
            ),
        ));

        $builder->add('isCompound', 'checkbox', array(
            'required' => false,
            'label' => _("Compound"),
            'attr' => array(
                'class' => 'input-compound',
            ),
        ));

        $builder->add('rate1', 'text', array(
            'required' => true,
            'label' => _("Tax, %"),
            'attr' => array(
                'class' => 'b-input_amount input-rate1',
            ),
        ));

        $builder->add('rate2', 'text', array(
            'required' => false,
            'label' => _("Tax, %"),
            'attr' => array(
                'class' => 'b-input_amount input-rate2',
            ),
        ));
    }

    public function getDefaultOptions(array $options) {
        return array(
            'data_class' => 'AdvancedForm\CoreBundle\Entity\TaxClassRule',
        );
    }

}

