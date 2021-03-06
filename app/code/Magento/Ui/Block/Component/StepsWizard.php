<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Ui\Block\Component;

class StepsWizard extends \Magento\Framework\View\Element\Template
{
    /**
     * Wizard step template
     *
     * @var string
     */
    protected $_template = 'Magento_Ui::stepswizard.phtml';

    /**
     * @var null|\Magento\Ui\Block\Component\StepsWizard\StepInterface[]
     */
    private $steps;

    /**
     * @return \Magento\Ui\Block\Component\StepsWizard\StepInterface[]
     */
    public function getSteps()
    {
        if ($this->steps == null) {
            foreach ($this->getLayout()->getChildBlocks($this->getNameInLayout()) as $step) {
                if ($step instanceof StepsWizard\StepInterface) {
                    $this->steps[$step->getComponentName()] = $step;
                }
            }
        }
        return $this->steps;
    }

    /**
     * @return array
     */
    public function getStepComponents()
    {
        return array_keys($this->getSteps());
    }

    /**
     * @return string
     */
    public function getComponentName()
    {
        return $this->getNameInLayout();
    }
}
