<?php
/**
 * @package CPMDB
 * @subpackage Ateliers 
 */
 
declare(strict_types=1);

namespace CPMD\Mods\Ateliers;

use AppUtils\Collections\BaseStringPrimaryCollection;
use CPMDB\Mods\Ateliers\AtelierInterface;
use CPMDB\Mods\Collection\ModCollection;
use CPMDB\Mods\Ateliers\Atelier\AdshieldAtelierStore;
use CPMDB\Mods\Ateliers\Atelier\AlvarixCustomStore;
use CPMDB\Mods\Ateliers\Atelier\AtelierForFlashPosers;
use CPMDB\Mods\Ateliers\Atelier\BreezysClothingEmporiumAtelier;
use CPMDB\Mods\Ateliers\Atelier\ComplecteddNecklaceAtelier;
use CPMDB\Mods\Ateliers\Atelier\CubAtelierStore;
use CPMDB\Mods\Ateliers\Atelier\CubsClosetAtelier;
use CPMDB\Mods\Ateliers\Atelier\CyberblingJewellersAtelier;
use CPMDB\Mods\Ateliers\Atelier\DbrvAndCoVirtualStore;
use CPMDB\Mods\Ateliers\Atelier\DiscosStore;
use CPMDB\Mods\Ateliers\Atelier\DustyVirtualAtelier;
use CPMDB\Mods\Ateliers\Atelier\FlowerShopAtelier;
use CPMDB\Mods\Ateliers\Atelier\HystAtelierStore;
use CPMDB\Mods\Ateliers\Atelier\KmkcsVirtualAtelier;
use CPMDB\Mods\Ateliers\Atelier\KweksFamilyJewelsAtelier;
use CPMDB\Mods\Ateliers\Atelier\KweksSartorialOmnibusShopAtelier;
use CPMDB\Mods\Ateliers\Atelier\MayoVirtualAtelier;
use CPMDB\Mods\Ateliers\Atelier\MonsterRaiderAtelierStore;
use CPMDB\Mods\Ateliers\Atelier\NcFashionAtelier;
use CPMDB\Mods\Ateliers\Atelier\NemiesClosetAtelier;
use CPMDB\Mods\Ateliers\Atelier\NeuromanceAtelier;
use CPMDB\Mods\Ateliers\Atelier\NolaDreamerAndAquelyrasAtelier;
use CPMDB\Mods\Ateliers\Atelier\NolaDreamerBoutiqueAtelier;
use CPMDB\Mods\Ateliers\Atelier\NolaAndVeegeeFeminineStore;
use CPMDB\Mods\Ateliers\Atelier\PeachuAndHystAtelierStore;
use CPMDB\Mods\Ateliers\Atelier\PeachuAtelierStore;
use CPMDB\Mods\Ateliers\Atelier\RaemsAtelierStore;
use CPMDB\Mods\Ateliers\Atelier\RosasShopAtelier;
use CPMDB\Mods\Ateliers\Atelier\SevenVirtualAtelierStore;
use CPMDB\Mods\Ateliers\Atelier\SeawrightOptometryShopAtelier;
use CPMDB\Mods\Ateliers\Atelier\SubleaderVirtualAtelier;
use CPMDB\Mods\Ateliers\Atelier\SumistyleCorporateAtelier;
use CPMDB\Mods\Ateliers\Atelier\TheBeanCupAtelier;
use CPMDB\Mods\Ateliers\Atelier\TheRaccoonDumpsterAtelier;
use CPMDB\Mods\Ateliers\Atelier\TheRaccoonDumpster2Atelier;
use CPMDB\Mods\Ateliers\Atelier\TlsAndMayoVirtualAtelier;
use CPMDB\Mods\Ateliers\Atelier\TottesAtelier;
use CPMDB\Mods\Ateliers\Atelier\VeegeeJewelryShopAtelier;
use CPMDB\Mods\Ateliers\Atelier\VeegeeShopAtelier;
use CPMDB\Mods\Ateliers\Atelier\VeegeeShop2Atelier;
use CPMDB\Mods\Ateliers\Atelier\ViktorVektorStore;
use CPMDB\Mods\Ateliers\Atelier\VoidwearVirtualAtelier;
use CPMDB\Mods\Ateliers\Atelier\WolfdenVirtualAtelierStore;
use CPMDB\Mods\Ateliers\Atelier\YevgeniysSecondHandAtelier;
use CPMDB\Mods\Ateliers\Atelier\ZenitexAtelier;

