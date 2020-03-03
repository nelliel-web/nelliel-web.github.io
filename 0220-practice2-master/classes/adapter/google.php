<?php
class AdapterGoogle implements AdapterInterface
{
    public function check(array $data): bool
    {
        return true;
    }
}