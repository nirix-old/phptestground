<?php
trait SecurePassword
{
    protected function initSecurePassword()
    {
        $this->registerHook('save', function($model){
            $model->password = sha1($model->password);
        });
    }
}
