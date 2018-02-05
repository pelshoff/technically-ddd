<?php
declare(strict_types=1);

namespace Pelshoff\Meeting;

use DomainException;

final class InvalidMeetingDuration extends DomainException {
    public static function becauseDurationEndsBeforeStarting(): self {
        return new self;
    }
}
