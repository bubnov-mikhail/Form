<?php
/*
 * Copyright 2008 Sven Sanzenbacher
 *
 * This file is part of the naucon package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Naucon\Form\Helper;

use Naucon\HtmlBuilder\HtmlBuilder;
use Naucon\HtmlBuilder\HtmlInputHidden;

/**
 * Form Helper Field Hidden
 *
 * @package     Form
 * @subpackage  Helper
 * @author      Sven Sanzenbacher
 */
class FormHelperFieldHidden extends AbstractFormHelperField
{
    /**
     * @return    string                html output
     */
    public function render()
    {
        $htmlElement = new HtmlInputHidden($this->getProperty()->getFormName(), $this->getProperty()->getFormValue());

        foreach ($this->getOptions()->get() as $attributeName => $attributeValue) {
            // prevent, that already set attributes are overwritten by options
            if (!$htmlElement->hasAttribute($attributeName) || $this->isAttributeInjectable($attributeName)) {
                $htmlElement->setAttribute($attributeName, $attributeValue);
            }
        }

        $htmlBuilder = new HtmlBuilder();
        return $htmlBuilder->render($htmlElement) . PHP_EOL;
    }
}