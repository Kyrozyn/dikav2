<?php

namespace App\Http\Controllers;

use App\Models\invoice;
use App\Models\invoice_pengiriman;
use DVDoug\BoxPacker\InfalliblePacker;
use DVDoug\BoxPacker\Packer;
use DVDoug\BoxPacker\Test\TestBox;
use DVDoug\BoxPacker\Test\TestItem;
use Illuminate\Http\Request;

class Rekomendasi extends Controller
{
    private function knapSolveFast2($w, $v, $i, $aW, &$m)
    {
        global $numcalls;
        $numcalls++;
        // echo "Called with i=$i, aW=$aW<br>";

        // Return memo if we have one
        if (isset($m[$i][$aW])) {
            return array($m[$i][$aW], $m['picked'][$i][$aW]);
        } else {

            // At end of decision branch
            if ($i == 0) {
                if ($w[$i] <= $aW) { // Will this item fit?
                    $m[$i][$aW] = $v[$i]; // Memo this item
                    $m['picked'][$i][$aW] = array($i); // and the picked item
                    return array($v[$i], array($i)); // Return the value of this item and add it to the picked list

                } else {
                    // Won't fit
                    $m[$i][$aW] = 0; // Memo zero
                    $m['picked'][$i][$aW] = array(); // and a blank array entry...
                    return array(0, array()); // Return nothing
                }
            }

            // Not at end of decision branch..
            // Get the result of the next branch (without this one)
            list ($without_i, $without_PI) = $this->knapSolveFast2($w, $v, $i - 1, $aW, $m);

            if ($w[$i] > $aW) { // Does it return too many?

                $m[$i][$aW] = $without_i; // Memo without including this one
                $m['picked'][$i][$aW] = $without_PI; // and a blank array entry...
                return array($without_i, $without_PI); // and return it

            } else {

                // Get the result of the next branch (WITH this one picked, so available weight is reduced)
                list ($with_i, $with_PI) = $this->knapSolveFast2($w, $v, ($i - 1), ($aW - $w[$i]), $m);
                $with_i += $v[$i];  // ..and add the value of this one..

                // Get the greater of WITH or WITHOUT
                if ($with_i > $without_i) {
                    $res = $with_i;
                    $picked = $with_PI;
                    array_push($picked, $i);
                } else {
                    $res = $without_i;
                    $picked = $without_PI;
                }

                $m[$i][$aW] = $res; // Store it in the memo
                $m['picked'][$i][$aW] = $picked; // and store the picked item
                return array($res, $picked); // and then return it
            }
        }
    }

//    public function hitung($kendaraan)
//    {
//        $k = \App\Models\kendaraan::whereIdKendaraan($kendaraan)->first();
//        $kapasitas = $k->kapasitas;
//        $items4 = array();
//        $w4 = array();
//        $v4 = array();
//        $pengiriman = \App\Models\pengiriman::all();
//        foreach ($pengiriman as $p) {
//            array_push($items4, $p->no_resi);
//            array_push($w4,$p->berat);
//            array_push($v4,$p->harga);
//        }
////        echo 'w4 = '.print_r($w4,1);
////        echo 'items4 = '.print_r($items4,1);
////        echo 'v4 = '.print_r($v4,1);
////        $items4 = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19);
////        $w4 = array(25, 3, 2, 4, 3, 2, 2, 10, 3, 8, 15, 8, 8, 8, 7, 8, 5, 7, 5);
////        $v4 = array(280, 100, 60, 60, 60, 60, 60, 140, 80, 280, 340, 260, 250, 180, 200, 90, 150, 150, 120);
//
//## Initialize
//        $numcalls = 0;
//        $m = array();
//        $pickedItems = array();
//
//## Solve
//        list ($m4, $pickedItems) = $this->knapSolveFast2($w4, $v4, sizeof($v4) - 1, $kapasitas, $m);
//
//# Display Result
//        echo "<b>Kendaraan:</b> $k->nama_kendaraan ($k->plat_kendaraan)<br>";
//        echo "<b>Kapasitas:</b> $k->kapasitas<br>";
//        echo "<b>Barang:</b><br>" . join(", ", $items4) . "<br>";
//        echo "<b>Harga Total:</b><br>$m4<br>";
////        echo "<b>Harga Total:</b><br>$m4 (in $numcalls calls)<br>";
////        echo "<b>Array barang yang dipilih:</b><br>" . join(",", $pickedItems) . "<br>";
//        echo "<b>Barang yang terpilih:</b><br>";
//        echo "<table border cellspacing=0>";
//        echo "<tr><td>Barang</td><td>Harga</td><td>Berat</td></tr>";
//        $totalVal = $totalWt = 0;
//        foreach ($pickedItems as $key) {
//            $totalVal += $v4[$key];
//            $totalWt += $w4[$key];
//            echo "<tr><td>" . $items4[$key] . "</td><td>" . $v4[$key] . "</td><td>" . $w4[$key] . "</td></tr>";
//        }
//
//            echo "<tr><td align=right><b>Total</b></td><td>$totalVal</td><td>$totalWt</td></tr>";
//        echo "</table><hr>";
//    }

