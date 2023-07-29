<?php

namespace App\Entity;

use DateTime;

/**
 * Учёт палочек
 *
 * @ORM\Entity()
 * @ORM\Table(
 *     name="wand_records",
 *     indexes={
 *         @ORM\Index(name="wand_records_tree_idx", columns={"tree"}),
 *         @ORM\Index(name="wand_records_heart_idx", columns={"heart"}),
 *         @ORM\Index(name="wand_records_issue_date_idx", columns={"issue_date"}),
 *         @ORM\Index(name="wand_records_expiry_date_idx", columns={"expiry_date"}),
 *     }
 * )
 */
class WandRecord
{
    /**
     * id записи палочки
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="wand_record_id_seq")
     * @ORM\Column(type="integer", name="id", nullable=false)
     *
     * @var integer
     */
    private int $id;

    /**
     * дерево палочки
     *
     * @ORM\Column(name="tree", type="string", length=100, nullable=false)
     *
     * @var string
     */
    private string $tree;

    /**
     * сердцевина палочки
     *
     * @ORM\Column(name="heart", type="string", length=100, nullable=false)
     *
     * @var string
     */
    private string $heart;

    /**
     * Сущность ученика, содержащая его id
     *
     * @ORM\ManyToOne(targetEntity=\App\Entity\Student::class)
     * @ORM\JoinColumn(name="student_id", referencedColumnName="id")
     *
     * @var Student
     */
    private Student $student;

    /**
     * дата выдачи палочки
     *
     * @ORM\Column(name="issue_date", type="datetime_immutable", nullable=true)
     *
     * @var DateTime
     */
    private DateTime $issueDate;

    /**
     * дата окончания срока выдачи палочки
     *
     * @ORM\Column(name="expiry_date", type="datetime_immutable", nullable=true)
     *
     * @var DateTime
     */
    private DateTime $expiryDate;

    /**
     * @param DateTime $issueDate - дата выдачи
     * @param DateTime $expiryDate - дата окончания срока
     */
    public function __construct(
        DateTime $issueDate,
        DateTime $expiryDate
    )
    {
        $this->issueDate = new DateTime();
        $this->issueDate->modify('+1 month');
    }

    /**
     * Получить id записи палочки
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Получить дерево палочки
     *
     * @return string
     */
    public function getTree(): string
    {
        return $this->tree;
    }

    /**
     * Получить сердцевину палочки
     *
     * @return string
     */
    public function getHeart(): string
    {
        return $this->heart;
    }

    /**
     * Получить ученика
     *
     * @return Student
     */
    public function getStudent(): Student
    {
        return $this->student;
    }

    /**
     * Получить дату выдачи
     *
     * @return DateTime
     */
    public function getIssueDate(): DateTime
    {
        return $this->issueDate;
    }

    /**
     * Получить дату окончания срока
     *
     * @return DateTime
     */
    public function getExpiryDate(): DateTime
    {
        return $this->expiryDate;
    }

    /**
     * Вернуть id записи палочки
     *
     * @param int $id
     * @return WandRecord
     */
    public function setId(int $id): WandRecord
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Вернуть дерево палочки
     *
     * @param string $tree
     * @return WandRecord
     */
    public function setTree(string $tree): WandRecord
    {
        $this->tree = $tree;
        return $this;
    }

    /**
     * Вернуть сердцевину палочки
     *
     * @param string $heart
     * @return WandRecord
     */
    public function setHeart(string $heart): WandRecord
    {
        $this->heart = $heart;
        return $this;
    }

    /**
     * Вернуть ученика
     *
     * @param Student $student
     * @return WandRecord
     */
    public function setStudent(Student $student): WandRecord
    {
        $this->student = $student;
        return $this;
    }

    /**
     * Вернуть дату выдачи
     *
     * @param DateTime $issueDate
     * @return WandRecord
     */
    public function setIssueDate(DateTime $issueDate): WandRecord
    {
        $this->issueDate = $issueDate;
        return $this;
    }

    /**
     * Вернуть дату окончания срока
     *
     * @param DateTime $expiryDate
     * @return WandRecord
     */
    public function setExpiryDate(DateTime $expiryDate): WandRecord
    {
        $this->expiryDate = $expiryDate;
        return $this;
    }


}