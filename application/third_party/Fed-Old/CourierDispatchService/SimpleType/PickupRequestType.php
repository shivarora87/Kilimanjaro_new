<?php
namespace FedEx\CourierDispatchService\SimpleType;

/**
 * Describes the relationship between the date on which a dispatch occurs and the date on which it is created (scheduled)
						by means of a CourierDispatchRequest. FUTURE_DAY means that the dispatch date is later than the date on which it is created.
						SAME_DAY means that the dispatch is to occur on the date on which it is created.
					
 *
 * @version     $Revision$
 * @author      Jeremy Dunn (www.jsdunn.info)
 * @link        http://code.google.com/p/php-fedex-api-wrapper/
 * @package     PHP FedEx API wrapper
 * @subpackage  Courier Dispatch Service
 */
class PickupRequestType
    extends AbstractSimpleType
{
    const _FUTURE_DAY = 'FUTURE_DAY';
    const _SAME_DAY = 'SAME_DAY';
}