    public function rekomendasiawal(){
        $kendaraans = \App\Models\kendaraan::whereStatus('Tersedia')->get();
        return view('rekomendasi.pilihkendaraan',compact('kendaraans'));
    }

    public function rekomendasi($kendaraan){
        $k = \App\Models\kendaraan::whereIdKendaraan($kendaraan)->first();
        $kapasitas = $k->kapasitas;
        //inisialisasi
        $barangs = array();
        $berats = array();
        $hargas = array();
        $m = array();
        $pengiriman = \App\Models\pengiriman::where('status','=','Pending')->get();
        if(!empty($pengiriman->toArray())){
            foreach ($pengiriman as $p) {
                array_push($barangs, $p->no_resi);
                array_push($berats,$p->berat);
                array_push($hargas,$p->harga);
            }
        }
        else{
            return [];
        }
        //hitung
        list ($m4, $pickedItems) = $this->knapSolveFast2($berats, $hargas, sizeof($hargas) - 1, $kapasitas, $m);

        //hitung total harga dan barang
        $totalVal = $totalWt = 0;
        foreach($pickedItems as $key){
            $totalVal += $hargas[$key];
            $totalWt += $berats[$key];
        }
        return ['k' => $k,'kapasitas' => $kapasitas,'barangs' => $barangs,'berats' => $berats,'hargas' => $hargas,'m4' => $m4,'pickedItems' => $pickedItems,'totalVal' => $totalVal,'totalWt' => $totalWt];
//        return view('rekomendasi.rekomendasipilih', compact(['k','kapasitas','barangs','berats','hargas','m4','pickedItems','totalVal','totalWt']));
    }

    public function rekomendasipilih($kendaraan){
        $rekomendasi = $this->rekomendasi($kendaraan);
        if(empty($rekomendasi)){
            return view('rekomendasi.kosong');
        }
        else{
            return view('rekomendasi.rekomendasipilih', $rekomendasi);
        }
    }

    public function invoice($kendaraan){
        $rekomendasi = $this->rekomendasi($kendaraan);
        return view('rekomendasi.invoice', $rekomendasi);
    }

    public function buatinvoice(Request $req, $kendaraan){
        /** @var \App\Models\pengiriman $item */
        /** @var $pengiriman */
        $randinvoice = rand(0,7000);
        $invoice = new invoice();
        $invoice->id_invoice = $randinvoice;
        $invoice->tgl_kirim = $req->post('tanggal_kirim');
        $invoice->id_kendaraan = $kendaraan;
        $invoice->status = 'Pending';
        $invoice->save();
        $rekomendasi = $this->rekomendasi($kendaraan);
        foreach ($rekomendasi['pickedItems'] as $item){
            $jadwalinvoice = new invoice_pengiriman();
            $jadwalinvoice->invoice_id_invoice = $randinvoice;
            $jadwalinvoice->pengiriman_no_resi = $rekomendasi['barangs'][$item];
            $jadwalinvoice->save();
            //
            $pengiriman = \App\Models\pengiriman::whereNoResi($rekomendasi['barangs'][$item])->first();
            $pengiriman->status = 'Dijadwalkan';
            $pengiriman->save();
        }
        return redirect('/invoice/'.$randinvoice)->with('Invoice berhasil dibuat');
    }

