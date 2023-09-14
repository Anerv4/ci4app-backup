const flashData = $('.flash-data').data('flashdata');
// bacanya: jquery carikan saya elemen yang nama kelasnya flash-data,lalu ambil data nya yang namanya flashdata

if (flashData == true) {
    Swal.fire({
        title: 'Success',
        text: flashData,
        icon: 'success'
    })
}