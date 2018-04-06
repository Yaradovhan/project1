<?php

class Add extends AController
{

    public function get_body()
    {

        return $this->render('Add',array('title'=>'Add task'));
    }
}
?>

<!--<a href="javascript:history.go(-1)">Congrats, go back to dashboard</a>-->
