<?php

namespace ZeCashDeskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sales
 *
 * @ORM\Table(name="sales")
 * @ORM\Entity(repositoryClass="ZeCashDeskBundle\Repository\SalesRepository")
 */
class Sales
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="sales_qty", type="integer")
     */
    private $salesQty;


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
     * Set salesQty
     *
     * @param integer $salesQty
     *
     * @return Sales
     */
    public function setSalesQty($salesQty)
    {
        $this->salesQty = $salesQty;

        return $this;
    }

    /**
     * Get salesQty
     *
     * @return int
     */
    public function getSalesQty()
    {
        return $this->salesQty;
    }
}

