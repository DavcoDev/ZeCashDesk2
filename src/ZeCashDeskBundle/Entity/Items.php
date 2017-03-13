<?php

namespace ZeCashDeskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Items
 *
 * @ORM\Table(name="items")
 * @ORM\Entity(repositoryClass="ZeCashDeskBundle\Repository\ItemsRepository")
 */
class Items
{
    /**
     * @ORM\OneToOne(targetEntity="Sales", mappedBy="Sales")
     */
    private $sales;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @var string
     *
     * @ORM\Column(name="name_item", type="string", length=255)
     */
    private $nameItem;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255)
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable="true")
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="tva", type="float")
     */
    private $tva;

    /**
     * @var float
     *
     * @ORM\Column(name="sell_price", type="float")
     */
    private $sellPrice;

    /**
     * @var float
     *
     * @ORM\Column(name="buy_price", type="float")
     */
    private $buyPrice;

    /**
     * @var int
     *
     * @ORM\Column(name="item_qty", type="integer")
     */
    private $itemQty;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nameItem
     *
     * @param string $nameItem
     *
     * @return Items
     */
    public function setNameItem($nameItem)
    {
        $this->nameItem = $nameItem;

        return $this;
    }

    /**
     * Get nameItem
     *
     * @return string
     */
    public function getNameItem()
    {
        return $this->nameItem;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return Items
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Items
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set tva
     *
     * @param float $tva
     *
     * @return Items
     */
    public function setTva($tva)
    {
        $this->tva = $tva;

        return $this;
    }

    /**
     * Get tva
     *
     * @return float
     */
    public function getTva()
    {
        return $this->tva;
    }

    /**
     * Set sellPrice
     *
     * @param float $sellPrice
     *
     * @return Items
     */
    public function setSellPrice($sellPrice)
    {
        $this->sellPrice = $sellPrice;

        return $this;
    }

    /**
     * Get sellPrice
     *
     * @return float
     */
    public function getSellPrice()
    {
        return $this->sellPrice;
    }

    /**
     * Set buyPrice
     *
     * @param float $buyPrice
     *
     * @return Items
     */
    public function setBuyPrice($buyPrice)
    {
        $this->buyPrice = $buyPrice;

        return $this;
    }

    /**
     * Get buyPrice
     *
     * @return float
     */
    public function getBuyPrice()
    {
        return $this->buyPrice;
    }

    /**
     * Set itemQty
     *
     * @param integer $itemQty
     *
     * @return Items
     */
    public function setItemQty($itemQty)
    {
        $this->itemQty = $itemQty;

        return $this;
    }

    /**
     * Get itemQty
     *
     * @return int
     */
    public function getItemQty()
    {
        return $this->itemQty;
    }
}

