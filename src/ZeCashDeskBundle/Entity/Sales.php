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
     * @ORM\ManyToOne(targetEntity="ZeCashDeskBundle\Entity\Items")
     */
    private $items;

    /**
     * @ORM\ManyToOne(targetEntity="ZeCashDeskBundle\Entity\Tickets")
     */
    private $tickets;

//    /**
//     * @ORM\ManyToOne(targetEntity="ZeCashDeskBundle\Entity\Cash_desk")
//     */
//    private $cashdesk;


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

    /**
     * @return \ZeCashDeskBundle\Entity\Tickets
     */
    public function getTickets()
    {
        return $this->tickets;
    }

    /**
     * @param \ZeCashDeskBundle\Entity\Tickets $tickets
     */
    public function setTickets($tickets)
    {
        $this->tickets = $tickets;
    }

    /**
     * @return \ZeCashDeskBundle\Entity\Items
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param \ZeCashDeskBundle\Entity\Items $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * @return \ZeCashDeskBundle\Entity\Cash_desk
     */
    public function getCashdesk()
    {
        return $this->cashdesk;
    }

    /**
     * @param \ZeCashDeskBundle\Entity\Cash_desk $cashdesk
     */
    public function setCashdsk($cashdesk)
    {
        $this->cashdesk = $cashdesk;
    }




}

