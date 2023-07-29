<?php

namespace App\Entity;

/**
 * Группы
 *
 * @ORM\Entity()
 * @ORM\Table(
 *     name="groups",
 *     indexes={
 *         @ORM\Index(name="groups_name_idx", columns={"name"}),
 *         @ORM\Index(name="groups_year_idx", columns={"year"})
 *     }
 * )
 */
class StudentGroup
{
    /**
     * id группы
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="group_id_seq")
     * @ORM\Column(type="integer", name="id", nullable=false)
     *
     * @var integer
     */
    private int $id;

    /**
     * имя группы
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     *
     * @var string
     */
    private string $name;

    /**
     * год группы
     *
     * @ORM\Column(name="name", type="integer", nullable=false)
     *
     * @var int
     */
    private int $year;

    /**
     * Получить id группы
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Получить имя группы
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Получить год группы
     *
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * Вернуть id группы
     *
     * @param int $id
     * @return StudentGroup
     */
    public function setId(int $id): StudentGroup
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Вернуть имя группы
     *
     * @param string $name
     * @return StudentGroup
     */
    public function setName(string $name): StudentGroup
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Вернуть год группы
     *
     * @param int $year
     * @return StudentGroup
     */
    public function setYear(int $year): StudentGroup
    {
        $this->year = $year;
        return $this;
    }


}