<?php

declare(strict_types=1);

namespace App\Domain\Shared;

use Psr\Clock\ClockInterface;

/**
 * Каждый объект, содержащий этот интерфейс, поддерживает возможность получения
 * информации о дате создания этого объекта в базе данных.
 */
interface CreatedDateProviderInterface
{
    /**
     * Возвращает дату создания объекта.
     */
    public function createdAt(): \DateTimeImmutable;

    /**
     * Метод принудительно обновляет дату создания объекта.
     */
    public function wasCreatedAt(\DateTimeImmutable|ClockInterface $date): void;
}
