<?php
/**
 * This trait handles the initialisation of traits that have an
 * initialisation method.
 */
trait Traitable
{
    protected function initTraits()
    {
        // Fetch all traits used by the called class
        foreach (class_uses(get_called_class()) as $trait) {
            $func = "init{$trait}";

            // Confirm there is an initialisation method for the trait.
            if (method_exists($this, $func)) {
                $this->{$func}();
            }
        }
    }
}
