<?php

namespace TaylorNetwork\Presenter\Trait;


use TaylorNetwork\Presenter\Exceptions\PresenterException;

trait Presentable
{
    /**
     * Presenter Instance
     *
     * @var mixed
     */
    protected $presenterInstance;

    /**
     * Get the presenter class
     *
     * @return mixed
     * @throws PresenterException
     */
    public function present()
    {
        if(!isset($this->presenter) or !class_exists($this->presenter))
        {
            throw new PresenterException('Presenter property not set on model, or presenter class does not exist!');
        }

        if(!isset($this->presenterInstance))
        {
            $this->presenterInstance = new $this->presenter($this);
        }

        return $this->presenterInstance;
    }
}