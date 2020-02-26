<?php
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