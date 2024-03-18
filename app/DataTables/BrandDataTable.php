<?php

namespace App\DataTables;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BrandDataTable extends DataTable
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
                        <a href='".route('admin.brand.edit', $query->id)."' class='btn btn-primary'><i class='far fa-edit'></i></a>
                        ";
            $deletetBtn = "
                        <a href='".route('admin.brand.destroy', $query->id)."' class='btn btn-danger ml-2 delete-item'><i class='fas fa-trash'></i></a>
                        ";
            return $editBtn.$deletetBtn;
        })
        ->addColumn('logo', function($query){
            $logo = "<img width='50px' src='".asset($query->logo)."'></img>";
            return $logo;
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
            ->rawColumns(['action', 'logo', 'status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Brand $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('brand-table')
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
            Column::make('logo'),
            Column::make('name'),
            Column::make('status'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(200)
            ->addClass('text-center'),
            // Column::make('add your columns'),
            // Column::make('created_at'),
            // Column::make('updated_at'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Brand_' . date('YmdHis');
    }
}
