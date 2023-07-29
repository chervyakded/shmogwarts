<?php

namespace App\Entity;

/**
 * Курсы(предметы)
 *
 * @ORM\Entity()
 * @ORM\Table(
 *     name="courses",
 *     indexes={
 *         @ORM\Index(name="courses_name_idx", columns={"name"})
 *     }
 * )
 */
class Course
{
    /**
     * id курса
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="course_id_seq")
     * @ORM\Column(type="integer", name="id", nullable=false)
     *
     * @var integer
     */
    private int $id;

    /**
     * имя курса
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     *
     * @var string
     */
    private string $name;

    /**
     * Получить id курса
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Получить имя курса
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Вернуть id курса
     *
     * @param int $id
     * @return Course
     */
    public function setId(int $id): Course
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Вернуть имя курса
     *
     * @param string $name
     * @return Course
     */
    public function setName(string $name): Course
    {
        $this->name = $name;
        return $this;
    }


}