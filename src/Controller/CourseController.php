<?php

namespace App\Controller;

use App\Entity\Course;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/courses", name="api_courses")
 */
class CourseController extends AbstractController
{
    /**
     * @Route("/courses", methods={"GET"})
     */
    public function index(): Response
    {
        $courses = $this->getDoctrine()->getRepository(Course::class)->findAll();

        return $this->json($courses);
    }

    /**
     * @Route("/courses/{id}", methods={"GET"})
     */
    public function show(int $id): Response
    {
        $course = $this->getDoctrine()->getRepository(Course::class)->find($id);

        if (!$course) {
            return $this->json(['message' => 'Course not found'], Response::HTTP_NOT_FOUND);
        }

        return $this->json($course);
    }
}