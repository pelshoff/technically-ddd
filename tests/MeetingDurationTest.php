<?php
declare(strict_types=1);

namespace Pelshoff\Meeting\test;

use DateTimeImmutable;
use Pelshoff\Meeting\InvalidMeetingDuration;
use Pelshoff\Meeting\MeetingDuration;
use PHPUnit\Framework\TestCase;

final class MeetingDurationTest extends TestCase {
    public function testThatMeetingsCannotStartBeforeTheyEndOnTheSameDay() {
        $this->expectException(InvalidMeetingDuration::class);

        new MeetingDuration(
            new DateTimeImmutable('2016-09-29 18:00'),
            new DateTimeImmutable('2016-09-29 09:00')
        );
    }

    public function testThatMeetingsCannotStartBeforeTheyEndOnDifferentDays() {
        $this->expectException(InvalidMeetingDuration::class);

        new MeetingDuration(
            new DateTimeImmutable('2016-09-30 09:00'),
            new DateTimeImmutable('2016-09-29 18:00')
        );
    }
}
