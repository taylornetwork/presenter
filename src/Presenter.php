<?php

namespace TaylorNetwork\Presenter;

abstract class Presenter
{
    /**
     * Model instance
     *
     * @var mixed
     */
    protected $model;

    /**
     * Presenter constructor.
     * 
     * @param $model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * If getting an attribute that exists but not in presenter, return to model
     *
     * @param $attribute
     * @return mixed
     */
    public function __get($attribute)
    {
        if(method_exists($this, $attribute))
        {
            return $this->{$attribute}();
        }
        
        return $this->model->{$attribute};
    }
}