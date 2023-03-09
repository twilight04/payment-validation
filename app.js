$(document).ready(() => {
    var defaultPrice = 5;
    // var promoQuantity, familyQuantity, subTotal = 0;
    var ticketType, selectedPromoDay, selectedFamilyDay;
    var promoQuantity = $('#selectPromoQuantity').val();
    var familyQuantity = $('#selectFamilyQuantity').val();
    var subTotal = promoQuantity * defaultPrice;

    $('#promo-tab').click(function () {
        defaultPrice = 5;
        subTotal = promoQuantity * defaultPrice;
        $('#selectFamilyQuantity option[value="1"]').prop("selected", true);
        $('#selectFamilyDay option[value="day 1"]').prop("selected", true);
        $('#familySubTotal').text('15');
    });

    $('#family-tab').click(function () {
        defaultPrice = 15;
        subTotal = familyQuantity * defaultPrice;
        $('#selectPromoQuantity option[value="1"]').prop("selected", true);
        $('#selectPromoDay option[value="day 1"]').prop("selected", true);
        $('#promoSubTotal').text('5');
    });

    $('#selectPromoQuantity').change(function () {
        promoQuantity = $(this).val();
        subTotal = promoQuantity * defaultPrice;

        $('#promoSubTotal').text(subTotal);
    });

    $('#selectFamilyQuantity').change(function () {
        familyQuantity = $(this).val();
        subTotal = familyQuantity * defaultPrice;

        $('#familySubTotal').text(subTotal);
    });

    // $('#promoBtn').click(function () {
    //     console.log(promoQuantity);
    // });

    $('.next-btn').click(function () { 
        if ($(this).attr('id') === 'promoBtn') {
            ticketType = 'promo';
            selectedPromoDay = $('#selectPromoDay').val();
        } else if ($(this).attr('id') === 'familyBtn') {
            ticketType = 'family';
            selectedFamilyDay = $('#selectFamilyDay').val();
        } else {
            console.log('Something went wrong');
        }

        $.ajax({
            type: "POST",
            url: "validation.php",
            dataType: "json",
            data: {
                ticketType: ticketType,
                quantity: ticketType == 'promo' ? promoQuantity : familyQuantity,
                selectedDay: ticketType == 'promo' ? selectedPromoDay : selectedFamilyDay,
                subTotal: subTotal,
            },
            success: function (response) {
                $('#ticketType').val(response.ticket_type);
                $('#quantity').val(response.quantity);
                $('#selectedDay').val(response.selected_day);
                $('#subTotal').val(response.sub_total);
            }
        });
    });
});