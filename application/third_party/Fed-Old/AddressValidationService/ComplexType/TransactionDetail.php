<?php
namespace FedEx\AddressValidationService\ComplexType;

/**
 * Descriptive data for this customer transaction. The TransactionDetail from the request is echoed back to the caller in the corresponding reply.
 *
 * @version     $Revision$
 * @author      Jeremy Dunn (www.jsdunn.info)
 * @link        http://code.google.com/p/php-fedex-api-wrapper/
 * @package     PHP FedEx API wrapper
 * @subpackage  Address Validation Service
 */
class TransactionDetail
    extends AbstractComplexType
{
    protected $_name = 'TransactionDetail';

    /**
     * Identifies a customer-supplied unique identifier for this transaction. It is returned in the reply message to aid in matching requests to replies.
     *
     * @param string $CustomerTransactionId
     * return TransactionDetail
     */
    public function setCustomerTransactionId($customerTransactionId)
    {
        $this->CustomerTransactionId = $customerTransactionId;
        return $this;
    }
    
    /**
     * Governs any future language/translations applied to the data payload(contrasted with ClientDetail.localization, which governs Notification.localizedMessage language selection).
     *
     * @param Localization $Localization
     * return TransactionDetail
     */
    public function setLocalization(Localization $localization)
    {
        $this->Localization = $localization;
        return $this;
    }
    

    
}