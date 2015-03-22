<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model {

	protected $table = 'products';

    public function createProduct($name, $brand, $desc, $size, $price, $type, $design, $stock, $category)
    {
        $this->name = $name;
        $this->brand = $brand;
        $this->description = $desc;
        $this->size = $size;
        $this->price = $price;
        $this->type = $type;
        $this->design = $design;
        $this->stock = $stock;
        $this->category = $category;
        $this->save();

        return $this->id;
    }

}
