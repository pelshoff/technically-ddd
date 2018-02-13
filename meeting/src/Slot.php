<?php
declare(strict_types=1);

namespace Pelshoff\Meeting;

final class Slot {
    private $duration;
    private $title;
    private $room;

    public function __construct(SlotDuration $duration, string $title, string $room) {
        $this->duration = $duration;
        $this->title = $title;
        $this->room = $room;
    }

    public function overlapsWith(Slot $that): bool {
        return $this->room === $that->room
            && $this->duration->overlapsWith($that->duration);
    }
}

