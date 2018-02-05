<?php
declare(strict_types=1);

namespace Pelshoff\Meeting\test;

use Pelshoff\Meeting\InvalidMeetingDuration;
use Pelshoff\Meeting\MeetingDuration;
use PHPUnit\Framework\TestCase;

final class MeetingDurationTest extends TestCase {
    public function testThatMeetingsCannotStartBeforeTheyEndOnTheSameDay() {
        $this->expectException(InvalidMeetingDuration::class);

        new MeetingDuration('2016-09-29', '2016-09-29', '18:00', '09:00');
    }

    public function testThatMeetingsCannotStartBeforeTheyEndOnDifferentDays() {
        $this->expectException(InvalidMeetingDuration::class);

        new MeetingDuration('2016-09-30', '2016-09-29', '09:00', '18:00');
    }
}
