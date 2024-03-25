<?php

namespace App\DataTables;

use App\Models\ProductVariantItem;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductVariantItemDataTable extends DataTable
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
                $editBtn = "
                            <a href='".route('admin.product-variant-item.edit', $query->id)."' class='btn btn-primary'><i class='far fa-edit'></i></a>
                            ";
                $deletetBtn = "
                            <a href='".route('admin.product-variant-item.destroy', $query->id)."' class='btn btn-danger ml-2 delete-item'><i class='fas fa-trash'></i></a>
                            ";
                return $editBtn.$deletetBtn;
            })
            ->addColumn('is_default', function($query){
                if($query->is_default == 1){
                    $is_default = "
                            <label class='custom-switch mt-2'>
                            <input type='checkbox' checked name='custom-switch-checkbox' data-id='".$query->id."' class='custom-switch-input change-status'>
                            <span class='custom-switch-indicator'></span>
                            </label>
                        ";
                }else{
                    $is_default = "
                            <label class='custom-switch mt-2'>
                            <input type='checkbox' name='custom-switch-checkbox' data-id='".$query->id."' class='custom-switch-input change-status'>
                            <span class='custom-switch-indicator'></span>
                            </label>
                        ";
                }

                return $is_default;   
            })
            ->addColumn('product_variant_name', function($query){
                return $query->productVariant->name;
            })
            ->addColumn('status', function($query){
                if($query->status == 1){
                    $status = "
                            <label class='custom-switch mt-2'>
                            <input type='checkbox' checked name='custom-switch-checkbox' data-id='".$query->id."' class='custom-switch-input change-status'>
                            <span class='custom-switch-indicator'></span>
                            </label>
                        ";
                }else{
                    $status = "
                            <label class='custom-switch mt-2'>
                            <input type='checkbox' name='custom-switch-checkbox' data-id='".$query->id."' class='custom-switch-input change-status'>
                            <span class='custom-switch-indicator'></span>
                            </label>
                        ";
                }

                return $status;   
            })
            ->rawColumns(['action', 'status','is_default'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ProductVariantItem $model): QueryBuilder
    {
        return $model->where('product_variant_id', request()->variantId)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('productvariantitem-table')
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
            Column::make('product_variant_name'),
            Column::make('name'),
            Column::make('price'),
            Column::make('is_default'),
            Column::make('status'),
            // Column::make('created_at'),
            // Column::make('updated_at'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(200)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ProductVariantItem_' . date('YmdHis');
    }
}
