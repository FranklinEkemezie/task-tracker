<?php
declare(strict_types=1);

namespace App\Support;

use App\Enums\ToastVariant;

class Toast
{

    public static function clearAll(): void
    {
        session()->forget('toast');
    }

    public static function push(ToastVariant $variant, string $message, ?string $title=null): void
    {
        $toasts = session('toasts', []);

        $variant = $variant->value;
        $toasts[] = compact('variant', 'message', 'title');

        session()->flash('toasts', $toasts);
    }

    public static function success(string $message, ?string $title=null): void
    {
        self::push(ToastVariant::SUCCESS, $message, $title);
    }

    public static function error(string $message, ?string $title=null): void
    {
        self::push(ToastVariant::ERROR, $message, $title);
    }

    public static function warning(string $message, ?string $title=null): void
    {
        self::push(ToastVariant::WARNING, $message, $title);
    }

    public static function info(string $message, ?string $title=null): void
    {
        self::push(ToastVariant::INFO, $message, $title);
    }

}
