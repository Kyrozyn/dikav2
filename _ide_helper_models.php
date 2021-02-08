<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\akun
 *
 * @property string $username
 * @property string $password
 * @property string $role
 * @method static \Illuminate\Database\Eloquent\Builder|akun newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|akun newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|akun query()
 * @method static \Illuminate\Database\Eloquent\Builder|akun wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|akun whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|akun whereUsername($value)
 */
	class akun extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\invoice
 *
 * @property string $id_invoice
 * @property string $tgl_kirim
 * @property string $status
 * @property int $id_kendaraan
 * @property-read \App\Models\kendaraan $kendaraan
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\pengiriman[] $pengiriman
 * @property-read int|null $pengiriman_count
 * @method static \Illuminate\Database\Eloquent\Builder|invoice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|invoice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|invoice query()
 * @method static \Illuminate\Database\Eloquent\Builder|invoice whereIdInvoice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|invoice whereIdKendaraan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|invoice whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|invoice whereTglKirim($value)
 */
	class invoice extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\invoice_pengiriman
 *
 * @property string $invoice_id_invoice
 * @property string $pengiriman_no_resi
 * @property string $posisix
 * @property string $posisiy
 * @property string $posisiz
 * @property string $volume
 * @method static \Illuminate\Database\Eloquent\Builder|invoice_pengiriman newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|invoice_pengiriman newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|invoice_pengiriman query()
 * @method static \Illuminate\Database\Eloquent\Builder|invoice_pengiriman whereInvoiceIdInvoice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|invoice_pengiriman wherePengirimanNoResi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|invoice_pengiriman wherePosisix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|invoice_pengiriman wherePosisiy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|invoice_pengiriman wherePosisiz($value)
 * @method static \Illuminate\Database\Eloquent\Builder|invoice_pengiriman whereVolume($value)
 */
	class invoice_pengiriman extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\kendaraan
 *
 * @property int $id_kendaraan
 * @property string $nama_kendaraan
 * @property int $kapasitas
 * @property int $lebar
 * @property int $panjang
 * @property int $tinggi
 * @property string $plat_kendaraan
 * @property string $status
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\pengiriman[] $invoice
 * @property-read int|null $invoice_count
 * @method static \Illuminate\Database\Eloquent\Builder|kendaraan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|kendaraan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|kendaraan query()
 * @method static \Illuminate\Database\Eloquent\Builder|kendaraan whereIdKendaraan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|kendaraan whereKapasitas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|kendaraan whereLebar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|kendaraan whereNamaKendaraan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|kendaraan wherePanjang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|kendaraan wherePlatKendaraan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|kendaraan whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|kendaraan whereTinggi($value)
 */
	class kendaraan extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\pengiriman
 *
 * @property string $no_resi
 * @property string $nama_pengirim
 * @property string $nama_penerima
 * @property string $alamat
 * @property string $no_telp_pengirim
 * @property string $no_telp_penerima
 * @property string $tgl_masuk
 * @property string $deskripsi
 * @property int $berat
 * @property int $lebar
 * @property int $panjang
 * @property int $tinggi
 * @property int $harga
 * @property string $status
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\invoice[] $invoice
 * @property-read int|null $invoice_count
 * @method static \Illuminate\Database\Eloquent\Builder|pengiriman newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|pengiriman newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|pengiriman query()
 * @method static \Illuminate\Database\Eloquent\Builder|pengiriman whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|pengiriman whereBerat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|pengiriman whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|pengiriman whereHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|pengiriman whereLebar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|pengiriman whereNamaPenerima($value)
 * @method static \Illuminate\Database\Eloquent\Builder|pengiriman whereNamaPengirim($value)
 * @method static \Illuminate\Database\Eloquent\Builder|pengiriman whereNoResi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|pengiriman whereNoTelpPenerima($value)
 * @method static \Illuminate\Database\Eloquent\Builder|pengiriman whereNoTelpPengirim($value)
 * @method static \Illuminate\Database\Eloquent\Builder|pengiriman wherePanjang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|pengiriman whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|pengiriman whereTglMasuk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|pengiriman whereTinggi($value)
 */
	class pengiriman extends \Eloquent {}
}

