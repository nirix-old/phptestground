<?php
trait Traitable
{
    protected function initTraits()
    {
        foreach (class_uses(get_called_class()) as $trait) {
            $func = "init{$trait}";
            $this->{$func}();
        }
    }
}
