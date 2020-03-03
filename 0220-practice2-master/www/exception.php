<?php
class DeriveZeroException extends Exception
{
    private $meta;

    public function __construct(array $meta)
    {
        $this->meta = $meta;
    }

    public function getMeta()
    {
        return $this->meta;
    }
}

$a = (int) $_GET['a'];
$b = (int) $_GET['b'];


try {
    $result = derive($a, $b);
    echo "Делим $a на $b = " . $result;
} catch (DeriveZeroException $e) {
    echo 'Исключение типа DeriveZeroException meta = ' . print_r($e->getMeta(), 1);
    throw new Exception('123');
} catch (Exception $e) {
    echo 'Произошло исключение типа ' . get_class($e) . ': ' . $e->getMessage() . '<br>';
    echo 'Trace: ' . print_r($e->getTrace(), 1);
}


function derive(int $a, int $b)
{
    if ($b == 0) {
        throw new DeriveZeroException(['context' => [$a, $b]]);
    }
    if ($b == 1) {
        throw new Exception('cant derive by one');
    }
    return $a / $b;
}