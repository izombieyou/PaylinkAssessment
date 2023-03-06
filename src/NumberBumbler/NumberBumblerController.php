<?php

declare(strict_types=1);

namespace App\NumberBumbler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;
use App\NumberBumbler\Services\BumbleService;

/**
 * NumberBumblerController is a home point for Paylink technical test questions
 *
 * @author Alan
 */
class NumberBumblerController
{
    private Twig $view;
    private BumbleService $bumbleService;

    public function __construct(BumbleService $bumbleService)
    {
        $this->bumbleService = $bumbleService;
    }

    public function home(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $this->view = Twig::fromRequest($request);
        $fibonacciDepth = 6;
        return $this->view->render($response, 'numberBumbler.html.twig', [
                'fizzbuzz' => $this->bumbleService->fizzBuzz(),
                'fibonacciSequence' => $fibonacciDepth,
                'fibonacciValue' => $this->bumbleService->fibonacci($fibonacciDepth),
            ]);
    }

    public function fibonacci(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $this->view = Twig::fromRequest($request);
        $fibonacciDepth = (int) $args['depth'] ?? 0;
        return $this->view->render($response, 'fibonacci.html.twig', [
                'fibonacciSequence' => $fibonacciDepth,
                'fibonacciValue' => $this->bumbleService->fibonacci($fibonacciDepth),
            ]);
    }

    public function fizzBuzzer(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $this->view = Twig::fromRequest($request);
        $from = (int) $args['from'] ?? 1;
        $to = (int) $args['to'] ?? 20;
        return $this->view->render($response, 'fizzBuzz.html.twig', [
                'fizzbuzz' => $this->bumbleService->fizzBuzzer($from, $to),
            ]);
    }
}