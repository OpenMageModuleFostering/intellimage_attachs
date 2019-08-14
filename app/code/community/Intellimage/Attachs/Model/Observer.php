<?php
class Intellimage_Attachs_Model_Observer
{
    /**
     * Prepare product to allow samples
     *
     * @param   Varien_Object $observer
     * @return  Mage_Downloadable_Model_Observer
     */
    public function prepareProduct($observer)
    {
        $request = $observer->getEvent()->getRequest();
        $product = $observer->getEvent()->getProduct();
		$typeInstance = $product->getTypeInstance(true);
		$product->setTypeInstance(Mage::getModel('attachs/product_type', $typeInstance), true);
        return $this;
    }

    /**
     * Prepare product to save
     *
     * @param   Varien_Object $observer
     * @return  Mage_Downloadable_Model_Observer
     */
    public function prepareProductSave($observer)
    {
        $this->prepareProduct($observer);
//        $request = $observer->getEvent()->getRequest();
//        $product = $observer->getEvent()->getProduct();
//
//        if ($downloadable = $request->getPost('configurable')) {
//            $product->setDownloadableData($downloadable);
//        }
        return $this;
    }
}
