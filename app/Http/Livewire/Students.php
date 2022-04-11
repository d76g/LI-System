<?php

namespace App\Http\Livewire;

use App\Models\Students;
use Illuminate\Support\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\Rules\Rule;

final class Students extends PowerGridComponent
{
    use ActionButton;

    //Messages informing success/error data is updated.
    public bool $showUpdateMessages = true;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): void
    {
        $this->showCheckBox()
            ->showPerPage()
            ->showSearchInput()
            ->showExportOption('download', ['excel', 'csv']);
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
    * PowerGrid datasource.
    *
    * @return  \Illuminate\Database\Eloquent\Builder<\App\Models\Students>|null
    */
    public function datasource(): ?Builder
    {
        return Students::query();
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    */
    public function addColumns(): ?PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('Penyelia_Fakulti_id')
            ->addColumn('No_Matrik')
            ->addColumn('No_KP')
            ->addColumn('Nama')
            ->addColumn('Kod_Prog')
            ->addColumn('Tahun_Pengajian')
            ->addColumn('No_Tel_Pelajar')
            ->addColumn('Nama_Syarikat_LI')
            ->addColumn('Sektor')
            ->addColumn('Sektor_Ekonomi')
            ->addColumn('Alamat_Syarikat')
            ->addColumn('Poskod')
            ->addColumn('Bandar')
            ->addColumn('Negeri')
            ->addColumn('Pegawai')
            ->addColumn('No_Tel_Syarikat')
            ->addColumn('No_Faks_Syarikat')
            ->addColumn('Tarikh_Mula_LI')
            ->addColumn('Tarikh_Tamat_LI')
            ->addColumn('Tarikh_Lapor_Diri');
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

     /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::add()
                ->title('ID')
                ->field('id')
                ->makeInputRange(),

            Column::add()
                ->title('PENYELIA FAKULTI ID')
                ->field('Penyelia_Fakulti_id')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('NO MATRIK')
                ->field('No_Matrik')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('NO KP')
                ->field('No_KP')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('NAMA')
                ->field('Nama')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('KOD PROG')
                ->field('Kod_Prog')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('TAHUN PENGAJIAN')
                ->field('Tahun_Pengajian')
                ->makeInputRange(),

            Column::add()
                ->title('NO TEL PELAJAR')
                ->field('No_Tel_Pelajar')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('NAMA SYARIKAT LI')
                ->field('Nama_Syarikat_LI')
                ->sortable()
                ->searchable(),

            Column::add()
                ->title('SEKTOR')
                ->field('Sektor')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('SEKTOR EKONOMI')
                ->field('Sektor_Ekonomi')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('ALAMAT SYARIKAT')
                ->field('Alamat_Syarikat')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('POSKOD')
                ->field('Poskod')
                ->makeInputRange(),

            Column::add()
                ->title('BANDAR')
                ->field('Bandar')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('NEGERI')
                ->field('Negeri')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('PEGAWAI')
                ->field('Pegawai')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('NO TEL SYARIKAT')
                ->field('No_Tel_Syarikat')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('NO FAKS SYARIKAT')
                ->field('No_Faks_Syarikat')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('TARIKH MULA LI')
                ->field('Tarikh_Mula_LI')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('TARIKH TAMAT LI')
                ->field('Tarikh_Tamat_LI')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('TARIKH LAPOR DIRI')
                ->field('Tarikh_Lapor_Diri')
                ->sortable()
                ->searchable()
                ->makeInputText(),

        ]
;
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

     /**
     * PowerGrid Students Action Buttons.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Button>
     */

    /*
    public function actions(): array
    {
       return [
           Button::add('edit')
               ->caption('Edit')
               ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
               ->route('students.edit', ['students' => 'id']),

           Button::add('destroy')
               ->caption('Delete')
               ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
               ->route('students.destroy', ['students' => 'id'])
               ->method('delete')
        ];
    }
    */

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

     /**
     * PowerGrid Students Action Rules.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Rules\RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [
           
           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($students) => $students->id === 1)
                ->hide(),
        ];
    }
    */

    /*
    |--------------------------------------------------------------------------
    | Edit Method
    |--------------------------------------------------------------------------
    | Enable the method below to use editOnClick() or toggleable() methods.
    | Data must be validated and treated (see "Update Data" in PowerGrid doc).
    |
    */

     /**
     * PowerGrid Students Update.
     *
     * @param array<string,string> $data
     */

    /*
    public function update(array $data ): bool
    {
       try {
           $updated = Students::query()->findOrFail($data['id'])
                ->update([
                    $data['field'] => $data['value'],
                ]);
       } catch (QueryException $exception) {
           $updated = false;
       }
       return $updated;
    }

    public function updateMessages(string $status = 'error', string $field = '_default_message'): string
    {
        $updateMessages = [
            'success'   => [
                '_default_message' => __('Data has been updated successfully!'),
                //'custom_field'   => __('Custom Field updated successfully!'),
            ],
            'error' => [
                '_default_message' => __('Error updating the data.'),
                //'custom_field'   => __('Error updating custom field.'),
            ]
        ];

        $message = ($updateMessages[$status][$field] ?? $updateMessages[$status]['_default_message']);

        return (is_string($message)) ? $message : 'Error!';
    }
    */
}
