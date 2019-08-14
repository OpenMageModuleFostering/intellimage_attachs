<?php
/**
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 *
 * @package     Intellimage_Attachs
 * @email		mauricioprado00@gmail.com
 * @copyright   Copyright (c) 2011 Hugo Mauricio Prado Macat. 
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Intellimage_Attachs_Model_Product_Type{
	private $_downloadable_type = null;
	private $_typeInstance;
	public function __construct($_typeInstance){
		//$args = func_get_args();
		//var_dump(count($args),get_class($args[0]), $args[0] instanceof Mage_Catalog_Model_Product_Type);
		//die(__FILE__.__LINE__);
		
		$this->_typeInstance = $_typeInstance;
	}
	private function castToDownloadable($product = null){
		if(!isset($this->_downloadable_type)){
			$this->_downloadable_type = Mage::getModel('downloadable/product_type');
			$this->_downloadable_type->setProduct($product);
		}
		return $this->_downloadable_type;
	}
    public function save($product = null)
    {
        //parent::save($product);
        $this->_typeInstance->save($product);
        $downloadable = $this->castToDownloadable($product);
        $downloadable->save($product);
    }
    public function getSamples($product = null){
		$downloadable = $this->castToDownloadable($product);
		return call_user_func_array(array($downloadable, 'getSamples'), array($product));
	}
    public function hasSamples($product = null){
		$downloadable = $this->castToDownloadable($product);
		return call_user_func_array(array($downloadable, 'hasSamples'), array($product));
	}

//    /**
//     * Set/Get attribute wrapper
//     *
//     * @param   string $method
//     * @param   array $args
//     * @return  mixed
//     */
    public function __call($method, $args)
    {
    	return call_user_func_array(array($this->_typeInstance, $method), $args);
//		$first = isset($args[0])?$args[0]:null;
//		$product = isset($first)&&is_a($first, 'Mage_Catalog_Model_Product')?$first:null;
//		
//		if(isset($product)&&method_exists($this->castToDownloadable($product), $method)){
//			$downloadable = $this->castToDownloadable($product);
//			return call_user_func_array(array($downloadable, $method), $args);
//		}
//        throw new Varien_Exception("Método inexistente ".get_class($this)."::".$method."(".print_r($args,1).")");
    }
}
?>