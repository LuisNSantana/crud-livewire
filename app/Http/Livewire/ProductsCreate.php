<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;

class ProductsCreate extends Component
{
    use WithFileUploads;

    public $categories;
    public Product $product;
    public $productCategories;
    public $photo;
    //rules equivalent of validation 
    protected $rules = [
        'product.name' => 'required|min:5',
        'product.description' => 'required|max:500',
        'productCategories' => 'required|array',
        'product.color' => 'string',
        'product.in_stock' => 'boolean',
        'product.stock_date' => 'date',
        'photo' => 'image',
    ];
    protected $validationAttributes = [
        'productCategories' => 'Categories'
    ];

    public function mount(Product $product){
        $this->categories = Category::all();
        //si el producto exite sino un nuevo producto
        $this->product = $product ?? new Product();
        $this->productCategories = $this->product->categories()->pluck('id');

    }
    public function render()
    {
        return view('livewire.products-create');
    }

    public function save(){
        $this->validate();
        $filename = $this->photo->store('products', 'public');
        $this->product->photo = $filename;
        $this->product->save();
        $this->product->categories()->sync($this->productCategories);
        return redirect()->route('products.index');
    }

    public function updatedProductName()
    {
        $this->validateOnly('product.name');
    }
}
