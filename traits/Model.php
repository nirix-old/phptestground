<?php
require 'Traitable.php';
require 'Hookable.php';

class Model
{
    use Traitable;
    use Hookable;

    public function __construct(array $data = array())
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }

        $this->initTraits();
    }

    public function save()
    {
        $this->runHook('save', array($this));
    }
}
