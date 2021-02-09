<?php

namespace App\Http\Controllers;

use App\Models\invoice;
use App\Models\invoice_pengiriman;
use Colors\RandomColor;
use DVDoug\BoxPacker\InfalliblePacker;
use DVDoug\BoxPacker\PackedBoxList;
use DVDoug\BoxPacker\Packer;
use DVDoug\BoxPacker\Test\TestBox;
use DVDoug\BoxPacker\Test\TestItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use function Ramsey\Uuid\v1;

class Rekomendasi extends Controller
{
    public function rekomendasiawal(){
        $kendaraans = \App\Models\kendaraan::whereStatus('Tersedia')->get();
        return view('rekomendasi.pilihkendaraan',compact('kendaraans'));
    }

    public function invoice($kendaraan,$opsi){
        $rekomendasi = $this->testrekomendasi($kendaraan);
        $k = \App\Models\kendaraan::where('id_kendaraan',$kendaraan)->first();
        return view('rekomendasi.invoice', ['k' => $k,'opsi'=>$opsi,'rekomendasi'=>$rekomendasi]);
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
//        echo "Ada : ".$pengirimans->count().' Barang <br>';
        foreach ($pengirimans as $pengiriman){
            $packer->addItem(new TestItem($pengiriman->no_resi,$pengiriman->lebar,$pengiriman->panjang,$pengiriman->tinggi,$pengiriman->berat,true,1));
        }

        $packedBoxes = $packer->pack();
        foreach ($packedBoxes as $key => $b){
            $filling = abs(100*(($b->getUsedVolume()/$b->getInnerVolume())-($b->getItems()->count()/$pengirimans->count())));
            if($key==0){
                $packedBoxes->getIterator()[0]->rekomendasi = 0;
                $packedBoxes->getIterator()[0]->rekomendasivalue = $filling;
            }
            else{
//                debug($filling." > ".$packedBoxes->getIterator()[0]->rekomendasivalue);

                if($filling > $packedBoxes->getIterator()[0]->rekomendasivalue){
                    $packedBoxes->getIterator()[0]->rekomendasi = $key;
                    $packedBoxes->getIterator()[0]->rekomendasivalue = $filling;
                }
            }
//            debug("Rekomendasi : ". $packedBoxes->getIterator()[0]->rekomendasi);
            $packedBoxes->getIterator()[$key]->filling= $filling;
            foreach($packedBoxes->getIterator()[$key]->getItems() as $k => $item){
                $packedBoxes->getIterator()[$key]->getItems()->getIterator()[$k]->color = RandomColor::one();
            }
        }
        return $packedBoxes;
    }

    public function rekomendasiv2($kendaraan,$opsi){
        $box = $this->testrekomendasi($kendaraan);
        $k = \App\Models\kendaraan::whereIdKendaraan($kendaraan)->first();
        return view('rekomendasi.rekomendasipilihv2',['k'=>$k,'box'=>$box,'opsi'=>$opsi]);
    }

    public function buatinvoicebaru(Request $req, $kendaraan,$opsi){
        $rekomendasi = $this->testrekomendasi($kendaraan);
        $randinvoice = rand(0,7000);
        $invoice = new invoice();
        $invoice->id_invoice = $randinvoice;
        $invoice->tgl_kirim = $req->post('tanggal_kirim');
        $invoice->id_kendaraan = $kendaraan;
        $invoice->status = 'Pending';
        $invoice->save();
        foreach ($rekomendasi->getIterator()[$opsi]->getItems() as $item){
            $jadwalinvoice = new invoice_pengiriman();
            $jadwalinvoice->invoice_id_invoice = $randinvoice;
            $jadwalinvoice->pengiriman_no_resi = $item->getItem()->getDescription();
            $jadwalinvoice->posisix = $item->getX();
            $jadwalinvoice->posisiy = $item->getY();
            $jadwalinvoice->posisiz = $item->getZ();
            $jadwalinvoice->volume = $item->getVolume();
            $jadwalinvoice->warna = $item->color;
            $jadwalinvoice->width = $item->getWidth();
            $jadwalinvoice->length = $item->getLength();
            $jadwalinvoice->save();
            //
            $pengiriman = \App\Models\pengiriman::whereNoResi($item->getItem()->getDescription())->first();
            $pengiriman->status = 'Dijadwalkan';
            $pengiriman->save();
        }
        return redirect('/invoice/'.$randinvoice)->with('Invoice berhasil dibuat');
    }


}
