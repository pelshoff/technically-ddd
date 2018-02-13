<?php
declare(strict_types=1);

namespace Pelshoff\Meeting\test;

use Pelshoff\Meeting\InvalidProgram;
use Pelshoff\Meeting\Program;
use PHPUnit\Framework\TestCase;

final class ProgramTest extends TestCase {
    public function testThatProgramIsInValidWhenSlotStartsAtSameTime() {
        $this->expectException(InvalidProgram::class);
        new Program([
                [
                    'date' => '2016-09-29',
                    'startTime' => '09:00',
                    'endTime' => '09:30',
                    'title' => 'Opening',
                    'room' => 'White room',
                ],
                [
                    'date' => '2016-09-29',
                    'startTime' => '09:00',
                    'endTime' => '10:00',
                    'title' => 'Intro FP',
                    'room' => 'White room',
                ],
            ]
        );
    }

    public function testThatProgramIsInValidWhenSlotStartsDuringOtherSlot() {
        $this->expectException(InvalidProgram::class);
        new Program([
                [
                    'date' => '2016-09-29',
                    'startTime' => '09:00',
                    'endTime' => '09:30',
                    'title' => 'Opening',
                    'room' => 'White room',
                ],
                [
                    'date' => '2016-09-29',
                    'startTime' => '09:15',
                    'endTime' => '10:00',
                    'title' => 'Intro FP',
                    'room' => 'White room',
                ],
            ]
        );
    }

    public function testThatProgramIsInValidWhenSlotStartsAndFinishesDuringOtherSlot() {
        $this->expectException(InvalidProgram::class);
        new Program([
                [
                    'date' => '2016-09-29',
                    'startTime' => '09:00',
                    'endTime' => '09:30',
                    'title' => 'Opening',
                    'room' => 'White room',
                ],
                [
                    'date' => '2016-09-29',
                    'startTime' => '08:30',
                    'endTime' => '10:00',
                    'title' => 'Intro FP',
                    'room' => 'White room',
                ],
            ]
        );
    }
}
