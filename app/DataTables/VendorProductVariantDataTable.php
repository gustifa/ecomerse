<?php

namespace App\DataTables;

use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class VendorProductVariantDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('action', function($query){
            $varianOptionItem = "
                        <a href='".route('admin.product-variant-item.index',['productId' => request()->product, 'variantId' => $query->id])."' class='btn btn-info mr-2'><i class='far fa-edit'></i> Varian Option</a>
                        ";
            $editBtn = "
                        <a href='".route('admin.product-variant.edit', $query->id)."' class='btn btn-primary'><i class='far fa-edit'></i></a>
                        ";
            $deletetBtn = "
                        <a href='".route('admin.product-variant.destroy', $query->id)."' class='btn btn-danger ml-2 delete-item'><i class='fas fa-trash'></i></a>
                        ";
            return $varianOptionItem.$editBtn.$deletetBtn;
        })
        ->addColumn('status', function($query){
            if($query->status == 1){
                $status = '
                        <div class="form-check form-switch">
                            <input class="form-check-input change-status" type="checkbox" role="switch" id="flexSwitchCheckChecked" data-id="'.$query->id.'" checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                        </div>
                    ';
            }else{
                $status = '
                        <div class="form-check form-switch">
                            <input class="form-check-input change-status" type="checkbox" role="switch" id="flexSwitchCheckChecked" data-id="'.$query->id.'">
                            <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                        </div>
                    ';
            }

            return $status;    
        })
        ->rawColumns(['action', 'status'])
        ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ProductVariant $model): QueryBuilder
    {
        return $model->where('product_id', request()->product)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('ProductVariant-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('name'),
            Column::make('status'),
            // Column::make('created_at'),
            // Column::make('updated_at'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(400)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ProductVariant_' . date('YmdHis');
    }
}
