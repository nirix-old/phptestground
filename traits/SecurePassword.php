<?php
/**
 * This trait handles hashing of the `password` property when saving.
 */
trait SecurePassword
{
    protected function initSecurePassword()
    {
        $this->registerHook('save', function($model){
            $model->password = sha1($model->password);
        });
    }
}
