<?php


namespace App\Models;

/**
 * Class hérité par tous les models
 * Class Model
 * @package App\Models
 */
class Model
{
    /**
     * All models have an uuid
     * @var string
     */
    protected string $id;

    public function __construct() {
        $this->setId(uniqid());
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Model
     */
    public function setId($id): Model
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Create a instance of a model from plain array attributes
     * @param array $data
     * @return Model
     */
    public function hydrate(array $data): Model
    {
        foreach ($data as $key => $value) {
            $method = 'set' . str_replace('_', '', ucwords($key, '_'));
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
        return $this;
    }
}