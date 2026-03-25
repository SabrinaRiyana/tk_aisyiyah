<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Bukti Pendaftaran PPDB</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: Arial, sans-serif; font-size: 14px; color: #222; }
    .container { max-width: 750px; margin: 30px auto; padding: 30px; border: 2px solid #1fb149; border-radius: 10px; }
    .header { text-align: center; margin-bottom: 24px; border-bottom: 2px solid #1fb149; padding-bottom: 16px; }
    .header h2 { color: #1fb149; font-size: 1.4rem; }
    .header p { color: #555; font-size: .9rem; }
    .section-title { background: #1fb149; color: #fff; padding: 6px 14px; border-radius: 6px; font-weight: bold; margin: 18px 0 10px; font-size: .9rem; }
    table { width: 100%; border-collapse: collapse; }
    td { padding: 8px 10px; border-bottom: 1px solid #eee; vertical-align: top; }
    td:first-child { width: 40%; color: #555; font-weight: 600; }
    .doc-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-top: 10px; }
    .doc-item { text-align: center; }
    .doc-item p { font-size: .78rem; color: #555; font-weight: 600; margin-bottom: 6px; }
    .doc-item img { width: 100%; border-radius: 8px; border: 1px solid #ddd; object-fit: cover; max-height: 160px; }
    .no-doc { color: #aaa; font-size: .75rem; }
    .footer { margin-top: 30px; text-align: right; }
    .footer p { font-size: .82rem; color: #777; }
    @media print { .no-print { display: none; } }
  </style>
</head>
<body>
  <div class="container">
    @php
      $p = is_array($data->payload) ? $data->payload : json_decode($data->payload, true);
    @endphp

    <div class="header">
      <h2>TK Aisyiyah Mimika</h2>
      <p>Bukti Pendaftaran PPDB 2027/2028</p>
      <p style="margin-top:6px;font-size:.82rem;color:#aaa;">No. Pendaftaran: #{{ str_pad($data->id, 4, '0', STR_PAD_LEFT) }}</p>
    </div>

    <div class="section-title">Data Anak</div>
    <table>
      <tr><td>Nama Lengkap</td><td>{{ $p['nama_lengkap'] ?? '-' }}</td></tr>
      <tr><td>Tempat Lahir</td><td>{{ $p['tempat_lahir'] ?? '-' }}</td></tr>
      <tr><td>Tanggal Lahir</td><td>{{ isset($p['tanggal_lahir']) ? \Carbon\Carbon::parse($p['tanggal_lahir'])->format('d F Y') : '-' }}</td></tr>
      <tr><td>Jenis Kelamin</td><td>{{ $p['jenis_kelamin'] ?? '-' }}</td></tr>
    </table>

    <div class="section-title">Data Wali / Orang Tua</div>
    <table>
      <tr><td>Nama Wali</td><td>{{ $p['nama_wali'] ?? '-' }}</td></tr>
      <tr><td>No. Telp Wali</td><td>{{ $p['no_telp_wali'] ?? '-' }}</td></tr>
    </table>

    <div class="section-title">Dokumen Pendukung</div>
    <div class="doc-grid">
      <div class="doc-item">
        <p>Kartu Keluarga (KK)</p>
        @if(!empty($p['kk']))
          <img src="{{ asset('storage/' . $p['kk']) }}" alt="KK">
        @else
          <span class="no-doc">Tidak ada</span>
        @endif
      </div>
      <div class="doc-item">
        <p>Akta Kelahiran</p>
        @if(!empty($p['akta']))
          <img src="{{ asset('storage/' . $p['akta']) }}" alt="Akta">
        @else
          <span class="no-doc">Tidak ada</span>
        @endif
      </div>
      <div class="doc-item">
        <p>KTP Wali</p>
        @if(!empty($p['ktp_wali']))
          <img src="{{ asset('storage/' . $p['ktp_wali']) }}" alt="KTP Wali">
        @else
          <span class="no-doc">Tidak ada</span>
        @endif
      </div>
    </div>

    <div class="section-title">Status Pendaftaran</div>
    <table>
      <tr><td>Status</td><td><strong style="color:#1fb149;">{{ strtoupper($data->status) }}</strong></td></tr>
      <tr><td>Tanggal Daftar</td><td>{{ \Carbon\Carbon::parse($data->created_at)->format('d F Y, H:i') }} WIB</td></tr>
    </table>

    <div class="footer">
      <p>Dicetak pada: {{ now()->format('d F Y, H:i') }} WIB</p>
      <br>
      <button class="no-print" onclick="window.print()"
        style="padding:10px 24px;background:#1fb149;color:#fff;border:none;border-radius:8px;cursor:pointer;font-size:1rem;">
        🖨️ Cetak
      </button>
    </div>
  </div>
</body>
</html>