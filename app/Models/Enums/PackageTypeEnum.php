<?php

namespace App\Models\Enums;

enum PackageTypeEnum: string
{
    // Типы пакетов
    case FileManagement = 'file-management';
    case DatabaseAndEloquent = 'database-and-eloquent';
    case DebuggingAndDevTools = 'debugging-and-dev-tools';
    case DevOps = 'dev-ops';
    case API = 'api';
    case Testing = 'testing';
    case ECommerce = 'e-commerce';
    case CMSAndAdminPanels = 'cms-and-admin-panels';
    case CodeArchitecture = 'code-architecture';
    case UIAndBladeComponents = 'ui-and-blade-components';
    case UtilitiesAndHelpers = 'utilities-and-helpers';

    /**
     * Получить текстовое представление типа пакета.
     *
     * @return string
     */
    public function text(): string
    {
        return match ($this) {
            self::FileManagement       => 'Управление файлами',
            self::DatabaseAndEloquent  => 'Базы данных и Eloquent',
            self::DebuggingAndDevTools => 'Инструменты разработчика',
            self::DevOps               => 'Обслуживание',
            self::API                  => 'API',
            self::Testing              => 'Тестирование',
            self::ECommerce            => 'Интернет-торговля',
            self::CMSAndAdminPanels    => 'CMS и панели администратора',
            self::CodeArchitecture     => 'Архитектура кода',
            self::UIAndBladeComponents => 'UI и компоненты Blade',
            self::UtilitiesAndHelpers  => 'Утилиты',
        };
    }

    /**
     * Получить цвет фона для текстового представления типа пакета.
     *
     * @return string
     */
    public function colorBg(): string
    {
        return $this->hex($this->text(), '21'); // подобрать подходящее значение
    }

    /**
     * Получить цвет текста для текстового представления типа пакета.
     *
     * @return string
     */
    public function colorText(): string
    {
        return $this->hex($this->text());
    }

    /**
     * @param string $text
     * @param string $opacity
     *
     * @return string
     */
    private function hex(string $text, string $opacity = ''): string
    {
        return '#'.substr(hash('crc32', $text, false), 0, 6).$opacity;
    }

    /**
     * Получить иконку для типа пакета.
     *
     * @return string
     */
    public function icon(): string
    {
        return match ($this) {
            self::FileManagement       => 'i.files',
            self::DatabaseAndEloquent  => 'i.database',
            self::DebuggingAndDevTools => 'i.devtools',
            self::DevOps               => 'i.maintenance',
            self::API                  => 'i.api',
            self::Testing              => 'i.testing',
            self::ECommerce            => 'i.internet-market',
            self::CMSAndAdminPanels    => 'i.cms',
            self::CodeArchitecture     => 'i.code',
            self::UIAndBladeComponents => 'i.ui',
            self::UtilitiesAndHelpers  => 'i.utilities',
        };
    }
}
