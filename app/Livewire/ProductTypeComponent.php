<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\ProductType;
use Livewire\Component;

use function Pest\Laravel\delete;

class ProductTypeComponent extends Component
{
    public $id;
    public $name;
    public $productTypes = [];
    public $showModal = false;
    public $editing = false;

    public function fectData()
    {
        $this->productTypes = ProductType::orderBy('id', 'desc')->get();
    }
    public function create()
    {
        $this->showModal = true;
    }
    public function save()
    {
        if ($this->id) {
            $productType = ProductType::find($this->id);
        } else {
            $productType = new ProductType();
        }
        $productType->name = $this->name;
        $productType->save();
        $this->name = '';
        $this->fectData();

        $this->showModal = false;
        $this->editing = false;
    }
    public function edit($id)
    {
        $this->editing = true;
        $this->showModal = true;

        $productType = ProductType::find($id);
        $this->id = $productType->id;
        $this->name = $productType->name;
    }
    public function remove($id)
    {
        $productType = ProductType::find($id);
        $productType->delete();
        $this->fectData();
    }
    public function render()
    {$this->fectData();
        return view('livewire.productType');
    }
}
