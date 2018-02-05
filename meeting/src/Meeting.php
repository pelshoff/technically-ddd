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
    }
}
