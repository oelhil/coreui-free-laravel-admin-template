@extends('dashboard.base')

@section('content')
<input id='linkID' type="button" onclick="printExternal('kgb_surat_tmp')" value="lid a div!" />
<input id='linkID' type="button" onclick="printDiv('a4area')" value="print a div!" />
<input type="button" onclick="wOpen('/kgb_surat','Surat KGB')" value="print a div!" />
<div id="a4area">
      <div class="pHeader">Print me</div>   
Terjemahan: Bisakah anda membantu menerjemahkan situs ini dalam bahasa asing? Email kami jika anda bisa membantu.
Kini tersedia satu set banner contoh disini dalam tiga warna dan ukuran banner standar.
BannersBannersBanners
Donasi: Jika anda sering menggunakan situs ini dan ingin membantu menjaganya agar tetap berada di internet, mohon pertimbangkan untuk menyumbang sejumlah kecil dana guna membantu membayar tagihan hosting dan bandwith. Tidak ada donasi minimal, jumlah berapapun akan sangat dihargai - klik disini untuk memberikan donasi dengan menggunakan PayPal. Terimakasih atas dukungan anda
</div>

@endsection

@section('javascript')
<script>
  
  function printExternal(url) {
    var printWindow = window.open( url, 'Print', 'left=0, top=0, width=950, height=500, toolbar=0, resizable=0');
    printWindow.addEventListener('load', function(){
        printWindow.print();
        //printWindow.close();
    }, true);
}
     
</script>
    <script src="{{ asset('js/mainapp.js') }}"></script>
@endsection