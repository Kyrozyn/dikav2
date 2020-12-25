<?php

namespace App\Tables;

use App\Models\kendaraan;
use Okipa\LaravelTable\Abstracts\AbstractTable;
use Okipa\LaravelTable\Table;

class KendaraanTable extends AbstractTable
{
    /**
     * Configure the table itself.
     *
     * @return \Okipa\LaravelTable\Table
     * @throws \ErrorException
     */
    protected function table(): Table
    {
        return (new Table())->model(kendaraan::class)
            ->routes([
                'index'   => ['name' => 'kendaraans.index'],
//                'create'  => ['name' => 'kendaraan.create'],
                'edit'    => ['name' => 'kendaraans.edit'],
                'destroy' => ['name' => 'kendaraan.destroy'],
            ])
            ->destroyConfirmationHtmlAttributes(fn(kendaraan $kendaraan) => [
                'onclick' => __("return confirm('Apa kamu yakin ingin menghapus kendaraan ". $kendaraan->plat_kendaraan."? ')"),
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
        $table->column('id_kendaraan')->sortable()->searchable()->title('ID Kendaraan');
        $table->column('nama_kendaraan')->sortable()->searchable()->title('Nama Kendaraan');
        $table->column('kapasitas')->title('Kapasitas')->appendsHtml(' kg');
        $table->column('lebar')->title('Lebar')->appendsHtml(' cm');
        $table->column('panjang')->title('Panjang')->appendsHtml(' cm');
        $table->column('tinggi')->title('Tinggi')->appendsHtml(' cm');
//        $table->column('prioritas')->sortable()->title('Prioritas');
        $table->column('plat_kendaraan')->sortable()->searchable()->title('Plat Kendaraan');
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
