<?php


namespace App\Models;


use Ramsey\Uuid\Uuid;

class Model
{
    /**
     * All models have an uuid
     * @var string
     */
    protected string $id;

    public function __construct() {
        $this->setId(Uuid::uuid4());
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