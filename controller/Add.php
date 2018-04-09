<?php

class Add extends AController
{

    public function execute()
    {
        try {
            return $this->render('Add', ['title' => 'Add task']);
        } catch (Exception $e) {
        }
    }
}
