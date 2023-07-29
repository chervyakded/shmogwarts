<?php

namespace App\Entity;

use DateTime;
use DateTimeImmutable;

/**
 * Учёт книг
 *
 * @ORM\Entity()
 * @ORM\Table(
 *     name="book_records",
 *     indexes={
 *         @ORM\Index(name="book_records_issue_date_idx", columns={"issue_date"}),
 *         @ORM\Index(name="book_records_expiry_date_idx", columns={"expiry_date"}),
 *     }
 * )
 */
class BookRecord
{
    /**
     * id записи книги
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="book_record_id_seq")
     * @ORM\Column(type="integer", name="id", nullable=false)
     *
     * @var integer
     */
    private int $id;

    /**
     * Сущность книги, содержащая её id
     *
     * @ORM\ManyToOne(targetEntity=\App\Entity\Book::class)
     * @ORM\JoinColumn(name="book_id", referencedColumnName="id")
     *
     * @var Book
     */
    private Book $book;

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
     * дата выдачи книги
     *
     * @ORM\Column(name="issue_date", type="datetime_immutable", nullable=false)
     *
     * @var DateTime
     */
    private DateTime $issueDate;

    /**
     * дата окончания срока выдачи книги
     *
     * @ORM\Column(name="expiry_date", type="datetime_immutable", nullable=false)
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
     * Получить id записи книги
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Получить книгу
     *
     * @return Book
     */
    public function getBook(): Book
    {
        return $this->book;
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
     * Вернуть id записи книги
     *
     * @param int $id
     * @return BookRecord
     */
    public function setId(int $id): BookRecord
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Вернуть книгу
     *
     * @param Book $book
     * @return BookRecord
     */
    public function setBook(Book $book): BookRecord
    {
        $this->book = $book;
        return $this;
    }

    /**
     * Вернуть ученика
     *
     * @param Student $student
     * @return BookRecord
     */
    public function setStudent(Student $student): BookRecord
    {
        $this->student = $student;
        return $this;
    }

    /**
     * Вернуть учителя
     *
     * @param Teacher $teacher
     * @return BookRecord
     */
    public function setTeacher(Teacher $teacher): BookRecord
    {
        $this->teacher = $teacher;
        return $this;
    }

    /**
     * Вернуть курс
     *
     * @param Course $course
     * @return BookRecord
     */
    public function setCourse(Course $course): BookRecord
    {
        $this->course = $course;
        return $this;
    }

    /**
     * Вернуть дату выдачи
     *
     * @param DateTime $issueDate
     * @return BookRecord
     */
    public function setIssueDate(DateTime $issueDate): BookRecord
    {
        $this->issueDate = $issueDate;
        return $this;
    }

    /**
     * Вернуть дату окончания срока
     *
     * @param DateTime $expiryDate
     * @return BookRecord
     */
    public function setExpiryDate(DateTime $expiryDate): BookRecord
    {
        $this->expiryDate = $expiryDate;
        return $this;
    }


}