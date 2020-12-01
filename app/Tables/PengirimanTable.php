<?php

namespace App\Tables;

use App\Models\pengiriman;
use Okipa\LaravelTable\Abstracts\AbstractTable;
use Okipa\LaravelTable\Table;

class PengirimanTable extends AbstractTable
{
    /**
     * Configure the table itself.
     *
     * @return \Okipa\LaravelTable\Table
     * @throws \ErrorException
     */
    protected function table(): Table
    {
        return (new Table())->model(pengiriman::class)
            ->routes([
                'index'   => ['name' => 'pengirimen.index'],
//                'create'  => ['name' => 'pengiriman.create'],
                'edit'    => ['name' => 'pengiriman.edit'],
                'destroy' => ['name' => 'pengiriman.destroy'],
                'show' => ['name' => 'pengiriman.show'],
            ])
            ->destroyConfirmationHtmlAttributes(fn(pengiriman $pengiriman) => [
                'onclick' => __("return confirm('Apa kamu yakin ingin menghapus resi ". $pengiriman->no_resi."? ')"),
            ]);
    }

    /**
     * Configure the table columns.
     *
     * @param \Okipa\LaravelTable\Table $table
     *
     * @throws \ErrorException
     */
    protected function columns(Table $table): void
    {
        $table->column('no_resi')->sortable()->searchable()->title('No Resi');
        $table->column('nama_pengirim')->sortable()->searchable()->title('Nama Pengirim');
        $table->column('nama_penerima')->sortable()->searchable()->title('Nama Penerima');
//        $table->column('no_telp_pengirim')->sortable()->searchable()->title('No Telp Pengirim');
//        $table->column('no_telp_penerima')->sortable()->searchable()->title('No Telp Penerima');
        $table->column('tgl_masuk')->sortable()->searchable()->title('Tanggal Masuk');
//        $table->column('deskripsi')->title('Deskipsi');
//        $table->column('berat')->title('Berat');
//        $table->column('harga')->title('Harga');
        $table->column('status')->sortable()->title('Status');

    }

    /**
     * Configure the table result lines.
     *
     * @param \Okipa\LaravelTable\Table $table
     */
    protected function resultLines(Table $table): void
    {
        //
    }
}
