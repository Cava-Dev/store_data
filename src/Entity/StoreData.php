<?php

namespace App\Entity;

use App\Repository\StoreDataRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StoreDataRepository::class)
 */
class StoreData
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $qta;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $amount;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $total_amount;

    /**
     * @ORM\ManyToOne(targetEntity=Store::class, inversedBy="storeData")
     */
    private $store_f;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getQta(): ?int
    {
        return $this->qta;
    }

    public function setQta(?int $qta): self
    {
        $this->qta = $qta;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(?int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getTotalAmount(): ?int
    {
        return $this->total_amount;
    }

    public function setTotalAmount(?int $total_amount): self
    {
        $this->total_amount = $total_amount;

        return $this;
    }

    public function getStoreF(): ?Store
    {
        return $this->store_f;
    }

    public function setStoreF(?Store $store_f): self
    {
        $this->store_f = $store_f;

        return $this;
    }
}
