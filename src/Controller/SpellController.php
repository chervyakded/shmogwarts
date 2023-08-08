<?php

namespace App\Controller;

use App\Entity\Spell;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/spells", name="api_spells")
 */
class SpellController extends AbstractController
{
    /**
     * @Route("/spells", methods={"GET"})
     */
    public function index(): Response
    {
        $spells = $this->getDoctrine()->getRepository(Spell::class)->findAll();

        return $this->json($spells);
    }

    /**
     * @Route("/spells/{id}", methods={"GET"})
     */
    public function show(int $id): Response
    {
        $spell = $this->getDoctrine()->getRepository(Spell::class)->find($id);

        if (!$spell) {
            return $this->json(['message' => 'Spell not found'], Response::HTTP_NOT_FOUND);
        }

        return $this->json($spell);
    }
}
