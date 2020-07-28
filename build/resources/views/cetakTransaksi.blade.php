<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-modern.min.css') }}">
  <style>
    @media print {
        #printPageButton {
            display: none;
        }
    }
    body {
        height: 842px;
        width: 595px;
        /* to centre page on screen*/
        margin-left: auto;
        margin-right: auto;
    }
    u {
        padding-left:7em;
    }
    h5 {
        padding-left:2em;
    }
    h4 {
        padding-left:5em;
    }
    li {
        padding-left:10em;
    }
    p {
        padding-left:13em;
    }
</style>


<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a id="printPageButton" href="{{ route('transaksilainnya') }}">Back</a>
&nbsp;<button id="printPageButton" onClick="window.print();">Print</button><br>
</head>
<body>
    <tr>
        <td>
            <table>
                 <tr>
                     <td>
                        &nbsp;&nbsp;&nbsp;<span class="logo-sm">
                            <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="75">
                        </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     </td>
                     <td align="left" style=" text-align: left">
                         <font size="4">
                             DELTA PETSHOP & ANIMAL MEDICAL CARE <br>
                         </font>
                         <font size="1">
                             ANIMAL CLINIC - INTENSIF CARE - BOARDING - ACCESSORIES - PET FOOD - DEPOT MEDICINES <br>
                             JL. Ujung Gurun No. 41 Padang 25114-Sumatera Barat, Indonesia
                        </font>
                     </td>
                 </tr>
            </table>
        </td>
     </tr>
     ____________________________________________________________
    <br>
    <h3>No. {{ $transaksi->kode_transaksi }}</h3>

    <h3>
        <b><u>NOTA PEMBAYARAN</u></b>
    </h3>
    <br>
    @foreach ($pemilik as $p)
    <h5>Terima dari : Bpk/Ibu/Sdr/i <strong> {{ $p->nama }}</strong></h5>
    <h5>Untuk pembayaran : Pengobatan hewan <strong> {{ $p->nama_hewan }}</strong><br><br></h5>
    @endforeach

    <h5>Biaya layanan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  : </h5>
    @foreach ($layanan as $l)
    <h5><li>{{ $l->nama }} - Rp.{{ $l->harga }},</li></h5>
    @endforeach

    <h5>Biaya obat &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</h5>
    @foreach ($obat as $o)
    <h5><li>{{ $o->nama }} - Rp.{{ $o->harga }},</li></h5>
    @endforeach

    <h5>Lain lain&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  : </h5>
    @foreach ($lainlain as $ll)
    <h5><li>{{ $ll->nama }} - Rp.{{ $ll->harga }},</li></h5>
    @endforeach

    <p>___________________________</p>

    <h4>Jumlah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Rp.{{ $transaksi->total_harga }},</h4>

    <br><br>
    <tr>
        <td>
            <font size="3">
                <table align="left" style="text-align: center;">
                    <tr>
                        <td width="350px"></td>
                        <td>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Padang, {{ $tgltransaksi }} <br><br>


                            <br><br>
                            <b>{{ $transaksi->users->nama }}</b>
                        </td>
                    </tr>
                </table>
            </font>
        </td>
    </tr>


</body>
</html>

{{-- <script>
    window.onload = function() { window.print(); }
</script> --}}
