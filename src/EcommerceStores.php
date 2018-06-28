<?php

namespace MailchimpAPI;

use MailchimpAPI\EcommerceStores\Carts;
use MailchimpAPI\EcommerceStores\Customers;
use MailchimpAPI\EcommerceStores\Orders;
use MailchimpAPI\EcommerceStores\Products;

/**
 * Class EcommerceStores
 * @package MailchimpAPI
 */
class EcommerceStores extends Mailchimp
{

    /**
     * @var
     */
    public $subclass_resource;

    /**
     * @var array
     */
    public $req_post_params = [
        'id',
        'list_id',
        'name',
        'currency_code'
    ];

    /**
     * @var Customers
     */
    public $customers;
    /**
     * @var Products
     */
    public $products;
    /**
     * @var Orders
     */
    public $orders;
    /**
     * @var Carts
     */
    public $carts;

    /**
     * EcommerceStores constructor.
     * @param $apikey
     * @param $class_input
     * @throws MailchimpException
     */
    public function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);

        if ($class_input) {
            $this->request->appendToEndpoint('/ecommerce/stores/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/ecommerce/stores/');
        }
        
        $this->subclass_resource = $class_input;
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    /**
     * @param null $class_input
     * @return Customers
     * @throws MailchimpException
     */
    public function customers($class_input = null)
    {
        $this->customers = new Customers(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->customers;
    }

    /**
     * @param null $class_input
     * @return Products
     * @throws MailchimpException
     */
    public function products($class_input = null)
    {
        $this->products = new Products(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->products;
    }

    /**
     * @param null $class_input
     * @return Orders
     * @throws MailchimpException
     */
    public function orders($class_input = null)
    {
        $this->orders = new Orders(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->orders;
    }

    /**
     * @param null $class_input
     * @return Carts
     * @throws MailchimpException
     */
    public function carts($class_input = null)
    {
        $this->carts = new Carts(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->carts;
    }
}