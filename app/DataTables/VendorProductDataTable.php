<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Auth;

class VendorProductDataTable extends DataTable
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
                            <a href='".route('vendor.product.edit', $query->id)."' class='btn btn-primary'><i class='far fa-edit'></i></a>
                            ";
                $deletetBtn = "
                            <a href='".route('vendor.product.destroy', $query->id)."' class='btn btn-danger ml-2 delete-item'><i class='fas fa-trash'></i></a>
                            ";
                $other ='
                <div class="btn-group dropstart">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-gear"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="'.route('vendor.product-image-gallery.index', ['product'=> $query->id]).'">Image Gallery</a></li>
                        <li><a class="dropdown-item" href="'.route('vendor.product-variant.index', ['product'=> $query->id]).'">Variant</a></li>
                    </ul>
                    </div>

                        ';
                return $editBtn.$deletetBtn.$other;
            })
            ->addColumn('thumb_image', function($query){
                $thumb_image = "<img width='50px' src='".asset($query->thumb_image)."'></img>";
                return $thumb_image;
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
            ->addColumn('category', function($query){
                return $query->category->name;
            })
            ->addColumn('type', function($query){
                switch ($query->product_type) {
                    case 'new_arrival':
                        return '<i class="badge bg-success">New Arrival</i>';
                        break;
                    case 'featured_product':
                        return '<i class="badge bg-warning">Featured Product</i>';
                        break;
                    case 'top_product':
                        return '<i class="badge bg-info">Top Product</i>';
                        break;
    
                    case 'best_product':
                        return '<i class="badge bg-danger">Top Product</i>';
                        break;
    
                    default:
                        return '<i class="badge bg-dark">None</i>';
                        break;
                }
            })
            ->rawColumns(['action', 'thumb_image', 'type', 'status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->where('vendor_id', Auth::user()->vendor->id)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('vendorproduct-table')
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
            Column::make('thumb_image'),
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
        return 'VendorProduct_' . date('YmdHis');
    }
}
