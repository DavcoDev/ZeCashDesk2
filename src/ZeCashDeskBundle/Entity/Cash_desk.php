<?php

namespace ZeCashDeskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cash_desk
 *
 * @ORM\Table(name="cash_desk")
 * @ORM\Entity(repositoryClass="ZeCashDeskBundle\Repository\Cash_deskRepository")
 */
class Cash_desk
{
    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     */
     private $user;

    /**
     * @ORM\OneToOne(targetEntity="ZeCashDeskBundle\Entity\Tickets")
     */
    private $ticket;

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
     * @ORM\Column(name="date_heure", type="datetime", options={"default":0})
     */
    private $dateHeure;

    /**
     * @var float
     *
     * @ORM\Column(name="especes", type="float", options={"default":0})
     */
    private $especes;

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
     * @var int
     *
     * @ORM\Column(name="type_transaction", type="smallint")
     */
    private $typeTransaction;


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
     * @return \DateTime
     */
    public function getDateHeure()
    {
        return $this->dateHeure;
    }

    /**
     * @param \DateTime $dateHeure
     *
     * @return Cash_desk
     */
    public function setDateHeure($dateHeure)
    {
        $this->dateHeure = $dateHeure;

        return $this;
    }

    /**
     * Set cash
     *
     * @return Cash_desk
     */
    public function setEspeces($especes)
    {
        $this->especes = $especes;

        return $this;
    }

    /**
     * Get cashMvt
     *
     * @return float
     */
    public function getEspeces()
    {
        return $this->especes;
    }

    /**
     * Set chequeMvt
     *
     * @param float $chequeMvt
     *
     * @return Cash_desk
     */
    public function setCheque($cheque)
    {
        $this->cheque = $cheque;

        return $this;
    }

    /**
     * Get chequeMvt
     *
     * @return float
     */
    public function getCheque()
    {
        return $this->cheque;
    }

    /**
     * Set cbMvt
     *
     * @param float $cbMvt
     *
     * @return Cash_desk
     */
    public function setCb($cb)
    {
        $this->cb = $cb;

        return $this;
    }

    /**
     * Get cbMvt
     *
     * @return float
     */
    public function getCb()
    {
        return $this->cb;
    }

    /**
     * Set typeMvt
     *
     * @param integer $typeMvt
     *
     * @return Cash_desk
     */
    public function setTypeTransaction($typeTransaction)
    {
        $this->typeTransaction = $typeTransaction;

        return $this;
    }

    /**
     * Get typeMvt
     *
     * @return int
     */
    public function getTypeTransaction()
    {
        return $this->typeTransaction;
    }

    /**
     * @return \UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param \UserBundle\Entity\User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return \ZeCashDeskBundle\Entity\Tickets
     */
    public function getTicket()
    {
        return $this->ticket;
    }

    /**
     * @param \ZeCashDeskBundle\Entity\Tickets $ticket
     */
    public function setTicket($ticket)
    {
        $this->ticket = $ticket;
    }
}

