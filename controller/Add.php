<?php

class Add extends AController
{

    public function get_body()
    {

        return $this->render('Add',array('title'=>'Add task'));
    }
}