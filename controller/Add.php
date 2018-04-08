<?php

class Add extends AController
{

    public function execute()
    {

        return $this->render('Add',array('title'=>'Add task'));
    }
}
