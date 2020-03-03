<?php
class Signup
{
    private $adapter;

    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @param array $data
     * @throws Exception
     */
    public function register(array $data)
    {
        $this->check($data);
        $this->registerProcess($data);
    }

    private function check(array $data)
    {
        if (!$this->adapter->check($data)) {
            throw new Exception('cant register');
        }
    }

    private function registerProcess(array $data)
    {
        $db = DB::instance();
        $insert = "
            INSERT INTO users (
              `name`,
              reg_type,
              created_at
            ) VALUES (
              :name,
              :reg_type,
              :created_at
            );
        ";

        $ret = $db->exec($insert, __METHOD__, [
            ':name' => $data['name'],
            ':reg_type' => $data['reg_type'],
            ':created_at' => date('Y-m-d H:i:s')
        ]);

        return $ret;
    }
}