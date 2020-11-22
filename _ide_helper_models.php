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
 * @method static \Illuminate\Database\Eloquent\Builder|akun newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|akun newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|akun query()
 * @method static \Illuminate\Database\Eloquent\Builder|akun wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|akun whereUsername($value)
 */
	class akun extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\pengiriman
 *
 * @property string $no_resi
 * @property string $nama_pengirim
 * @property string $nama_penerima
 * @property string $no_telp_pengirim
 * @property string $no_telp_penerima
 * @property string $tgl_masuk
 * @property string $deskripsi
 * @property int $berat
 * @property int $harga
 * @method static \Illuminate\Database\Eloquent\Builder|pengiriman newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|pengiriman newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|pengiriman query()
 * @method static \Illuminate\Database\Eloquent\Builder|pengiriman whereBerat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|pengiriman whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|pengiriman whereHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|pengiriman whereNamaPenerima($value)
 * @method static \Illuminate\Database\Eloquent\Builder|pengiriman whereNamaPengirim($value)
 * @method static \Illuminate\Database\Eloquent\Builder|pengiriman whereNoResi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|pengiriman whereNoTelpPenerima($value)
 * @method static \Illuminate\Database\Eloquent\Builder|pengiriman whereNoTelpPengirim($value)
 * @method static \Illuminate\Database\Eloquent\Builder|pengiriman whereTglMasuk($value)
 */
	class pengiriman extends \Eloquent {}
}

