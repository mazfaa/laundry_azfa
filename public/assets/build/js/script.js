$(() => {
  const employees = [];

  localStorage.getItem('employees') && employees.push(...JSON.parse(localStorage.getItem('employees')));

  $('#employeeStatus').on('change', function () {
    if ($('#employeeStatus').val() === 'Couple') {
      $('#children').removeAttr('readonly');
      $('#children').val(0);
    } else if ($('#employeeStatus').val() === 'Single') {
      $('#children').attr('readonly', '');
      $('#children').val(0);
    }
  });

  const create = record => {
    const recordList = {};
    for (const index of record) {
      recordList[index[0]] = index[0] === `id` || index[0] === 'jumlah_anak' ? parseInt(index[1]) : index[1];
    }
    recordList['gaji_awal'] = 2000000;
    recordList['tunjangan'] = calculateTunjangan(recordList);
    recordList['total_gaji'] = recordList['gaji_awal'] + recordList['tunjangan'];
    employees.push(recordList);
    console.log(recordList);
    localStorage.setItem('employees', JSON.stringify(employees));
  }

  const calculateAge = birthday => {
    birthday = new Date(birthday);
    let ageDifMS = Date.now() - birthday.getTime();
    let ageDate = new Date(ageDifMS);
    return Math.abs(ageDate.getUTCFullYear() - 1970);
  }

  const calculateTunjangan = record => {
    let totalTunjangan = 0;
    const kenaikanGajiPerTahun = 150000;
    if (record.status === 'Couple') {
      let tunjanganMenikah = 250000;
      let tunjanganPerAnak = 150000;

      totalTunjangan += kenaikanGajiPerTahun * calculateAge(record.mulai_bekerja);
      totalTunjangan += tunjanganMenikah;
      totalTunjangan += (record.jumlah_anak >= 2) ? tunjanganPerAnak * 2 : tunjanganPerAnak * record.jumlah_anak;
      return totalTunjangan;
    } else {
      totalTunjangan = 0;
      return totalTunjangan;
    }
  }

  const renderTable = arr => {
    let totalGajiAwal = 0;
    let totalGajiAkhir = 0;
    let totalTunjangan = 0;
    let row = ``;

    if (localStorage.getItem('employees' === null)) {
      row += `
        <tr>
          <td colspan="7" class="text-center">No data available in table</td>
        </tr>
      `;
    }
    
    arr.forEach((item) => {
      totalGajiAwal += item.gaji_awal;
      totalTunjangan += item.tunjangan;
      totalGajiAkhir += item.total_gaji;
      row += `<tr>
                  <td class="align-middle">${item['id']}</td>
                  <td class="align-middle">${item['name']}</td>
                  <td class="align-middle">${item['gender']} </td>
                  <td class="align-middle">${item['status']}</td>
                  <td class="align-middle">${item['jumlah_anak']}</td>
                  <td class="align-middle">${item['mulai_bekerja']}</td>
                  <td class="align-middle">${item['gaji_awal'].toLocaleString('id-ID')}</td>
                  <td class="align-middle">${item['tunjangan'].toLocaleString('id-ID')}</td>
                  <td class="align-middle">${item['total_gaji'].toLocaleString('id-ID')}</td>
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
        <th colspan="6" class="text-center">Total</th>
        <td class="align-middle">${totalGajiAwal.toLocaleString('id-ID')}</td>
        <td class="align-middle">${totalTunjangan.toLocaleString('id-ID')}</td>
        <td class="align-middle">${totalGajiAkhir.toLocaleString('id-ID')}</td>
      </tr>
    `;

    return row;
  }

  document.getElementById('start-work').valueAsDate = new Date();

  // $('#karyawan-table tbody').html(renderTable(employees));

  $('#salary-form').on('submit', (e) => {
    e.preventDefault();
    const record = new FormData($('#salary-form')[0]);
    create(record);
    $('#karyawan-table tbody').html(renderTable(employees));
    console.log(employees);
  });
  
  
});

let rupiah = document.getElementById('rupiah');
rupiah.addEventListener('keyup', function(e){
  rupiah.value = formatRupiah(this.value, 'Rp. ');
});

function formatRupiah(angka, prefix){
  let number_string = angka.replace(/[^,\d]/g, '').toString(),
  split   		= number_string.split(','),
  sisa     		= split[0].length % 3,
  rupiah     		= split[0].substr(0, sisa),
  ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if(ribuan){
    separator = sisa ? '.' : '';
    rupiah += separator + ribuan.join('.');
  }

  rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
  return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}

  