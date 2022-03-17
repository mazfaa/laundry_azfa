/* Rupiah Currency Format */
/* let price = document.getElementById('price');
price.addEventListener('keyup', function (number) {
  return new Intl.NumberFormat("id-ID", {
    style: "currency",
    currency: "IDR"
  }).format(number);
}); */

$(() => {
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

  let employees = [];

  const create = record => {
    let recordList = {};
    for (const index of record) {
      recordList[index[0]] = index[0] === `id` || index[0] === 'jumlah_anak' ? parseInt(index[1]) : index[1];
    }
    recordList['gaji_awal'] = 2000000;
    recordList['tunjangan'] = calculateTunjangan(recordList);
    recordList['total_gaji'] = recordList['gaji_awal'] + recordList['tunjangan'];
    employees.push(recordList);
    console.log(recordList);
    localStorage.setItem('employees', JSON.stringify(employees));
    return recordList;
  }

  const calculateAge = birthday => {
      birthday = new Date(birthday);
      let ageDifMS = Date.now();
      let ageDate = new Date(ageDifMS);
      return Math.abs(ageDate.getUTCFullYear() - 1970);
  }

  const calculateTunjangan = record => {
    const kenaikanGajiPertahun = 150000;
    if (record.status === 'couple') {
      let tunjanganMenikah = 250000;
      let tunjanganPerAnak = 150000;
      let totalTunjangan = 0;

      totalTunjangan += kenaikanGajiPertahun * calculateAge(record.mulai_bekerja);
      totalTunjangan += tunjanganMenikah;
      totalTunjangan += (record.jumlah_anak > 2) ? tunjanganPerAnak * 2 : record.jumlah_anak;
      return totalTunjangan;
    } else {
        let totalTunjangan = 0;
        totalTunjangan += kenaikanGajiPertahun * calculateAge(record.mulai_bekerja);
        return totalTunjangan;
    }
  }

  const renderTable = arr => {
    let row = ``;
    if (arr.length === null) {
      return row = `
        <tr>
          <td colspan="3">No data available in table</td>
        </tr>
      `;
    }

    arr.forEach((item) => {
      row += `<tr>
                <td>${item['id']}</td>
                <td>${item['name']}</td>
                <td>${item['gender']}</td>
                <td>${item['status']}</td>
                <td>${item['jumlah_anak']}</td>
                <td>${item['mulai_bekerja']}</td>
                <td>${item['gaji_awal']}</td>
                <td>${item['Tunjangan']}</td>
                <td>${item['Total Gaji']}</td>
            </tr>
		`;
    });

    return row;
}

  document.getElementById('start-work').valueAsDate = new Date();

  $('#salary-form').on('submit', (e) => {
    e.preventDefault();
    const record = new FormData(document.getElementById('salary-form'));
    employees.push(create(record));
    $('#karyawan-table tbody').html(renderTable(employees));
    console.log(employees);
  });
});
