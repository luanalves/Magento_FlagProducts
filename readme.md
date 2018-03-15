# KASTERWEB Products Flag for Magento 1
Module developed to add images as product flags.
This module does not contemplate customizing the front end.

## Example of use
```sh
<?php
    $url = '';
    if ($_product->getKasterwebFlag()) {
        if ($data = Mage::helper('kasterweb_flagproducts')->getPathFlagById($_product->getKasterwebFlag())) {
            echo "<img src='".Mage::getBaseUrl('media') .$data->getPathFlag()."' alt='".$_product->getName()."' title='".$_product->getName()."' />";
        }
    }
?>
```
