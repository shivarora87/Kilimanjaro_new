<?php
namespace FedEx\ShipService\ComplexType;

/**
 * Documents the kind and quantity of an individual hazardous commodity in a package.
 *
 * @version     $Revision$
 * @author      Jeremy Dunn (www.jsdunn.info)
 * @link        http://code.google.com/p/php-fedex-api-wrapper/
 * @package     PHP FedEx API wrapper
 * @subpackage  Ship Service
 */
class ValidatedHazardousCommodityContent
    extends AbstractComplexType
{
    protected $_name = 'ValidatedHazardousCommodityContent';

    /**
     * Identifies and describes an individual hazardous commodity.
     *
     * @param ValidatedHazardousCommodityDescription $Description
     * return ValidatedHazardousCommodityContent
     */
    public function setDescription(ValidatedHazardousCommodityDescription $description)
    {
        $this->Description = $description;
        return $this;
    }
    
    /**
     * Specifies the amount of the commodity in alternate units.
     *
     * @param HazardousCommodityQuantityDetail $Quantity
     * return ValidatedHazardousCommodityContent
     */
    public function setQuantity(HazardousCommodityQuantityDetail $quantity)
    {
        $this->Quantity = $quantity;
        return $this;
    }
    
    /**
     * Customer-provided specifications for handling individual commodities.
     *
     * @param HazardousCommodityOptionDetail $Options
     * return ValidatedHazardousCommodityContent
     */
    public function setOptions(HazardousCommodityOptionDetail $options)
    {
        $this->Options = $options;
        return $this;
    }
    

    
}