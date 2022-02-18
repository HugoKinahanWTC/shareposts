<?php

require_once  APPROOT . '/Posts/Api/Data/PostDataInterface.php';

class Post implements PostDataInterface
{
    private $data = [];

    public function getId(): int
    {
        return (int) $this->__get(self::ID);
    }

    public function setId(int $id): int
    {
        return (int) $this->__set(self::ID, $id);
    }

    public function getUserId(): int
    {
        return (int) $this->__get(self::USERID);
    }

    public function setUserId(int $id): int
    {
        return (int) $this->__set(self::USERID, $id);
    }

    public function getTitle(): string
    {
        return (string) $this->__get(self::TITLE);
    }

    public function setTitle(string $title): string
    {
        return (string) $this->__set(self::TITLE, $title);
    }

    public function getBody(): string
    {
        return (string) $this->__get(self::BODY);
    }

    public function setBody(string $body): string
    {
        return (string) $this->__set(self::BODY, $body);
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        if (!array_key_exists($name, $this->data)) {
            return null;
        }

        return $this->data[$name];
    }
}
