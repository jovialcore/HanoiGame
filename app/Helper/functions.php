<?php

namespace App\Helper;

use Marcosh\LamPHPda\Either;
use Marcosh\LamPHPda\Maybe;

const TOTAL_DISKS = 7;

function move(array $state, int $from, int $to): Either
{

   
    // here, I am validating that the wrong move is not made 
    if ($from === $to || empty($state[$from]) || ($state[$to] != [] && $state[$from][0] > $state[$to][0])) {
        return Either::left(new \InvalidArgumentException('Invalid move'));
    }

    $newState = $state;
    $disk = array_shift($newState[$from]);
    array_unshift($newState[$to], $disk);

    return Either::right($newState);
}

function isGameOver(array $state): bool
{
    // making sure that the last peg is complete

    return count($state[2]) === TOTAL_DISKS;
}

function getState(array $state): array
{
    // returns the current state of the pegs which include: the number of disk in each peg, and the game status
    return [
        'pegs' => array_map(fn($peg) => count($peg), $state),
        'game_over' => isGameOver($state),
    ];
}
