<?php
declare(strict_types=1);

namespace Pelshoff\Meeting;

final class MeetingDuration {
    private $startDate;
    private $endDate;
    private $startTime;
    private $endTime;

    public function __construct(string $startDate, string $endDate, string $startTime, string $endTime) {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->meetingCannotEndBeforeStart();
    }

    private function meetingCannotEndBeforeStart(): void {
        if ($this->startDate < $this->endDate) {
            return;
        }
        if ($this->startDate > $this->endDate) {
            throw InvalidMeetingDuration::becauseDurationEndsBeforeStarting();
        }
        if ($this->startTime > $this->endTime) {
            throw InvalidMeetingDuration::becauseDurationEndsBeforeStarting();
        }
    }
}
