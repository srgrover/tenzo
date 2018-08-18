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
     * @ORM\Column(type="string", nullable=false)
     * @var string
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
     * @ORM\Column(type="string", nullable=false)
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
     * @ORM\Column(type="string", nullable=false)
     * @var string
     */
    protected $phoneNumber;
    /**
     * @ORM\Column(type="datetime", nullable=false)
     * @var \DateTime
     */
    protected $born;
    /**
     * @ORM\Column(type="string", nullable=true)
     * @var string
     */
    protected $avatar;
    /**
     * @ORM\Column(type="boolean", nullable=false)
     * @var boolean
     */
    protected $confirmed = false;
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Formacion", mappedBy="usuario")
     *
     * @var Formacion
     */
    protected $formacion;
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Complementaria", mappedBy="usuario")
     *
     * @var Complementaria
     */
    protected $complementaria;
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Laboral", mappedBy="usuario")
     *
     * @var Laboral
     */
    protected $laboral;
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Idioma", mappedBy="usuario")
     *
     * @var Idioma
     */
    protected $idioma;

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
     * @return \DateTime
     */
    public function getBorn()
    {
        return $this->born;
    }

    /**
     * @param \DateTime $born
     */
    public function setBorn($born)
    {
        $this->born = $born;
    }

    /**
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param string $avatar
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    /**
     * @return bool
     */
    public function isConfirmed()
    {
        return $this->confirmed;
    }

    /**
     * @param bool $confirmed
     */
    public function setConfirmed($confirmed)
    {
        $this->confirmed = $confirmed;
    }

    /**
     * @return Complementaria
     */
    public function getComplementaria()
    {
        return $this->complementaria;
    }

    /**
     * @param Complementaria $complementaria
     */
    public function setComplementaria($complementaria)
    {
        $this->complementaria = $complementaria;
    }

    /**
     * @return Formacion
     */
    public function getFormacion()
    {
        return $this->formacion;
    }

    /**
     * @param Formacion $formacion
     */
    public function setFormacion($formacion)
    {
        $this->formacion = $formacion;
    }

    /**
     * @return Laboral
     */
    public function getLaboral()
    {
        return $this->laboral;
    }

    /**
     * @param Laboral $laboral
     */
    public function setLaboral($laboral)
    {
        $this->laboral = $laboral;
    }

    /**
     * @return Idioma
     */
    public function getIdioma()
    {
        return $this->idioma;
    }

    /**
     * @param Idioma $idioma
     */
    public function setIdioma($idioma)
    {
        $this->idioma = $idioma;
    }
}