<?php
declare(strict_types=1);

namespace Pelshoff\Meeting;

use Ramsey\Uuid\UuidInterface;

final class Meeting {
    private $meetingId;
    private $title;
    private $description;
    private $code;
    private $duration;
    private $isPublished;
    private $subTitle;
    private $program;

    public function __construct(UuidInterface $meetingId, string $title, string $description,
        string $code, MeetingDuration $duration, bool $isPublished, string $subTitle,
        array $program) {
        $this->meetingId = $meetingId;
        $this->title = $title;
        $this->description = $description;
        $this->code = $code;
        $this->duration = $duration;
        $this->isPublished = $isPublished;
        $this->subTitle = $subTitle;
        $this->program = $program;
        $this->programSlotsCannotOccurInTheSameRoomAtTheSameTime();
    }

    private function programSlotsCannotOccurInTheSameRoomAtTheSameTime(): void
    {
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
