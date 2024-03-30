<?php

namespace App\DataTables;

use App\Models\Product;
use App\Models\SellerProduct;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\Auth;

class SellerProductsDataTable extends DataTable
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
                        <a href='".route('admin.product.edit', $query->id)."' class='btn btn-primary'><i class='far fa-edit'></i></a>
                        ";
            $deletetBtn = "
                        <a href='".route('admin.product.destroy', $query->id)."' class='btn btn-danger ml-2 delete-item'><i class='fas fa-trash'></i></a>
                        ";
            $other ="
            <div class='dropdown d-inline'>
                  <button class='btn btn-primary dropdown-toggle ml-1' type='button' id='dropdownMenuButton2' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                    <li class='fas fa-cog'></li>
                  </button>
                  <div class='dropdown-menu'>
                    <a class='dropdown-item has-icon' href='".route('admin.product-image-gallery.index', ['product'=> $query->id])."'><i class='far fa-heart'></i> Image Gallery</a>
                    <a class='dropdown-item has-icon' href='".route('admin.product-variant.index', ['product'=> $query->id])."'><i class='far fa-file'></i> Variant</a>
                  </div>
                </div>

                    ";
            return $editBtn.$deletetBtn.$other;
        })
        ->addColumn('image', function($query){
            $thumb_image = "<img width='50px' src='".asset($query->thumb_image)."'></img>";
            return $thumb_image;
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
        ->addColumn('type', function($query){
            switch ($query->product_type) {
                case 'new_arrival':
                    return '<i class="badge badge-success">New Arrival</i>';
                    break;
                case 'featured_product':
                    return '<i class="badge badge-warning">Featured Product</i>';
                    break;
                case 'top_product':
                    return '<i class="badge badge-info">Top Product</i>';
                    break;

                case 'best_product':
                    return '<i class="badge badge-danger">Top Product</i>';
                    break;

                default:
                    return '<i class="badge badge-dark">None</i>';
                    break;
            }
        })
        ->addColumn('vendor', function($query){
            return $query->vendor->shop_name;
        })
        ->rawColumns(['action', 'image', 'type', 'status'])
        ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->where('vendor_id', '!=', Auth::user()->vendor->id)
        ->where('is_approved', 1)
        ->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('sellerproducts-table')
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
            Column::make('image'),
            Column::make('vendor'),
            Column::make('name'),
            Column::make('price'),
            Column::make('type'),
            Column::make('status')
            ->width(10),
            // Column::make('created_at'),
            // Column::make('updated_at'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(300)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'SellerProducts_' . date('YmdHis');
    }
}
