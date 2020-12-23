<?php

namespace Core\Api;

class Response
{
    /**
     * Contains response data
     *
     * @var array
     */
    private $data = [];

    /**
     * Contains error data
     *
     * @var array
     */
    private $errors = [];

    public function __construct($data = [])
    {
        if ($data) {
            $this->setData($data['data'] ?? []);
            $this->setErrors($data['errors'] ?? []);
        }
    }

    /**
     * Prints response to the server
     *
     * @return string
     */
    public function toJson(): string
    {
        $is_success = $this->errors ? false : true;

        return json_encode([
            'status' => $is_success ? 'success' : 'fail',
            'data' => $this->data,
            'errors' => $this->errors
        ]);
    }

    /**
     * Sets new data
     *
     * @param [type] $data
     * @return void
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * Adds new data with the given index or auto-index
     *
     * @param [type] $body
     * @param [type] $index
     * @return void
     */
    public function appendData($body, $index = null)
    {
        if ($index) {
            $this->data[$index] = $body;
        } else {
            $this->data[] = $body;
        }
    }

    /**
     * Set data in the error array
     *
     * @param [type] $errors
     * @return void
     */
    public function setErrors($errors)
    {
        $this->errors = $errors;
    }

    /**
     * Adds new errors with the given index or auto-index
     *
     * @param [type] $body
     * @param [type] $index
     * @return void
     */
    public function appendErrors($body, $index = null)
    {
        if ($index) {
            $this->errors[$index] = $body;
        } else {
            $this->errors[] = $body;
        }
    }
}
