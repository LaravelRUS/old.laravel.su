<?php

namespace App\Casts;

use App\Services\ColorText;

enum PackageTypeEnum: string
{
    case FileManagement = 'file-management';
    case AuthAndPermission = 'auth-and-permission';
    case DatabaseAndEloquent = 'database-and-Eloquent';
    case DebuggingAndDevTools = 'debugging-and-dev-tools';
    case DevOps = 'dev-ops';
    case Localization = 'localization';
    case API = 'api';
    case SEO = 'seo';
    case Testing = 'testing';
    case Payment = 'payment';
    case Security = 'security';
    case Mail = 'mail';
    case ECommerce = 'e-commerce';
    case CMSAndAdminPanels = 'cms-and-admin-panels';
    case CodeArchitecture = 'code-architecture';
    case Notifications = 'notifications';
    case UIAndBladeComponents = 'ui-and-blade-components';
    case UtilitiesAndHelpers = 'utilities-and-helpers';

    public function text(): string
    {
        return match ($this) {
            self::FileManagement       => 'File Management',
            self::AuthAndPermission    => 'Auth & Permission',
            self::DatabaseAndEloquent  => 'Database & Eloquent',
            self::DebuggingAndDevTools => 'Debugging & Dev Tools',
            self::DevOps               => 'Dev Ops',
            self::Localization         => 'Localization',
            self::API                  => 'API',
            self::SEO                  => 'SEO',
            self::Testing              => 'Testing',
            self::Payment              => 'Payment',
            self::Security             => 'Security',
            self::Mail                 => 'mail',
            self::ECommerce            => 'E-Commerce',
            self::CMSAndAdminPanels    => 'CMS & Admin Panels',
            self::CodeArchitecture     => 'Code Architecture',
            self::Notifications        => 'Notifications',
            self::UIAndBladeComponents => 'UI & Blade Components',
            self::UtilitiesAndHelpers  => 'Utilities & Helpers',
        };
    }

    public function colorBg(): string
    {
        return ColorText::Hex($this->text(),'21');//подобрать подходящее значение
    }
    public function colorText(): string
    {
        return ColorText::Hex($this->text());
    }

}
