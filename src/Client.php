<?php

namespace Mobtexting;

use Mobtexting\Message\Client as MessageClient;

class Client
{
    protected $username;
    protected $password;
    protected $messages = null;

    /**
     * Mobtexting constructor.
     *
     * @param string $username
     * @param string|null $password
     */
    public function __construct($username = null, $password = null)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Set the value of username
     *
     * @return self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Set the value of username
     *
     * @return self
     */
    public function setToken($token)
    {
        $this->username = $token;

        return $this;
    }

    /**
     * Set the value of password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of messages
     */
    public function getMessages()
    {
        if (is_null($this->messages)) {
            $this->setMessages();
        }

        return $this->messages;
    }

    public function __get($name)
    {
        $name = 'get' . ucfirst($name);

        return $this->{$name}();
    }

    /**
     * Set the value of messages
     *
     * @return  self
     */
    public function setMessages()
    {
        $this->messages = new MessageClient($this->username, $this->password);

        return $this;
    }
}
