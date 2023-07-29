<?php

namespace App\Entity;

/**
 * Заклинания
 *
 * @ORM\Entity()
 * @ORM\Table(
 *     name="spells",
 *     indexes={
 *         @ORM\Index(name="spells_name_idx", columns={"name"}),
 *     }
 * )
 */
class Spell
{
    /**
     * id заклинания
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="spell_id_seq")
     * @ORM\Column(type="integer", name="id", nullable=false)
     *
     * @var integer
     */
    private int $id;

    /**
     * название заклинания
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     *
     * @var string
     */
    private string $name;

    /**
     * описание заклинания
     *
     * @ORM\Column(name="description", type="text", length=1000, nullable=false)
     *
     * @var string
     */
    private string $description;

    /**
     * Сущность курса, содержащая его id
     *
     * @ORM\ManyToOne(targetEntity=\App\Entity\Course::class)
     * @ORM\JoinColumn(name="course_id", referencedColumnName="id")
     *
     * @var Course
     */
    private Course $course;

    /**
     * Получить id заклинания
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Получить название заклинания
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Получить описание заклинания
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Получить курс
     *
     * @return Course
     */
    public function getCourse(): Course
    {
        return $this->course;
    }

    /**
     * Вернуть id заклинания
     *
     * @param int $id
     * @return Spell
     */
    public function setId(int $id): Spell
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Вернуть название заклинания
     *
     * @param string $name
     * @return Spell
     */
    public function setName(string $name): Spell
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Вернуть описание заклинания
     *
     * @param string $description
     * @return Spell
     */
    public function setDescription(string $description): Spell
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Вернуть курс
     *
     * @param Course $course
     * @return Spell
     */
    public function setCourse(Course $course): Spell
    {
        $this->course = $course;
        return $this;
    }


}