<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

use App\Repository\ColorRepository;
use App\Repository\LogoRepository;

class BasketProduct 
{

    private $product_type;
    private $gender_id;
    private $color_id;
    private $logo_id;
    private $size_id;
    private $quantity;
    private $price_unit_ht;
    private $price_unit_ttc;
    private $promo_unit_ht;

    private $gender_name;
    private $color_name;
    private $logo_name;

    public function __construct() {
    }

    public function getId()
    {
        return  $this->product_type;
                $this->gender_id;
                $this->color_id;
                $this->logo_id;
                $this->size_id;
                $this->quantity;
                $this->price_unit_ttc;
    }


    /**
     * Get the value of product
     */ 
    public function getProductType()
    {
        return $this->product_type;
    }

    /**
     * Set the value of product
     *
     * @return  self
     */ 
    public function setProductType($product_type)
    {
        $this->product_type = $product_type;

        return $this;
    }

    /**
     * Get the value of gender
     */ 
    public function getGenderId()
    {
    return $this->gender_id;
    }

    /**
     * Set the value of gender
     *
     * @return  self
     */ 
    public function setGenderId($gender_id)
    {
        $this->gender_id = $gender_id;

        return $this;
    }
    
    /**
     * Get the value of color_id
     */ 
    public function getColorId()
    {
        return $this->color_id;
    }

    /**
     * Set the value of color_id
     *
     * @return  self
     */ 
    public function setColorId($color_id)
    {
        $this->color_id = $color_id;

        return $this;
    }

    /**
     * Get the value of logo
     */ 
    public function getLogoId()
    {
        return $this->logo_id;
    }

    /**
     * Set the value of logo
     *
     * @return  self
     */ 
    public function setLogoId($logo_id)
    {
        $this->logo_id = $logo_id;

        return $this;
    }

    /**
     * Get the value of size
     */ 
    public function getSizeId()
    {
        return $this->size_id;
    }

    /**
     * Set the value of size
     *
     * @return  self
     */ 
    public function setSizeId($size_id)
    {
        $this->size_id = $size_id;

        return $this;
    }

    /**
     * Get the value of quantity
     */ 
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */ 
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get the value of price unint HT
     */ 
    public function getPriceUnitHt()
    {
        return $this->price_unit_ht;
    }

    /**
     * Set the value of price unit HT
     *
     * @return  self
     */ 
    public function setPriceUnitHt($price_unit_ht)
    {
        $this->price_unit_ht = $price_unit_ht;

        return $this;
    }

    /**
     * Get the value of promo price unit HT
     */ 
    public function getPromoUnitHt()
    {
        return $this->promo_unit_ht;
    }

    /**
     * Set the value of promo price unit HT
     *
     * @return  self
     */ 
    public function setPromoUnitHt($promo_unit_ht)
    {
        $this->promo_unit_ht = $promo_unit_ht;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPriceUnitTtc()
    {
        return $this->price_unit_ttc;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPriceUnitTtc($price_unit_ttc)
    {
        $this->price_unit_ttc = $price_unit_ttc;

        return $this;
    }


    /**
     * Get the name of logo
     *
     * @return  self
     */ 
    public function getLogoName()
    {
        $logoRepository = new LogoRepository();
        return $logoRepository->findById( $this->getLogoId() );
    }


    
}