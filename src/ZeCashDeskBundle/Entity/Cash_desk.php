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
     * @ORM\Column(name="id_cash_desk", type="integer")
     */
    private $idCashDesk;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_time", type="datetime")
     */
    private $dateTime;

    /**
     * @var float
     *
     * @ORM\Column(name="cash_mvt", type="float")
     */
    private $cashMvt;

    /**
     * @var float
     *
     * @ORM\Column(name="cheque_mvt", type="float")
     */
    private $chequeMvt;

    /**
     * @var float
     *
     * @ORM\Column(name="cb_mvt", type="float")
     */
    private $cbMvt;

    /**
     * @var int
     *
     * @ORM\Column(name="type_mvt", type="smallint")
     */
    private $typeMvt;


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
     * Set idCashDesk
     *
     * @param integer $idCashDesk
     *
     * @return Cash_desk
     */
    public function setIdCashDesk($idCashDesk)
    {
        $this->idCashDesk = $idCashDesk;

        return $this;
    }

    /**
     * Get idCashDesk
     *
     * @return int
     */
    public function getIdCashDesk()
    {
        return $this->idCashDesk;
    }

    /**
     * Set dateTime
     *
     * @param \DateTime $dateTime
     *
     * @return Cash_desk
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
     * Set cashMvt
     *
     * @param float $cashMvt
     *
     * @return Cash_desk
     */
    public function setCashMvt($cashMvt)
    {
        $this->cashMvt = $cashMvt;

        return $this;
    }

    /**
     * Get cashMvt
     *
     * @return float
     */
    public function getCashMvt()
    {
        return $this->cashMvt;
    }

    /**
     * Set chequeMvt
     *
     * @param float $chequeMvt
     *
     * @return Cash_desk
     */
    public function setChequeMvt($chequeMvt)
    {
        $this->chequeMvt = $chequeMvt;

        return $this;
    }

    /**
     * Get chequeMvt
     *
     * @return float
     */
    public function getChequeMvt()
    {
        return $this->chequeMvt;
    }

    /**
     * Set cbMvt
     *
     * @param float $cbMvt
     *
     * @return Cash_desk
     */
    public function setCbMvt($cbMvt)
    {
        $this->cbMvt = $cbMvt;

        return $this;
    }

    /**
     * Get cbMvt
     *
     * @return float
     */
    public function getCbMvt()
    {
        return $this->cbMvt;
    }

    /**
     * Set typeMvt
     *
     * @param integer $typeMvt
     *
     * @return Cash_desk
     */
    public function setTypeMvt($typeMvt)
    {
        $this->typeMvt = $typeMvt;

        return $this;
    }

    /**
     * Get typeMvt
     *
     * @return int
     */
    public function getTypeMvt()
    {
        return $this->typeMvt;
    }
}

