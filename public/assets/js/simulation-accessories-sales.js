$(() => {
  let accessories = [];
  console.log(accessories)

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
    console.log(record)
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

  function onCheckedSort (arr, idField) {
    for (let i = 1; i < arr.length; i++) {
      let fo = i - 1, so = arr[i], id = arr[i][idField];

      while (fo >= 0 && arr[fo][idField] < id) {
        arr[fo + 1] = arr[fo];
        fo -= 1;
      }

      arr[fo + 1] = so;
    }

    return arr;
  }

  function onUncheckedSort (arr, idField) {
    for (let i = 1; i < arr.length; i++) {
      let fo = i - 1, so = arr[i], id = arr[i][idField];

      while (fo >= 0 && arr[fo][idField] > id) {
        arr[fo + 1] = arr[fo];
        fo -= 1;
      }

      arr[fo + 1] = so;
    }

    return arr;
  }

  $('#sorting').on('change', function (e) {
    e.preventDefault();
    accessories = onCheckedSort(accessories, 'id');
    $('#accessories-sales-table tbody').html(renderTable(accessories));

    if(!$(this).is(":checked")) {
        accessories = onUncheckedSort(accessories, 'id');
        $('#accessories-sales-table tbody').html(renderTable(accessories));
    }
  });
});
