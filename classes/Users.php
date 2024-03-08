<?php

class Users extends Table
{
    public function __construct()
    {
        parent::__construct('users');
    }
    private string $mail;
    private string $password;
    


    /**
     * Get the value of password
     *
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @param string $password
     *
     * @return self
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }
    /**
     * Get the value of mail
     * @return string
     */
    public function getMail(): string
    {
        return $this->mail;
    }
    /**
     * Set the value of mail
     *
     * @param string $mail
     * @return self
     */
    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }
}