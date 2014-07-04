<?php
require 'Traitable.php';
require 'Hookable.php';

/**
 * Base model class.
 */
class Model
{
    use Traitable;
    use Hookable;

    /**
     * @param array $data Model data
     */
    public function __construct(array $data = array())
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }

        $this->initTraits();
    }

    /**
     * Non-saving save method.
     */
    public function save()
    {
        $this->runHook('save', array($this));
    }
}
