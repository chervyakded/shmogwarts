<?php

namespace App\Controller;

use App\Entity\StudentGroup;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/student_groups", name="api_student_groups")
 */
class StudentGroupController extends AbstractController
{
    /**
     * @Route("/student_groups", methods={"GET"})
     */
    public function index(): Response
    {
        $student_groups = $this->getDoctrine()->getRepository(StudentGroup::class)->findAll();

        return $this->json($student_groups);
    }

    /**
     * @Route("/student_groups/{id}", methods={"GET"})
     */
    public function show(int $id): Response
    {
        $student_group = $this->getDoctrine()->getRepository(StudentGroup::class)->find($id);

        if (!$student_group) {
            return $this->json(['message' => 'Student group not found'], Response::HTTP_NOT_FOUND);
        }

        return $this->json($student_group);
    }
}
