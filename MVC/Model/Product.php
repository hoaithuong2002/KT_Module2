<?php


class Product
{
    protected $id;
    protected $name;
    protected $category;
    protected $price;
    protected $amount;
    protected $date;
    protected $description;

    /**
     * Product constructor.
     * @param $id
     * @param $name
     * @param $category
     * @param $price
     * @param $amount
     * @param $date
     * @param $description
     */
    public function __construct($id, $name, $category, $price, $amount, $date, $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->category = $category;
        $this->price = $price;
        $this->amount = $amount;
        $this->date = $date;
        $this->description = $description;
    }
}