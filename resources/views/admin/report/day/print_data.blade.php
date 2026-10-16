<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengaduan - KPPN Jayapura</title>
    <style>
        @page { size: A4 portrait; margin: 0; }
        @media print {
            * { -webkit-print-color-adjust: exact !important; print-color-adjust: exact !important; }
            .no-print { display: none !important; }
            body { margin: 0; }
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; font-size: 10pt; color: #000; background: #e0e0e0; }

        /* TOMBOL */
        .no-print {
            text-align: center; padding: 12px;
            background: #2c3e50; position: sticky; top: 0; z-index: 99;
        }
        .no-print button {
            background: #27ae60; color: #fff; border: none;
            padding: 8px 25px; font-size: 12px; border-radius: 4px;
            cursor: pointer; margin: 0 5px; font-weight: bold;
        }
        .no-print .btn-tutup { background: #c0392b; }

        /* KERTAS */
        .kertas {
            width: 21cm;
            min-height: 29.7cm;
            margin: 20px auto;
            background: #fff;
            padding: 2cm 2.5cm 2cm 2.5cm;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        @media print {
            .kertas { margin: 0; box-shadow: none; padding: 1.5cm 2cm 1.5cm 2.5cm; width: 100%; }
            body { background: #fff; }
        }

        /* KOP */
        .kop { width: 100%; border-collapse: collapse; margin-bottom: 0; }
        .kop td { border: none; vertical-align: middle; padding: 0; }
        .kop .logo-kiri { width: 75px; text-align: center; }
        .kop .logo-kiri img { width: 65px; }
        .kop .teks { text-align: center; font-family: 'Times New Roman', Times, serif; }
        .kop .teks .baris1 { font-size: 14pt; font-weight: bold; text-transform: uppercase; line-height: 1.3; }
        .kop .teks .baris2 { font-size: 11pt; font-weight: bold; text-transform: uppercase; line-height: 1.4; }
        .kop .teks .baris3 { font-size: 11pt; font-weight: bold; text-transform: uppercase; line-height: 1.4; }
        .kop .teks .alamat { font-family: Arial, sans-serif; font-size: 8pt; margin-top: 6px; color: #000; }
        .kop .logo-kanan { width: 75px; text-align: center; }
        .kop .logo-kanan img { width: 58px; }
        .garis-tebal { border-top: 4px solid #000; margin-top: 8px; }
        .garis-tipis { border-top: 1px solid #000; margin-top: 3px; }

        /* JUDUL LAPORAN */
        .judul-laporan { text-align: center; margin: 18px 0 6px 0; }
        .judul-laporan .judul-utama {
            font-size: 12pt; font-weight: bold;
            text-transform: uppercase; text-decoration: underline;
            letter-spacing: 0.5px; font-family: 'Times New Roman', Times, serif;
        }
        .judul-laporan .sub { font-size: 9.5pt; margin-top: 4px; }
        .judul-laporan .periode { font-size: 9.5pt; margin-top: 2px; }
        .garis-judul { border-top: 1px solid #000; margin: 10px 0 12px 0; }

        /* TABEL */
        .tbl { width: 100%; border-collapse: collapse; font-size: 8pt; margin-top: 4px; }
        .tbl thead tr th {
            background-color: #1a3a5c !important;
            color: #fff !important;
            padding: 6px 5px;
            text-align: center;
            border: 1px solid #000;
            font-size: 8pt;
            line-height: 1.4;
        }
        .tbl tbody td {
            padding: 5px 5px;
            border: 1px solid #999;
            vertical-align: middle;
            line-height: 1.5;
        }
        .tbl tbody tr:nth-child(even) { background-color: #f9f9f9; }
        .tc { text-align: center; }

        /* BADGE */
        .badge {
            padding: 2px 6px; border-radius: 10px; font-size: 7pt;
            font-weight: bold; color: #fff !important; display: inline-block;
        }
        .b-red   { background-color: #c0392b !important; }
        .b-blue  { background-color: #2471a3 !important; }
        .b-green { background-color: #1e8449 !important; }
        .b-teal  { background-color: #117a65 !important; }
        .b-grey  { background-color: #717d7e !important; }

        /* RINGKASAN */
        .ringkasan-box {
            margin-top: 14px;
            border: 1px solid #ccc;
            padding: 8px 12px;
            display: inline-block;
            background: #f9f9f9;
            font-size: 9pt;
        }
        .ringkasan-box table { border-collapse: collapse; }
        .ringkasan-box td { border: none; padding: 2px 8px 2px 0; }
        .ringkasan-box .lbl { font-weight: bold; min-width: 140px; }

        /* TTD */
        .ttd-wrap { margin-top: 35px; width: 100%; border-collapse: collapse; font-size: 10pt; }
        .ttd-wrap td { border: none; vertical-align: top; }
        .ttd-kiri { width: 50%; font-size: 9.5pt; padding-top: 2px; }
        .ttd-kanan { width: 50%; text-align: center; font-size: 9.5pt; }
        .ttd-space { height: 65px; }
        .ttd-nama {
            display: inline-block; min-width: 200px;
            border-top: 1px solid #000;
            padding-top: 4px; font-weight: bold; font-size: 9.5pt;
        }

        /* FOOTER */
        .footer-cetak {
            margin-top: 25px;
            padding-top: 6px;
            border-top: 1px dashed #bbb;
            font-size: 7.5pt;
            color: #666;
            text-align: right;
        }
    </style>
</head>
<body>

    <div class="no-print">
        <button onclick="window.print()">🖨️ Cetak / Simpan PDF</button>
        <button class="btn-tutup" onclick="window.close()">✕ Tutup</button>
    </div>

    <div class="kertas">

        {{-- KOP SURAT --}}
        <table class="kop">
            <tr>
                <td class="logo-kiri">
                    <img src="{{ asset('assets/images/gkn.png') }}" alt="Logo GKN">
                </td>
                <td class="teks">
                    <div class="baris1">Kantor Pelayanan Perbendaharaan Negara Jayapura</div>
                    <div class="baris2">Direktorat Jenderal Perbendaharaan</div>
                    <div class="baris3">Kementerian Keuangan Republik Indonesia</div>
                    <div class="alamat">
                        Jl. Percetakan Negara No. 5, Jayapura, Papua 99111<br>
                        Telp. (0967) 533140 &nbsp;&bull;&nbsp; Fax. (0967) 533140 &nbsp;&bull;&nbsp; Email: kppn.jayapura@gmail.com
                    </div>
                </td>
                <td class="logo-kanan">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo Kemenkeu">
                </td>
            </tr>
        </table>
        <div class="garis-tebal"></div>
        <div class="garis-tipis"></div>

        {{-- JUDUL --}}
        <div class="judul-laporan">
            <div class="judul-utama">Laporan Data Pengaduan</div>
            <div class="sub">HONAI 063 &mdash; Himpunan Opini Non-satker &amp; Aduan Instansi</div>
            <div class="periode">
                Periode :
                @if($date1 && $date2)
                    {{ \Carbon\Carbon::parse($date1)->translatedFormat('d F Y') }}
                    s.d.
                    {{ \Carbon\Carbon::parse($date2)->translatedFormat('d F Y') }}
                @else
                    Semua Data
                @endif
            </div>
        </div>
        <div class="garis-judul"></div>

        {{-- TABEL DATA --}}
        <table class="tbl">
            <thead>
                <tr>
                    <th style="width:4%">No</th>
                    <th style="width:9%">Tipe</th>
                    <th style="width:22%">Nama / Instansi</th>
                    <th style="width:14%">NIK / Kode</th>
                    <th style="width:22%">Judul Pengaduan</th>
                    <th style="width:12%">Tanggal</th>
                    <th style="width:10%">Status</th>
                    <th style="width:7%">Respon</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $item)
                <tr>
                    <td class="tc">{{ $loop->iteration }}</td>
                    <td class="tc">
                        @if(isset($item->tipe_pengadu) && $item->tipe_pengadu == 'satker')
                            <span class="badge b-teal">Satker</span>
                        @else
                            <span class="badge b-grey">Non-Satker</span>
                        @endif
                    </td>
                    <td>
                        @if(isset($item->tipe_pengadu) && $item->tipe_pengadu == 'satker')
                            <strong>{{ $item->Satker->nama_satker ?? '-' }}</strong>
                            @if($item->Satker->nama_pelapor ?? false)
                                <br><small>{{ $item->Satker->nama_pelapor }}</small>
                            @endif
                        @else
                            {{ $item->Society->name ?? '-' }}
                        @endif
                    </td>
                    <td class="tc">{{ $item->nik ?? '-' }}</td>
                    <td>{{ $item->judul ?? '-' }}</td>
                    <td class="tc">
                        {{ $item->date_complaint ? \Carbon\Carbon::parse($item->date_complaint)->format('d/m/Y') : '-' }}
                    </td>
                    <td class="tc">
                        @if($item->status == '0')
                            <span class="badge b-red">Belum</span>
                        @elseif($item->status == 'process')
                            <span class="badge b-blue">Proses</span>
                        @else
                            <span class="badge b-green">Selesai</span>
                        @endif
                    </td>
                    <td class="tc">
                        @if(isset($item->Response) && $item->Response && $item->Response->response)
                            <span class="badge b-green">Ada</span>
                        @else
                            <span class="badge b-red">Belum</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="tc" style="padding:20px; color:#999; font-style:italic;">
                        Tidak ada data pengaduan pada periode ini.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{-- RINGKASAN --}}
        <div class="ringkasan-box">
            <table>
                <tr>
                    <td class="lbl">Total Pengaduan</td>
                    <td>:</td>
                    <td><strong>{{ count($data) }} pengaduan</strong></td>
                </tr>
                <tr>
                    <td class="lbl">Belum Diproses</td>
                    <td>:</td>
                    <td>{{ $data->where('status','0')->count() }} pengaduan</td>
                </tr>
                <tr>
                    <td class="lbl">Sedang Diproses</td>
                    <td>:</td>
                    <td>{{ $data->where('status','process')->count() }} pengaduan</td>
                </tr>
                <tr>
                    <td class="lbl">Selesai</td>
                    <td>:</td>
                    <td>{{ $data->where('status','finish')->count() }} pengaduan</td>
                </tr>
            </table>
        </div>

        {{-- TANDA TANGAN --}}
        <table class="ttd-wrap">
            <tr>
                <td class="ttd-kiri">
                    Dicetak pada :<br>
                    {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}, Pukul {{ \Carbon\Carbon::now()->format('H:i') }} WIT
                </td>
                <td class="ttd-kanan">
                    Jayapura, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}<br><br>
                    Kepala Kantor<br>
                    KPPN Jayapura,<br>
                    <div class="ttd-space"></div>
                    <span class="ttd-nama">( _________________________ )</span><br>
                    <small>NIP. ___________________________</small>
                </td>
            </tr>
        </table>

        <div class="footer-cetak">
            Dokumen ini dicetak secara otomatis oleh Sistem HONAI 063 &mdash; KPPN Jayapura &mdash; {{ \Carbon\Carbon::now()->format('d/m/Y H:i:s') }}
        </div>

    </div>

    <script>
        window.onload = function () { window.print(); }
    </script>

</body>
</html>
