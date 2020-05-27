<!DOCTYPE html>
<html>
<head>
   <title>Cetak Kartu Member</title>

   <style>
     .box{position: relative;}
     .card{ width: 501.732pt; height: 147.402pt; }
     .kode{
        position: absolute;
        top: 110pt;
        left: 10pt;
        color: #fff;
        font-size: 15pt;
      }
      .barcode{
        position: absolute;
        top: 15pt;
        left: 280pt;
        font-size: 10pt;
      }
   </style>
</head>
<body>
   <table width="100%">

    @foreach($datamember as $data)
    <tr>
      <td align="center">
      <div class="box">
        <img src="{{ asset('assets/card.png') }}" class="card">
        <div class="kode">{{ $data->nama }}</div>
        <div class="barcode">
          <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG( $data->user_id, 'C39') }}" height="30" width="130">
          <br>{{ $data->user_id }}
        </div>
      </div>
      </td>
    </tr>
    @endforeach

   </table>
</body>
</html>
