<?php
echo "============🧾Program Menghitung Pembelian Barang🧾==============\n";
echo "\n";

// Mendefinisikan kelas
class PembelianBarang {
    public $hargaBarang;
    public $jumlahItem;
    public $uangDiterima;
    public $diskonPersen;

    // Constructor
    function __construct($hargaBarang, $jumlahItem, $uangDiterima, $diskonPersen) {
        $this->hargaBarang = $hargaBarang;
        $this->jumlahItem = $jumlahItem;
        $this->uangDiterima = $uangDiterima;
        $this->diskonPersen = $diskonPersen;
    }

    // Method 
    public function hitungTotalHarga() {
        return $this->hargaBarang * $this->jumlahItem;
    }
    public function hitungDiskon() {
        $totalHarga = $this->hitungTotalHarga();
        return ($this->diskonPersen / 100) * $totalHarga;
    }
    public function hitungTotalHargaSetelahDiskon() {
        return $this->hitungTotalHarga() - $this->hitungDiskon();
    }
    public function hitungKembalianTanpaDiskon() {
        return $this->uangDiterima - $this->hitungTotalHarga();
    }
    public function hitungKembalianSetelahDiskon() {
        return $this->uangDiterima - $this->hitungTotalHargaSetelahDiskon();
    }
}

// Instansiasi objek pembelian dengan harga barang, jumlah item, uang diterima, dan persentase diskon
$pembelianA = new PembelianBarang(50000, 3, 200000, 20);

echo "⇨ Total Harga Sebelum Diskon: Rp." . number_format($pembelianA->hitungTotalHarga(), 0, ',', '.') . "\n";
echo "⇨ Diskon: Rp." . number_format($pembelianA->hitungDiskon(), 0, ',', '.') . " (" . $pembelianA->diskonPersen . "%)\n";
echo "⇨ Total Harga Setelah Diskon: Rp." . number_format($pembelianA->hitungTotalHargaSetelahDiskon(), 0, ',', '.') . "\n";
echo "⇨ Kembalian Tanpa Diskon: Rp." . number_format($pembelianA->hitungKembalianTanpaDiskon(), 0, ',', '.') . "\n";
echo "⇨ Kembalian Setelah Diskon: Rp." . number_format($pembelianA->hitungKembalianSetelahDiskon(), 0, ',', '.') . "\n";
?>