<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Property;
use App\Models\Type;
class PropertyFilter extends Component
{
    use WithPagination;

    public $PropertyType;
    public $Bedrooms;
    public $Bathrooms;
    public $MinPrice;
    public $MaxPrice;
    public $SortFilter;
    public $status;
    protected $paginationTheme = 'bootstrap';

    public function updating($name)
    {
        $this->resetPage();
    }
public function mount($status='Buy' )
{
    $this->status = $status;
}
    public function render()
    {  
        $query = Property::where('PropertyStatus', $this->status);
        if ($this->PropertyType) {
            $query->where('TypeID', $this->PropertyType);
        }

        if ($this->Bedrooms) {
            if ($this->Bedrooms === '7-or-more') {
                $query->where('Bedrooms', '>=', 7);
            } else {
                $query->where('Bedrooms', $this->Bedrooms);
            }
        }

        if ($this->Bathrooms) {
            if ($this->Bathrooms === '4-or-more') {
                $query->where('Bathrooms', '>=', 4);
            } else {
                $query->where('Bathrooms', $this->Bathrooms);
            }
        }

        if ($this->MinPrice) {
            $query->where('price', '>=', $this->MinPrice);
        }
        if ($this->MaxPrice) {
            $query->where('price', '<=', $this->MaxPrice);
        }

        if ($this->SortFilter) {
            [$column, $direction] = explode('-', $this->SortFilter);
            $query->orderBy($column, $direction);
        }

        $properties = $query->paginate(5);
        return view('livewire.property-filter', [
           'types' => Type::all(),
            'properties' => $properties
        ]);
    }
}