<?php

declare(strict_types=1);

namespace App\Domain\Shared;

use Psr\Clock\ClockInterface;

/**
 * Каждый объект, содержащий этот интерфейс, поддерживает возможность получения
 * информации о дате последнего обновления этого объекта после его
 * сохранения в базе данных.
 */
interface UpdatedDateProviderInterface
{
    /**
     * Возвращает дату последнего обновления объекта.
     *
     * Возвращает {@see null}, если объект никогда не обновлялся.
     */
    public function updatedAt(): ?\DateTimeImmutable;

    /**
     * Принудительно обновляет дату обновления обхекта.
     */
    public function touch(\DateTimeImmutable|ClockInterface $now): void;
}
