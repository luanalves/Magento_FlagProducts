<?php

class Kasterweb_FlagProducts_Adminhtml_FlagsController extends Mage_Adminhtml_Controller_Action
{
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('kasterweb/kasterweb_flagproducts');
    }

    protected function _initAction()
    {
        $this->loadLayout()->_setActiveMenu("kasterweb/kasterweb_flagproducts")->_addBreadcrumb(Mage::helper("adminhtml")->__("Flag  Manager"), Mage::helper("adminhtml")->__("Flag Manager"));
        return $this;
    }

    public function indexAction()
    {
        $this->loadLayout();
        $this->_setActiveMenu('kasterweb/kasterweb_flagproducts');
        $this->_addContent($this->getLayout()->createBlock('kasterweb_flagproducts/adminhtml_flags'));
        $this->renderLayout();
    }

//    public function editAction()
//    {
//        $this->_title($this->__("FlagProducts"));
//        $this->_title($this->__("Flag"));
//        $this->_title($this->__("Edit Item"));
//
//        $id = $this->getRequest()->getParam('id', null);
//        $model = Mage::getModel("kasterweb_flagproducts/flags")->load($id);
//        if ($model->getId()) {
//            Mage::register("flag_data", $model);
//            $this->loadLayout();
//            $this->_setActiveMenu("kasterweb/kasterweb_flagproducts");
//            $this->_addBreadcrumb(Mage::helper("adminhtml")->__("Flag Manager"), Mage::helper("adminhtml")->__("Flag Manager"));
//            $this->_addBreadcrumb(Mage::helper("adminhtml")->__("Flag Description"), Mage::helper("adminhtml")->__("Flag Description"));
//            $this->getLayout()->getBlock("head")->setCanLoadExtJs(true);
//            $this->_addContent($this->getLayout()->createBlock("flagproducts/adminhtml_flag_edit"))->_addLeft($this->getLayout()->createBlock("flagproducts/adminhtml_flag_edit_tabs"));
//            $this->renderLayout();
//        } else {
//            Mage::getSingleton("adminhtml/session")->addError(Mage::helper("flagproducts")->__("Item does not exist."));
//            $this->_redirect("*/*/");
//        }
//    }

    public function editAction()
    {
        $model = Mage::getModel('kasterweb_flagproducts/flags');
        if ($id = $this->getRequest()->getParam('id', null)) {
            $model->load((int)$id);
            if ($model->getId()) {
                if ($data = Mage::getSingleton('adminhtml/session')->getFormData(true)) {
                    $model->setData($data)->setId($id);
                }
            } else {
                Mage::getSingleton('adminhtml/session')->addError('Veículo não existe');
                return $this->_redirect('*/*/');
            }
        }

        Mage::register('flag_data', $model);

        $this->loadLayout();
        $this->_initAction();
        $this->getLayout()->getBlock("head")->setCanLoadExtJs(true);
        $this->_addContent($this->getLayout()->createBlock("kasterweb_flagproducts/adminhtml_flags_edit"))->_addLeft($this->getLayout()->createBlock("kasterweb_flagproducts/adminhtml_flags_edit_tabs"));
        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function saveAction()
    {
        $post_data = $this->getRequest()->getPost();
        if ($this->getRequest()->getParam('id')) {
            $post_data['updated_at'] = gmdate('Y-m-d H:i:s');
        } else {
            $post_data['created_at'] = gmdate('Y-m-d H:i:s');
        }
        if ($post_data) {
            try {

                if (!empty($_FILES['path_flag']['name'])) {
                    $uploader = new Varien_File_Uploader('path_flag');
                    $uploader->setAllowedExtensions(array('jpg', 'jpeg', 'gif', 'png')); // or pdf or anything
                    $uploader->setAllowRenameFiles(true);
                    $uploader->setFilesDispersion(false);
                    $path_upload = Mage::getBaseDir('media') . '/kasterweb_flags/';
                    $path_media = 'kasterweb_flags/';
                    $retorno = $uploader->save($path_upload, $_FILES['path_flag']['name']);
                    $post_data['path_flag'] = $path_media . $retorno['file'];
                } else {
                    unset($post_data['path_flag']);
                }


                $model = Mage::getModel("kasterweb_flagproducts/flags")
                    ->addData($post_data)
                    ->setId($this->getRequest()->getParam("id"))
                    ->save();

                Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Flag was successfully saved"));
                Mage::getSingleton("adminhtml/session")->setFlagData(false);

                if ($this->getRequest()->getParam("back")) {
                    $this->_redirect("*/*/edit", array("id" => $model->getId()));
                    return;
                }
                $this->_redirect("*/*/");
                return;
            } catch (Exception $e) {
                Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
                Mage::getSingleton("adminhtml/session")->setFlagData($this->getRequest()->getPost());
                $this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
                return;
            }

        }
        $this->_redirect("*/*/");
    }


    public function deleteAction()
    {
        if ($this->getRequest()->getParam("id") > 0) {
            try {
                $model = Mage::getModel("kasterweb_flagproducts/flags");
                $model->setId($this->getRequest()->getParam("id"))->delete();
                Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item was successfully deleted"));
                $this->_redirect("*/*/");
            } catch (Exception $e) {
                Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
                $this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
            }
        }
        $this->_redirect("*/*/");
    }


    public function massRemoveAction()
    {
        try {
            $ids = $this->getRequest()->getPost('entity_ids', array());
            foreach ($ids as $id) {
                $model = Mage::getModel("kasterweb_flagproducts/flags");
                $model->setId($id)->delete();
            }
            Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item(s) was successfully removed"));
        } catch (Exception $e) {
            Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
        }
        $this->_redirect('*/*/');
    }

}
