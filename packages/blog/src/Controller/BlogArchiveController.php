<?php

declare(strict_types=1);

namespace TomasVotruba\Blog\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use TomasVotruba\Blog\Repository\PostRepository;

final class BlogArchiveController extends AbstractController
{
    public function __construct(private PostRepository $postRepository)
    {
    }

    #[Route('/archive', name: 'blog_archive')]
    public function __invoke(): Response
    {
        $postsByYear = $this->postRepository->groupByYear();
        return $this->render('blog/archive.twig', [
            'title' => 'Post Archive',
            'posts_by_year' => $postsByYear,
        ]);
    }
}
