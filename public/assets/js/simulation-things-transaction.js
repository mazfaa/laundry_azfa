$(() => {
  let records = [];

  let harga = 0;
  
  if (localStorage.getItem('records')) {
    records.push(...JSON.parse(localStorage.getItem('records')));
  }

  $('#things-list').on('change', function () {
    if ($('#things-list').val() === 'Pewangi') {
      harga = 10000;
      $('#thingsPrice').val(harga);
    } else if ($('#things-list').val() === 'Detergent') {
      harga = 15000;
      $('#thingsPrice').val(harga);
    } else if ($('#things-list').val() === 'Detergent_Sepatu') {
      harga = 25000;
      $('#thingsPrice').val(harga);
    }

    console.log(harga.toLocaleString('id-ID'));
  });

  const discount = price => {
    let discount = 0;
    
    if (price >= 50000) {
      discount = 0.15 * price; 
    }

    return discount;
  }

  const create = record => {
    let recordList = {};

    for (const index of record) {
      recordList[index[0]] = index[0] === `id` || index[0] === 'jumlah' || index[0] === 'price' ? Number(index[1]) : index[1];
    }

    recordList['discount'] = discount(harga * recordList['jumlah']);  
    recordList['total_harga'] = harga * recordList['jumlah'] - recordList['discount'];

    records.push(recordList);
    console.log(recordList);
    localStorage.setItem('records', JSON.stringify(records));
  }

  const renderTable = arr => {
    let row = ``;

    if (localStorage.getItem('records' === null)) {
      row += `
        <tr>
          <td colspan="7" class="text-center">No data available in table</td>
        </tr>
      `;
    }

    let totalHarga = 0;
    let totalQty = 0;
    let totalDiskon = 0;
    let total = 0;
    
    arr.forEach(item => {
      totalHarga += item.price;
      totalQty += item.jumlah;
      totalDiskon += item.discount;
      total += item.total_harga;
      row += `<tr>
                  <td class="align-middle">${item['id']}</td>
                  <td class="align-middle">${item['tgl_beli']} </td>
                  <td class="align-middle">${item['things']}</td>
                  <td class="align-middle">${item['price'].toLocaleString('id-ID')}</td>
                  <td class="align-middle">${item['jumlah']}</td>
                  <td class="align-middle">${item['discount'].toLocaleString('id-ID')}</td>
                  <td class="align-middle">${item['total_harga'].toLocaleString('id-ID')}</td>
                  <td class="align-middle">${item['pay_type']}</td>
                  <td class="align-middle">
                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#editEmployeeModal{{ $employee->id }}">
                      <i class="bi bi-pencil-square"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteEmployeeModal{{ $employee->id }}">
                      <i class="bi bi-trash"></i>
                    </button>
                  </td>
              </tr>
      `;
    });

    row += `
    <tr>
      <th colspan="3" class="text-center">Total</th>
      <td class="align-middle">${totalHarga.toLocaleString('id-ID')}</td>
      <td class="align-middle">${totalQty.toLocaleString('id-ID')}</td>
      <td class="align-middle">${totalDiskon.toLocaleString('id-ID')}</td>
      <td colspan="2 class="align-middle">${total.toLocaleString('id-ID')}</td>
    </tr>
    `;

    return row;
  }

  $('#simulation-things-table tbody').html(renderTable(records));

  $('#things-form').on('submit', function (e) {
    e.preventDefault();
    const record = new FormData(this);
    create(record);
    $('#simulation-things-table tbody').html(renderTable(records));
  });

  /* Searching */
  $('table#simulation-things-table tbody tr').each(function () {
    $(this).attr('searchData', $(this).text().toLowerCase());
  });

  $('#search-input').on('keyup', function () {
    let dataList = $(this).val().toLowerCase();
    $('table#simulation-things-table tbody tr').each(function(){
      if ($(this).filter('[searchData *= ' + dataList + ']').length > 0 || dataList.length < 1) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  });
});