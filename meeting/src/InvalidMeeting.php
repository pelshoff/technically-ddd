<?php
declare(strict_types=1);

namespace Pelshoff\Meeting;

use DomainException;

final class InvalidMeeting extends DomainException {
    public static function becauseMeetingEndsBeforeStarting(): self {
        return new self;
    }
}
