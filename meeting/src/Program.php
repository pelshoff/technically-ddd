<?php
declare(strict_types=1);

namespace Pelshoff\Meeting;

final class Program {
    private $program;

    public function __construct(array $program) {
        $this->program = $program;
        $this->programSlotsCannotOccurInTheSameRoomAtTheSameTime();
    }

    private function programSlotsCannotOccurInTheSameRoomAtTheSameTime(): void {
        foreach ($this->program as $index => $slot) {
            foreach (array_slice($this->program, $index + 1) as $comparison) {
                if ($slot['room'] !== $comparison['room']) {
                    continue;
                }
                if ($slot['date'] !== $comparison['date']) {
                    continue;
                }
                if ($slot['startTime'] >= $comparison['endTime']) {
                    continue;
                }
                if ($slot['endTime'] <= $comparison['startTime']) {
                    continue;
                }
                throw InvalidProgram::becauseProgramSlotsOverlap();
            }
        }
    }
}