/**
 * Atelier collection class: Access all available atelier mods.
 * 
 * @package CPMDB
 * @subpackage Ateliers
 * @auto-generated See {@see generateAtelierCollectionClass()}
 *
 * @method AtelierInterface getByID(string $id)
 * @method AtelierInterface[] getAll()
 * @method AtelierInterface getDefault() 
 */
class AtelierCollection extends BaseStringPrimaryCollection
{
    private ModCollection $collection;

    public function __construct(ModCollection $collection)
    {
        $this->collection = $collection;
    }
    
    /**
     * @return ModCollection
     */
    public  function getModCollection(): ModCollection
    {
        return $this->collection;
    }

    public function getDefaultID(): string
    {
        return NcFashionAtelier::ATELIER_ID;
    }

    protected function registerItems(): void
    {
        $this->registerItem(new AdshieldAtelierStore($this));
        $this->registerItem(new AlvarixCustomStore($this));
        $this->registerItem(new AtelierForFlashPosers($this));
        $this->registerItem(new BreezysClothingEmporiumAtelier($this));
        $this->registerItem(new ComplecteddNecklaceAtelier($this));
        $this->registerItem(new CubAtelierStore($this));
        $this->registerItem(new CubsClosetAtelier($this));
        $this->registerItem(new CyberblingJewellersAtelier($this));
        $this->registerItem(new DbrvAndCoVirtualStore($this));
        $this->registerItem(new DiscosStore($this));
        $this->registerItem(new DustyVirtualAtelier($this));
        $this->registerItem(new FlowerShopAtelier($this));
        $this->registerItem(new HystAtelierStore($this));
        $this->registerItem(new KmkcsVirtualAtelier($this));
        $this->registerItem(new KweksFamilyJewelsAtelier($this));
        $this->registerItem(new KweksSartorialOmnibusShopAtelier($this));
        $this->registerItem(new MayoVirtualAtelier($this));
        $this->registerItem(new MonsterRaiderAtelierStore($this));
        $this->registerItem(new NcFashionAtelier($this));
        $this->registerItem(new NemiesClosetAtelier($this));
        $this->registerItem(new NeuromanceAtelier($this));
        $this->registerItem(new NolaDreamerAndAquelyrasAtelier($this));
        $this->registerItem(new NolaDreamerBoutiqueAtelier($this));
        $this->registerItem(new NolaAndVeegeeFeminineStore($this));
        $this->registerItem(new PeachuAndHystAtelierStore($this));
        $this->registerItem(new PeachuAtelierStore($this));
        $this->registerItem(new RaemsAtelierStore($this));
        $this->registerItem(new RosasShopAtelier($this));
        $this->registerItem(new SevenVirtualAtelierStore($this));
        $this->registerItem(new SeawrightOptometryShopAtelier($this));
        $this->registerItem(new SubleaderVirtualAtelier($this));
        $this->registerItem(new SumistyleCorporateAtelier($this));
        $this->registerItem(new TheBeanCupAtelier($this));
        $this->registerItem(new TheRaccoonDumpsterAtelier($this));
        $this->registerItem(new TheRaccoonDumpster2Atelier($this));
        $this->registerItem(new TlsAndMayoVirtualAtelier($this));
        $this->registerItem(new TottesAtelier($this));
        $this->registerItem(new VeegeeJewelryShopAtelier($this));
        $this->registerItem(new VeegeeShopAtelier($this));
        $this->registerItem(new VeegeeShop2Atelier($this));
        $this->registerItem(new ViktorVektorStore($this));
        $this->registerItem(new VoidwearVirtualAtelier($this));
        $this->registerItem(new WolfdenVirtualAtelierStore($this));
        $this->registerItem(new YevgeniysSecondHandAtelier($this));
        $this->registerItem(new ZenitexAtelier($this));    

        uasort($this->items, static function (AtelierInterface $a, AtelierInterface $b) : int {
            return strnatcasecmp($a->getName(), $b->getName());
        });
    }
    
    public function getByURL(string $url) : ?AtelierInterface
    {
        foreach($this->getAll() as $atelier) {
            if($atelier->getURL() === $url) {
                return $atelier;
            }
        }
        
        return null;
    }
}
