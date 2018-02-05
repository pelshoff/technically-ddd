<?php
declare(strict_types=1);

namespace Pelshoff\Meeting;

use Ramsey\Uuid\UuidInterface;

final class Meeting {
    private $meetingId;
    private $title;
    private $description;
    private $code;
    private $startDate;
    private $endDate;
    private $startTime;
    private $endTime;
    private $isPublished;
    private $subTitle;
    private $program;

    public function __construct(UuidInterface $meetingId, string $title, string $description,
        string $code, string $startDate, string $endDate, string $startTime, string $endTime,
        bool $isPublished, string $subTitle, array $program) {
        $this->meetingId = $meetingId;
        $this->title = $title;
        $this->description = $description;
        $this->code = $code;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->isPublished = $isPublished;
        $this->subTitle = $subTitle;
        $this->program = $program;
    }
}
