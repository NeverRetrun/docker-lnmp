<?php
/**
 * Created by PhpStorm.
 * User: ruiyang
 * Date: 15/01/19
 * Time: 上午 09:28
 */

namespace App\Controller\Composite;


class Form implements RenderableInterface
{

    private $elements;

    public function render(): string
    {
        $formCode = '<form>';

        foreach ($this->elements as $element) {
            $formCode .= $element->render();
        }

        $formCode .= '</form>';

        return $formCode;
    }

    public function addElements(RenderableInterface $element)
    {
        $this->elements[] = $element;
    }
}