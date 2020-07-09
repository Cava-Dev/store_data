<?php

namespace App\Entity;

use App\Repository\StoreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StoreRepository::class)
 */
class Store
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
    private $name_invoice;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $client_id;

    /**
     * @ORM\OneToMany(targetEntity=StoreData::class, mappedBy="store_f")
     */
    private $storeData;

    public function __construct()
    {
        $this->storeData = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameInvoice(): ?string
    {
        return $this->name_invoice;
    }

    public function setNameInvoice(?string $name_invoice): self
    {
        $this->name_invoice = $name_invoice;

        return $this;
    }

    public function getClientId(): ?int
    {
        return $this->client_id;
    }

    public function setClientId(?int $client_id): self
    {
        $this->client_id = $client_id;

        return $this;
    }

    /**
     * @return Collection|StoreData[]
     */
    public function getStoreData(): Collection
    {
        return $this->storeData;
    }

    public function addStoreData(StoreData $storeData): self
    {
        if (!$this->storeData->contains($storeData)) {
            $this->storeData[] = $storeData;
            $storeData->setStoreF($this);
        }

        return $this;
    }

    public function removeStoreData(StoreData $storeData): self
    {
        if ($this->storeData->contains($storeData)) {
            $this->storeData->removeElement($storeData);
            // set the owning side to null (unless already changed)
            if ($storeData->getStoreF() === $this) {
                $storeData->setStoreF(null);
            }
        }

        return $this;
    }
}
