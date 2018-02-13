<?php
declare(strict_types=1);

namespace Pelshoff\Meeting;

final class Program {
    private $program;

    /** @param Slot[] $program */
    public function __construct(array $program) {
        $this->program = $program;
        $this->programSlotsCannotOccurInTheSameRoomAtTheSameTime();
    }

    private function programSlotsCannotOccurInTheSameRoomAtTheSameTime(): void {
        foreach ($this->program as $index => $thisSlot) {
            foreach (array_slice($this->program, $index + 1) as $thatSlot) {
                if ($thisSlot->overlapsWith($thatSlot)) {
                    throw InvalidProgram::becauseProgramSlotsOverlap();
                }
            }
        }
    }
}
