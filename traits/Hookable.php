<?php
trait Hookable
{
    public function initHookable()
    {
        if (!isset($this->hooks)) {
            $this->hooks = array();
        }
    }

    public function registerHook($hook, $func) {
        if (!isset($this->hooks[$hook])) {
            $this->hooks[$hook] = array();
        }

        $this->hooks[$hook][] = $func;
    }

    public function runHook($hook, array $data = array())
    {
        foreach ($this->hooks[$hook] as $func) {
            call_user_func_array($func, $data);
        }
    }
}
