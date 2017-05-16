<?php

namespace US\Humanox\Entity\Person;

/**
 * Class EmailAddress
 *
 * Implements a ValueObject
 * http://www.phpvalueobjects.info/
 */
class EmailAddress
{
    private $address;

    public function __construct($address)
    {
        if (!filter_var($address, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException(sprintf('"%s" is not a valid email', $address));
        }

        $this->address = $address;
    }

    public function __toString()
    {
        return $this->address;
    }

    public function equals(EmailAddress $address)
    {
        return strtolower((string)$this) === strtolower((string)$address);
    }
}