<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class PasswordHashTest extends TestCase
{

    public function testVerificaSenhaPeloHash()
    {
        $senha = 'senha123';

        $password_hash = new \PasswordHash(8, FALSE);
        $hash = $password_hash->HashPassword($senha);

        $this->assertTrue($password_hash->CheckPassword($senha, $hash));
    }
}
