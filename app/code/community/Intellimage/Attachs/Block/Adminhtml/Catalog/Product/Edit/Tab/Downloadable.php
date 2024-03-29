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

class Intellimage_Attachs_Block_Adminhtml_Catalog_Product_Edit_Tab_Downloadable
extends Mage_Downloadable_Block_Adminhtml_Catalog_Product_Edit_Tab_Downloadable
{
    /**
     * Get tab label
     *
     * @return string
     */
    public function getTabLabel()
    {
        return Mage::helper('downloadable')->__('File Attachments');
    }

    /**
     * Get tab title
     *
     * @return string
     */
    public function getTabTitle()
    {
        return Mage::helper('downloadable')->__('File Attachments');
    }
    /**
     * Render block HTML
     *
     * @return string
     */
    protected function _toHtml()
    {
        $accordion = $this->getLayout()->createBlock('adminhtml/widget_accordion')
            ->setId('downloadableInfo');

        $accordion->addItem('samples', array(
            'title'   => Mage::helper('adminhtml')->__('Attachs'),
            'content' => $this->getLayout()
                ->createBlock('downloadable/adminhtml_catalog_product_edit_tab_downloadable_samples')->toHtml(),
            'open'    => true,
        ));

//        $accordion->addItem('links', array(
//            'title'   => Mage::helper('adminhtml')->__('Links'),
//            'content' => $this->getLayout()->createBlock(
//                'downloadable/adminhtml_catalog_product_edit_tab_downloadable_links',
//                'catalog.product.edit.tab.downloadable.links')->toHtml(),
//            'open'    => true,
//        ));

        $this->setChild('accordion', $accordion);
		return Mage_Adminhtml_Block_Widget::_toHtml();
//    	parent::_toHtml();
    }

}
