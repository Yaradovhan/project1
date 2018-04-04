<?php

class User extends \Entity
{
    private $name;
    private $email;
    /**
     * @var int
     */
    private $id;

    public function __construct()
    {

    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setUser($data)
    {
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->id = $data['id'];
    }

    public function getUser()
    {
        return ['name' => $this->name,'email'=>$this->email];
    }
}