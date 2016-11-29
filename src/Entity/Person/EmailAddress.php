<?php
/**
 * Project Portus - Entity/EmailAddress.php
 * Created 5/10d/15 - 17:30
 */

namespace US\Portus\Entity;

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