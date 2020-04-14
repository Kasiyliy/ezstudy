<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 15.04.2020
 * Time: 01:58
 */

namespace App\Http\Controllers\Web;


use App\Http\Controllers\WebBaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use setasign\Fpdi\Tcpdf\Fpdi;

define('FPDF_FONTPATH', public_path('fonts'));

class CertificateController extends WebBaseController
{

    public function myCertificates()
    {
        $userId = Auth::id();
        $certificates = DB::table('courses as c')
            ->select([
                'qr.id as id',
                'c.id as courseId',
                'q.id as quizId',
                'c.name as courseName',
                'q.name as quizName',
                'qr.result as result',
                'q.updated_at as passedAt'
            ])
            ->distinct()
            ->join('quizzes as q', 'c.quiz_id', '=', 'q.id')
            ->join('quiz_results as qr', 'qr.quiz_id', '=', 'q.id')
            ->where('qr.user_id', '=', $userId)
            ->where('qr.result', '>=', 50)
            ->get();
        return view('admin.main.certificates.index', compact('certificates'));
    }

    public function certificate($id)
    {
        $userId = Auth::id();

        $certificate = DB::table('courses as c')
            ->select([
                'qr.id as id',
                'c.id as courseId',
                'q.id as quizId',
                'u.first_name as firstName',
                'u.last_name as lastName',
                'q.id as quizId',
                'c.name as courseName',
                'q.name as quizName',
                'qr.result as result',
                'q.updated_at as passedAt'
            ])
            ->distinct()
            ->join('quizzes as q', 'c.quiz_id', '=', 'q.id')
            ->join('quiz_results as qr', 'qr.quiz_id', '=', 'q.id')
            ->join('users as u', 'u.id', '=', 'qr.user_id')
            ->where('qr.user_id', '=', $userId)
            ->where('qr.result', '>=', 50)
            ->where('qr.id', '=', $id)
            ->first();
        $pdf = new Fpdi('L', 'mm', 'A4');
        $pdf->setSourceFile(public_path('certificate.pdf'));
        $fontName = "DejaVuSans";
        $pdf->AddFont($fontName, '', 'DejaVuSans.php');
        $pdf->AddFont($fontName, 'B', 'DejaVuSans.php');
        $pdf->AddFont($fontName, 'I', 'DejaVuSans.php');
        $tplId = $pdf->importPage(1);
        $pdf->addPage();

        $pdf->useTemplate($tplId, 0, 0);
        $pdf->SetMargins(0, 0, 0, 0);
        $pdf->SetAutoPageBreak(false);

        $pdf->SetFont($fontName, '', '20');
        $pdf->SetTextColor(60, 60, 60);
        $pdf->SetXY(100, 95);
        $this->Cell($pdf, 100, 10, strtoupper("$certificate->firstName $certificate->lastName - ға"), 0, 0, 'C');
        $pdf->SetFont($fontName, '', '20');
        $pdf->SetXY(100, 102);
        $this->Cell($pdf, 100, 10, "\"$certificate->courseName\" - курсын", 0, 0, 'C');

        $pdf->SetXY(100, 110);
        $this->Cell($pdf, 100, 10, "сәтті аяқтаганы үшін беріледі", 0, 0, 'C');

        $pdf->SetFont($fontName, 'B', '20');
        $pdf->SetXY(100, 120);
        $this->Cell($pdf, 100, 10, "ҚҰТТЫҚТАЙМЫЗ!", 0, 0, 'C');

        $pdf->SetFont($fontName, 'B', '10');
        $pdf->SetXY(100, 170);
        $this->Cell($pdf, 100, 10, "СЕРТИФИКАТ НӨМІРІ: $certificate->id", 0, 0, 'C');
        $pdf->SetXY(100, 178);
        $this->Cell($pdf, 100, 10, "ТАПСЫРҒАН УАҚЫТЫ: $certificate->passedAt", 0, 0, 'C');

        return $pdf->Output("certificate.pdf", "I", true);
    }

    function Cell($pdf, $w, $h, $txt, $b, $i, $a)
    {
        $pdf->Cell($w, $h, $this->convert($txt), $b, $i, $a);
    }

    function convert($str)
    {
        return $str;
//        return iconv('UTF-8', 'cp1251', $str);
    }
}