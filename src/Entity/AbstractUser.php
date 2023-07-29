<?php

namespace App\Entity;

use DateTime;

/**
 * Общие свойства для наследников (Учитель, Ученик)
 *
 * @ORM\Entity()
 * @ORM\Table(
 *     name="abstract_users",
 *     indexes={
 *         @ORM\Index(name="abstract_users_full_name_idx", columns={"first_name"}),
 *         @ORM\Index(name="abstract_users_full_name_idx", columns={"last_name"}),
 *         @ORM\Index(name="abstract_users_full_name_idx", columns={"father_name"}),
 *         @ORM\Index(name="abstract_users_birthdate_idx", columns={"birthdate"})
 *     }
 * )
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string", length=30)
 * @ORM\DiscriminatorMap(
 *     {
 *         "teacher" = \App\Entity\Teacher::class,
 *         "student" = \App\Entity\Student::class
 *     }
 * )
 */
abstract class AbstractUser
{
    /**
     * id пользователя
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="abstract_users_id_seq")
     * @ORM\Column(type="integer", name="id", nullable=false)
     *
     * @var integer
     */
    private int $id;

    /**
     * имя пользователя
     *
     * @ORM\Column(type="string", length=255, name="first_name", nullable=false)
     *
     * @var string
     */
    private string $firstName;

    /**
     * фамилия пользователя
     *
     * @ORM\Column(type="string", length=255, name="last_name", nullable=false)
     *
     * @var string
     */
    private string $lastName;

    /**
     * отчество пользователя
     *
     * @ORM\Column(type="string", length=255, name="father_name", nullable=true)
     *
     * @var string
     */
    private string $fatherName;

    /**
     * д.р. пользователя
     *
     * @ORM\Column(name="birthdate", type="datetime_immutable", nullable=false)
     *
     * @var DateTime
     */
    private DateTime $birthdate;

    /**
     * Получить id пользователя
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Получить имя пользователя
     *
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * Получить фамилию пользователя
     *
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * Получить отчество пользователя
     *
     * @return string
     */
    public function getFatherName(): string
    {
        return $this->fatherName;
    }

    /**
     * Получить д.р. пользователя
     *
     * @return DateTime
     */
    public function getBirthdate(): DateTime
    {
        return $this->birthdate;
    }

    /**
     * Вернуть id пользователя
     *
     * @param int $id
     * @return AbstractUser
     */
    public function setId(int $id): AbstractUser
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Вернуть имя пользователя
     *
     * @param string $firstName
     * @return AbstractUser
     */
    public function setFirstName(string $firstName): AbstractUser
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * Вернуть фамилию пользователя
     *
     * @param string $lastName
     * @return AbstractUser
     */
    public function setLastName(string $lastName): AbstractUser
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * Вернуть отчество пользователя
     *
     * @param string $fatherName
     * @return AbstractUser
     */
    public function setFatherName(string $fatherName): AbstractUser
    {
        $this->fatherName = $fatherName;
        return $this;
    }

    /**
     * Вернуть д.р. пользователя
     *
     * @param DateTime $birthdate
     */
    public function setBirthdate(DateTime $birthdate): void
    {
        $this->birthdate = $birthdate;
    }


}