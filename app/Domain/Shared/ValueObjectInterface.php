<?php

declare(strict_types=1);

namespace App\Domain\Shared;

interface ValueObjectInterface extends \Stringable
{
    /**
     * Возвращает {@see true} в том случае, если объект эквивалентен (содержит
     * идентичное значение) или идентичен (является тем же самам объектом)
     * переданному аргументу.
     *
     * В противном случае метод вернёт {@see false}.
     */
    public function equals(self $object): bool;

    /**
     * Возвращает строковое представление велью-обжекта.
     *
     * @return non-empty-string
     */
    public function __toString(): string;
}
