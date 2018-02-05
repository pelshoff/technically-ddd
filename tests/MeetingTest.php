<?php
declare(strict_types=1);

namespace Pelshoff\Meeting\test;

use Pelshoff\Meeting\Meeting;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

final class MeetingTest extends TestCase {
    public function testThatValidMeetingsCanBeInstantiated() {
        $this->assertInstanceOf(Meeting::class,
            new Meeting(Uuid::uuid4(), 'This is a test', 'This is a test description', 'M01',
                '2016-09-29', '2016-09-29', '09:00', '18:00', false,
                'This is a test sub title',
                [
                    [
                        'date' => '2016-09-29',
                        'startTime' => '09:00',
                        'endTime' => '09:30',
                        'title' => 'Opening',
                        'room' => 'White room',
                    ],
                    [
                        'date' => '2016-09-29',
                        'startTime' => '09:30',
                        'endTime' => '10:30',
                        'title' => 'Intro OOP',
                        'room' => 'Black room',
                    ],
                    [
                        'date' => '2016-09-29',
                        'startTime' => '09:30',
                        'endTime' => '10:00',
                        'title' => 'Intro FP',
                        'room' => 'White room',
                    ],
                ]
            ));
    }
}
