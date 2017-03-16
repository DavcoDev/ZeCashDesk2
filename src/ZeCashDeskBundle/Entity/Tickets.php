<?php

namespace ZeCashDeskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tickets
 *
 * @ORM\Table(name="tickets")
 * @ORM\Entity(repositoryClass="ZeCashDeskBundle\Repository\TicketsRepository")
 */
class Tickets
{
    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     */
    private $users;


    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_time", type="datetime")
     */
    private $dateTime;

    /**
     * @var float
     *
     * @ORM\Column(name="total", type="float")
     */
    private $total;

    /**
     * @var float
     *
     * @ORM\Column(name="cash", type="float", options={"default":0})
     */
    private $cash;

    /**
     * @var float
     *
     * @ORM\Column(name="cheque", type="float", options={"default":0})
     */
    private $cheque;

    /**
     * @var float
     *
     * @ORM\Column(name="cb", type="float", options={"default":0})
     */
    private $cb;


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
     * Set dateTime
     *
     * @param \DateTime $dateTime
     *
     * @return Tickets
     */
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;

        return $this;
    }

    /**
     * Get dateTime
     *
     * @return \DateTime
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * Set total
     *
     * @param float $total
     *
     * @return Tickets
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return float
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set cash
     *
     * @param float $cash
     *
     * @return Tickets
     */
    public function setCash($cash)
    {
        $this->cash = $cash;

        return $this;
    }

    /**
     * Get cash
     *
     * @return float
     */
    public function getCash()
    {
        return $this->cash;
    }

    /**
     * Set cheque
     *
     * @param float $cheque
     *
     * @return Tickets
     */
    public function setCheque($cheque)
    {
        $this->cheque = $cheque;

        return $this;
    }

    /**
     * Get cheque
     *
     * @return float
     */
    public function getCheque()
    {
        return $this->cheque;
    }

    /**
     * Set cb
     *
     * @param float $cb
     *
     * @return Tickets
     */
    public function setCb($cb)
    {
        $this->cb = $cb;

        return $this;
    }

    /**
     * Get cb
     *
     * @return float
     */
    public function getCb()
    {
        return $this->cb;
    }

    /**
     * @return \UserBundle\Entity\User
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param \UserBundle\Entity\User $users
     */
    public function setUsers($users)
    {
        $this->users = $users;
    }


}

