<?php

namespace App\Entity;

/**
 * Расписание
 *
 * @ORM\Entity()
 * @ORM\Table(
 *     name="school_timetables"
 * )
 */
class SchoolTimetable
{
    /**
     * id записи
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="school_timetable_id_seq")
     * @ORM\Column(type="integer", name="id", nullable=false)
     *
     * @var integer
     */
    private int $id;

    /**
     * Сущность заклинания, содержащая его id
     *
     * @ORM\ManyToOne(targetEntity=\App\Entity\Spell::class)
     * @ORM\JoinColumn(name="spell_id", referencedColumnName="id")
     *
     * @var Spell
     */
    private Spell $spell;

    /**
     * Сущность группы, содержащая его id
     *
     * @ORM\ManyToOne(targetEntity=\App\Entity\StudentGroup::class)
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     *
     * @var StudentGroup
     */
    private StudentGroup $group;

    /**
     * Сущность учителя, содержащая его id
     *
     * @ORM\ManyToOne(targetEntity=\App\Entity\Teacher::class)
     * @ORM\JoinColumn(name="teacher_id", referencedColumnName="id")
     *
     * @var Teacher
     */
    private Teacher $teacher;

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
     * Получить id записи
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Получить заклинание
     *
     * @return Spell
     */
    public function getSpell(): Spell
    {
        return $this->spell;
    }

    /**
     * Получить группу
     *
     * @return StudentGroup
     */
    public function getGroup(): StudentGroup
    {
        return $this->group;
    }

    /**
     * Получить учителя
     *
     * @return Teacher
     */
    public function getTeacher(): Teacher
    {
        return $this->teacher;
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
     * Вернуть id записи
     *
     * @param int $id
     * @return SchoolTimetable
     */
    public function setId(int $id): SchoolTimetable
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Вернуть заклинание
     *
     * @param Spell $spell
     * @return SchoolTimetable
     */
    public function setSpell(Spell $spell): SchoolTimetable
    {
        $this->spell = $spell;
        return $this;
    }

    /**
     * Вернуть группу
     *
     * @param StudentGroup $group
     * @return SchoolTimetable
     */
    public function setGroup(StudentGroup $group): SchoolTimetable
    {
        $this->group = $group;
        return $this;
    }

    /**
     * Вернуть учителя
     *
     * @param Teacher $teacher
     * @return SchoolTimetable
     */
    public function setTeacher(Teacher $teacher): SchoolTimetable
    {
        $this->teacher = $teacher;
        return $this;
    }

    /**
     * Вернуть курс
     *
     * @param Course $course
     * @return SchoolTimetable
     */
    public function setCourse(Course $course): SchoolTimetable
    {
        $this->course = $course;
        return $this;
    }


}