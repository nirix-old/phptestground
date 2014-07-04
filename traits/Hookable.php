<?php
/**
 * This trait handles hooks to do extra things such as hashing a
 * password when saving to the database.
 */
trait Hookable
{
    /**
     * The traits initialisation method.
     *
     * All traits that can initialised must contain a method
     * with 'init' prefixed to the traits name.
     */
    public function initHookable()
    {
        // Make sure the hooks array it set on the object
        if (!isset($this->hooks)) {
            $this->hooks = array();
        }
    }

    /**
     * Register a function to be run.
     *
     * @param string $hook Name of the hook
     * @param lambda $func Function to run
     */
    public function registerHook($hook, $func) {
        if (!isset($this->hooks[$hook])) {
            $this->hooks[$hook] = array();
        }

        $this->hooks[$hook][] = $func;
    }

    /**
     * Runs the registered functions for the hook.
     *
     * @param string $hook Name of the hook
     * @param array  $data Data to pass to the function
     */
    public function runHook($hook, array $data = array())
    {
        foreach ($this->hooks[$hook] as $func) {
            call_user_func_array($func, $data);
        }
    }
}
