<?php
if ($_POST) {
    $ticketType = $_POST['ticketType'];
    $quantity = $_POST['quantity'];
    $selectedDay = $_POST['selectedDay'];
    $subTotal = $_POST['subTotal'];
    $valid = null;

    if ($ticketType == 'promo') {
        $promoPrice = 5;

        if (!is_numeric($quantity) || $quantity <= 0) {
            http_response_code(400);
            echo 'Invalid price value';
            $valid = false;
            exit();
        } else if (($quantity * $promoPrice) != $subTotal) {
            http_response_code(400);
            echo 'Something went wrong';
            $valid = false;
            exit();
        } else {
            $valid = true;
        }

        if ($valid) {
            $data = json_encode([
                'ticket_type' => 'promo',
                'quantity' => $quantity,
                'selected_day' => $selectedDay,
                'sub_total' => $subTotal,
                'valid' => true,
            ]);

            echo $data;
        }
    } else if ($ticketType == 'family') {
        $familyPrice = 15;

        if (!is_numeric($quantity) || $quantity <= 0) {
            http_response_code(400);
            echo 'Invalid price value';
            $valid = false;
            exit();
        } else if (($quantity * $familyPrice) != $subTotal) {
            http_response_code(400);
            echo 'Something went wrong';
            $valid = false;
            exit();
        } else {
            $valid = true;
        }

        if ($valid) {
            $data = json_encode([
                'ticket_type' => 'family',
                'quantity' => $quantity,
                'selected_day' => $selectedDay,
                'sub_total' => $subTotal,
                'valid' => true,
            ]);

            echo $data;
        }
    }
}
