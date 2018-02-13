<?php
declare(strict_types=1);

namespace Pelshoff\Meeting\test;

use DateTimeImmutable;
use Pelshoff\Meeting\Meeting;
use Pelshoff\Meeting\MeetingDuration;
use Pelshoff\Meeting\Program;
use Pelshoff\Meeting\Slot;
use Pelshoff\Meeting\SlotDuration;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

final class MeetingTest extends TestCase {
    public function testThatValidMeetingsCanBeInstantiated() {
        $this->assertInstanceOf(Meeting::class,
            new Meeting(Uuid::uuid4(), 'This is a test', 'This is a test description', 'M01',
                new MeetingDuration(
                    new DateTimeImmutable('2016-09-29 09:00'),
                    new DateTimeImmutable('2016-09-29 18:00')
                ), false,
                'This is a test sub title',
                new Program([
                    new Slot(
                        new SlotDuration(
                            new DateTimeImmutable('2016-09-29 09:00'),
                            new DateTimeImmutable('2016-09-29 09:30')
                        ),
                        'Opening',
                        'White room'
                    ),
                    new Slot(
                        new SlotDuration(
                            new DateTimeImmutable('2016-09-29 09:30'),
                            new DateTimeImmutable('2016-09-29 10:30')
                        ),
                        'Intro OOP',
                        'Black room'
                    ),
                    new Slot(
                        new SlotDuration(
                            new DateTimeImmutable('2016-09-29 09:30'),
                            new DateTimeImmutable('2016-09-29 10:00')
                        ),
                        'Intro FP',
                        'White room'
                    ),
                ])
            ));
    }
}
