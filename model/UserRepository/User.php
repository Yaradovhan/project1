<?php

class User
{
    private $name;
    private $email;
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

    public function getId()
    {
        return $this->id;
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
        $this->name = isset($data['name']) ? $data['name'] : null;
        $this->email = isset($data['email']) ? $data['email'] : null;
        $this->id = isset($data['id']) ? $data['id'] : null;
    }

    public function getUser()
    {
        return ['name' => $this->name, 'email' => $this->email];
    }
}