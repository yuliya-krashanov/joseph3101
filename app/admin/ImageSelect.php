<?php

namespace App;

use SleepingOwl\Admin\Models\Form\Interfaces\FormItemInterface;

class ImageSelect implements FormItemInterface
{

    protected $label;

    public function render()
    {
        $instance = Admin::instance()->formBuilder->getModel();
        if ($instance->exists)
        {
            return "You are editing existing {$this->label}.";
        } else
        {
            return "You are creating new {$this->label}.";
        }
    }

    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

    public function getName()
    {

    }

    /**
     * @return array|null
     */
    public function getValidationRules()
    {

    }

    /**
     * @return mixed
     */
    public function getDefault()
    {

    }

    /**
     * @param array $data
     */
    public function updateRequestData(&$data)
    {

    }

}