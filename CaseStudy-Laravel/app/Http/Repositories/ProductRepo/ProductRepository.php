<?php
namespace App\Http\Repositories\ProductRepo;


use App\Http\Repositories\BaseRepository;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Cache\Repository;
use Illuminate\Support\Facades\Storage;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }
    public function store($request){
        $this->model->name = $request->name;
        $this->model->price = $request->price;
        $this->model->costPrice = $request->cost_price;
        $this->model->description = $request->description;
        $this->model->quantity = $request->quantity;
        $this->model->size = $request->size;
        $this->model->category_id = $request->brand;

        $image = Storage::disk('s3')->put('images',$request->image,'public');
        $this->model->image_product = $image;

        $image_detail = Storage::disk('s3')->put('images',$request->image_detail,'public');
        $this->model->image_detail = $image_detail;



        $this->model->save();
    }
    public function getCategory()
    {
        $category = Category::all();
        return $category;
    }
    public function update($request, $obj)
    {
        $obj->name = $request->name;
        $obj->price = $request->price;
        $obj->costPrice = $request->cost_price;
        $obj->description = $request->description;
        $obj->quantity = $request->quantity;
        $obj->size = $request->size;
        $obj->category_id = $request->brand;

        $image = Storage::disk('s3')->put('images',$request->image,'public');
        $obj->image_product = $image;

        $image_detail = Storage::disk('s3')->put('images',$request->image_detail,'public');
        $obj->image_detail = $image_detail;

        $obj->save();
    }

    public function getProductNew(){
        $productNew = $this->model->orderBy('id','DESC')->paginate(8);
        return $productNew;
    }


    public function getCakeBaker(){
        $cakeBakers = $this->model->where('category_id','=',1)->get();
        return $cakeBakers;

    }

    public function getBirthDay(){
        $cakeBirthDays = $this->model->where('category_id','=','2')->get();
        return $cakeBirthDays;
    }
    public function getChopped(){
        $cakeCoppeds = $this->model->where('category_id','=','3')->get();
        return $cakeCoppeds;
    }






}
