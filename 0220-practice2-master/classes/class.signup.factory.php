<?php
class SignupFactory
{
    const TYPE_PASSWORD = 'password';
    const TYPE_VK = 'vk';
    const TYPE_GOOGLE = 'google';

    public static function get($type): Signup
    {
        switch ($type) {
            case self::TYPE_PASSWORD:
                $adapter = new AdapterPassword();
                break;
            case self::TYPE_VK:
                $adapter = new AdapterVk();
                break;
            case self::TYPE_GOOGLE:
                $adapter = new AdapterGoogle();
                break;

            default:
                throw new Exception('unknown register type');
        }
        $signup = new Signup($adapter);

        return $signup;
    }
}