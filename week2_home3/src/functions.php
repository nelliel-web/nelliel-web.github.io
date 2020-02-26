<?php
// Задание 3.1
function get_delivery_info($fileName)
{
    $delivery = new SimpleXMLElement($fileName);

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

// Задание 3.2
function create_json_file(array $array, string $filename)
{
    return file_put_contents($filename, json_encode($array));
}

function open_json_file(string $filename, array $replaceValue)
{
    $jsonfile = json_decode(file_get_contents($filename), true);
    if (rand(0, 1)) {
        echo 'Данные перезаписаны: <br>';
        foreach ($replaceValue as $oldname => $newname) {
            $jsonfile = recursive_array_replace($oldname, $newname, $jsonfile);
        }
        file_put_contents('output2.json', json_encode($jsonfile));
    } else {
        echo 'Данные НЕ перезаписаны: <br>';
        file_put_contents('output.json', json_encode($jsonfile));
    }
}

function recursive_array_replace($find, $replace, $array)
{
    if (!is_array($array)) {
        return str_replace($find, $replace, $array);
    }
    $newArray = [];
    foreach ($array as $key => $value) {
        $newArray[$key] = recursive_array_replace($find, $replace, $value);
    }
    return $newArray;
}

function get_diff_json(string $filename1, string $filename2)
{
    if (file_exists($filename1) and file_exists($filename2)) {
        $file1 = json_decode(file_get_contents($filename1), true);
        $file2 = json_decode(file_get_contents($filename2), true);

        $file1 = explode(',', get_all_games($file1));
        array_pop($file1);

        $file2 = explode(',', get_all_games($file2));
        array_pop($file2);

        $original_file = array_diff($file1, $file2);
        $new_file = array_values(array_diff($file2, $file1));
        echo '<br>В файлах ' . $filename1 . ' и ' . $filename2 . ' отличаются следующие элементы (старый - новый):<br><br>';
        $i = 0;
        foreach ($original_file as $original) {
            echo $original . ' - ' . $new_file[$i] . '<br>';
            $i++;
        }
    } else {
        echo 'Один из файлов не найден';
    }
}


function get_all_games(array $games)
{
    $my_game = '';
    foreach ($games as $game) {
        if (is_array($game)) {
            $my_game .= get_all_games($game);
        } else {
            $my_game .= $game . ',';
        }
    }
    return $my_game;
}

