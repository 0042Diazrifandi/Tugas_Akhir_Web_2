<?
namespace App\Models;

use CodeIgniter\Model;

class GajiModel extends Model
{
    protected $table      = 'gaji';
    protected $primaryKey = 'id';

    // Mendapatkan laporan gaji per bulan
    public function getLaporanBulanan($bulan, $tahun)
    {
        return $this->where('MONTH(tgl_gaji)', $bulan)
                    ->where('YEAR(tgl_gaji)', $tahun)
                    ->findAll();
    }

    // Mendapatkan laporan gaji per tahun
    public function getLaporanTahunan($tahun)
    {
        return $this->where('YEAR(tgl_gaji)', $tahun)
                    ->findAll();
    }
}
