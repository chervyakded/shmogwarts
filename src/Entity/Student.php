<?php

namespace App\Entity;

/**
 * Ученик
 *
 * @ORM\Entity()
 * @ORM\Table(
 *     name="students",
 *     indexes={
 *         @ORM\Index(name="students_group_idx", columns={"course"})
 *     }
 * )
 */
class Student extends AbstractUser
{
    /**
     * Группа, в которой состоит ученик
     *
     * @ORM\ManyToOne(
     *     targetEntity=\App\Entity\StudentGroup::class,
     *     inversedBy="group"
     * )
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     *
     * @var StudentGroup
     */
    private StudentGroup $group;

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
     * Вернуть группу
     *
     * @param StudentGroup $group
     * @return Student
     */
    public function setGroup(StudentGroup $group): Student
    {
        $this->group = $group;
        return $this;
    }


}