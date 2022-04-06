$(document).ready(function () {
    $('#transaction-member-table').DataTable();
    $('#transaction-package-table').DataTable();

    $('#dataLaundry').collapse('show');

    $('#dataLaundry').on('show.bs.collapse', function () {
        $('#formLaundry').collapse('hide');
        $('#nav-form').removeClass('active');
        $('#nav-data').addClass('active');
    });

    $('#formLaundry').on('show.bs.collapse', function () {
        $('#dataLaundry').collapse('hide');
        $('#nav-data').removeClass('active');
        $('#nav-form').addClass('active');
    });

    $('#transaction-member-table').on('click', '.choose-member-btn', function () {
        const tr = $(this).closest('tr');
        const name = tr.find('td:eq(1)').text() + ' / ' + tr.find('td:eq(2)').text();
        const address = tr.find('td:eq(4)').text() + ' / ' + tr.find('td:eq(3)').text();
        const memberId = tr.find('.member-id').val();

        $('#member_name').text(name);
        $('#member_address').text(address);
        $('#memberId').val(memberId);

        $('#transactionMemberModal').modal('hide');
    });

    let total = subTotal = 0;

    $('#transaction-package-table').on('click', '.choose-package-btn', function () {
        const package = $(this).closest('tr').find('td:eq(1)').text();
        const price = Number($(this).closest('tr').find('td:eq(2)').text());
        const packageId = $(this).closest('tr').find('.package-id').val();

        let td = $('#transaction-table tbody tr td').text();
        console.log(td);
        let record = `
            <tr>
                <td class="align-middle">${packageId}</td>
                <td class="align-middle">${package}</td>
                <td class="align-middle">${price}</td>
                <input type="hidden" name="package_id" value="${packageId}">
                <td class="align-middle">
                    <input type="number" class="qty" name="qty" value="1" min="1" style="width: 40px;">
                </td>
                <td class="align-middle">
                    <label name="sub_total" class="sub-total">${price}</label>
                </td>
                <td class="align-middle">
                    <button type="button" class=" btn btn-sm btn-danger remove-package-btn">
                        <i class="bi bi-trash"></i>
                    </button>
                </td>
            </tr>
        `;

        if (td == `No data available in table`) $('#transaction-table tbody tr').remove();

        $('#transaction-table tbody').append(record);

        subTotal += Number(price);
        total = subTotal - Number($('#discount').val()) + Number($('#tax').val());

        $('#subTotal').text(subTotal);
        $('#total').text(total);

        $('#packageModal').modal('hide');
    });

    $('#transaction-table').on('change', '.qty', function () {
        console.log(this)
        let qty = Number($(this).closest('tr').find('.qty').val());
        let price = Number($(this).closest('tr').find('td:eq(2)').text());
        let initSubTotal = Number($(this).closest('tr').find('.sub-total').text());
        let count = Number(qty) * Number(price);
        subTotal = subTotal - initSubTotal + count;
        total = subTotal - Number($('#discount').val()) + Number($('#tax').val());
        $(this).closest('tr').find('.sub-total').text(count);
        $('#subTotal').text(subTotal);
        $('#total').text(total);
    });

    $('#transaction-table').on('click', '.remove-package-btn', function () {
        let initSubTotal =  Number($(this).closest('tr').find('.subTotal').text());
        subTotal -= initSubTotal;
        total -= initSubTotal;

        currentRecord = $(this).closest('tr').remove();
        $('#subTotal').text(subTotal);
        $('#total').text(total);
    });
});
