<?php

namespace App\Entity;

use App\Repository\ProduitsRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Vich\UploaderBundle\Mapping\Annotation as Vich;



/**
 * @ORM\Entity(repositoryClass=ProduitsRepository::class)
 * @Vich\Uploadable
 */
class Produits
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $libel;

    /**
     * @ORM\Column(type="string", length=50)
     * @Gedmo\Slug(fields={"libel"})
     */
    private $slug;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix;

    /**
     * @ORM\Column(type="boolean")
     */
    private $etat;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite;

    /**
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="text")
     */
    private $contenu;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $couleur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $featuredImage;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="featuredImage")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\ManyToOne(targetEntity=SousCategories::class, inversedBy="produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sousCategorie;

    /**
     * @ORM\ManyToOne(targetEntity=Marques::class, inversedBy="produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $marque;

    /**
     * @ORM\ManyToOne(targetEntity=Processeur::class, inversedBy="produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $processeur;

    /**
     * @ORM\ManyToOne(targetEntity=CarteGraphique::class, inversedBy="produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $carteGraphique;

    /**
     * @ORM\ManyToOne(targetEntity=DisqueDur::class, inversedBy="produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $disqueDur;

    /**
     * @ORM\ManyToOne(targetEntity=Memoires::class, inversedBy="produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $memoire;

    /**
     * @ORM\ManyToOne(targetEntity=SystemeExploitation::class, inversedBy="produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $systemeExploitation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibel(): ?string
    {
        return $this->libel;
    }

    public function setLibel(string $libel): self
    {
        $this->libel = $libel;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getEtat(): ?bool
    {
        return $this->etat;
    }

    public function setEtat(bool $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getFeaturedImage(): ?string
    {
        return $this->featuredImage;
    }

    public function setFeaturedImage(string $featuredImage): self
    {
        $this->featuredImage = $featuredImage;

        return $this;
    }

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function getSousCategorie(): ?SousCategories
    {
        return $this->sousCategorie;
    }

    public function setSousCategorie(?SousCategories $sousCategorie): self
    {
        $this->sousCategorie = $sousCategorie;

        return $this;
    }

    public function getMarque(): ?Marques
    {
        return $this->marque;
    }

    public function setMarque(?Marques $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getProcesseur(): ?Processeur
    {
        return $this->processeur;
    }

    public function setProcesseur(?Processeur $processeur): self
    {
        $this->processeur = $processeur;

        return $this;
    }

    public function getCarteGraphique(): ?CarteGraphique
    {
        return $this->carteGraphique;
    }

    public function setCarteGraphique(?CarteGraphique $carteGraphique): self
    {
        $this->carteGraphique = $carteGraphique;

        return $this;
    }

    public function getDisqueDur(): ?DisqueDur
    {
        return $this->disqueDur;
    }

    public function setDisqueDur(?DisqueDur $disqueDur): self
    {
        $this->disqueDur = $disqueDur;

        return $this;
    }

    public function getMemoire(): ?Memoires
    {
        return $this->memoire;
    }

    public function setMemoire(?Memoires $memoire): self
    {
        $this->memoire = $memoire;

        return $this;
    }

    public function getSystemeExploitation(): ?SystemeExploitation
    {
        return $this->systemeExploitation;
    }

    public function setSystemeExploitation(?SystemeExploitation $systemeExploitation): self
    {
        $this->systemeExploitation = $systemeExploitation;

        return $this;
    }
}
