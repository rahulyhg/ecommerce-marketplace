<?php namespace Koolbeans\Repositories;

use Illuminate\Http\Request;
use Koolbeans\Product;
use Koolbeans\ProductType;

class EloquentProductRepository implements ProductRepository
{
    /**
     * @var \Koolbeans\Product
     */
    private $model;
    /**
     * @var \Koolbeans\ProductType
     */
    private $types;

    /**
     * @param \Koolbeans\Product     $model
     * @param \Koolbeans\ProductType $types
     */
    public function __construct(Product $model, ProductType $types)
    {
        $this->model = $model;
        $this->types = $types;
    }

    /**
     * @param bool $withDisabled
     *
     * @return \Koolbeans\Product[]
     */
    public function food($withDisabled = false)
    {
        $qry = $this->model->whereType('food');

        if ($withDisabled) $qry->withTrashed();

        return $qry->get();
    }

    /**
     * @param bool $withDisabled
     *
     * @return \Koolbeans\Product[]
     */
    public function drinks($withDisabled = false)
    {
        $qry = $this->model->whereType('drink');

        if ($withDisabled) $qry->withTrashed();

        return $qry->get();
    }

    /**
     * @return \Koolbeans\Product
     */
    public function newInstance()
    {
        return $this->model->newInstance();
    }

    /**
     * @param \Illuminate\Http\Request $input
     *
     * @return \Koolbeans\Product
     */
    public function create(Request $input)
    {
        $product = $this->model->create($input->only('name', 'type'));

        foreach ($input->get('product_type') as $name => $_i) {
            $product->types()->attach($this->types->whereName($name)->first()->id);
        }

        return $product;
    }

    /**
     * @param int $id
     *
     * @return \Koolbeans\Product
     * @throws \Exception
     */
    public function disable($id)
    {
        $product = $this->model->find($id);

        $product->delete();

        return $product;
    }

    /**
     * @param int $id
     *
     * @return \Koolbeans\Product
     */
    public function enable($id)
    {
        $product = $this->model->onlyTrashed()->find($id);

        $product->restore();

        return $product;
    }}
