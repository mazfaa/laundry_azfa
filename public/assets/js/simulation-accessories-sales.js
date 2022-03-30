$(() => {
  let accessories = [];

  let harga = 0;
  
  if (localStorage.getItem('accessories')) {
    accessories.push(...JSON.parse(localStorage.getItem('accessories')));
  }

  $('#accessories-list').on('change', function () {
    if ($('#accessories-list').val() === 'Gantungan Kunci') {
      harga = 5000;
      $('#accessoriesPrice').val(harga);
    } else if ($('#accessories-list').val() === 'Ikat Rambut') {
      harga = 2500;
      $('#accessoriesPrice').val(harga);
    }

    console.log(harga.toLocaleString('id-ID'));
  });

  const discount = (price, jumlah) => {
    let discount = 0;
    
    if (price >= 30000 || jumlah >= 10) {
      discount = 0.20 * price; 
    }

    return discount;
  }

  const create = record => {
    let recordList = {};

    for (const index of record) {
      recordList[index[0]] = index[0] === `id` || index[0] === 'jumlah' || index[0] === 'price' ? Number(index[1]) : index[1];
    }

    recordList['discount'] = discount(harga * recordList['jumlah'], recordList['jumlah']);  
    recordList['total_harga'] = harga * recordList['jumlah'] - recordList['discount'];

    accessories.push(recordList);
    localStorage.setItem('accessories', JSON.stringify(accessories));
  }

  const renderTable = arr => {
    let row = ``;

    if (localStorage.getItem('accessories' === null)) {
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
                  <td class="align-middle">${item['accessories']}</td>
                  <td class="align-middle">${item['color']}</td>
                  <td class="align-middle">${item.customer}</td>
                  <td class="align-middle">${item['price'].toLocaleString('id-ID')}</td>
                  <td class="align-middle">${item['jumlah']}</td>
                  <td class="align-middle">${item['discount'].toLocaleString('id-ID')}</td>
                  <td class="align-middle">${item['total_harga'].toLocaleString('id-ID')}</td>
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
      <th colspan="5" class="text-center">Total</th>
      <td class="align-middle">${totalHarga.toLocaleString('id-ID')}</td>
      <td class="align-middle">${totalQty.toLocaleString('id-ID')}</td>
      <td class="align-middle">${totalDiskon.toLocaleString('id-ID')}</td>
      <td class="align-middle">${total.toLocaleString('id-ID')}</td>
    </tr>
    `;

    return row;
  }

  $('#accessories-sales-table tbody').html(renderTable(accessories));

  $('#accessories-form').on('submit', function (e) {
    e.preventDefault();
    const record = new FormData(this);
    create(record);
    $('#accessories-sales-table tbody').html(renderTable(accessories));
  });

  /* Searching */
  $('table#accessories-sales-table tbody tr').each(function () {
    $(this).attr('searchData', $(this).text().toLowerCase());
  });

  $('#search-input').on('keyup', function () {
    let dataList = $(this).val().toLowerCase();
    $('table#accessories-sales-table tbody tr').each(function(){
      if ($(this).filter('[searchData *= ' + dataList + ']').length > 0 || dataList.length < 1) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  });

  /* Sorting */

  function sorting (arr, key) {
    let i, j, id, value;

    for (i = 1; i < arr.length; i++) {
      value = arr[i];
      id = arr[i][key];
      j = i - 1;

      while (j >= 0 && arr[j][key] > id) {
        arr[j + 1] = arr[j];
        j = j - 1;
      }

      arr[j + 1] = value;
    }

    return arr;
  }
  
  $('#sorting').on('change', function (e) {
    e.preventDefault();
    accessories = sorting(accessories, 'id');
    $('#accessories-sales-table tbody').html(renderTable(accessories));
  });
});