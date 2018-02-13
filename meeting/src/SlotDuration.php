<?php
declare(strict_types=1);

namespace Pelshoff\Meeting;

use DateTimeImmutable;

final class SlotDuration {
    private $start;
    private $end;

    public function __construct(DateTimeImmutable $start, DateTimeImmutable $end) {
        $this->start = $start;
        $this->end = $end;
        $this->slotCannotEndBeforeStart();
        $this->slotMustStartAndEndOnTheSameDay();
    }

    private function slotCannotEndBeforeStart(): void {
        if ($this->end < $this->start) {
            throw InvalidSlotDuration::becauseSlotEndsBeforeStarting();
        }
    }

    private function slotMustStartAndEndOnTheSameDay(): void {
        if ($this->start->diff($this->end)->days >= 1) {
            throw InvalidSlotDuration::becauseSlotEndsOnDifferentDay();
        }
    }

    public function overlapsWith(SlotDuration $that): bool {
        return !$this->before($that) && !$that->before($this);
    }

    private function before(SlotDuration $that): bool {
        return $that->start >= $this->end;
    }
}

