<?php

namespace App;

class CaesarCipher
{
    private string $alphabet;

    /**
     * @param $shift
     */
    public function __construct(private int $shift, ?string $alphabet = null)
    {
        $this->alphabet = $alphabet === 'en' ? 'abcdefghijklmnopqrstuvwxyz' : 'абвгдеёжзийклмнопрстуфхцчшщъыьэюя';
    }

    public function encrypt($text)
    {
        $encryptedText = '';

        // Проходим по каждому символу входного текста
        for ($i = 0; $i < mb_strlen($text); $i++) {
            $char = mb_substr($text, $i, 1); // Получаем текущий символ

            // Ищем позицию символа в алфавите
            $position = mb_strpos($this->alphabet, mb_strtolower($char));

            // Если символ не найден в алфавите, оставляем его без изменений
            if ($position === false) {
                $encryptedText .= $char;
            } else {
                // Сдвигаем позицию символа на заданное количество шагов
                $newPosition = ($position + $this->shift) % mb_strlen($this->alphabet);
                $encryptedChar = mb_substr($this->alphabet, $newPosition, 1);

                // Учитываем регистр символа
                if (mb_strtoupper($char) === $char) {
                    $encryptedText .= mb_strtoupper($encryptedChar);
                } else {
                    $encryptedText .= $encryptedChar;
                }
            }
        }

        return $encryptedText;
    }

    public function decrypt($encryptedText)
    {
        $decryptedText = '';
        $shift = mb_strlen($this->alphabet) - $this->shift;

        // Проходим по каждому символу зашифрованного текста
        for ($i = 0; $i < mb_strlen($encryptedText); $i++) {
            $char = mb_substr($encryptedText, $i, 1); // Получаем текущий символ

            // Ищем позицию символа в алфавите
            $position = mb_strpos($this->alphabet, mb_strtolower($char));

            // Если символ не найден в алфавите, оставляем его без изменений
            if ($position === false) {
                $decryptedText .= $char;
            } else {
                // Сдвигаем позицию символа на обратное количество шагов
                $newPosition = ($position + $shift) % mb_strlen($this->alphabet);
                $decryptedChar = mb_substr($this->alphabet, $newPosition, 1);

                // Учитываем регистр символа
                if (mb_strtoupper($char) === $char) {
                    $decryptedText .= mb_strtoupper($decryptedChar);
                } else {
                    $decryptedText .= $decryptedChar;
                }
            }
        }

        return $decryptedText;
    }
}
