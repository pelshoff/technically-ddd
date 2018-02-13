<?php
declare(strict_types=1);

namespace Pelshoff\Meeting;

use DomainException;

final class InvalidProgram extends DomainException {
    public static function becauseProgramSlotsOverlap(): self {
        return new self;
    }
}
