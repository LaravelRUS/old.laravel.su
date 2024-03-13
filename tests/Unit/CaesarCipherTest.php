<?php

namespace Tests\Unit;

use App\CaesarCipher;
use PHPUnit\Framework\TestCase;

class CaesarCipherTest extends TestCase
{
    /** @test */
    public function testEncryptDecrypt()
    {
        $cipher = (new CaesarCipher(3))->alphabet(CaesarCipher::ALPHABET_EN);

        $originalText = 'Hello World!';

        $encryptedText = $cipher->encrypt($originalText);

        $this->assertEquals('Khoor Zruog!', $encryptedText);

        $decryptedText = $cipher->decrypt($encryptedText);

        $this->assertEquals($originalText, $decryptedText);
    }

    /** @test */
    public function testEncryptDecryptWithRuAlphabet()
    {
        $cipher = new CaesarCipher(20);

        $originalText = 'Хлеб — всему голова!';

        $encryptedText = $cipher->encrypt($originalText);

        $this->assertEquals('Ияшф — хешаж цвявху!', $encryptedText);

        $decryptedText = $cipher->decrypt($encryptedText);

        $this->assertEquals($originalText, $decryptedText);
    }
}
