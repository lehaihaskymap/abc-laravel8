<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sanpham;
use Cart;
use Livewire\WithPagination;

class ProductShopping extends Component
{
    use WithPagination;

    protected $listeners = ['updateSelection'];

    protected $paginationTheme = 'bootstrap';

    public $sorts = [
        0 => 'Mặc định',
        1 => 'Giá tăng dần',
        2 => 'Giá giảm dần',
    ];
    public $sortid=0;
    public $viewType='grid';
    public $selectionCatid=null;

    public function updateSelection($catid){
        $this->selectionCatid=$catid;
        $this->resetPage();
    }

    public function updatedSortid(){
        $this->resetPage();
    }

    public function paginationView()
    {
        return 'livewire.custom-pagination-links-view';
    }

    public function viewFormat($viewType){
        $this->viewType=$viewType;
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price);
        session()->flash('success','Thêm mới một mục vào rỏ hàng');
        return redirect()->route('cart');
    }

    public function render()
    {
        if (!is_null($this->selectionCatid)){
            if ($this->sortid == 1){
                $products=Sanpham::where('nhomsanphamid',$this->selectionCatid)->orderBy('gia', 'asc')->paginate(6);
            } elseif ($this->sortid ==2){
                $products=Sanpham::where('nhomsanphamid',$this->selectionCatid)->orderBy('gia', 'desc')->paginate(6);
            } else {
                $products=Sanpham::where('nhomsanphamid',$this->selectionCatid)->paginate(6);
            }
        }
        else{
            if ($this->sortid == 1){
                $products=Sanpham::orderBy('gia', 'asc')->paginate(6);
            } elseif ($this->sortid ==2){
                $products=Sanpham::orderBy('gia', 'desc')->paginate(6);
            } else {
                $products=Sanpham::paginate(6);
            }
        }

        return view('livewire.product-shopping', ['products'=>$products]);
    }
}
