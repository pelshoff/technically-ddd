<?php
declare(strict_types=1);

namespace Pelshoff\Meeting;

use DomainException;

final class InvalidSlotDuration extends DomainException {
    public static function becauseSlotEndsBeforeStarting(): self {
        return new self;
    }

    public static function becauseSlotEndsOnDifferentDay(): self {
        return new self;
    }
}
