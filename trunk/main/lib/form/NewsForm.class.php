<?php

/**
 * News form.
 *
 * @package    huiju.feinong
 * @subpackage form
 * @author     Your name here
 */
class NewsForm extends BaseNewsForm {

    public function configure() {
        $this->widgetSchema['is_enable'] = new myOwnWidgetFormInputCheckbox(array('value_attribute_value' => 1));
        $this->validatorSchema['is_enable'] = new sfValidatorPass();

        $this->widgetSchema['summary'] = new sfWidgetFormTextarea();
        $this->validatorSchema['is_show_homepage'] = new sfValidatorPass();
        $this->widgetSchema['is_show_homepage'] = new myOwnWidgetFormInputCheckbox(array('value_attribute_value' => 1));

        $this->widgetSchema['image'] = new sfWidgetFormInputFileEditable(array(
            'label' => 'Image',
            'file_src' => $this->getObject()->getImagePath(),
            'is_image' => true,
            'delete_label' => '移除现在的图片',
            'template' => '<table id="image_upload_table">
                            <tr><td>' . $this->getImageLinkHtml() . '</td></tr>
                            <tr><td>%input%</td></tr>
                            <tr><td>图片类型:*.jpg,png 图片尺寸: 146px 宽，197px 高  图片大小: 1MB</td></tr>
                            <tr><td>%delete% %delete_label%</td></tr>
                        </table>
                        ',
        ));
        $this->validatorSchema['image'] = new mysfValidatorFileImage(array(
            'required' => false,
            'mime_types' => array('image/jpeg', 'image/pjpeg', 'image/png', 'image/jpg'),
            'max_size' => 1024 * 1024 * 1,
            'size_x' => 146,
            'size_y' => 197,
        ));

        $this->validatorSchema['image_delete'] = new sfValidatorPass();
    }

    private function getImageLinkHtml() {
        if ($this->getObject()->getImage()) {
            $basepath = $this->getObject()->getImageBasePath();
            if (file_exists($basepath . $this->getObject()->getImage())) {
                $result = '<img src="/uploads/news/' . $this->getObject()->getId() . '/image/' . $this->getObject()->getImage() . '" /><br /><br />';
            } else {
                $result = '<img src="/images/common/noimage/100.png">';
            }
        } else {
            $result = '<img src="/images/common/noimage/100.png">';
        }
        return $result;
    }

    public function doSave($con = null) {

        $o = $this->getObject();
        // check if need delete current one
        if ((isset($_POST['news']['image_delete']) || (isset($_FILES['news']['name']['image']) && $_FILES['news']['name']['image'] != '')) && !$o->isNew()) {
            $o->deleteImage();
        }
        // save first, so we get id for image path
        parent::doSave($con);
        // process images
        $this->processImage();
    }

    private function processImage() {
        $files = $_FILES['news'];
        if (isset($_FILES['news']) && $files['error']['image'] == UPLOAD_ERR_OK) {
            // 保存图片
            $o = $this->getObject();
            $file = $this->getValue('image');
            $file_token = sha1($o->getId() . time() . rand(1, 1000)) . $file->getOriginalExtension();
            $file->save($o->getImageBasePath() . $file_token);
            $o->setImage($file_token);
            $o->save();
        }
    }

}
