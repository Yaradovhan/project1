<?php

require_once 'AController.php';

class AdminLogin extends AdminAController
{


    public function execute()
    {
        return $this->render('LoginAdmin', [
            'type' => 'error',
            'text' => 'You were logged out, sorry:)'
        ]);

    }
}
