<?php

namespace App\Entity;

/**
 * Книги
 *
 * @ORM\Entity()
 * @ORM\Table(
 *     name="books",
 *     indexes={
 *         @ORM\Index(name="books_name_idx", columns={"name"}),
 *         @ORM\Index(name="books_author_name_idx", columns={"author_name"}),
 *         @ORM\Index(name="books_year_idx", columns={"year"}),
 *     }
 * )
 */
class Book
{
    /**
     * id книги
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="book_id_seq")
     * @ORM\Column(type="integer", name="id", nullable=false)
     *
     * @var integer
     */
    private int $id;

    /**
     * название книги
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     *
     * @var string
     */
    private string $name;


    /**
     * имя автора
     *
     * @ORM\Column(name="author_name", type="string", length=100, nullable=false)
     *
     * @var string
     */
    private string $authorName;

    /**
     * год выпуска книги
     *
     * @ORM\Column(name="year", type="integer", nullable=false)
     *
     * @var int
     */
    private int $year;

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
     * Получить id книги
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Получить название книги
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Получить имя автора
     *
     * @return string
     */
    public function getAuthorName(): string
    {
        return $this->authorName;
    }

    /**
     * Получить год выпуска книги
     *
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
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
     * Вернуть id книги
     *
     * @param int $id
     * @return Book
     */
    public function setId(int $id): Book
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Вернуть название книги
     *
     * @param string $name
     * @return Book
     */
    public function setName(string $name): Book
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Вернуть имя автора
     *
     * @param string $authorName
     * @return Book
     */
    public function setAuthorName(string $authorName): Book
    {
        $this->authorName = $authorName;
        return $this;
    }

    /**
     * Вернуть год выпуска книги
     *
     * @param int $year
     * @return Book
     */
    public function setYear(int $year): Book
    {
        $this->year = $year;
        return $this;
    }

    /**
     * Вернуть курс
     *
     * @param Course $course
     * @return Book
     */
    public function setCourse(Course $course): Book
    {
        $this->course = $course;
        return $this;
    }


}