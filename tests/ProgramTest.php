<?php
declare(strict_types=1);

namespace Pelshoff\Meeting\test;

use DateTimeImmutable;
use Pelshoff\Meeting\InvalidProgram;
use Pelshoff\Meeting\InvalidSlotDuration;
use Pelshoff\Meeting\Program;
use Pelshoff\Meeting\Slot;
use Pelshoff\Meeting\SlotDuration;
use PHPUnit\Framework\TestCase;

final class ProgramTest extends TestCase {
    public function testThatProgramIsInValidWhenSlotStartsAtSameTime() {
        $this->expectException(InvalidProgram::class);
        new Program([
                new Slot(
                    new SlotDuration(
                        new DateTimeImmutable('2016-09-29 09:00'),
                        new DateTimeImmutable('2016-09-29 09:30')
                    ),
                    'Opening',
                    'White room'
                ),
                new Slot(
                    new SlotDuration(
                        new DateTimeImmutable('2016-09-29 09:00'),
                        new DateTimeImmutable('2016-09-29 10:00')
                    ),
                    'Intro FP',
                    'White room'
                ),
            ]
        );
    }

    public function testThatProgramIsInValidWhenSlotStartsDuringOtherSlot() {
        $this->expectException(InvalidProgram::class);
        new Program([
                new Slot(
                    new SlotDuration(
                        new DateTimeImmutable('2016-09-29 09:00'),
                        new DateTimeImmutable('2016-09-29 09:30')
                    ),
                    'Opening',
                    'White room'
                ),
                new Slot(
                    new SlotDuration(
                        new DateTimeImmutable('2016-09-29 09:15'),
                        new DateTimeImmutable('2016-09-29 10:00')
                    ),
                    'Intro FP',
                    'White room'
                ),
            ]
        );
    }

    public function testThatProgramIsInValidWhenSlotStartsAndFinishesDuringOtherSlot() {
        $this->expectException(InvalidProgram::class);
        new Program([
                new Slot(
                    new SlotDuration(
                        new DateTimeImmutable('2016-09-29 09:00'),
                        new DateTimeImmutable('2016-09-29 09:30')
                    ),
                    'Opening',
                    'White room'
                ),
                new Slot(
                    new SlotDuration(
                        new DateTimeImmutable('2016-09-29 08:30'),
                        new DateTimeImmutable('2016-09-29 10:00')
                    ),
                    'Intro FP',
                    'White room'
                ),
            ]
        );
    }

    public function testThatProgramSlotsCannotEndBeforeTheyBegin() {
        $this->expectException(InvalidSlotDuration::class);
        new SlotDuration(
            new DateTimeImmutable('2016-09-29 10:00'),
            new DateTimeImmutable('2016-09-29 09:30')
        );
    }

    public function testThatProgramSlotsCannotCrossMidnight() {
        $this->expectException(InvalidSlotDuration::class);
        new SlotDuration(
            new DateTimeImmutable('2016-09-29 09:00'),
            new DateTimeImmutable('2016-09-30 09:30')
        );
    }
}
