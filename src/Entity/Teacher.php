<?php

namespace App\Entity;

/**
 * Учитель
 *
 * @ORM\Entity()
 * @ORM\Table(
 *     name="teachers",
 *     indexes={
 *         @ORM\Index(name="teachers_course_idx", columns={"course"})
 *     }
 * )
 */
class Teacher extends AbstractUser
{
    /**
     * Курс(предмет), который ведёт учитель
     *
     * @ORM\ManyToOne(
     *     targetEntity=\App\Entity\Course::class,
     *     inversedBy="course"
     * )
     * @ORM\JoinColumn(name="course_id", referencedColumnName="id")
     *
     * @var Course
     */
    private Course $course;

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
     * Вернуть курс
     *
     * @param Course $course
     * @return Teacher
     */
    public function setCourse(Course $course): Teacher
    {
        $this->course = $course;
        return $this;
    }


}