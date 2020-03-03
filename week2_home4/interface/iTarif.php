<?php
// =======================================================
// Задание 3.1
function getDeliveryInfo($file_name)
{
    $delivery = new SimpleXMLElement($file_name);

    echo '<table cellpadding="2" cellspacing="5"><tr><th>Purchase Order Number</th><th>Order Date</th></tr>';
    echo '<tr><td>' . $delivery->attributes()->PurchaseOrderNumber . '</td>';
    echo '<td>' . $delivery->attributes()->OrderDate . '</td></tr></<table>';


    echo '<table cellpadding="2" cellspacing="5">';
    foreach ($delivery->Address as $address) {
        echo '<tr><td colspan="6"><b>Delivery Type:</b> ' . $address->attributes()->Type . '</td></tr>';
        echo '<tr><th>Name:</th><th>Street:</th><th>City:</th><th>State:</th><th>Zip:</th><th>Country:</th></tr>';
        echo '<tr>
<td>' . $address->Name->__toString() . '</td>
<td>' . $address->Street->__toString() . '</td>
<td>' . $address->City->__toString() . '</td>
<td>' . $address->State->__toString() . '</td>
<td>' . $address->Zip->__toString() . '</td>
<td>' . $address->Country->__toString() . '</td>
</tr>';
    }
    echo '<tr><td colspan="1"><b>Delivery Notes: </b></td><td colspan="5">' . $delivery->DeliveryNotes . '</td></tr></table>';
    echo '<table>';
    foreach ($delivery->Items->Item as $item) {
        echo '<tr><td colspan="6"><b>Part Number:</b> ' . $item->attributes()->PartNumber . '</td></tr>';
        echo '<tr><th>Product Name:</th><th>Quantity:</th><th>US Price:</th><th colspan="3">Comment:</th></tr>';
        echo '<tr>
<td>' . $item->ProductName->__toString() . '</td>
<td>' . $item->Quantity->__toString() . '</td>
<td>' . $item->USPrice->__toString() . '</td>
<td colspan="3">' . $item->Comment->__toString() . '</td>
</tr>';
    }

    echo '</table>';
}

// =======================================================
// Задание 3.2
function createJsonFile(array $array, string $file_name)
{
    return file_put_contents($file_name, json_encode($array));
}

function openJsonFile(string $file_name)
{
    return $json_file = json_decode(file_get_contents($file_name), true);
}

function replaceValue(array $json_file, array $replace_value, bool $do_replace = true)
{
    if ($do_replace) {
        echo 'Данные перезаписаны: <br>';
        createJsonFile(replaceJsonFile($json_file, $replace_value), 'output2.json');
    } else {
        echo 'Данные НЕ перезаписаны: <br>';
        createJsonFile($json_file, 'output.json');
    }
}

function replaceJsonFile(array $json_file, array $replace_value)
{
    foreach ($replace_value as $old_value => $new_value) {
        $json_file = recursiveArrayReplace($old_value, $new_value, $json_file);
    }
    return $json_file;
}


function recursiveArrayReplace($find, $replace, $array)
{
    if (!is_array($array)) {
        return str_replace($find, $replace, $array);
    }
    $new_array = [];
    foreach ($array as $key => $value) {
        $new_array[$key] = recursiveArrayReplace($find, $replace, $value);
    }
    return $new_array;
}

function getDiffJson(string $file_name_1, string $file_name_2, string $delimiter = ',')
{
    if (!file_exists($file_name_1) or !file_exists($file_name_2)) {
        echo 'Один из файлов не найден';
        return;
    } else {
        $file_1 = json_decode(file_get_contents($file_name_1), true);
        $file_2 = json_decode(file_get_contents($file_name_2), true);

        $file_1 = explode($delimiter, explodeRecursive($file_1));
        array_pop($file_1);

        $file_2 = explode($delimiter, explodeRecursive($file_2));
        array_pop($file_2);

        $original_file = array_diff($file_1, $file_2);
        $new_file = array_values(array_diff($file_2, $file_1));
        echo '<br>В файлах ' . $file_name_1 . ' и ' . $file_name_2 . ' отличаются следующие элементы (старый - новый):<br><br>';
        $i = 0;
        foreach ($original_file as $original) {
            echo $original . ' - ' . $new_file[$i] . '<br>';
            $i++;
        }
    }
}


function explodeRecursive(array $array, string $delimiter = ',')
{
    $my_value = '';
    foreach ($array as $value) {
        if (is_array($value)) {
            $my_value .= explodeRecursive($value);
        } else {
            $my_value .= $value . $delimiter;
        }
    }
    return $my_value;
}


// =======================================================
// Задание 3.3
function createRandNumArray(int $limit)
{
    for ($i = 0; $i < $limit; $i++) {
        $rand_num[] = mt_rand(1, 100);
    }
    return $rand_num;
}

function createCsvFile(array $array, string $file_name)
{
    $values = '';
    foreach ($array as $value) {
        $values .= $value . "\n";
    }
    file_put_contents($file_name, $values);
}

function getSummFromCsv(string $file_name)
{
    $summ = 0;
    $file = fopen($file_name, 'r');
    if (!$file) {
        echo 'Файл не найден';
    } else {
        while ((int)$num = fgets($file, 1000)) {
            if (($num % 2) == 0) {
                $summ += $num;
            }
        }
        return $summ;
    }
}