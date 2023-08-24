@if (session('success'))
  <script>
    iziToast.success({
      title: 'Berhasil',
      message: `{{ session('success') }}`,
      position: 'topRight',
    });
  </script>
@elseif(session('errors'))
  <script>
    iziToast.error({
      title: 'Gagal',
      message: `Terjadi Kesalahan`,
      position: 'topRight',
    });
  </script>
@elseif(session('error'))
  <script>
    iziToast.error({
      title: 'Gagal',
      message: `{{ session('error') }}`,
      position: 'topRight',
    });
  </script>
@endif