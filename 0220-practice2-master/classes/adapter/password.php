<?php
class AdapterPassword implements AdapterInterface
{
    public function check(array $data): bool
    {
        $result = $data['password'] == $data['password_confirm'];
        return $result;
    }
}