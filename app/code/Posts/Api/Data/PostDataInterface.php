<?php

interface PostDataInterface {

    //  should have the crud getters and setters

    public const ID = 'id';
    public const TITLE = 'title';
    public const BODY = 'body';
    public const USERID = 'user_id';

    /**
     * Retrieve ID
     * @return int/null
     */
    public function getId(): int;

    /**
     * Set  id
     *
     * @param int $id
     * @return $this
     */
    public function setId(int $id);

    /**
     * Retrieve UserID
     * @return int/null
     */
    public function getUserId(): int;

    /**
     * Set  Userid
     *
     * @param int $id
     * @return $this
     */
    public function setUserId(int $id);

    /**
     * Retrieve TITLE
     *
     * @return string|null
     */
    public function getTitle();

    /**
     * Set  TITLE
     *
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title);

    /**
     * Retrieve BODY
     *
     * @return string|null
     */
    public function getBody();

    /**
     * Set  BODY
     *
     * @param string $body
     * @return $this
     */
    public function setBody(string $body);

}