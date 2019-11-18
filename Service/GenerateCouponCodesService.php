<?php
/* File: app/code/Coupon/Target/Service/GenerateCouponCodesService.php */
namespace Coupon\Target\Service;
use Magento\SalesRule\Model\CouponGenerator;
/**
 * Class GenerateCouponListService
 */
class GenerateCouponCodesService
{
    /**
     * Coupon Generator
     *
     * @var CouponGenerator
     */
    protected $couponGenerator;
    /**
     * GenerateCouponCodesService constructor
     *
     * @param CouponGenerator $couponGenerator
     */

    public function __construct(CouponGenerator $couponGenerator)
    {
        $this->couponGenerator = $couponGenerator;
    }
    /**
     * Generate coupon list for specified cart price rule
     *
     * @param int|null $ruleId
     * @param array $params
     *
     * @return void
     */
    public function execute(int $ruleId, array $params = []): void
    {
        if (!$ruleId) {
            return;
        }
        $params['rule_id'] = $ruleId;
        $params['qty'] = 1;
        $this->couponGenerator->generateCodes($params);
    }
}