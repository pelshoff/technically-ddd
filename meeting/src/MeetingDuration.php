<?php
declare(strict_types=1);

namespace Pelshoff\Meeting;

use DateTimeImmutable;

final class MeetingDuration {
    private $start;
    private $end;

    public function __construct(DateTimeImmutable $start, DateTimeImmutable $end) {
        $this->start = $start;
        $this->end = $end;
        $this->meetingCannotEndBeforeStart();
    }

    private function meetingCannotEndBeforeStart(): void {
        if ($this->start > $this->end) {
            throw InvalidMeetingDuration::becauseDurationEndsBeforeStarting();
        }
    }
}
