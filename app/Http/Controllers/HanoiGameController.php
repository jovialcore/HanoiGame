<?php

namespace App\Http\Controllers;

use App\Helper\HanoiGame;
use Illuminate\Http\JsonResponse;
use Marcosh\LamPHPda\Either;
use Marcosh\LamPHPda\Maybe;

use function App\Helper\getState;
use function App\Helper\move;

class HanoiGameController extends Controller
{
    private array $state;

    public function __construct()
    {
        $this->state = [[1, 2, 3, 4, 5, 6, 7], [], []];
    }


    public function getState()
    {
        return  $this->setState()->eval(
            fn() => $this->errorMessage('Game is over', 200),
            fn($state) => response()->json($state, 200)
        );
    }

    public function move($from, $to)
    {
        return $this->makeMove($from, $to)->eval(
            fn($error) => $this->errorMessage($error->getMessage(), 400),

            fn($newState) => response()->json($newState, 200)
        );
    }


    private function setState(): Maybe
    {

        return Maybe::just(getState($this->state));
    }

    private function makeMove(int $from, int $to): Either
    {
        return move($this->state, $from, $to)
            ->map(function ($newState) {
                $this->state = $newState;
                return getState($newState);
            });
    }

    private function errorMessage(string $message): JsonResponse
    {
        return response()->json(['error' => $message], 400);
    }
}
