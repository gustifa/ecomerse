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

class ProductDataTable extends DataTable
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
                <div class='btn-group dropleft'>
                <button type='button' class='btn btn-dark dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                <i class='fa-solid fa-gear'></i>
                </button>
                <div class='dropdown-menu dropleft'>
                  <a class='dropdown-item' href='#'>Action</a>
                  <a class='dropdown-item' href='#'>Another action</a>
                  <a class='dropdown-item' href='#'>Something else here</a>
                  <div class='dropdown-divider'></div>
                  <a class='dropdown-item' href='#'>Separated link</a>
                </div>
              </div>

                        ";
                return $editBtn.$deletetBtn;
            })
            ->addColumn('thumb_image', function($query){
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
            ->addColumn('category', function($query){
                return $query->category->name;
            })
            ->addColumn('subCategory', function($query){
                return $query->subCategory->name;
            })
            ->addColumn('childCategory', function($query){
                return $query->childCategory->name;
            })
            ->addColumn('brand', function($query){
                return $query->brand->name;
            })
            ->rawColumns(['action', 'thumb_image', 'status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('product-table')
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
            Column::make('category'),
            Column::make('subCategory'),
            Column::make('childCategory'),
            Column::make('brand'),
            Column::make('price'),
            Column::make('status')
            ->width(10),
            // Column::make('created_at'),
            // Column::make('updated_at'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(250)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Product_' . date('YmdHis');
    }
}
