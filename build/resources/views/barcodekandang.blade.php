<!DOCTYPE html>
<html>
<head>
   <title>Cetak Barcode Kandang</title>

   <style>
    .card{ width: 180.732pt; height: 60.402pt; }
    .kotak{ width: 200.732pt; height: 120.402pt; }
  </style>
</head>
<body>
   <table width="100%">
     <tr>

      @foreach($datakandang as $data)
      <td align="center" style="border: 1px solid #ccc" class="kotak">
      <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG( $data->kode_kandang, 'C39') }}" class="card" >
      <br>{{ $data->kode_kandang}}
      </td>
      @if( $no++ % 2 == 0)
         </tr><tr>
      @endif
     @endforeach

     </tr>
   </table>
</body>
</html>
