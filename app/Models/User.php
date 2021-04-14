<?php


namespace App\Models;


class User extends Model
{
    private string $first_name;
    private string $last_name;
    private string $country_id;
    private Country $country;

    public function __construct(array $data)
    {
        parent::__construct();
        $this->hydrate($data);
    }


    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     * @return User
     */
    public function setFirstName(string $first_name): User
    {
        $this->first_name = $first_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * @param string $last_name
     * @return User
     */
    public function setLastName(string $last_name): User
    {
        $this->last_name = $last_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountryId(): string
    {
        return $this->country_id;
    }

    /**
     * @param string $country_id
     * @return User
     */
    public function setCountryId(string $country_id): User
    {
        $this->country_id = $country_id;
        return $this;
    }

    /**
     * @return Country
     */
    public function getCountry(): Country
    {
        return $this->country;
    }

    /**
     * @param Country $country
     * @return User
     */
    public function setCountry(Country $country): User
    {
        $this->country = $country;
        return $this;
    }

    /**
     * Create a instance of a model from plain array attributes
     * @param array $data
     * @return User
     */
    public function hydrate(array $data): User
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