    public function rek()
    {
        $packer = new InfalliblePacker();
        $packer->addBox(new TestBox('Mobil 1', 3000, 3000, 100, 100, 2960, 2960, 80, 10000));
        $packer->addItem(new TestItem('Item 1', 250, 250, 12, 200, true), 1); // item, quantity
        $packer->addItem(new TestItem('Item 2', 250, 250, 12, 200, true), 1);
        $packer->addItem(new TestItem('Item 3', 250, 250, 24, 200, true), 1);
        $packer->addItem(new TestItem('Item 4', 250, 250, 24, 200, true), 1);
        $packer->addItem(new TestItem('Item 5', 250, 250, 24, 200, true), 1);
        $packer->addItem(new TestItem('Item 6', 250, 250, 24, 200, true), 1);

        $packedBoxes = $packer->pack();
        echo "These items fitted into " . count($packedBoxes) . " box(es)" . "<br>";
        foreach ($packedBoxes as $packedBox) {
            $boxType = $packedBox->getBox(); // your own box object, in this case TestBox
            echo "This box is a {$boxType->getReference()}, it is {$boxType->getOuterWidth()}mm wide, {$boxType->getOuterLength()}mm long and {$boxType->getOuterDepth()}mm high" . "<br>";
            echo "The combined weight of this box and the items inside it is {$packedBox->getWeight()}g" . "<br>";

            echo "The items in this box are:" . "<br>";
            $packedItems = $packedBox->getItems();
            foreach ($packedItems as $key => $packedItem) { // $packedItem->getItem() is your own item object, in this case TestItem
                $keys = $key+1;
                echo $keys.". ".$packedItem->getItem()->getDescription() . "<br>";
                echo "x = ".$packedItem->getX() . " ";
                echo "y = ".$packedItem->getY() . " ";
                echo "z = ".$packedItem->getZ() . " <br>";


            }
        }
    }

    public function testrekomendasi($kendaraan){
        $k = \App\Models\kendaraan::whereIdKendaraan($kendaraan)->first();
        $berat = $k->kapasitas;
        $tinggi = $k->tinggi;
        $lebar = $k->lebar;
        $panjang = $k->panjang;

        $packer = new InfalliblePacker();
        $packer->addBox(new TestBox($k->plat_kendaraan, $lebar,$panjang,$tinggi,100,$lebar-40,$panjang-40,$tinggi-20,$berat));
        //barang
        $pengirimans = \App\Models\pengiriman::where('status','=','Pending')->get();
        echo "Ada : ".$pengirimans->count().' Barang <br>';
        foreach ($pengirimans as $pengiriman){
            $packer->addItem(new TestItem($pengiriman->no_resi,$pengiriman->lebar,$pengiriman->panjang,$pengiriman->tinggi,$pengiriman->berat,true,1));
        }

        $packedBoxes = $packer->pack();
        echo "These items fitted into " . count($packedBoxes) . " box(es)" . "<br>";
        echo "Barang yang tidak di packing = ". print_r($packer->getUnpackedItems(),1)."<br>";
        foreach ($packedBoxes as $key=>$packedBox) {
            echo "=======================================<br>";
            echo "        Box Ke-".$key."                <br>";
            echo "=======================================<br>";
            $boxType = $packedBox->getBox(); // your own box object, in this case TestBox
            echo "This box is a {$boxType->getReference()}, it is {$boxType->getOuterWidth()}mm wide, {$boxType->getOuterLength()}mm long and {$boxType->getOuterDepth()}mm high" . "<br>";
            echo "The combined weight of this box and the items inside it is {$packedBox->getWeight()}g" . "<br>";

            echo "The items in this box are:" . "<br>";
            $packedItems = $packedBox->getItems();
            foreach ($packedItems as $key => $packedItem) { // $packedItem->getItem() is your own item object, in this case TestItem
                $keys = $key+1;
                echo $keys.". ".$packedItem->getItem()->getDescription() . "<br>";
                echo "x = ".$packedItem->getX() . " ";
                echo "y = ".$packedItem->getY() . " ";
                echo "z = ".$packedItem->getZ() . " <br>";
            }
        }
    }
}
