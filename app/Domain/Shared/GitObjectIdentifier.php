<?php

declare(strict_types=1);

namespace App\Domain\Shared;

readonly class GitObjectIdentifier extends StringIdentifier
{
    /**
     * @var int<1, 40>
     */
    public const DEFAULT_SHORT_FORMAT_LENGTH = 7;

    public function __construct(\Stringable|string $value)
    {
        parent::__construct($value);

        assert(\strlen($this->value) === 40, new \InvalidArgumentException(
            \sprintf('GIT Object ID must contain 40 chars length, but %d passed', \strlen($this->value))
        ));
    }

    /**
     * @return non-empty-lowercase-string
     */
    public function toFullString(): string
    {
        return $this->value;
    }

    /**
     * @param int<1, 40> $length
     *
     * @return non-empty-lowercase-string
     */
    public function toShortString(int $length = self::DEFAULT_SHORT_FORMAT_LENGTH): string
    {
        return \substr($this->value, 0, $length);
    }

    /**
     * @return non-empty-string
     */
    public function toBinaryString(): string
    {
        return (string)\hex2bin($this->value);
    }
}
