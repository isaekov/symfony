<?php


namespace App\Twig;


use App\Entity\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{

    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    /**
     * @var TokenStorageInterface
     */
    private TokenStorageInterface $tokenStorage;


    public function __construct(EntityManagerInterface $entityManager, TokenStorageInterface $tokenStorage)
    {
        $this->entityManager = $entityManager;
        $this->tokenStorage = $tokenStorage;
    }

    public function getFilters(): array
    {
        return [
            new TwigFilter('route', [AppRuntime::class, 'route']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('route', function () {
                return $this->entityManager->getRepository(Route::class)->findBy([
                    'userId' => $this->getUser()->getId()
                ]);
            })
        ];
    }


    public function getUser()
    {
        return $this->tokenStorage->getToken()->getUser();
    }

}