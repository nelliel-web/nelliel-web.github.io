<?php
class AdapterVk implements AdapterInterface
{
    public function check(array $data): bool
    {
        // verify vk_id and hash
        $vkId = $data['vk_id'];
        $vkHash = $data['vk_hash'];

//        $result = file_get_contents('https://api.vk.com/oauth/verify?id=' . $vkId . '&hash=' . $vkHash);

        return true;

    }
}