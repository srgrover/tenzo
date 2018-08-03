<?php

namespace AppBundle\Entity;
use FOS\UserBundle\Model\User as BaseUser ;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity
 * @ORM\Table(name="Usuario")
 * @UniqueEntity("email")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     *
     * @var integer
     */
    protected $id;
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @var string
     */
    protected $firstName;
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @var string
     */
    protected $lastName;
    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    protected $gender;
    /**
     * @ORM\Column(type="string", nullable=true)
     * @var string
     */
    protected $displayName;
    /**
     * @ORM\Column(type="string", nullable=true)
     * @var string
     */
    protected $address;
    /**
     * @ORM\Column(type="string", nullable=true)
     * @var string
     */
    protected $city;
    /**
     * @ORM\Column(type="string", nullable=true)
     * @var string
     */
    protected $province;
    /**
     * @ORM\Column(type="string", nullable=true)
     * @var string
     */
    protected $zipCode;
    /**
     * @ORM\Column(type="string", nullable=true)
     * @var string
     */
    protected $phoneNumber;
    /**
     * @ORM\Column(type="string", unique=true, nullable=true)
     * @Assert\Email()
     * @var string
     */
    protected $email;

    /**
     * Returns the person's display name
     *
     * @return string
     */
    public function __toString()
    {
        $displayName = $this->getDisplayName() ?: $this->getFirstName() . ' ' . $this->getLastName();

        return $this->getLastName() ? $displayName : '';
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return int
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param int $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * @param string $displayName
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * @param string $province
     */
    public function setProvince($province)
    {
        $this->province = $province;
    }

    /**
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @param string $zipCode
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
}