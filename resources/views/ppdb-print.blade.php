<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Bukti Pendaftaran PPDB – TK Aisyiyah Mimika</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
  <style>
    *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
    :root {
      --green:       #1a8f3f;
      --green-light: #e8f5ee;
      --green-mid:   #2db85b;
      --gold:        #c9a84c;
      --dark:        #1a1a1a;
      --muted:       #6b7280;
      --border:      #d1e8d9;
    }
    body {
      font-family: 'DM Sans', sans-serif;
      background: #f0f4f1;
      color: var(--dark);
      font-size: 13px;
      min-height: 100vh;
      padding: 32px 16px;
    }
    .page {
      max-width: 780px;
      margin: 0 auto;
      background: #fff;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 24px 64px rgba(26,143,63,.15), 0 4px 16px rgba(0,0,0,.06);
      position: relative;
    }
    .watermark {
      position: absolute;
      top: 50%; left: 50%;
      transform: translate(-50%, -50%);
      width: 55%;
      opacity: 0.04;
      pointer-events: none;
      z-index: 0;
    }
    .banner {
      background: linear-gradient(135deg, #0d5c28 0%, #1a8f3f 50%, #27c25a 100%);
      padding: 32px 36px 28px;
      position: relative;
      overflow: hidden;
      z-index: 1;
    }
    .banner::before {
      content: '';
      position: absolute;
      top: -60px; right: -60px;
      width: 220px; height: 220px;
      border-radius: 50%;
      background: rgba(255,255,255,.06);
    }
    .banner::after {
      content: '';
      position: absolute;
      bottom: -80px; left: -40px;
      width: 200px; height: 200px;
      border-radius: 50%;
      background: rgba(255,255,255,.04);
    }
    .banner-inner {
      display: flex;
      align-items: center;
      gap: 24px;
      position: relative;
      z-index: 2;
    }
    .logo-ring {
      width: 80px; height: 80px;
      border-radius: 50%;
      background: #fff;
      display: flex; align-items: center; justify-content: center;
      flex-shrink: 0;
      box-shadow: 0 4px 20px rgba(0,0,0,.25);
      border: 3px solid rgba(255,255,255,.4);
    }
    .logo-ring img { width: 64px; height: 64px; object-fit: contain; }
    .banner-text h1 {
      font-family: 'Playfair Display', serif;
      font-size: 1.5rem;
      font-weight: 900;
      color: #fff;
      line-height: 1.2;
      letter-spacing: -.3px;
    }
    .banner-text p {
      color: rgba(255,255,255,.75);
      font-size: .82rem;
      margin-top: 4px;
      font-weight: 400;
    }
    .badge-nomor {
      margin-left: auto;
      background: rgba(255,255,255,.15);
      border: 1px solid rgba(255,255,255,.3);
      border-radius: 100px;
      padding: 6px 16px;
      text-align: center;
      flex-shrink: 0;
      backdrop-filter: blur(8px);
    }
    .badge-nomor .label { color: rgba(255,255,255,.7); font-size: .68rem; font-weight: 500; letter-spacing: 1px; text-transform: uppercase; }
    .badge-nomor .nomor { color: #fff; font-family: 'Playfair Display', serif; font-size: 1.1rem; font-weight: 700; }
    .body { padding: 28px 36px 32px; position: relative; z-index: 1; }
    .section-label {
      display: flex;
      align-items: center;
      gap: 10px;
      margin: 22px 0 12px;
    }
    .section-label .dot {
      width: 8px; height: 8px;
      border-radius: 50%;
      background: var(--green);
    }
    .section-label span {
      font-size: .7rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1.5px;
      color: var(--green);
    }
    .section-label::after {
      content: '';
      flex: 1;
      height: 1px;
      background: var(--border);
    }
    .data-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 10px;
    }
    .data-item {
      background: var(--green-light);
      border-radius: 10px;
      padding: 12px 14px;
      border-left: 3px solid var(--green);
    }
    .data-item .key {
      font-size: .68rem;
      text-transform: uppercase;
      letter-spacing: 1px;
      color: var(--muted);
      font-weight: 500;
      margin-bottom: 4px;
    }
    .data-item .val {
      font-size: .9rem;
      font-weight: 600;
      color: var(--dark);
    }
    .doc-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 14px;
      margin-top: 4px;
    }
    .doc-card {
      border-radius: 12px;
      overflow: hidden;
      border: 1.5px solid var(--border);
      background: #fafafa;
    }
    .doc-card-label {
      background: var(--green);
      color: #fff;
      font-size: .65rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
      padding: 6px 10px;
      text-align: center;
    }
    .doc-card img {
      width: 100%;
      height: 130px;
      object-fit: cover;
      display: block;
    }
    .doc-no-img {
      height: 130px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #ccc;
      font-size: .78rem;
    }
    .status-bar {
      background: var(--green-light);
      border-radius: 12px;
      padding: 14px 18px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border: 1px solid var(--border);
      margin-top: 4px;
    }
    .status-left .key { font-size: .68rem; text-transform: uppercase; letter-spacing: 1px; color: var(--muted); }
    .status-badge {
      background: var(--green);
      color: #fff;
      font-size: .75rem;
      font-weight: 700;
      padding: 5px 16px;
      border-radius: 100px;
      letter-spacing: .5px;
    }
    .status-badge.pending { background: #f59e0b; }
    .status-badge.approved { background: var(--green); }
    .status-badge.rejected { background: #ef4444; }
    .print-footer {
      border-top: 1px dashed var(--border);
      margin-top: 24px;
      padding-top: 16px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .print-footer p { font-size: .72rem; color: var(--muted); }
    .btn-cetak {
      padding: 10px 28px;
      background: linear-gradient(135deg, var(--green), var(--green-mid));
      color: #fff;
      border: none;
      border-radius: 100px;
      font-size: .88rem;
      font-weight: 600;
      cursor: pointer;
      box-shadow: 0 4px 14px rgba(26,143,63,.35);
      transition: transform .2s, box-shadow .2s;
      font-family: 'DM Sans', sans-serif;
    }
    .btn-cetak:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(26,143,63,.45); }
    @media print {
      body { background: #fff; padding: 0; }
      .page { box-shadow: none; border-radius: 0; }
      .no-print { display: none !important; }
    }
  </style>
</head>
<body>

  @php
    $p = is_array($data->payload) ? $data->payload : json_decode($data->payload, true);
    $statusClass = match(strtolower($data->status)) {
      'approved', 'diterima' => 'approved',
      'rejected', 'ditolak'  => 'rejected',
      default                => 'pending',
    };
  @endphp

  <div class="page">

    {{-- WATERMARK Logo TK --}}
    <img class="watermark" src="data:image/png;base64,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" alt="">

    {{-- BANNER --}}
    <div class="banner">
      <div class="banner-inner">
        <div class="logo-ring">
          <img src="data:image/png;base64,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" alt="Logo TK Aisyiyah">
        </div>
        <div class="banner-text">
          <h1>TK Aisyiyah Mimika</h1>
          <p>Bukti Pendaftaran Peserta Didik Baru &bull; Tahun Ajaran 2027/2028</p>
        </div>
        <div class="badge-nomor no-print">
          <div class="label">No. Daftar</div>
          <div class="nomor">#{{ str_pad($data->id, 4, '0', STR_PAD_LEFT) }}</div>
        </div>
      </div>
    </div>

    {{-- BODY --}}
    <div class="body">

      <div class="section-label"><div class="dot"></div><span>Data Anak</span></div>
      <div class="data-grid">
        <div class="data-item">
          <div class="key">Nama Lengkap</div>
          <div class="val">{{ $p['Nama Lengkap'] ?? '-' }}</div>
        </div>
        <div class="data-item">
          <div class="key">Jenis Kelamin</div>
          <div class="val">{{ $p['Jenis Kelamin'] ?? '-' }}</div>
        </div>
        <div class="data-item">
          <div class="key">Tempat Lahir</div>
          <div class="val">{{ $p['Tempat Lahir'] ?? '-' }}</div>
        </div>
        <div class="data-item">
          <div class="key">Tanggal Lahir</div>
          <div class="val">{{ isset($p['Tanggal Lahir']) ? \Carbon\Carbon::parse($p['Tanggal Lahir'])->format('d F Y') : '-' }}</div>
        </div>
      </div>

      <div class="section-label"><div class="dot"></div><span>Data Wali / Orang Tua</span></div>
      <div class="data-grid">
        <div class="data-item">
          <div class="key">Nama Wali</div>
          <div class="val">{{ $p['Nama Wali'] ?? '-' }}</div>
        </div>
        <div class="data-item">
          <div class="key">No. Telepon</div>
          <div class="val">{{ $p['No Telp Wali'] ?? '-' }}</div>
        </div>
      </div>

      <div class="section-label"><div class="dot"></div><span>Dokumen Pendukung</span></div>
      <div class="doc-grid">
        <div class="doc-card">
          <div class="doc-card-label">Kartu Keluarga</div>
          @if(!empty($p['Kartu Keluarga']))
            <img src="{{ asset('storage/' . $p['Kartu Keluarga']) }}" alt="KK">
          @else
            <div class="doc-no-img">Tidak ada</div>
          @endif
        </div>
        <div class="doc-card">
          <div class="doc-card-label">Akta Kelahiran</div>
          @if(!empty($p['Akta Kelahiran']))
            <img src="{{ asset('storage/' . $p['Akta Kelahiran']) }}" alt="Akta">
          @else
            <div class="doc-no-img">Tidak ada</div>
          @endif
        </div>
        <div class="doc-card">
          <div class="doc-card-label">FC KTP Wali</div>
          @if(!empty($p['FC KTP Wali']))
            <img src="{{ asset('storage/' . $p['FC KTP Wali']) }}" alt="KTP">
          @else
            <div class="doc-no-img">Tidak ada</div>
          @endif
        </div>
      </div>

      <div class="section-label"><div class="dot"></div><span>Status Pendaftaran</span></div>
      <div class="status-bar">
        <div class="status-left">
          <div class="key">Terdaftar pada</div>
          <div style="font-weight:600;margin-top:2px;">{{ \Carbon\Carbon::parse($data->created_at)->format('d F Y, H:i') }} WIB</div>
        </div>
        <div class="status-badge {{ $statusClass }}">{{ strtoupper($data->status) }}</div>
      </div>

      <div class="print-footer">
        <p>Dicetak: {{ now()->format('d F Y, H:i') }} WIB &nbsp;&bull;&nbsp; TK Aisyiyah Mimika</p>
        <button class="btn-cetak no-print" onclick="window.print()">🖨️ &nbsp;Cetak Bukti</button>
      </div>

    </div>
  </div>

</body>
</html>