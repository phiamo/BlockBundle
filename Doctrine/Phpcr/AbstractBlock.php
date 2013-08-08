<?php

namespace Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr;

use Symfony\Cmf\Bundle\BlockBundle\Model\AbstractBlock as AbstractBlockModel;
use Symfony\Component\Validator\ExecutionContext;

abstract class AbstractBlock extends AbstractBlockModel
{
    /**
     * Validate settings
     *
     * @param \Symfony\Component\Validator\ExecutionContext $context
     */
    public function isSettingsValid(ExecutionContext $context)
    {
        foreach ($this->getSettings() as $value) {
            if (is_array($value)) {
                $context->addViolationAt('settings', 'A multidimensional array is not allowed, only use key-value pairs.');
            }
        }
    }
}