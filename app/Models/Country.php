<?php


namespace App\Models;


class Country extends Model
{
    private string $name;

    public function __construct(array $data)
    {
        parent::__construct();
        parent::hydrate($data);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Country
     */
    public function setName(string $name): Country
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Create a instance of a model from plain array attributes
     * @param array $data
     * @return Country
     */
    public function hydrate(array $data): Country
    {
        parent::hydrate($data);
        foreach ($data as $key => $value) {
            $method = 'set' . str_replace('_', '', ucwords($key, '_'));
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
        return $this;
    }

}