<?php

namespace App\Controller;

use App\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/books", name="api_books")
 */
class BookController extends AbstractController
{
    /**
     * @Route("/books", methods={"GET"})
     */
    public function index(): Response
    {
        $books = $this->getDoctrine()->getRepository(Book::class)->findAll();

        return $this->json($books);
    }

    /**
     * @Route("/books/{id}", methods={"GET"})
     */
    public function show(int $id): Response
    {
        $book = $this->getDoctrine()->getRepository(Book::class)->find($id);

        if (!$book) {
            return $this->json(['error' => 'Book not found'], Response::HTTP_NOT_FOUND);
        }

        return $this->json($book);
    }
}


