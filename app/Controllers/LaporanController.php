<?php

namespace App\Controllers;

use App\Controllers\BaseController;
// use Dompdf;
use Dompdf\Dompdf as Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class LaporanController extends BaseController
{
    public function pengaduan()
    {
        $date = $this->request->getVar('date');
        // \d($date);
        if ($date) {
            $pgdn = $this->pengaduanmodel
                ->join('masyarakat', 'masyarakat.nik = pengaduan.nik')

                ->where('status', 'selesai')
                ->findAll();
        } else {
            $pgdn = $this->pengaduanmodel
                ->join('masyarakat', 'masyarakat.nik = pengaduan.nik')
                // ->where('tgl_pengaduan', $date)
                ->where('status', 'selesai')
                ->findAll();
        }

        $data = [
            'title' => "Laporan Pengaduan",
            'pgdn' => $pgdn,
            'date' => $date,
            'url_query' =>  $this->request->uri->getQuery()
        ];

        // pdf
        if ($this->request->uri->getSegment(3) == 'pdf') {
            $html = view('laporan/pdf_pengaduan', ['pgdn' => $pgdn, 'date' => $date]);

            $filename = "Laporan Pengaduan_{$date}";
            $pdf = new Dompdf();

            $pdf->loadHtml($html);
            $pdf->setPaper('A4', 'landscape');
            $pdf->render();
            $pdf->stream($filename);

            return redirect()->back();
        }

        // excel
        // if ($this->request->uri->getSegment(3) == 'excel') {
        if (url_is('laporan/pengaduan/excel')) {
            // $html = view('laporan/excel_pengaduan', ['pgdn' => $pgdn, 'date' => $date]);

            $filename = "Laporan Pengaduan_{$date}";
            $excel = new Spreadsheet();
            // nama kolom
            $excel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Nama')
                ->setCellValue('B1', 'NIK')
                ->setCellValue('C1', 'Tgl Pengaduan')
                ->setCellValue('D1', 'Isi Laporan')
                ->setCellValue('E1', 'Status');

            $column = 2;
            foreach ($pgdn as $p) {
                $excel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $column, $p['nama'])
                    ->setCellValue('B' . $column, $p['nik'])
                    ->setCellValue('C' . $column, $p['tgl_pengaduan'])
                    ->setCellValue('D' . $column, $p['isi_laporan'])
                    ->setCellValue('E' . $column, $p['status']);
                $column++;
            }
            // $excel->getActiveSheet()->getProtection()->setSheet(true);
            // tulis dalam format .xlsx
            $writer = new Xlsx($excel);

            // Redirect hasil generate xlsx ke web client
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        }
        return view('laporan/pengaduan', $data);
    }

    public function tanggapan()
    {
        $date = $this->request->getVar('date');
        // \d($date);
        if ($date) {
            $tgpn = $this->tanggapanmodel
                ->join('petugas', 'petugas.id_petugas = tanggapan.id_petugas')
                ->join('pengaduan', 'pengaduan.id_pengaduan = tanggapan.id_pengaduan')
                ->join('masyarakat', 'masyarakat.nik = pengaduan.nik')
                ->where('tgl_tanggapan', $date)
                ->findAll();
        } else {
            $tgpn = $this->tanggapanmodel
                ->join('petugas', 'petugas.id_petugas = tanggapan.id_petugas')
                ->join('pengaduan', 'pengaduan.id_pengaduan = tanggapan.id_pengaduan')
                ->join('masyarakat', 'masyarakat.nik = pengaduan.nik')
                // ->where('tgl_pengaduan', $date)
                ->findAll();
        }

        $data = [
            'title' => "Laporan Tanggapan",
            'tgpn' => $tgpn,
            'date' => $date,
            'url_query' =>  $this->request->uri->getQuery()
        ];

        // pdf
        if ($this->request->uri->getSegment(3) == 'pdf') {
            $html = view('laporan/pdf_tanggapan', ['tgpn' => $tgpn, 'date' => $date]);

            $filename = "Laporan Tanggapan_{$date}";
            $pdf = new Dompdf();

            $pdf->loadHtml($html);
            $pdf->setPaper('A4', 'landscape');
            $pdf->render();
            $pdf->stream($filename);

            return redirect()->back();
        }

        // excel
        if ($this->request->uri->getSegment(3) == 'excel') {
            // if (url_is('laporan/tanggapan/excel')) {
            // $html = view('laporan/excel_tanggapan', ['tgpn' => $tgpn, 'date' => $date]);

            $filename = "Laporan Tanggapan_{$date}";
            $excel = new Spreadsheet();
            // nama kolom
            $excel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Nama')
                ->setCellValue('B1', 'NIK')
                ->setCellValue('C1', 'Tgl Tanggapan')
                ->setCellValue('D1', 'Isi Laporan')
                ->setCellValue('E1', 'Status');

            $column = 2;
            foreach ($tgpn as $p) {
                $excel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $column, $p['nama'])
                    ->setCellValue('B' . $column, $p['nik'])
                    ->setCellValue('C' . $column, $p['tgl_tanggapan'])
                    ->setCellValue('D' . $column, $p['isi_laporan'])
                    ->setCellValue('E' . $column, $p['status']);
                $column++;
            }
            // $excel->getActiveSheet()->getProtection()->setSheet(true);
            // tulis dalam format .xlsx
            $writer = new Xlsx($excel);

            // Redirect hasil generate xlsx ke web client
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
        }
        return view('laporan/tanggapan', $data);
    }
}
